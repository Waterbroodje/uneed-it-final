<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\BookingController;
Route::get('/book', [BookingController::class, 'index'])->name('book.index');
Route::post('/book', [BookingController::class, 'store'])->name('book.store');
Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
Route::delete('/timeslot/{timeslot}', [BookingController::class, 'destroyTimeslot'])->name('timeslot.destroy');