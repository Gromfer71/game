<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    DB::statement("ALTER TABLE `data`.`users` AUTO_INCREMENT=1;");
    DB::statement("ALTER TABLE `data`.`messages` AUTO_INCREMENT=1;");
    DB::statement("ALTER TABLE `data`.`system_messages` AUTO_INCREMENT=1;");
    DB::statement("ALTER TABLE `data`.`user_buildings` AUTO_INCREMENT=1;");
    DB::statement("ALTER TABLE `data`.`buildings` AUTO_INCREMENT=1;");
    dd(1);
});
