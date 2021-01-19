<?php

namespace Tests\Feature\Mail;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    public function test_index()
    {
        $this->get(route('mailMain'))
            ->assertViewIs('auth.mail.main')
            ->assertViewHasAll([])
            ->assertStatus(200);
    }
}
