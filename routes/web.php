<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
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
    Route::resource('profile', UserController::class)
        ->scoped(['profile' => 'username'])
        ->only(['index', 'show', 'update']);
});

//Public User Profile view
Route::resource('profile', UserController::class)
    ->scoped(['profile' => 'username'])
    ->only(['show']);

require __DIR__.'/auth.php';
