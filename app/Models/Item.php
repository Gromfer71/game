<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property int $user_id
 * @property string $base_item_id
 * @property int $count
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereBaseItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUserId($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function baseItem()
    {
        return $this->hasOne(BaseItem::class, 'base_id', 'base_item_id')->first();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id')->get();
    }
}
