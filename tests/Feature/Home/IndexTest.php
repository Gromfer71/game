<?php

namespace Tests\Feature\Home;

use Tests\TestCase;

class IndexTest extends TestCase
{
    public function test_index()
    {
        $this->get(route('home'))
            ->assertViewIs('auth.home')
            ->assertViewHasAll(['me'])
            ->assertStatus(200);
    }
}
