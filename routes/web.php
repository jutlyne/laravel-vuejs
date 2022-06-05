<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);





Route::get('/', function () {
    return view('public/index');
});

Route::get('/category', function () {
    return view('public/category');
});

Route::get('/single', function () {
    return view('public/single');
});
//admin 

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    });
    Route::get('/admin/post', function () {
        return Inertia::render('AdminPost');
    });
    Route::get('/admin/user', function () {
        return Inertia::render('AdminUser');
    });
});
require __DIR__ . '/auth.php';