<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TrainTroop
 *
 * @property int $id
 * @property int $user_id
 * @property int $troop_id
 * @property int $count
 * @property int|null $train_time
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTroop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTroop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTroop query()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTroop whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTroop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTroop whereTrainTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTroop whereTroopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTroop whereUserId($value)
 * @mixin \Eloquent
 */
class TrainTroop extends Model
{
    use HasFactory;

    public function baseTroop()
    {
        return $this->hasOne(BaseTroop::class, 'id', 'troop_id')->first();
    }
}
