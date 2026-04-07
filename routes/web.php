<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DisputeController;
use App\Http\Controllers\CategoryController;
use App\Models\Service; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredServices = Service::latest()->take(3)->get();
    return view('welcome', compact('featuredServices'));
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create'); 
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
    
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('/disputes', [DisputeController::class, 'index'])->name('disputes.index');
    Route::post('/disputes', [DisputeController::class, 'store'])->name('disputes.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/admin/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::patch('/admin/services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

        Route::get('/admin/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
        Route::patch('/admin/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
    });

    Route::get('/about', function () { return view('about'); })->name('about');
    Route::get('/contact', function () { return view('contact'); })->name('contact');
});

require __DIR__.'/auth.php';