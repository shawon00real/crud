<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurdController;
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

Route::get('/', [CurdController::class, 'manageData'])->name('manage');
Route::get('/create', [CurdController::class, 'createUser'])->name('create');
Route::post('/form', [CurdController::class, 'formData'])->name('form');
Route::get('/delete/{id}', [CurdController::class, 'deleteData'])->name('delete');
Route::get('/edit/{id}', [CurdController::class, 'editUser'])->name('edit');
Route::post('/update', [CurdController::class, 'updateForm'])->name('update');
