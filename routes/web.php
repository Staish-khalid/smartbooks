<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\HomeController;

// FRONTEND DEVELOPMENT USE

use App\Http\Controllers\MainController;


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

Route::controller(AuthorController::class)->group(function () {
    Route::get('admin/author','index')->name('author.index');
    Route::get('admin/author/create', 'create')->name('author.create');
    Route::post('admin/author/store','store')->name('author.store');
    Route::get('admin/author/{id}/edit', 'edit')->name('author.edit');
    Route::put('admin/author/update/{id}','update')->name('author.update');
    Route::get('admin/author/delete/{id}','delete')->name('author.delete');
    Route::get('admin/author/{id}/status', 'status')->name('author.status');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('admin/category','index')->name('category.index');
    Route::get('admin/category/create','create')->name('category.create');
    Route::post('admin/category/store','store')->name('category.store');    
    Route::get('admin/category/{id}/edit','edit')->name('category.edit');
    Route::put('admin/category/update/{id}','update')->name('category.update');
    Route::get('admin/category/delete/{id}','delete')->name('category.delete');
    Route::get('admin/category/status/{id}', 'status')->name('category.status');
});

Route::controller(BooksController::class)->group(function () {
    Route::get('admin/book','index')->name('book.index');
    Route::get('admin/book/create','create')->name('book.create');
    Route::post('admin/book/store','store')->name('book.store');
    Route::get('admin/book/{id}/edit','edit')->name('book.edit');
    Route::put('admin/book/update/{id}','update')->name('book.update');
    Route::get('admin/book/delete/{id}','delete')->name('book.delete');
    Route::get('admin/book/status/{id}' ,'status')->name('book.status');
});

Route::controller(MediaController::class)->group(function () {
    Route::get('admin/media','index')->name('media.index');
    Route::get('admin/media/create','create')->name('media.create');
    Route::post('admin/media/store','store')->name('media.store');
    Route::get('admin/media/{id}/edit','edit')->name('media.edit');
    Route::put('admin/media/update/{id}','update')->name('media.update');
    Route::get('admin/media/delete/{id}','delete')->name('media.delete');
    Route::get('admin/media/status/{id}', 'status')->name('media.status');
});

Route::controller(TeamController::class)->group(function () {
    Route::get('admin/team','index')->name('team.index');
    Route::get('admin/team/create','create')->name('team.create');
    Route::post('admin/team/store','store')->name('team.store');
    Route::get('admin/team/{id}/edit','edit')->name('team.edit');
    Route::put('admin/team/update/{id}','update')->name('team.update');
    Route::get('admin/team/delete/{id}','delete')->name('team.delete');
    Route::get('admin/team/{id}/status', 'status')->name('team.status');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile/', [HomeController::class, 'profile'])->name('profile');
    Route::post('/admin/update_password', [HomeController::class, 'update_password'])->name('update_password');
    Route::put('/admin/profile/update', [HomeController::class, 'profile_update'])->name('profile_update');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// FRONTEND ROUTES
Route::get('/book/{slug}', [HomeController::class, 'show'])->name('book.show');

Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/', [MainController::class, 'index'])->name('home');