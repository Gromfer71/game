<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property string|null $updated_at
 * @method static Builder|Message whereUpdatedAt($value)
 */
class Message extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function scopeLastMessages()
    {
        $id = Auth::user()->id;
        /** This variable contains all messages where the current authorized user is sender or receiver.
         *
         * @var \Illuminate\Support\Collection $allMessages
         */
        $allMessages = Message::where('from', $id)
            ->orWhere('to', $id)
            ->get();

        /** Then we will get out ids of all interlocutor (senders and receivers)
         *  and put they in collection. */
        $allId = $allMessages->pluck('from')
            ->concat($allMessages->pluck('to'))
            ->unique();

        /** There we will contain only one message from each interlocutor
         *  no matter who sender or who receiver (like VK dialogs). */
        $lastMessages = collect([]);

        foreach ($allId as $one) {
            /** skip messages where sender and receiver are identical
             *  (should to exclude this possibility in program) */

            if ($one === $id) {
                continue;
            }

            /** Take out the first message where the current user is sender and
             *  user with $id is receiver.
             *
             * @var \Illuminate\Database\Eloquent\Model $outgoingMessage
             */
            $outgoingMessage = Message::where(['from' => $id, 'to' => $one])
                ->latest()
                ->first();

            /** Exactly the same here but vice versa.
             *
             * @var \Illuminate\Database\Eloquent\Model $incomeMessage
             */
            $incomeMessage = Message::where(['from' => $one, 'to' => $id])
                ->latest()
                ->first();

            /** Search the latest message and push it to collection.
             *  If something will null, automatically push another message. */
            if (!$outgoingMessage) {
                $lastMessages->push($incomeMessage);
                continue;
            }

            if (!$incomeMessage) {
                $lastMessages->push($outgoingMessage);
                continue;
            }

            if ($outgoingMessage->created_at > $incomeMessage->created_at) {
                $lastMessages->push($outgoingMessage);
            } else {
                $lastMessages->push($incomeMessage);
            }
        }
        return $lastMessages;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param                                         $with
     *
     * @return \Illuminate\Support\Collection
     */
    public function ScopeMessagesWith(Builder $builder, $with)
    {
        return $builder->whereRaw(
            '(`from` = ? and `to` = ?) OR (`from` = ? and `to` = ?)',
            [
                $with,
                Auth::user()->id,
                Auth::user()->id,
                $with,

            ]
        )->orderBy('created_at')->get();
    }
}
