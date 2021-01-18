<?php

namespace Tests\Feature\Buildings;

use App\Models\User;
use App\Models\UserBuilding;
use Illuminate\Support\Facades\Auth;
use Tests\Feature\login;
use Tests\TestCase;

class ShowTest extends TestCase
{
    public function test_building_details_page_opened()
    {
        $this->get(route('building.show', Auth::user()->userBuildings()->first->id))
            ->assertViewIs('auth.buildings.details')
            ->assertViewHasAll(['building', 'properties'])
            ->assertStatus(200);
    }
}
