<?php

use App\Http\Controllers\Admin\CafeServiceController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\UserController;

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

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail');
Route::get('/all-cafe', [UserController::class, 'allCafe'])->name('all-cafe');
Route::get('/search-cafe', [UserController::class, 'search'])->name('search-cafe');
Route::get('/search', [UserController::class, 'searchCafe'])->name('search');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//Normal Users Routes List
// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
// });

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');

    // cafe routes
    Route::get('/admin/cafe', [CafeController::class, 'index'])->name('admin/cafe');
    Route::get('/admin/cafe/search', [CafeController::class, 'search'])->name('admin/cafe/search');
    Route::get('/admin/cafe/create', [CafeController::class, 'create'])->name('admin/cafe/create');
    Route::post('/admin/cafe/store', [CafeController::class, 'store'])->name('admin/cafe/store');
    Route::get('/admin/cafe/detail/{id}', [CafeController::class, 'show'])->name('admin/cafe/detail');
    Route::get('/admin/cafe/edit/{id}', [CafeController::class, 'edit'])->name('admin/cafe/edit');
    Route::put('/admin/cafe/edit/{id}', [CafeController::class, 'update'])->name('admin/cafe/update');
    Route::delete('/admin/cafe/destroy/{id}', [CafeController::class, 'destroy'])->name('admin/cafe/destroy');

    // cafe services routes
    Route::get('/admin/cafe-service', [CafeServiceController::class, 'index'])->name('admin/cafe-service');
    Route::get('/admin/cafe-service/search', [CafeServiceController::class, 'search'])->name('admin/cafe-service/search');
    Route::get('/admin/cafe-service/create', [CafeServiceController::class, 'create'])->name('admin/cafe-service/create');
    Route::post('/admin/cafe-service/store', [CafeServiceController::class, 'store'])->name('admin/cafe-service/store');
    Route::get('/admin/cafe-service/edit/{id}', [CafeServiceController::class, 'edit'])->name('admin/cafe-service/edit');
    Route::put('/admin/cafe-service/edit/{id}', [CafeServiceController::class, 'update'])->name('admin/cafe-service/update');
    Route::delete('/admin/cafe-service/destroy/{id}', [CafeServiceController::class, 'destroy'])->name('admin/cafe-service/destroy');

    // service routes
    Route::get('/admin/service', [ServiceController::class, 'index'])->name('admin/service');
    Route::get('/admin/service/search', [ServiceController::class, 'search'])->name('admin/service/search');
    Route::get('/admin/service/create', [ServiceController::class, 'create'])->name('admin/service/create');
    Route::post('/admin/service/store', [ServiceController::class, 'store'])->name('admin/service/store');
    Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin/service/edit');
    Route::put('/admin/service/edit/{id}', [ServiceController::class, 'update'])->name('admin/service/update');
    Route::delete('/admin/service/destroy/{id}', [ServiceController::class, 'destroy'])->name('admin/service/destroy');

    // user routes
    Route::get('/admin/user', [AdminController::class, 'index'])->name('admin/user');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'edit'])->name('admin/user/edit');
    Route::put('/admin/user/edit/{id}', [AdminController::class, 'update'])->name('admin/user/update');
    Route::delete('/admin/user/destroy/{id}', [AdminController::class, 'destroy'])->name('admin/user/destroy');

});

// Catch-all route for non-existent routes
Route::fallback(function () {
    abort(404, 'Page not found');
});
