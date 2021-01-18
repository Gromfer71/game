<?php

namespace Tests\Feature\Buildings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_buildings_main_page_opened()
    {
        $this->get(route('buildings'))->assertViewIs('auth.buildings.preview')->assertViewHasAll(['buildings'])->assertStatus(200);
    }
}
