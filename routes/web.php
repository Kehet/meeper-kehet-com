<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::resource('posts', PostsController::class);
Route::get('search', SearchController::class)->name('search');

require __DIR__ . '/auth.php';
