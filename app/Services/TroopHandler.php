<?php

namespace App\Services;

use App\Models\BaseTroop;
use App\Models\TrainTroop;
use App\Models\Troop;
use App\Models\User;
use App\Resources;

class TroopHandler
{
    private User $user;

    public function trainValidate($troops)
    {
        if (TrainTroop::where('user_id', $this->user->id)->get()->isNotEmpty()) {
            return __('mes.troops.alreadyTraining');
        }
        if ($this->user->validateSubRes($this->getTrainResources($troops))) {
            return true;
        } else {
            return __('mes.notEnoughRes');
        }
    }

    public function trainStart($troops)
    {
        $trainTime = 0;
        foreach ($troops as $id => $count) {
            if ($count != 0) {
                TrainTroop::factory(
                    ['troop_id' => $id, 'count' => $count]
                )->create();
            }
            $trainTime += BaseTroop::find($id)->train_time * $count;
        }
        $this->user->createTrainTime($trainTime);
        $this->user->subRes($this->getTrainResources($troops));
    }

    public function getTrainResources($troops)
    {
        $needResources = new Resources();
        foreach ($troops as $id => $count) {
            $baseTroopRes = json_decode(BaseTroop::find($id)->cost);
            $needResources->add(
                new Resources(
                    $baseTroopRes->food * $count,
                    $baseTroopRes->wood * $count,
                    $baseTroopRes->iron * $count,
                    $baseTroopRes->mithril * $count
                )
            );
        }
        return $needResources;
    }

    public function checkTrainEnd()
    {
        if ($this->user->train_time < time() && $this->user->train_time !== null) {
            foreach ($this->user->trainTroops() as $troop) {
                $exTroop = Troop::where(['user_id' => $this->user->id, 'troop_id' => $troop->troop_id])->first();
                Troop::updateOrInsert(
                    ['troop_id' => $troop->troop_id, 'user_id' => $this->user->id],
                    ['count' => $troop->count + ($exTroop != null ? $exTroop->count : 0)]
                );
                $troop->delete();
                $this->user->train_time = null;
                $this->user->save();
            }
        }
    }

    /**
     * @param  \App\Models\User  $user
     */
    public function setUser(User $user)
    :void {
        $this->user = $user;
    }

}
