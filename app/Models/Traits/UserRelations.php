<?php


namespace App\Models\Traits;


use App\Models\Item;
use App\Models\SystemMessage;
use App\Models\TrainTroop;
use App\Models\Troop;
use App\Models\UserBuilding;

trait UserRelations
{
    public function items()
    {
        return $this->hasMany(Item::class, 'user_id', 'id');
    }

    public function userBuildings()
    {
        return $this->hasMany(UserBuilding::class, 'user_id', 'id');
    }

    public function systemMessages()
    {
        return $this->hasMany(SystemMessage::class, 'to', 'id');
    }

    public function trainTroops()
    {
        return $this->hasMany(TrainTroop::class, 'user_id', 'id');
    }

    public function troops()
    {
        return $this->hasMany(Troop::class, 'user_id', 'id');
    }
}
