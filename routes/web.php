<?php

Route::get('/', 'JournalsController@index');

Route::get('/journal/{journal}', 'JournalsController@show');
Route::get('/magazines', 'JournalsController@magazines');

Route::get('/advertisement/{id}', 'JournalsController@advertisement');
//paypal-
Route::get('/coupon', 'JournalsController@coupon');
Route::post('/position-check', 'JournalsController@positionCheck');

//-paypal
Route::get('/page-{slug}', 'PagesController@page');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});