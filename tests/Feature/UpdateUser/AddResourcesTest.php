<?php

namespace Tests\Feature\UpdateUser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddResourcesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_resources()
    {
        $food = $this->user->food;
        $this->user->last_check -= 1000;
        $this->get(route('home'));
        $this->assertTrue($food < $this->user->food);
    }
}
