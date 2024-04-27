<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ParkingAreas\Index as ParkingAreas;
use App\Livewire\ParkingAreas\Edit;
use App\Livewire\PaymentCalculation\Index as PaymentCalculation;

Route::get('/', ParkingAreas::class)->name('home');
Route::get('/edit/{id}', Edit::class)->name('edit');
Route::get('/payment', PaymentCalculation::class)->name('payment');