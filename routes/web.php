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
    Route::group(['namespace' => 'Http','prefix'=>'categories'], function () {
        Route::get('/', Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
        Route::post('/', Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/{category}', Controllers\Admin\Category\ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', Controllers\Admin\Category\EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', Controllers\Admin\Category\UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', Controllers\Admin\Category\DeleteController::class)->name('admin.category.delete');
    });
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
