<?php

namespace Tests\Feature\Buildings;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpgradeMenuTest extends TestCase
{

    public function test_building_upgrade_page_opened()
    {
        $this->get(route('buildingUpgradeMenu', Auth::user()->userBuildings()->first->id))
            ->assertViewIs('auth.buildings.upgrade')
            ->assertViewHasAll(['building'])
            ->assertStatus(200);
    }
}
