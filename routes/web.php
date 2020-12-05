<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::name('user.')->group(function () {
    require __DIR__ . '/auth/user.auth.php';
    require __DIR__ . '/web/user.web.php';
//});
Route::name('admin.')->prefix('admin')->group(function () {
    require __DIR__ . '/auth/admin.auth.php';
    require __DIR__ . '/web/admin.web.php';
});
