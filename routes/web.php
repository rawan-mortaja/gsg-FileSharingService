<?php

use App\Http\Controllers\FileController;
use App\Models\File;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [FileController::class, 'index'])
    ->name('file.index');
Route::post('/upload', [FileController::class, 'upload'])
    ->name('file.upload');
Route::get('/file/{id}', [FileController::class, 'download'])
    ->name('file.download');
Route::get('/view/{id}',  [FileController::class, 'view'])
    ->name('file.view');
Route::get('/share/{id}' , [FileController::class , 'share'])
    ->name('share');
