<?php

Route::get('/', 'JournalsController@index');

Route::get('/journal/{journal}', 'JournalsController@show');
Route::get('/magazines', 'JournalsController@magazines');

Route::get('/advertisement/{id}', 'JournalsController@advertisement');
//paypal-
Route::get('/coupon', 'JournalsController@coupon');
Route::get('/position-check', 'JournalsController@positionCheck');

Route::post('/payment-completed', 'JournalsController@paymentCompleted');

//-paypal
Route::get('/page-{slug}', 'PagesController@page');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});