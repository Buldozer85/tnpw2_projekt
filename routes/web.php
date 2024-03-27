<?php

use App\Http\Controllers\Web\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function () {
   Route::get('/', 'index')->name('homepage');
   Route::get('/filmy', 'movies')->name('movies');
   Route::get('/prihlaseni', 'showLogin')->name('show-login');
   Route::get('/registrace', 'showRegister')->name('show-register');
});
