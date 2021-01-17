<?php

namespace Database\Factories;

use App\Models\UserBuilding;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBuildingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserBuilding::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \Auth::user()->id,
            'base_id' => 1,
            'lv_upping_time' => null,
        ];
    }
}
