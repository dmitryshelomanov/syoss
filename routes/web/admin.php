<?php

Route::get('/', 'Admin\HomeController@show');
Route::get('/view', 'Admin\ActionController@show')->name('adminView');
Route::post('/accept/{id}', 'Admin\ActionController@accept')->name('accept');
Route::post('/notaccept/{id}', 'Admin\ActionController@notAccept')->name('notaccept');
Route::get('/photo', 'Admin\PhotoController@show')->name('photo');