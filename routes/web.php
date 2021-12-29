<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Sys\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CandidateController as AdminCandidateController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;


Route::get('/', function () {
    return 'Hi';
})
    ->middleware(['auth', 'rootme']);

Route::get('logout', [AuthController::class, 'forget'])
    ->middleware('auth')
    ->name('logout');


Route::group(['middleware' => ['auth', 'multiauth:1'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'user'], function () {
        Route::get('add', [AdminUserController::class, 'create'])->name('user.create');
        Route::get('list', [AdminUserController::class, 'index'])->name('user.index');
        Route::post('add', [AdminUserController::class, 'store'])->name('user.store');
        Route::match(['post', 'delete'], 'destroy/{id}', [AdminUserController::class, 'destroy'])->name('user.destroy');
    });

    Route::group(['prefix' => 'role'], function () {
        Route::get('add', [AdminRoleController::class, 'create'])->name('role.create');
        Route::get('list', [AdminRoleController::class, 'index'])->name('role.index');
        Route::post('add', [AdminRoleController::class, 'store'])->name('role.store');
        Route::match(['post', 'delete'], 'destroy/{id}', [AdminRoleController::class, 'destroy'])->name('role.destroy');
    });

    Route::group(['prefix' => 'candidate'], function () {
        Route::get('add', [AdminCandidateController::class, 'create'])->name('candidate.create');
        Route::get('list', [AdminCandidateController::class, 'index'])->name('candidate.index');
        Route::post('add', [AdminCandidateController::class, 'store'])->name('candidate.store');
        Route::match(['post', 'delete'], 'destroy/{id}', [AdminCandidateController::class, 'destroy'])->name('candidate.destroy');
    });
});

Route::group(['middleware' => ['auth', 'multiauth:0'], 'prefix' => 'evo'], function () {
    Route::get('/', [ClientDashboardController::class, 'index'])->name('client.index');

    Route::get('view/{id}', [ClientDashboardController::class, 'show'])
        ->name('client.show');
    Route::post('vote', [AdminTransactionController::class, 'store'])
        ->name('vote');
});


Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'login'])
        ->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])
        ->name('auth');
});
