<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ParkingAreas\Index as ParkingAreas;
use App\Livewire\ParkingAreas\Edit;

Route::get('/', ParkingAreas::class)->name('home');
Route::get('/edit/{id}', Edit::class)->name('edit');