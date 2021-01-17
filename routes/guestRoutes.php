<?php

    Route::post('login', 'Guest\LoginController@login')->name('login');

    Route::post('register', 'Guest\RegisterController@register')->name('register');

    Route::get('/', 'Guest\WelcomeController@index')->name('welcome')->middleware('guest');
