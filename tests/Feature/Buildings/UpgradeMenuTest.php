<?php

namespace Tests\Feature\Buildings;

use App\Models\User;
use App\Models\UserBuilding;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpgradeMenuTest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        Auth::login(User::factory()->create());
        UserBuilding::factory()->create();
    }

    public function test_building_upgrade_page_opened()
    {
        $this->get(route('buildingUpgradeMenu', Auth::user()->userBuildings()->first->id))
            ->assertViewIs('auth.buildings.upgrade')
            ->assertViewHasAll(['building'])
            ->assertStatus(200);
    }
}
