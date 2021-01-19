<?php

namespace Tests\Feature\UpdateUser;

use App\Models\SystemMessage;
use App\Models\User;
use App\Services\MailHandler;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class EverydayGiftTest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        \Auth::login(User::factory()->create());
    }

    /** @test */
    public function success_send_gift()
    {
        Auth::user()->last_active = now()->subDay()->timestamp;
        Auth::user()->save();
        $this->get('/home')->assertStatus(200);


        $this->assertDatabaseHas(
            'system_messages',
            ['to' => Auth::user()->id, 'category' => 'system']
        );
    }

    /** @test */
    public function failed_send_gift()
    {
        \Auth::user()->last_active = time();
        Auth::user()->save();
        $this->get('/home')->assertStatus(200);

        $this->assertDatabaseMissing(
            'system_messages',
            ['to' => Auth::user()->id, 'category' => 'system', 'created_at' => now()]
        );
    }

}
