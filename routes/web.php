<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\ShowThreads;
use App\Livewire\ShowThread;
use Illuminate\Support\Facades\Route;

Route::get('/',ShowThreads::class)
    ->middleware('auth')
    ->name('show.threads');

Route::get('/thread/{thread}',ShowThread::class)
    ->middleware('auth')
    ->name('show.thread');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
