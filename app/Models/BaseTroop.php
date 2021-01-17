<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BaseTroop
 *
 * @property int $id
 * @property string $category
 * @property int $lv
 * @property int $train_time
 * @property string $char
 * @property string $cost
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop whereChar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop whereLv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTroop whereTrainTime($value)
 * @mixin \Eloquent
 */
class BaseTroop extends Model
{
    use HasFactory;
}
