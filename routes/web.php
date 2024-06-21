<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\AdminController;

// use App\Http\Controllers\Admin\
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

Route::get('projects.index', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function(){
        Route::resource('projects',ProjectController::class);
        Route::resource('students',StudentController::class);
        Route::resource('spcialization',SpecializationController::class);
        // Route::resource('registers',RegisterController::class)-<only('index','destroy');

        Route::get('/settings/name-email',[AuthController::class,'showChangeInfoForm'])->name('change-password');
        Route::put('/settings/name-email',[AuthController::class,'updateInfoForm'])->name('update-infoForm');
        Route::get('/settings/password',[AuthController::class,'showChangePassword'])->name('change-password');
        Route::put('/settings/password',[AuthController::class,'updatePassword'])->name('update-password');

        //logout
        // Route::get('logout',[AuthController::class,'logout'])->name('logout');
        Route::get('logout','\App\Http\Controllers\Auth\LoginController@logout');
});


Route::middleware(['guest'])->group(function(){

    Route::get('login',[AuthController::class,'showLoginForm'])->name('login');
    Route::post('login',[AuthController::class,'login']) ;
});
