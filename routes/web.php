<?php

Route::get('/', 'JournalsController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
