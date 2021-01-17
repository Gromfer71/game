<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\SystemMessage;

/**
 * All actions with mail: messages, battle reports, letters, etc - there.
 *
 * @package App\Services
 */
class MailHandler
{

    public const EVERYDAY_GIFT = [
        ['base_item_id' => 1, 'count' => 10, 'name' => 'food_chest', 'quality' => 1000],
        ['base_item_id' => 2, 'count' => 15, 'name' => 'wood_chest', 'quality' => 1000],
    ];

    /**
     * @return bool
     */
    public static function EverydayGift()
    {
        SystemMessage::create(
            [
                'category' => 'system',
                'to' => \Auth::user()->id,
                'title' => "Ежедневный подарок",
                'message' => 'Ежедневный подарок',
                'items' => json_encode(self::EVERYDAY_GIFT),
            ]);

    }
}
