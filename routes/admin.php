<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');


Route::get('/site_details', 'AdminAuth\admincontroller@Site_details')
->name('site_details');
Route::post('/update_details', 'AdminAuth\admincontroller@Update_details')
->name('update_details');
Route::get('/ad', 'AdminAuth\admincontroller@Ad')
->name('ad');
Route::post('/add_url', 'AdminAuth\admincontroller@Add_url')
->name('add_url');
