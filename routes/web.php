<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome')->name('welcome');

//auth para saber si ya ha iniciado sesion y le devuelve el dashbord si no a la vista login
//verified para verificar el email


Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/chirps', function () {
        return view('/chirps.index');
    })->name('chirps.index');

    Route::post('/chirps', function () {
        $message = request("message");
        //insertar en la base de datos
    });

});

require __DIR__.'/auth.php';
