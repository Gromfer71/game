<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ItemsEffectTest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        Auth::login(User::factory()->create());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_use_item_1_food_chest_1000()
    {
        $food = Auth::user()->food;
        $item = Item::factory()->create(['count' => 1, 'base_item_id' => 1]);
        $this->post(route('items.use', ['id' => $item->id, 'count' => 1]));
        $this->assertEquals(Auth::user()->food, $food + 1000);
    }

    public function test_use_item_2_wood_chest_1000()
    {
        $wood = Auth::user()->wood;
        $item = Item::factory()->create(['count' => 1, 'base_item_id' => 1]);
        $this->post(route('items.use', ['id' => $item->id, 'count' => 1]));
        $this->assertEquals(Auth::user()->food, $wood + 1000);
    }
}
