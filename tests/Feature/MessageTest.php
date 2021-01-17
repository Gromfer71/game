<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class MessageTest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        \Auth::login(User::factory()->create());
    }

    /** @test */
    public function success_send()
    {
        $user = User::factory()->create();

        $this->post(route('dialogSend'), ['to' => $user->id, 'message' => 'message'])->assertStatus(302);
    }

    /** @test */
    public function existing_in_database()
    {
        $user = User::factory()->create();
        $this->post(route('dialogSend'), ['to' => $user->id, 'message' => 'message']);
        $this->assertDatabaseHas('messages', ['to' => $user->id, 'message' => 'message']);
    }

    /** @test */
    public function not_existing_invalid_message()
    {
        $user = User::factory()->create();
        $this->post(route('dialogSend'), ['to' => $user->id, 'message' => '']);
        $this->assertDatabaseMissing('messages', ['to' => $user->id, 'message' => '']);
    }

    /** @test
     */
    public function null_user_send()
    {
        $this->post(route('dialogSend'), ['to' => -200, 'message' => 'message'])->assertSessionHasErrors(['to']);
        $this->assertDatabaseMissing('messages', ['to' => -200, 'message' => 'message']);
    }

    /** @test */
    public function null_user_send2()
    {
        $this->post(route('dialogSend'), ['to' => 99999, 'message' => 'message'])->assertStatus(302);
        $this->assertDatabaseMissing('messages', ['to' => 99999, 'message' => 'message']);
    }

    /** @test */
    public function empty_message()
    {
        $user = User::factory()->create();
        $this->post(route('dialogSend'), ['to' => $user->id, 'message' => ''])->assertStatus(302);
        $this->assertDatabaseMissing('messages', ['to' => $user->id, 'message' => '']);
    }

    /** @test */
    public function very_large_message()
    {
        $user = User::factory()->create();
        $this->post(route('dialogSend'), ['to' => $user->id, 'message' => str_repeat('*', 1000)])->assertStatus(302);
        $this->assertDatabaseMissing('messages', ['to' => $user->id, 'message' => str_repeat('*', 1000)]);
    }

    /** @test */
    public function send_message_to_self()
    {
        $this->post(route('dialogSend'), ['to' => \Auth::user()->id, 'message' => 'message'])->assertStatus(302);
        $this->assertDatabaseMissing('messages', ['to' => \Auth::user()->id, 'message' => 'message']);
    }





}
