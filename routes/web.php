<?php


use App\Http\Controllers\Main\IndexController;
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

Route::group(['namespace' => 'App\\Http\\Controllers\\Main'], function () {
    Route::get('/', IndexController::class);
});

Route::group(['namespace' => 'App', 'prefix' => 'admin'], function () {
   Route::group(['namespace' => 'Http'], function () {
        Route::get('/', Controllers\Admin\Main\IndexController::class);
    });
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
