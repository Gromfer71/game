<?php
//home


Route::post('logout', 'Guest\LoginController@logout')->name('logout');
Route::get('home', 'Auth\HomeController@index')->name('home');
Route::get('online', 'Auth\HomeController@showOnline')->name('online');

//mail
Route::get('mail', 'Auth\MailController@index')->name('mailMain');
Route::get('mail/dialogs', 'Auth\MailController@dialogs')->name('dialogs');
Route::get('mail/dialogs/{id}', 'Auth\MailController@dialog')->name('dialog');
Route::get('mail/system_messages', 'Auth\MailController@systemMessages')->name('systemMessages');
Route::get('mail/system_messages/{id}', 'Auth\MailController@systemMessageShow')->name('systemMessages.show');
Route::post('mail/dialogs/send', 'Auth\MailController@dialogSend')->name('dialogSend');
Route::post('mail/system_messages/take_items', 'Auth\MailController@systemMessageGetItems')->name('systemMessages.takeItems');


//buildings
Route::get('buildings', 'Auth\BuildingController@index')->name('buildings');
Route::get('buildings/{id}', 'Auth\BuildingController@show')->name('building.show');
Route::get('buildings/{id}/upgrade', 'Auth\BuildingController@upgradeMenu')->name('buildingUpgradeMenu');
Route::post('buildings/upgrade', 'Auth\BuildingController@upgrade')->name('buildingUpgrade');

//items
Route::get('items', 'Auth\ItemController@index')->name('items');
Route::post('items/use', 'Auth\ItemController@use')->name('items.use');

// troops
Route::get('train_troops', 'Auth\TroopsController@index')->name('troops.index');
Route::POST('train_troops/train', 'Auth\TroopsController@train')->name('troops.train');
Route::get('troops', 'Auth\TroopsController@details')->name('troops.details');

//PVE
Route::get('monsters', 'Auth\MonstersController@index')->name('monsters.search');
Route::post('monsters/details', 'Auth\MonstersController@monsterInfo')->name('monsters.monsterInfo');



