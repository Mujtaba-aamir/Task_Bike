<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\RiderController;


Route::view('/', 'bike.home')->name('bike.home');

Route::prefix('bikes')->group(function(){
    Route::get('/create', [BikeController::class, 'createBike'])->name('bike.create');
    Route::post('/store', [BikeController::class, 'storeBike'])->name('bike.store');
    Route::get('/index', [BikeController::class, 'indexBike'])->name('bike.index');
    Route::get('/view/{id}', [BikeController::class, 'viewBike'])->name('bike.view');
    Route::get('/delete/{id}', [BikeController::class, 'deleteBike'])->name('bike.delete');
    Route::get('/edit/{id}', [BikeController::class, 'editBike'])->name('bike.edit');
    Route::post('/update/{id}', [BikeController::class, 'updateBike'])->name('bike.update');
});

Route::prefix('riders')->group(function(){
    Route::get('/create', [RiderController::class, 'createRider'])->name('rider.create');
    Route::post('/store', [RiderController::class, 'storeRider'])->name('rider.store');
    Route::get('/index', [RiderController::class, 'indexRider'])->name('rider.index');
    Route::get('/view/{id}', [RiderController::class, 'viewRider'])->name('rider.view');
    Route::get('/delete/{id}', [RiderController::class, 'deleteRider'])->name('rider.delete');
    Route::get('/edit/{id}', [RiderController::class, 'editRider'])->name('rider.edit');
    Route::post('/update/{id}', [RiderController::class, 'updateRider'])->name('rider.update');

});