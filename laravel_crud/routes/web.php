<?php

use App\Http\Controllers\CrudController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [CrudController::class, 'ShowData']);
    Route::get('/add-data', [CrudController::class, 'AddData']);
    Route::post('/store-data', [CrudController::class, 'StoreData']);
    Route::get('/edit-data/{id}', [CrudController::class, 'EditData']);
    Route::post('/update-data/{id}', [CrudController::class, 'UpdateData']);
    Route::get('/delete-data/{id}', [CrudController::class, 'DeleteData']);
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
