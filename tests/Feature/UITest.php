<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\SystemMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UITest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        Auth::login(User::factory()->create());
    }

    public function check(string $route, string $view, array $data, ...$routeParams)
    {
        $response = $this->get(route($route, $routeParams));
        $response->assertViewIs($view);
        $response->assertViewHasAll($data);
        $response->assertOk();
    }

    /** @test */
    public function home_page()
    {
        $this->check('home', 'auth.home', ['me']);
    }

    /** @test */
    public function show_online()
    {
        $this->check('online', 'auth.showOnline', ['users']);
    }

    /** @test */
    public function mail_main()
    {
        $this->check('mailMain', 'auth.mail.main', []);
    }

    /** @test */
    public function dialog()
    {
        $user = User::factory()->create();
        $this->check('dialog', 'auth.mail.dialog', ['messages', 'withUser'], $user->id);
    }

    /** @test */
    public function systemMessages()
    {
        $this->check('systemMessages', 'auth.mail.system_messages', ['messages']);
    }

    /** @test */
    public function showSystemMessage()
    {
        $message = SystemMessage::factory()->create(['to' => Auth::user()->id]);
        $this->check('systemMessages.show', 'auth.mail.system_message_show', ['message', 'items'], $message->id);
    }



}
