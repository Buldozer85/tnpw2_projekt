<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
   Route::get('/', 'index');
   Route::get('/uzivatele', 'users')->name('users.show');
   Route::get('/filmy-a-serialy', 'shows')->name('shows.show');
   Route::get('/recenze', 'reviews')->name('reviews.show');

});

Route::controller(UsersController::class)->prefix('uzivatele')->group(function () {
    Route::get('/uzivatel/{user}', 'detail')->name('users.detail');
    Route::get('/vytvorit', 'showCreate')->name('users.showCreate');
    Route::post('/create', 'create')->name('users.create');
    Route::post('/update/{user}', 'update')->name('users.update');
});

Route::controller(\App\Http\Controllers\Admin\ShowsController::class)->prefix('filmy-a-serialy')->group(function () {
   Route::get('/film-a-serial/{show}', 'detail')->name('shows.detail');
   Route::get('/vytvorit', 'showCreate')->name('shows.showCreate');
});