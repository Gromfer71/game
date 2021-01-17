<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Troop
 *
 * @property int $id
 * @property int $user_id
 * @property int $troop_id
 * @property int $count
 * @method static \Illuminate\Database\Eloquent\Builder|Troop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Troop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Troop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Troop whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Troop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Troop whereTroopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Troop whereUserId($value)
 * @mixin \Eloquent
 */
class Troop extends Model
{
    use HasFactory;

    public function baseTroop()
    {
        return $this->hasOne(BaseTroop::class, 'id', 'troop_id')->first();
    }
}
