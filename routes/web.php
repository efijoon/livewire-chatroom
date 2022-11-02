<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->prefix('rooms')->group(function () {
    Route::get('/', \App\Http\Livewire\Room\Index::class)->name('rooms');
    Route::get('/{room:slug}', \App\Http\Livewire\Room\SingleRoom::class)->name('single.room');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
