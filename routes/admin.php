<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\ShowsController;
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
    Route::post('/delete/{user}', 'delete')->name('user.delete');
});

Route::get('/profil', [UsersController::class, 'showProfile'])->name('user.profile');
Route::post('/profil/update', [UsersController::class, 'updateProfile'])->name('user.profile.update');

Route::controller(ShowsController::class)->prefix('filmy-a-serialy')->group(function () {
   Route::get('/film-a-serial/{show}', 'detail')->name('shows.detail');
   Route::get('/vytvorit', 'showCreate')->name('shows.showCreate');
   Route::post('/create', 'create')->name('shows.create');
   Route::post('/update/{show}', 'update')->name('shows.update');
   Route::post('/smazat/{show}', 'delete')->name('show.delete');
});

Route::controller(AuthController::class)->group(function () {
   Route::get('/prihlasit', 'showLogin')->name('auth.show-login');
   Route::post('/login', 'login')->name('auth.login');
   Route::get('/odhlasit', 'logout')->name('auth.logout');
});

Route::controller(ReviewsController::class)->prefix('/recenze')->group(function () {
   Route::post('/smazat', 'delete')->name('review.delete');
});