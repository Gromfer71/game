<?php

namespace App\Http\Middleware;

use App\Models\SystemMessage;
use App\Models\UserBuilding;
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

        if(SystemMessage::everydayGift()) {
            MailHandler::EverydayGift();
        }

        if(Auth::user()->checkTimeToAddResources()) {
            Auth::user()->ResourcesIncome();
        }

        BuildingsHandler::checkBuildingsFinished();

        TroopHandler::checkTrainEnd();


        Auth::user()->updateLastCheck();
        Auth::user()->last_active = time();
        Auth::user()->saveOrFail();
        return $next($request);
    }

}
