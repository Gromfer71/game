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
        app(BuildingsHandler::class)->setUser(Auth::user());
        app(TroopHandler::class)->setUser(Auth::user());

        if (SystemMessage::everydayGift()) {
            app(MailHandler::class)->everydayGift(Auth::id());
        }

        if (Auth::user()->checkTimeToAddResources()) {
            Auth::user()->ResourcesIncome();
        }

        app(BuildingsHandler::class)->checkBuildingsFinished();
        app(TroopHandler::class)->checkTrainEnd();


        Auth::user()->updateLastCheck();
        Auth::user()->last_active = time();
        Auth::user()->saveOrFail();
        return $next($request);
    }

}
