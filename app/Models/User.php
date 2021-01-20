<?php

namespace App\Models;

use App\Models\Traits\UserRelations;
use App\Resources;
use Assert\Assertion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int
 *
 * @property string
 *               $login
 * @property string
 *               $password
 * @property int
 *               $food                    $wood
 * @property int
 *               $iron
 * @property int
 *               $mithril
 * @property int
 *               $is_online
 * @property string|null
 *               $last_active
 * @property string|null
 *               $last_check
 * @property int
 *               $max_building_upgrades
 * @property string|null
 *               $remember_token
 * @property \Illuminate\Support\Carbon|null
 *               $created_at
 * @property \Illuminate\Support\Carbon|null
 *               $updated_at
 * @property string|null
 *               $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[]
 *                    $incomingMessages
 * @property-read int|null
 *                    $incoming_messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 *                $notifications
 * @property-read int|null
 *                    $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[]
 *                    $outgoingMessages
 * @property-read int|null
 *                    $outgoing_messages_count $userBuildings
 * @property-read int|null
 *                    $user_buildings_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereFood($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIron($value)
 * @method static Builder|User whereIsOnline($value)
 * @method static Builder|User whereLastActive($value)
 * @method static Builder|User whereLastCheck($value)
 * @method static Builder|User whereLogin($value)
 * @method static Builder|User whereMaxBuildingUpgrades($value)
 * @method static Builder|User whereMithril($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereWood($value)
 * @mixin \Eloquent
 * @method static Builder|User online()
 * @property int
 *               $wood
 * @property int|null $train_time
 * @method static Builder|User whereTrainTime($value)
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use UserRelations;

    /** @var int Интервал времени для начисления ресурсов (чем больше, тем реже будут запросы) */
    private const TIME_ADD_RESOURCES    = 1;

    /** @var int Время, при котором если пользователь не проявлял активность, он считается как оффлайн. */
    private const TIME_TO_OFFLINE       = 9999999;

    /** @var int Минимальный интервал, по истечении которого обновляется активность (updateLastActive). */
    private const TIME_TO_UPDATE_ACTIVE = 30;

    public $timestamps = false;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function subRes(Resources $resources)
    {
        Assertion::greaterOrEqualThan($this->food, $resources->getFood());
        Assertion::greaterOrEqualThan($this->wood, $resources->getWood());
        Assertion::greaterOrEqualThan($this->iron, $resources->getIron());
        Assertion::greaterOrEqualThan($this->mithril, $resources->getMithril());

        $this->food -= $resources->getFood();
        $this->wood -= $resources->getWood();
        $this->iron -= $resources->getIron();
        $this->mithril -= $resources->getMithril();
    }

    public function addRes(Resources $resources)
    {
        $this->food += $resources->getFood();
        $this->wood += $resources->getWood();
        $this->iron += $resources->getIron();
        $this->mithril += $resources->getMithril();

        $this->saveOrFail();
    }

    public function validateSubRes(Resources $resources)
    {
        return
            $resources->getFood() <= $this->food
            && $resources->getWood() <= $this->wood
            && $resources->getIron() <= $this->iron
            && $resources->getMithril() <= $this->mithril;
    }

    public function checkTimeToAddResources()
    {
        return time() > ($this->last_check + self::TIME_ADD_RESOURCES) + 1;
    }

    public function ResourcesIncome()
    {
        $res = new Resources();
        foreach ($this->userBuildings()->with('baseBuilding')->get() as $building) {
            if ($building->baseBuilding->category === 'castle') {
                $properties = json_decode($building->baseBuilding()->first()->properties);
                $res->add(
                    new Resources(
                        round($properties->food_income * ((time() - $this->last_check) / (float)3600)),
                        round($properties->wood_income * ((time() - $this->last_check) / (float)3600)),
                    )
                );
            }
        }

        $this->addRes($res);
        $this->last_check = time();
    }

    public function updateLastActive()
    {
        if (time() > $this->last_active + self::TIME_TO_UPDATE_ACTIVE) {
            $this->last_active = time();
        }
    }

    public function createTrainTime($time)
    {
        $this->train_time = time() + $time;
        $this->save();
    }

    public function validateBuildingUpgradeCountLimit()
    {
        if ($this->userBuildings()->where('lv_upping_time', '>', time())->count()
            == $this->max_building_upgrades) {
            return false;
        }

        return true;
    }

    // scopes
    public function scopeOnline(Builder $query)
    {
        return $query->where('last_active', ">", Carbon::now()->subSeconds(self::TIME_TO_OFFLINE));
    }
}
