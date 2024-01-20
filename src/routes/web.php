<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [
    TodoController::class, 'index'
]);

Route::post('/todos', [
    TodoController::class, 'store'
]);

Route::post('/todos/update', [
    TodoController::class, 'update'
]);

Route::post('/todos/delete', [
    TodoController::class, 'destroy'
]);

Route::post('/todos/search', [
    TodoController::class, 'search'
]);

Route::get('/categories', [
    CategoryController::class, 'index'
]);

Route::post('/categories', [
    CategoryController::class, 'store'
]);

Route::post('/categories/update', [
    CategoryController::class, 'update'
]);

Route::post('/categories/delete', [
    CategoryController::class, 'destroy'
]);


// Route::post('/todos/update/{id}', [
//     TodoController::class, 'update'
// ]);
