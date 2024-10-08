<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\RegisterAgentInformation;
use App\Http\Controllers\CategoryPageController;
use App\Http\Controllers\ClientPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/categories', [CategoryPageController::class, 'index']);

Route::get('/choose', function () {
    return view('agentclient');
})->name('choose');





Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Your routes here
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('role.redirect');
    Route::get('/register-agent', [RegisterAgentInformation::class, 'index'])->name('register-agent');
    Route::post('/register-agent/store', [RegisterAgentInformation::class, 'store'])->name('register-agent.store');


    //User Routes
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/datatable', [UsersController::class, 'datatable'])->name('users.datatable');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');


    //Agent Routes
    Route::get('/agents', [AdminController::class, 'index'])->name('agent.index');
    Route::get('/agents/datatable', [AdminController::class, 'datatable'])->name('agent.datatable');
    Route::get('/admin/agents/{id}', [AdminController::class, 'show'])->name('admin.agent.show');
    Route::get('/admin/agents/{id}/edit', [AdminController::class, 'edit'])->name('admin.agent.edit');
    Route::put('/admin/agents/{id}', [AdminController::class, 'update'])->name('admin.agent.update');
    Route::delete('/admin/agents/{id}', [AdminController::class, 'destroy'])->name('admin.agent.destroy');

    //Job Routes
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/datatable', [JobController::class, 'datatable'])->name('jobs.datatable');
    Route::get('/admin/jobs/{id}', [JobController::class, 'show'])->name('admin.jobs.show');
    Route::get('/admin/jobs/{id}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
    Route::put('/admin/jobs/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
    Route::delete('/admin/jobs/{id}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');

    //Post Client Routes
    Route::get('/client/posts', [ClientPostController::class, 'index'])->name('client.posts.index');
    Route::get('/client/create', [ClientPostController::class, 'create'])->name('client.posts.create');
    Route::post('/client/posts', [ClientPostController::class, 'store'])->name('client.posts.store');



    Route::get('/client/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');

    Route::get('/agent/dashboard', function () {
        return view('agent.dashboard');
    })->name('agent.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


});
