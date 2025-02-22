<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.users');
Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.categories');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('categories.create');
Route::post('/admin/categories/create', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('categories.store');
Route::get('/admin/categories/{id}/update', [CategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.edit');
Route::put('/admin/categories/update/{id}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('categories.destroy');
Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('front.announcements');
Route::get('/announcements/create', [AnnouncementsController::class, 'create'])->middleware(['auth', 'verified'])->name('front.create');
Route::post('/announcements/create', [AnnouncementsController::class, 'store'])->middleware(['auth', 'verified'])->name('announcement.store');
Route::get('/announcements/{id}', [AnnouncementsController::class, 'show'])->middleware(['auth', 'verified'])->name('front.show');
Route::post('/announcements/{id}', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comments.store');


Route::get('/admin/dashboard', function () {
    return view('/dashboard/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
require __DIR__.'/auth.php';
