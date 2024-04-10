<?php

use App\Http\Controllers\App\UserController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\PagesController;
use App\Http\Controllers\Web\ReviewController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function () {
   Route::get('/', 'index')->name('homepage');
   Route::get('/filmy', 'movies')->name('movies');
   Route::get('/prihlaseni', 'showLogin')->middleware('guest')->name('show-login');
   Route::get('/registrace', 'showRegister')->middleware('guest')->name('show-register');

   Route::get('/serialy', 'series')->name('series.show');
    Route::get('/filmy', 'movies')->name('movies.show');

   Route::get('/serial/{show}', 'serialDetail')->name('serial.show');
   Route::get('/film/{show}', 'movieDetail')->name('movie.show');

   Route::get('/profil', 'profile')->middleware('auth')->name('profile.show');

   Route::get('/zebricky', 'leaderBoards')->name('leaderboards.show');

});

Route::controller(ReviewController::class)->middleware('auth')->group(function () {
    Route::post('/{show}/recenze/pridat', 'createReview')->name('review.add');
    Route::post('/recenze/{review}/upravit', 'update')->can('update', 'review')->name('review.update');
    Route::post('/recenze/{review}/delete', 'delete')->can('delete', 'review')->name('reviews.delete');
});

Route::controller(AuthController::class)->group(function () {
   Route::post('/login', 'login')->middleware('guest')->name('login');
   Route::post('/register', 'register')->middleware('guest')->name('register');
   Route::get('/odhlasit', 'logout')->middleware('auth')->name('logout');
});

Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::post('/profil/update', 'update')->name('profile.update');
});
