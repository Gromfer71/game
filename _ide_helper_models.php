<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {

    /**
     * App\Models\BaseItem
     *
     * @property int    $base_id
     * @property string $name
     * @property int    $quality
     * @property int    $can_use
     * @method static \Illuminate\Database\Eloquent\Builder|BaseItem newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BaseItem newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BaseItem query()
     * @method static \Illuminate\Database\Eloquent\Builder|BaseItem whereBaseId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BaseItem whereCanUse($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BaseItem whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BaseItem whereQuality($value)
     * @mixin \Eloquent
     */
    class BaseItem extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\BaseTroop
     *
     * @property int    $id
     * @property string $category
     * @property int    $lv
     * @property int    $train_time
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
    class BaseTroop extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Building
     *
     * @property int      $b_id
     * @property int      $lv
     * @property string   $category
     * @property int|null $food_up
     * @property int|null $wood_up
     * @property int|null $iron_up
     * @property int|null $mithril_up
     * @property string   $properties
     * @property int      $power
     * @property int      $time_up
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
    class Building extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Item
     *
     * @property int    $id
     * @property int    $user_id
     * @property string $base_item_id
     * @property int    $count
     * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Item query()
     * @method static \Illuminate\Database\Eloquent\Builder|Item whereBaseItemId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Item whereCount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Item whereUserId($value)
     * @mixin \Eloquent
     */
    class Item extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Message
     *
     * @property int                             $id
     * @property int                             $from
     * @property string                          $from_login
     * @property int                             $to
     * @property string                          $to_login
     * @property string                          $message
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property string|null                     $deleted_at
     * @method static Builder|Message lastMessages()
     * @method static Builder|Message newModelQuery()
     * @method static Builder|Message newQuery()
     * @method static Builder|Message query()
     * @method static Builder|Message whereCreatedAt($value)
     * @method static Builder|Message whereDeletedAt($value)
     * @method static Builder|Message whereFrom($value)
     * @method static Builder|Message whereFromLogin($value)
     * @method static Builder|Message whereId($value)
     * @method static Builder|Message whereMessage($value)
     * @method static Builder|Message whereTo($value)
     * @method static Builder|Message whereToLogin($value)
     * @method static Builder|Message messagesWith($value)
     * @mixin \Eloquent
     */
    class Message extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\SystemMessage
     *
     * @property int                             $id
     * @property string|null                     $category     категория (системные, от команды игры, от альянса и тд
     * @property int                             $to           id кому письмо
     * @property string                          $title
     * @property string|null                     $message      Текст сообщения
     * @property string|null                     $items        json список предметов 1) id базового предмета из табл. base_items 2) количество count
     * @property int|null                        $is_read      Прочитано ли сообщения
     * @property int|null                        $is_items_got Забрал ли пользователь вложенные предметы из поля items
     * @property \Illuminate\Support\Carbon|null $created_at   дата создания письма
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage query()
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereCategory($value)
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereIsItemsGot($value)
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereIsRead($value)
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereItems($value)
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereMessage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|SystemMessage whereTo($value)
     * @method static SystemMessage EveryDayGift()
     * @mixin \Eloquent
     */
    class SystemMessage extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\TrainTroop
     *
     * @property int      $id
     * @property int      $user_id
     * @property int      $troop_id
     * @property int      $count
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
    class TrainTroop extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Troop
     *
     * @property int $id
     * @property int $user_id
     * @property int $troop_id
     * @property int $count
     * @method static \Illuminate\Database\Eloquent\Builder|Troop newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Troop newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Troop query()
     * @method static \Illuminate\Database\Eloquent\Builder|Troop whereCount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Troop whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Troop whereTroopId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Troop whereUserId($value)
     * @mixin \Eloquent
     */
    class Troop extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\User
     *
     * @property int                                                                                                            $id
     * @property string                                                                                                         $login
     * @property string                                                                                                         $password
     * @property int                                                                                                            $food
     * @property int                                                                                                            $wood
     * @property int                                                                                                            $iron
     * @property int                                                                                                            $mithril
     * @property int                                                                                                            $last_active
     * @property int                                                                                                            $last_check
     * @property int                                                                                                            $max_building_upgrades
     *               $remember_token
     * @property \Illuminate\Support\Carbon|null                                                                                $created_at
     * @property \Illuminate\Support\Carbon|null                                                                                $updated_at
     * @property string|null                                                                                                    $deleted_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[]                                            $incomingMessages
     * @property-read int|null                                                                                                  $incoming_messages_count
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $outgoingMessages
     *
     * @property-read int|null $outgoing_messages_count $userBuildings
     *
     * @property-read int|null $user_buildings_count
     *
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
     * @property int|null                                                                                                       $train_time
     * @method static Builder|User whereTrainTime($value)
     * @property-read int|null                                                                                                  $notifications_count
     */
    class User extends \Eloquent
    {
    }
}

namespace App\Models {

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
    class UserBuilding extends \Eloquent
    {
    }
}

