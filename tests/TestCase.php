<?php

namespace Tests;

use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseTransactions;
    use CreatesApplication;

    protected User $user;
    protected Generator $faker;

    public function setUp()
    :void
    {
        parent::setUp();
        $this->faker = Faker::create();

        $pass = $this->faker->password;
        $this->post(
            route('register'),
            ['login' => $this->faker->name, 'password' => $pass, 'password_confirmation' => $pass]
        );
        $this->user = Auth::user();
    }
}
