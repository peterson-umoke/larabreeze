<?php

Route::prefix('admin')->name("admin.")->group(function () {
    Route::get('/', function () {
        return view('admin.welcome');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');
});
