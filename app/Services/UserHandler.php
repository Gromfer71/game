<?php


namespace App\Services;


use App\Models\User;
use App\Models\UserBuilding;
use App\Repositories\Read\UserRepository;
use App\Repositories\Write\WriteUserRepository;
use Illuminate\Support\Facades\DB;

class UserHandler
{
    private const  CHECK_ACTIVE = 99999999; //sec

    private WriteUserRepository $rep;

    public function addUserResources()
    {
        $user = UserRepository::getCurrentUser();
        if (UserRepository::checkAddResTime(self::CHECK_ACTIVE)) {
            $this->rep->updateResources(
                UserRepository::getAllBonuses($user),
                $user,
                floor((time() - strtotime($user->last_check)) / self::CHECK_ACTIVE));
            $this->rep->updateLastCheck($user);
        }
    }

    /**
     * Gets all income per hour resources of input User model.
     *
     * @param  \App\Models\User  $user
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getResourcesIncome(User $user)
    {
        $buildings = UserBuilding::where(['category' => 'castle', 'user_id' => $user->id])->get();
        $res = ['food' => 0, 'wood' => 0, 'iron' => 0, 'mithril' => 0];
        foreach ($buildings as $building) {
            $base = DB::table($building->category)->where(['lv' => $building->lv])->first();
            $res['food'] += $base->food_income;
            $res['wood'] += $base->wood_income;
            //$res['iron'] += $base->iron_income;
            //$res['mithril'] += $base->mithril_income;
        }
        return collect($res);
    }

    /**
     * Get all input User model bonuses such as income
     * per hour resources, % to attack, building speed etc
     *
     * @param  \App\Models\User  $user
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getAllBonuses(User $user)
    {
        $res = [];
        $res['resources'] = self::getResourcesIncome($user);

        return collect($res);
    }

}
