<?php

use App\Http\Controllers\Auth\RegisterAgentInformation;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/categories', function () {
    return view('categories');
});

Route::get('/choose', function () {
    return view('agentclient');
})->name('choose');





Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('role.redirect');
Route::get('/register-agent', [RegisterAgentInformation::class, 'index'])->name('register-agent');
Route::post('/register-agent/store', [RegisterAgentInformation::class, 'store'])->name('register-agent.store');
