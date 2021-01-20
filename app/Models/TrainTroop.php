<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
 * @method static Builder|TrainTroop newModelQuery()
 * @method static Builder|TrainTroop newQuery()
 * @method static Builder|TrainTroop query()
 * @method static Builder|TrainTroop whereCount($value)
 * @method static Builder|TrainTroop whereId($value)
 * @method static Builder|TrainTroop whereTrainTime($value)
 * @method static Builder|TrainTroop whereTroopId($value)
 * @method static Builder|TrainTroop whereUserId($value)
 * @mixin \Eloquent
 */
class TrainTroop extends Model
{
    use HasFactory;

    public function baseTroop()
    {
        return $this->hasOne(BaseTroop::class, 'id', 'troop_id');
    }
}
