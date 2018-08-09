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

    Route::get('/license', 'WelcomeController@showLicense')->name('license');
    Route::post('/license', 'WelcomeController@acceptLicense');

    Route::get('/configuration', 'ConfigurationController@show')->name('config');
    Route::post('/configuration', 'ConfigurationController@config');

});
