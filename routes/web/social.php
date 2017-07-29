<?php

Route::get('/login/{provider}', 'SocialAuth\SocialController@login')->name('social');
Route::get('/login/callback/{provider}', 'SocialAuth\SocialController@callback');

Route::post('logout', function() {
    \Auth::logout();
    return redirect('/');
})->name('logout');