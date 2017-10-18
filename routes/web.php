<?php

Route::get('/', 'JournalsController@index');

Route::get('/journal/{journal}', 'JournalsController@show');
Route::get('/magazines', 'JournalsController@magazines');

Route::get('/advertisement/{id}', 'JournalsController@advertisement');

Route::get('/page-{slug}', 'PagesController@page');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
