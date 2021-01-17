<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
 * @method static SystemMessage EveryDayGift()
 * @mixin \Eloquent
 */
class SystemMessage extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function ScopeEverydayGift()
    {
        return Carbon::createFromTimestamp(Auth::user()->last_active)->day < now()->day;
    }
}
