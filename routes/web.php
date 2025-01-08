<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;



    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/registrasi',[AuthController::class,'tampilregistrasi'])->name('register');
    Route::post('/registrasi/submit',[AuthController::class,'submitregistrasi'])->name('register.post');
    
    Route::get('/login',[AuthController::class,'tampilLogin'])->name('login');
    Route::post('/login/submit',[AuthController::class,'submitLogin'])->name('login.post');
    

Route::middleware('auth')->group(function(){
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::resource('siswa', SiswaController::class);
});
