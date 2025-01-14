<?php

use App\Http\Controllers\TreeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/tree/')->group(function () {
    Route::post('import', [TreeController::class, 'import'])->name('api_tree_import');
    Route::post('export', [TreeController::class, 'export'])->name('api_tree_export');
});
