<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controller\DisplayController;

Route::get('/', [DictionaryController::class, 'index'])->name('index');

Route::get('/search/{term}', [DictionaryController::class, 'search'])->name('search');

Route::post('/search/{term}', [DictionaryController::class, 'formSubmit'])->name('getTerm');

Route::view('/about', 'about')->name('about');

Route::post('/register', [RegisterController::class, 'getData']);

Route::resource('/', DisplayController::class);
