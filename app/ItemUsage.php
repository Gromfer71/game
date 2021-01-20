<?php


namespace App;


use App\Models\Item;
use Assert\Assertion;
use Auth;

/**
 * Class ItemUsage
 *
 * @package App
 */
abstract class ItemUsage
{
    /**
     * @param $id
     * @param $count
     *
     * @throws \Assert\AssertionFailedException
     * @throws \Throwable
     */
    public static function use($id, $count)
    {
        $item = Item::findOrFail($id);
        Assertion::greaterOrEqualThan($item->count, $count);
        Assertion::greaterThan($count, 0);
        $name = "use_".$item->baseItem->name;
        self::$name($item, $count);
        $item->count -= $count;
        if ($item->count == 0) {
            $item->delete();
        } else {
            $item->saveOrFail();
        }
    }

    /**
     * @param       $item
     * @param       $count
     *
     * @throws \Throwable
     */
    public static function use_food_chest($item, $count)
    {
        Auth::user()->food += $item->baseItem->quality * $count;
        Auth::user()->saveOrFail();
    }

    /**
     * @param       $item
     * @param       $count
     *
     * @throws \Throwable
     */
    public static function use_wood_chest($item, $count)
    {
        Auth::user()->wood += $item->baseItem->quality * $count;
        Auth::user()->saveOrFail();
    }
}
