<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //User Profile Routes
    Route::post('profile/{user}/password', [UserController::class, 'updatePassword'])->name('profile.password');
    Route::resource('profile', UserController::class)
        ->scoped(['profile' => 'username'])
        ->only(['index', 'update']);
});

require __DIR__.'/auth.php';
