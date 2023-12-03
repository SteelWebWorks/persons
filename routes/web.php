<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [PersonController::class, 'index'])->name('list');

Route::get('/upload', [PersonController::class, 'uploadForm'])->name('uploadForm');
Route::post('/upload', [PersonController::class, 'upload'])->name('upload');
