<?php

namespace Tests\Feature\Buildings;

use Illuminate\Support\Facades\Auth;
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
