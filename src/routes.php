<?php

$installerGroup =
[
    'prefix' => 'install',
    'as' => 'installer::',
    'namespace' => 'aBillander\Installer\Controllers',
    'middleware' => ['web', 'installer'],
];

Route::group($installerGroup, function () {

    Route::get('/', 'WelcomeController@welcome')->name('welcome');
    Route::post('/', 'WelcomeController@setLocale');

});
