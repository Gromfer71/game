<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserBuilding
 *
 * @property int                             $id
 * @property int                             $user_id
 * @property int                             $base_id
 * @property int                             $lv_upping
 * @property string|null                     $lv_upping_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding whereBaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding whereLvUpping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding whereLvUppingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBuilding whereUserId($value)
 * @mixin \Eloquent
 */
class UserBuilding extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function baseBuilding()
    {
        return $this->hasOne(Building::class, 'b_id', 'base_id')->first();
    }

    public function checkFinishUpgrade()
    {

        if ($this->lv_upping_time < time() && $this->lv_upping_time != null)
        {

            $nextBaseBuilding = Building::where('category', $this->baseBuilding()->category)
                ->where('lv', $this->baseBuilding()->lv + 1)->first();
            $this->base_id = $nextBaseBuilding->b_id;
            $this->lv_upping_time = null;
            $this->save();


            return true;
        }

        return false;
    }
}
