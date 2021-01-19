<?php

namespace Tests;

use App\Models\User;
use Artisan;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseTransactions;
    use CreatesApplication;

    protected User $user;

    public function setUp()
    :void
    {
        parent::setUp();
        $this->post(
            route('register'),
            ['login' => 'user', 'password' => '123', 'password_confirmation' => '123']
        );
        $this->user = \Auth::user();
    }
}
