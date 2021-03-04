<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/login/redirect', function () {
    return Socialite::driver('github')
    // ->scopes(['user:email'])
    ->redirect();
});

Route::get('/login/callback', function () {
    $user = Socialite::driver('github')
    ->user();

    return view('auth.dashboard', [
        'user' => $user
    ]);
});
