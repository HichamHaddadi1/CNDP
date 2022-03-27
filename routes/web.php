<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('/' , [MainController::class , 'welcome'])->name('welcome');
Route::post('add-category' , [MainController::class , 'addCategory'])->name('addCategory');
Route::post('add-product' , [MainController::class , 'addProduct'])->name('addProduct');
Route::GET('delete-product/{id}' , [MainController::class , 'deleteProduct'])->name('deleteProduct');
Route::get('checkProduct/{id}' , [MainController::class , 'checkProduct'])->name('checkProduct');
Auth::routes();

Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
