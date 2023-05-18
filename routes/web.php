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
    Route::group(['namespace' => 'Http','prefix'=>'posts'], function () {
        Route::get('/', Controllers\Admin\Post\IndexController::class)->name('admin.post.index');
        Route::get('/create', Controllers\Admin\Post\CreateController::class)->name('admin.post.create');
        Route::post('/', Controllers\Admin\Post\StoreController::class)->name('admin.post.store');
        Route::get('/{post}', Controllers\Admin\Post\ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', Controllers\Admin\Post\EditController::class)->name('admin.post.edit');
        Route::patch('/{post}', Controllers\Admin\Post\UpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', Controllers\Admin\Post\DeleteController::class)->name('admin.post.delete');
    });
    Route::group(['namespace' => 'Http','prefix'=>'category'], function () {
        Route::get('/', Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
        Route::post('/', Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/{category}', Controllers\Admin\Category\ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', Controllers\Admin\Category\EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', Controllers\Admin\Category\UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', Controllers\Admin\Category\DeleteController::class)->name('admin.category.delete');
    });
    Route::group(['namespace' => 'Http','prefix'=>'tags'], function () {
        Route::get('/', Controllers\Admin\Tag\IndexController::class)->name('admin.tag.index');
        Route::get('/create', Controllers\Admin\Tag\CreateController::class)->name('admin.tag.create');
        Route::post('/', Controllers\Admin\Tag\StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', Controllers\Admin\Tag\ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', Controllers\Admin\Tag\EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', Controllers\Admin\Tag\UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', Controllers\Admin\Tag\DeleteController::class)->name('admin.tag.delete');
    });
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
