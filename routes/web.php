<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\ItemController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\TableController;
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




// Route::get('/',[ItemController::class,'index']);    
Route::resource('/', ItemController::class);

Route::resource('/dashboard/item',ItemController::class);
Route::resource('/dashboard/category', CategoryController::class);
Route::resource('/dashboard/table', TableController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
