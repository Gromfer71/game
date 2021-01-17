<?php

namespace App\Models;

use App\Resources;
use Assert\Assertion;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int
 *               $id
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
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    private const TIME_ADD_RESOURCES = 1;
    private const TIME_TO_OFFLINE    = 9999999;

    public $timestamps = false;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function subRes(Resources $resources)
    {
        Assertion::greaterOrEqualThan(Auth::user()->food, $resources->getFood());
        Assertion::greaterOrEqualThan(Auth::user()->wood, $resources->getWood());
        Assertion::greaterOrEqualThan(Auth::user()->iron, $resources->getIron());
        Assertion::greaterOrEqualThan(Auth::user()->mithril, $resources->getMithril());

        Auth::user()->food -= $resources->getFood();
        Auth::user()->wood -= $resources->getWood();
        Auth::user()->iron -= $resources->getIron();
        Auth::user()->mithril -= $resources->getMithril();

        Auth::user()->saveOrFail();
    }

    public function addRes(Resources $resources)
    {
        Auth::user()->food += $resources->getFood();
        Auth::user()->wood += $resources->getWood();
        Auth::user()->iron += $resources->getIron();
        Auth::user()->mithril += $resources->getMithril();

        Auth::user()->saveOrFail();
    }

    public function validateSubRes(Resources $resources)
    {
        return
            $resources->getFood() <= Auth::user()->food
            && $resources->getWood() <= Auth::user()->wood
            && $resources->getIron() <= Auth::user()->iron
            && $resources->getMithril() <= Auth::user()->mithril;
    }

    public function checkTimeToAddResources()
    {
        return time() > ($this->last_check + self::TIME_ADD_RESOURCES);
    }

    public function ResourcesIncome()
    {
        $res = new Resources();
        foreach ($this->userBuildings() as $building) {
            if ($building->baseBuilding()->category == 'castle') {
                $properties = json_decode($building->baseBuilding()->properties);
                $res->add(
                    new Resources(
                        round($properties->food_income * (time() - $this->last_check / self::TIME_ADD_RESOURCES) / 60),
                        round($properties->wood_income * (time() - $this->last_check / self::TIME_ADD_RESOURCES) / 60),
                    )
                );
            }
        }
        $this->addRes($res);
    }

    public function updateLastCheck()
    {
        if (time() > $this->last_check) {
            $this->last_check = time();
        }
    }

    public function createTrainTime($time)
    {
        $this->train_time = time() + $time;
    }

    // scopes
    public function scopeOnline(Builder $query)
    {
        return $query->where('last_active', ">", Carbon::now()->subSeconds(self::TIME_TO_OFFLINE))->get();
    }

    // relations
    public function items()
    {
        return $this->hasMany(Item::class, 'user_id', 'id')->get();
    }

    public function userBuildings()
    {
        return $this->hasMany(UserBuilding::class, 'user_id', 'id')->get();
    }

    public function systemMessages()
    {
        return $this->hasMany(SystemMessage::class, 'to', 'id')->get();
    }

    public function trainTroops()
    {
        return $this->hasMany(TrainTroop::class, 'user_id', 'id')->get();
    }

    public function troops()
    {
        return $this->hasMany(Troop::class, 'user_id', 'id')->get();
    }

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute) {
            parent::setAttribute($key, $value);
        }
    }
}
