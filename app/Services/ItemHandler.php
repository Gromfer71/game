<?php


namespace App\Services;


use App\Models\Item;
use Assert\Assertion;
use Illuminate\Support\Facades\Auth;

class ItemHandler
{

    /**
     * Adds items from an array (json_decode needs to be done in advance) to the user or creates new ones.
     *
     * @param  array  $items
     *
     * @throws \Throwable
     */
    public static function AddItems(array $items)
    {
        Assertion::notNull($items);

        foreach ($items as $item) {
            $exItem = Item::where(['base_item_id' => $item->base_item_id, 'user_id' => Auth::user()->id])->first();
            if($exItem) {
                $exItem->count += $item->count;
                $exItem->saveOrFail();
            }
            else {
                Item::create(
                    [
                        'user_id'      => Auth::user()->id,
                        'base_item_id' => $item->base_item_id,
                        'count'        => $item->count,
                    ]
                );
            }
        }
    }
}
