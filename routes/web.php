<?php

use App\Http\Controllers\Pages\TagController;
use App\Http\Controllers\Pages\ThreadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Pages\HomeController;

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

require 'admin.php';

Route::get('/', [HomeController::class, 'index'])                                   ->name('home');

Route::group(['prefix'=> 'threads', 'as' => 'threads.'], function(){
   Route::get('/', [ThreadController::class, 'index'])                              ->name('index');
   Route::get('/create', [ThreadController::class, 'create'])                       ->name('create');
   Route::get('/{thread:slug}/edit', [ThreadController::class, 'edit'])             ->name('edit');
   Route::get('/{channel:slug}/{thread:slug}', [ThreadController::class, 'show'])   ->name('show');
   Route::post('/', [ThreadController::class, 'store'])                             ->name('store');

   Route::group(['as' => 'tags.'], function(){
      Route::get('/{tag:slug}', [TagController::class, 'index'])                    ->name('index');
   });
});

Route::get('dashboard/users', [PageController::class, 'users'])                     ->name('users');

Route::get('/dashboard/channels/index', [PageController::class, 'categoriesIndex']) ->name('channels.index');
Route::get('/dashboard/channels/create', [PageController::class, 'categoriesCreate'])->name('channels.create');

//Route::get('/dashboard/threads/index', [PageController::class, 'threadsIndex'])->name('threads.index');
//Route::get('/dashboard/threads/create', [PageController::class, 'threadsCreate'])->name('threads.create');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
