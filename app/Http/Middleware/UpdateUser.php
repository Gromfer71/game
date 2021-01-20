<?php

namespace App\Http\Middleware;

use App\Models\SystemMessage;
use App\Services\BuildingsHandler;
use App\Services\MailHandler;
use App\Services\TroopHandler;
use Auth;
use Closure;

/**
 * Class UpdateUser
 *
 * @package App\Http\Middleware
 */
class UpdateUser
{

    /**
     * @param            $request
     * @param  \Closure  $next
     *
     * @return mixed
     * @throws \Throwable
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        app(BuildingsHandler::class)->setUser($user);
        app(TroopHandler::class)->setUser($user);

        if (SystemMessage::everydayGift()) {
            app(MailHandler::class)->everydayGift($user->id);
        }

        if ($user->checkTimeToAddResources()) {
            $user->ResourcesIncome();
        }

        app(BuildingsHandler::class)->checkBuildingsFinished();
        app(TroopHandler::class)->checkTrainEnd();


        $user->updateLastActive();
        if ($user->isDirty()) {
            $user->saveOrFail();
        }

        return $next($request);
    }

}
