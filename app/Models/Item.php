<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property int $user_id
 * @property string $base_item_id
 * @property int $count
 * @method static Builder|Item newModelQuery()
 * @method static Builder|Item newQuery()
 * @method static Builder|Item query()
 * @method static Builder|Item whereBaseItemId($value)
 * @method static Builder|Item whereCount($value)
 * @method static Builder|Item whereId($value)
 * @method static Builder|Item whereUserId($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function baseItem()
    {
        return $this->hasOne(BaseItem::class, 'base_id', 'base_item_id');
    }
}
