<?php

Route::group(['middleware' => ['web', 'caninstall']], function () {

    Route::get('/install', function(){
        echo '-';
    })->name('install.index');

});
