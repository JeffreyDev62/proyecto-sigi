<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Infracciones;
use Illuminate\Support\Facades\Route;

Route::get('/', [Dashboard::class, 'index'])->name('home');

Route::resource('infracciones', Infracciones::class);

// Route::prefix('infracciones')->group(function () {
//     Route::get('/', [Infracciones::class, 'index'])->name('infracciones-index');
//     Route::get('/create', [Infracciones::class, 'create'])->name('infracciones-create');
//     Route::post('/store', [Infracciones::class, 'store'])->name('infracciones-store');
//     Route::get('/edit/{id}', [Infracciones::class, 'edit'])->name('infracciones-edit');
//     Route::put('/update/{id}', [Infracciones::class, 'update'])->name('infracciones-update');
//     Route::get('/show/{id}', [Infracciones::class, 'show'])->name('infracciones-show');
//     Route::delete('/destroy/{id}', [Infracciones::class, 'destroy'])->name('infracciones-destroy');


// });
