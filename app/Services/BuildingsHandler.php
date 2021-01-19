<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\SystemMessage;
use App\Models\User;
use App\Models\UserBuilding;
use App\Resources;
use Illuminate\Support\Facades\DB;

class BuildingsHandler
{
    private User $user;
    private UserBuilding $building;

    public function upgrade()
    {
        if (!$this->user->validateSubRes(
            new Resources(
                $this->building->baseBuilding()->food_up,
                $this->building->baseBuilding()->wood_up,
                $this->building->baseBuilding()->iron_up,
                $this->building->baseBuilding()->mithril_up,
            )
        )) {
            return  __('mes.notEnoughRes');
        }
        if (!$this->user->validateBuildingUpgradeCountLimit()) {
            return __('mes.upgrade.maxUpgradesLimit');
        }
        if (!$this->building->validateMaxLv()) {
            return __('mes.upgrade.maxLvLimit');
        }
        if($this->building->lv_upping_time != null) {
            return __('mes.upgrade.alreadyUpgrading');
        }

        DB::transaction(
            function () {
                $this->building->upgrade();
                $this->user->subRes(Resources::createFromModel($this->building->baseBuilding()));
                $this->building->saveOrFail();
            }
        );

        return true;
    }

    public function checkBuildingsFinished()
    {
        foreach ($this->user->userBuildings() as $building) {
            if ($building->checkFinishUpgrade()) {
                SystemMessage::factory()->create(
                    [
                        'title' => __('mes.upgrade.finishedMail.title'),
                        'message' => __('mes.upgrade.finishedMail.text', ['category' => __('mes.'.$building->baseBuilding()->category)]),
                    ]
                );
                $building->save();
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

    /**
     * @param  \App\Models\UserBuilding  $building
     */
    public function setBuilding(UserBuilding $building)
    :void {
        $this->building = $building;
    }

}
