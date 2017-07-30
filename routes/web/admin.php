<?php

Route::get('/view', 'Admin\ActionController@show');
Route::post('/accept/{id}', 'Admin\ActionController@accept')->name('accept');
Route::post('/notaccept/{id}', 'Admin\ActionController@notAccept')->name('notaccept');