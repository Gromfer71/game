<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\SystemMessage;
use App\Models\UserBuilding;
use App\Resources;
use Auth;
use Illuminate\Support\Carbon;
abstract class BuildingsHandler
{
    private const MAX_LVL = 30;

    public static function upgrade($id)
    {
        $building = UserBuilding::findOrFail($id);
        $building->lv_upping_time = $building->baseBuilding()->time_up + time();
        $building->saveOrFail();

        Auth::user()->subRes(
            new Resources(
                $building->baseBuilding()->food_up,
                $building->baseBuilding()->wood_up,
                $building->baseBuilding()->iron_up,
                $building->baseBuilding()->mithril_up,
            )
        );


    }

    public static function validateUpgrade($id)
    {
        $building = UserBuilding::findOrFail($id);
        if ($building->baseBuilding()->food_up > Auth::user()->food ||
            $building->baseBuilding()->wood_up > Auth::user()->wood ||
            $building->baseBuilding()->iron_up > Auth::user()->iron ||
            $building->baseBuilding()->mithril_up > Auth::user()->mithril) {
            return 'Недостаточно ресурсов!';
        }

        if (UserBuilding::where('user_id', Auth::user()->id)->where('lv_upping_time', '>', now())->count(
            ) == Auth::user()->max_building_upgrades) {
            return 'Достигнуто максимальное количество одновременно улучшаемых простроек!';
        }

        return true;
    }

    public static function checkBuildingsFinished()
    {
        foreach (Auth::user()->userBuildings() as $building) {

            if($building->checkFinishUpgrade()) {
                SystemMessage::factory()->create(
                    [
                        'title' => 'Оповещение об улучшении постройки',
                        'message' => 'Улучшение постройки '.__('mes.'.$building->baseBuilding()->category).' завершено.',
                    ]
                );
                $building->save();
            }
        }
    }
}
