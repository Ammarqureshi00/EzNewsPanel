<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Subsriber\SubscribersController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news/{newsletter:slug}', [HomeController::class, 'show'])->name('news.show');
Route::post('/news/{newsletter:slug}/subscribe', [HomeController::class, 'subscribe'])
    ->name('subscribe');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth',   'role:admin'])->group(function () {

    Route::get('admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    // Subscribers (Admin Access)
    Route::get('/admin/subscribers', [AdminSubscriberController::class, 'index'])
        ->name('admin.subscribers');
    Route::delete('/admin/subscribers/{id}', [AdminSubscriberController::class, 'destroy'])
        ->name('admin.subscribers.destroy');

    Route::resource('admin/newsletters', NewsletterController::class)
        ->names('admin.newsletters');

    Route::resource('admin/categories', CategoryController::class)
        ->names('admin.categories');

    Route::resource('admin/tags', TagController::class)
        ->names('admin.tags');
});
Route::middleware(['auth', 'role:subscriber'])->group(function () {

    Route::get('subscribers/dashboard', [SubscribersController::class, 'index'])
        ->name('subscribers.dashboard');
});
require __DIR__ . '/auth.php';
