<?php


namespace Tests\Feature;


use App\Models\User;
use App\Models\UserBuilding;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

trait login
{

    public function setUp()
    :void
    {
        parent::setUp();
        Auth::login(User::factory()->create());
        UserBuilding::factory()->create();
    }
}
