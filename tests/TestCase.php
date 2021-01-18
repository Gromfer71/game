<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseTransactions;
    use CreatesApplication;

    public function setUp()
    :void
    {
        parent::setUp();
        $this->post(
            route('register'),
            ['login' => 'user', 'password' => '123', 'password_confirmation' => '123']
        );
    }
}
