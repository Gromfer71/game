<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Troop
 *
 * @property int $id
 * @property int $user_id
 * @property int $troop_id
 * @property int $count
 * @method static Builder|Troop newModelQuery()
 * @method static Builder|Troop newQuery()
 * @method static Builder|Troop query()
 * @method static Builder|Troop whereCount($value)
 * @method static Builder|Troop whereId($value)
 * @method static Builder|Troop whereTroopId($value)
 * @method static Builder|Troop whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\BaseTroop|null $baseTroop
 */
class Troop extends Model
{
    use HasFactory;

    public function baseTroop()
    {
        return $this->hasOne(BaseTroop::class, 'id', 'troop_id');
    }
}
