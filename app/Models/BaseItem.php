<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BaseItem
 *
 * @property int $base_id
 * @property string $name
 * @property int $quality
 * @property int $can_use
 * @method static \Illuminate\Database\Eloquent\Builder|BaseItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseItem whereBaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseItem whereCanUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseItem whereQuality($value)
 * @mixin \Eloquent
 */
class BaseItem extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    public  $primaryKey = 'base_id';
}
