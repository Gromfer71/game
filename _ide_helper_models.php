<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $from
 * @property string $from_login
 * @property int $to
 * @property string $to_login
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Message lastMessages()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereFromLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereToLogin($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SystemMessage
 *
 * @property int $id
 * @property string|null $category категория (системные, от команды игры, от альянса и тд
 * @property int $to id кому письмо
 * @property string $title
 * @property string|null $message Текст сообщения
 * @property string|null $items json список предметов 1) id базового предмета из табл. base_items 2) количество count
 * @property int|null $is_read Прочитано ли сообщения
 * @property int|null $is_items_got Забрал ли пользователь вложенные предметы из поля items
 * @property \Illuminate\Support\Carbon|null $created_at дата создания письма
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
 */
	class SystemMessage extends \Eloquent {}
}

namespace App\Models{
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
 *               $food
 * @property int
 *               $wood
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
 *                    $outgoing_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserBuilding[]
 *                    $userBuildings
 * @property-read int|null
 *                    $user_buildings_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIron($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastCheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMaxBuildingUpgrades($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMithril($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWood($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|User online()
 */
	class User extends \Eloquent {}
}

