<?php

namespace Tests\Feature\Mail;

use App\Models\SystemMessage;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SystemMessageShowTest extends TestCase
{
    public function test_system_message_show()
    {
        $message = SystemMessage::factory()->create(['to' => Auth::user()->id]);
        $this->get(route('systemMessages.show', $message->id))
            ->assertViewIs('auth.mail.system_message_show')
            ->assertViewHasAll(['message', 'items'])
            ->assertStatus(200);
    }
}
