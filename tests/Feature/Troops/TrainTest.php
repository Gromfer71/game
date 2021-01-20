<?php

namespace Tests\Feature\Troops;

use App\Models\TrainTroop;
use App\Models\Troop;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TrainTest extends TestCase
{

    public function test_success_start_train()
    {
        $this->post(route('troops.train'), ['1' => 1])->assertStatus(302)->assertSessionHas(
            'ok',
            __('mes.troops.trainStart')
        );
    }

    public function test_record_inserted_in_database()
    {
        $this->post(route('troops.train'), ['1' => 1]);
        $this->assertDatabaseHas('train_troops', ['user_id' => Auth::id(), 'troop_id' => '1', 'count' => '1']);
    }

    public function test_train_time_not_null_after_train_start()
    {
        $this->post(route('troops.train'), ['1' => 1]);
        $this->assertDatabaseMissing('users', ['id' => Auth::id(), 'train_time' => null]);
    }

    public function test_resources_sub_after_train_start()
    {
        $beforeFood = Auth::user()->food;
        $beforeWood = Auth::user()->wood;
        $this->post(route('troops.train'), ['1' => 1]);
        $trainRes = json_decode(
            TrainTroop::where(['user_id' => Auth::id(), 'troop_id' => '1', 'count' => '1'])->first()->baseTroop->cost
        );
        $this->assertTrue(Auth::user()->food + $trainRes->food == $beforeFood);
        $this->assertTrue(Auth::user()->wood + $trainRes->wood == $beforeWood);
    }

    public function test_troops_already_trains_now()
    {
        TrainTroop::factory(['troop_id' => 1, 'count' => 10])->create();
        $this->post(route('troops.train'), ['1' => 10])->assertStatus(302)->assertSessionHas(
            'error',
            __(
                'mes.troops.alreadyTraining'
            )
        );
    }

    public function test_not_enough_resources_for_training()
    {
        $this->post(route('troops.train'), ['1' => 9999999])->assertStatus(302)->assertSessionHas(
            'error',
            __('mes.notEnoughRes')
        );
    }

    public function test_train_troops_null_after_train_ended()
    {
        $this->post(route('troops.train'), ['1' => 1]);
        Auth::user()->train_time = 1;
        Auth::user()->save();
        $this->get(route('home'));
        $this->assertDatabaseMissing('train_troops', ['user_id' => Auth::id()]);
    }

    public function test_troops_table_not_empty_after_train_ended()
    {
        $this->post(route('troops.train'), ['1' => 1]);
        Auth::user()->train_time = 1;
        Auth::user()->save();
        $this->get(route('home'));
        $this->assertDatabaseHas('troops', ['user_id' => Auth::id(), 'troop_id' => '1', 'count' => '1']);
    }

    public function test_troops_increased_if_already_exists()
    {
        Troop::factory(['troop_id' => 1, 'count' => 1])->create();
        $this->post(route('troops.train'), ['1' => 1]);
        Auth::user()->train_time = 1;
        Auth::user()->save();
        $this->get(route('home'));

        $this->assertDatabaseHas('troops', ['user_id' => Auth::id(), 'troop_id' => '1', 'count' => '2']);
    }
}
