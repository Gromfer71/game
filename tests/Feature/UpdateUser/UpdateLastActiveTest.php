<?php

namespace Tests\Feature\UpdateUser;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
class UpdateLastActiveTest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        Auth::login(User::factory()->create());
    }

    /** @test */
    public function updated_last_active()
    {
        Auth::user()->last_active = now()->subMinute()->timestamp;
        Auth::user()->save();
        $lastActive = Auth::user()->last_active;
        $this->get('/home')->assertStatus(200);

        $this->assertTrue(Auth::user()->last_active > $lastActive);
    }
}
