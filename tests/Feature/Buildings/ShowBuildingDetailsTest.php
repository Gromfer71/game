<?php

namespace Tests\Feature\Buildings;

use App\Models\User;
use App\Models\UserBuilding;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ShowBuildingDetailsTest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        Auth::login(User::factory()->create());
        $this->building = UserBuilding::factory()->create();
    }

    public function test_building_details_page_opened()
    {
        $this->get(route('building.show', Auth::user()->userBuildings()->first->id))
            ->assertViewIs('auth.buildings.details')
            ->assertViewHasAll(['building', 'properties'])
            ->assertStatus(200);
    }
}
