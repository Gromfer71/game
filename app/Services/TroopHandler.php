<?php

namespace App\Services;

use App\Models\BaseTroop;
use App\Models\TrainTroop;
use App\Models\Troop;
use App\Resources;
use Auth;

abstract class TroopHandler
{
    public static function trainValidate($troops)
    {
        if (TrainTroop::where('user_id', Auth::id())->get()->isNotEmpty()) {
            return 'Войска уже обучаются!';
        }
        if (Auth::user()->validateSubRes(self::getTrainResources($troops))) {
            return true;
        } else {
            return 'Недостаточно ресурсов для обучения!';
        }
    }

    public static function trainStart($troops)
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
        Auth::user()->createTrainTime($trainTime);
        Auth::user()->subRes(self::getTrainResources($troops));
    }

    public static function getTrainResources($troops)
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

    public static function checkTrainEnd()
    {
        if (Auth::user()->train_time < time() && Auth::user()->train_time !== null) {
            foreach (Auth::user()->trainTroops() as $troop) {
                $exTroop = Troop::where(['user_id' => Auth::id(), 'troop_id' => $troop->troop_id])->first();
                Troop::updateOrInsert(
                    ['troop_id' => $troop->troop_id, 'user_id' => Auth::id()],
                    ['count' => $troop->count + ($exTroop != null ? $exTroop->count : 0)]
                );
                $troop->delete();
                Auth::user()->train_time = null;
                Auth::user()->save();
            }
        }
    }
}
