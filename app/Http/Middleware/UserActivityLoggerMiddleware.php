<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class UserActivityLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        $log = new Logger('name');
//        if(!Auth::check())
//        {
//            $log->pushHandler(new StreamHandler('../storage/logs/Guest.log', Logger::INFO));
//        } else
//            $log->pushHandler(new StreamHandler('../storage/logs/'.Auth::user()->login.'.log', Logger::INFO));
//
//        $log->info("------------------");
//        $log->info("Пользователь перешел по маршруту - ".$request->url()." Параметры ". $request->method());
//
//           foreach($request->all() as $key => $item)
//           {
//               $log->info($key." => ".$item);
//           }
        return $next($request);
    }
}
