<?php

namespace Tests\Feature\Home;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowOnlineTest extends TestCase
{
    public function test_show_online()
    {
        $this->get(route('online'))
            ->assertViewIs('auth.showOnline')
            ->assertViewHasAll(['users'])
            ->assertStatus(200);
    }
}
