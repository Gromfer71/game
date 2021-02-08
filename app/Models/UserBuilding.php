<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
 * @method static Builder|UserBuilding newModelQuery()
 * @method static Builder|UserBuilding newQuery()
 * @method static Builder|UserBuilding query()
 * @method static Builder|UserBuilding whereBaseId($value)
 * @method static Builder|UserBuilding whereCreatedAt($value)
 * @method static Builder|UserBuilding whereId($value)
 * @method static Builder|UserBuilding whereLvUpping($value)
 * @method static Builder|UserBuilding whereLvUppingTime($value)
 * @method static Builder|UserBuilding whereUpdatedAt($value)
 * @method static Builder|UserBuilding whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Building|null $baseBuilding
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 */
class UserBuilding extends Model
{
    use HasFactory;
    use Notifiable;

    protected $guarded = [];

    public function baseBuilding()
    {
        return $this->hasOne(Building::class, 'b_id', 'base_id');
    }

    public function checkFinishUpgrade()
    {
        if ($this->lv_upping_time < time() && $this->lv_upping_time != null) {
            $nextBaseBuilding = Building::where('category', $this->baseBuilding->category)
                ->where('lv', $this->baseBuilding->lv + 1)->first();
            $this->base_id = $nextBaseBuilding->b_id;
            $this->lv_upping_time = null;
            $this->save();

            return true;
        }

        return false;
    }

    public function validateMaxLv()
    {
        return $this->baseBuilding->lv < 30;
    }

    public function upgrade()
    {
        $this->lv_upping_time = $this->baseBuilding->time_up + time();
    }
}
