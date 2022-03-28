<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin/index');
});


# Routes matière
Route::get('/mat-bity-iere', [MatiereController::class, 'index'])->name('/matiere');

# Routes Session
Route::get('/session', [SessionController::class, 'index'])->name('all.session');
Route::get('/session/add', [SessionController::class, 'addSession'])->name('add.session');
Route::post('/session/store', [SessionController::class, 'store'])->name('store.session');
Route::get('/session/edit/{id}', [SessionController::class, 'edit']);
Route::post('/session/update/{id}', [SessionController::class, 'update']);
Route::get('/session/show/{id}', [SessionController::class, 'show']);
Route::get('/session/delete/{id}', [SessionController::class, 'destroy']);

# Routes Module
Route::get('/module', [ModuleController::class, 'index'])->name('all.module');
Route::get('/module/add', [ModuleController::class, 'addModule'])->name('add.module');
Route::post('/store/module', [ModuleController::class, 'store'])->name('store.module');
Route::get('/module/edit/{id}', [ModuleController::class, 'edit']);
Route::post('/module/update/{id}', [ModuleController::class, 'update']);
Route::get('/module/show/{id}', [ModuleController::class, 'show']);
Route::get('/module/delete/{id}', [ModuleController::class, 'destroy']);
