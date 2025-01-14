<?php

use App\Http\Controllers\front\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('', [ViewController::class, 'index'])->name('index');
Route::get('/tree/{id}', [ViewController::class, 'treePage'])->name('treePage');
