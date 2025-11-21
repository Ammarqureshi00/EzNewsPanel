<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Subsriber\SubscribersController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/newsletter/{newsletter}', [HomeController::class, 'show'])->name('newsletter.show');
Route::post('/newsletter/{newsletter:slug}/subscribe', [HomeController::class, 'subscribe'])
    ->name('subscribe');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
    Route::resource('admin/newsletters', NewsletterController::class)
        ->names('admin.newsletters');
    Route::resource('admin/categories', CategoryController::class)
        ->names('admin.categories');
    Route::resource('admin/tags', TagController::class)
        ->names('admin.tags');
});
Route::middleware(['auth', 'subscriber'])->group(function () {

    Route::get('subscribers/dashboard', [SubscribersController::class, 'index'])
        ->name('subscribers.dashboard');
});
require __DIR__ . '/auth.php';
