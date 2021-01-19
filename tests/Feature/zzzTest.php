<?php

namespace Tests\Feature;

use Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class zzzTest extends TestCase
{
    public function test_example()
    {
        Artisan::call('inspire');

        $this->assertTrue(true);
    }
}
