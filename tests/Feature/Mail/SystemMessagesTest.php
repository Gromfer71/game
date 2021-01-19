<?php

namespace Tests\Feature\Mail;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemMessagesTest extends TestCase
{
    public function test_system_messages()
    {
        $this->get(route('systemMessages'))
            ->assertViewIs('auth.mail.system_messages')
            ->assertViewHasAll(['messages'])
            ->assertStatus(200);
    }
}
