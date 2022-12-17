<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\ItemController;
use App\Http\Controllers\Dashboard\CategoryController;
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
Route::resource('category', CategoryController::class);

// Route::get('/', function () {
//     return view('welcome');
// });