<?php

namespace Database\Factories;

use App\Models\Troop;
use Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

class TroopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Troop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => Auth::id(),
        ];
    }
}
