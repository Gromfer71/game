<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Building
 *
 * @property int $b_id
 * @property int $lv
 * @property string $category
 * @property int|null $food_up
 * @property int|null $wood_up
 * @property int|null $iron_up
 * @property int|null $mithril_up
 * @property string $properties
 * @property int $power
 * @property int $time_up
 * @method static \Illuminate\Database\Eloquent\Builder|Building newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Building newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Building query()
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereBId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereFoodUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereIronUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereLv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereMithrilUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereTimeUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Building whereWoodUp($value)
 * @mixin \Eloquent
 */
class Building extends Model
{
    use HasFactory;




}
