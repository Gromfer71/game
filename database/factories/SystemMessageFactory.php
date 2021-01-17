<?php

namespace Database\Factories;

use App\Services\MailHandler;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\SystemMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SystemMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SystemMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => 'system',
            'to' => Auth::id(),
            'title' => 'Ежедневный подарок',
            'message' => 'message',
            'items' => null,
            'is_read' => 0,
            'is_items_got' => 0,

        ];
    }
}
