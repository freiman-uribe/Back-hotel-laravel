<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\AcomodacionController;
use App\Http\Controllers\HabitacionController;

Route::prefix('hoteles')->group(function () {
    Route::get('/', [HotelController::class, 'index']);
    Route::post('/', [HotelController::class, 'store']);
    Route::get('/{hotel}', [HotelController::class, 'show']);
    Route::put('/actualizar/{id}', [HotelController::class, 'update']);
    Route::delete('/eliminar/{id}', [HotelController::class, 'destroy']);
});

Route::prefix('habitaciones/{hotel}')->group(function () {
    Route::get('/', [HabitacionController::class, 'index']);
    Route::post('/', [HabitacionController::class, 'store']);
    Route::post('/filtrar-id/{id}', [HabitacionController::class, 'show']);
    Route::put('/actualizar/{id}', [HabitacionController::class, 'update']); 
    Route::delete('/eliminar/{id}', [HabitacionController::class, 'destroy']);
});

Route::prefix('acomodaciones/{hotel}')->group(function () {
    Route::get('/', [AcomodacionController::class, 'index']);
    Route::post('/', [AcomodacionController::class, 'store']);
    Route::post('/filtrar-id/{id}', [AcomodacionController::class, 'show']);
    Route::put('/actualizar/{id}', [AcomodacionController::class, 'update']); 
    Route::delete('/eliminar/{id}', [AcomodacionController::class, 'destroy']);
});

Route::prefix('tipo-habitaciones/{hotel}')->group(function () {
    Route::get('/', [TipoHabitacionController::class, 'index']);
    Route::post('/', [TipoHabitacionController::class, 'store']);
    Route::post('/filtrar-id/{id}', [TipoHabitacionController::class, 'show']);
    Route::put('/actualizar/{id}', [TipoHabitacionController::class, 'update']); 
    Route::delete('/eliminar/{id}', [TipoHabitacionController::class, 'destroy']);
});
