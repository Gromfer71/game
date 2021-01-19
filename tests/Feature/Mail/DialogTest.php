<?php

namespace Tests\Feature\Mail;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DialogTest extends TestCase
{
    public function test_dialog()
    {
        $user = User::factory()->create();
        $this->get(route('dialog', $user->id))
            ->assertViewIs('auth.mail.dialog')
            ->assertViewHasAll(['messages', 'withUser'])
            ->assertStatus(200);
    }
}
