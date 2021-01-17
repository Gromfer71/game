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

    /** @test */
    public function take_items_from_system_message()
    {
        Auth::user()->last_active = now()->subDay()->timestamp;
        Auth::user()->save();
        $this->get('/home')->assertStatus(200);

        $message = SystemMessage::where(['to' => Auth::user()->id, 'category' => 'system'])->get();

        $this->assertCount(1, $message);

        $message = $message->first();

        $this->post(route('systemMessages.takeItems'), ['id' => $message->id])->assertStatus(302);

        $this->assertDatabaseHas(
            'system_messages',
            [
                'to'           => Auth::user()->id,
                'category'     => 'system',
                'is_items_got' => 1,
            ]
        );
        $items = MailHandler::EVERYDAY_GIFT;
        foreach ($items as $item) {
            $this->assertDatabaseHas(
                'items',
                [
                    'user_id'      => Auth::user()->id,
                    'base_item_id' => $item['base_item_id'],
                ]
            );
        }
    }
}
