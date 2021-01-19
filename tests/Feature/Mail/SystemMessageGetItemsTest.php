<?php

namespace Tests\Feature\Mail;

use App\Models\SystemMessage;
use App\Services\MailHandler;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SystemMessageGetItemsTest extends TestCase
{
    public function test_take_items_from_system_message()
    {
        Auth::user()->last_active = now()->subDay()->timestamp;
        Auth::user()->save();
        $this->get('/home')->assertStatus(200);

        $message = SystemMessage::where(['to' => Auth::user()->id, 'category' => 'system'])->get();
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
