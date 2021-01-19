<?php


namespace App\Services;


use App\Models\Item;
use Assert\Assertion;

class ItemHandler
{

    /**
     * Adds items from an array (json_decode needs to be done in advance) to the user or creates new ones.
     *
     * @param  array  $items
     * @param         $userId
     *
     * @throws \Assert\AssertionFailedException
     * @throws \Throwable
     */
    public function AddItems(array $items, $userId)
    {
        Assertion::notNull($items);

        foreach ($items as $item) {
            $exItem = Item::where(['base_item_id' => $item->base_item_id, 'user_id' => $userId])->first();
            if($exItem) {
                $exItem->count += $item->count;
                $exItem->saveOrFail();
            }
            else {
                Item::create(
                    [
                        'user_id'      => $userId,
                        'base_item_id' => $item->base_item_id,
                        'count'        => $item->count,
                    ]
                );
            }
        }
    }
}
