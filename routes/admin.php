<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
   Route::get('/', 'index');
   Route::get('/uzivatele', 'users');

});

Route::controller(\App\Http\Controllers\Admin\UsersController::class)->group(function () {
    Route::get('/uzivatele/{user}', 'detail')->name('users.detail');
});