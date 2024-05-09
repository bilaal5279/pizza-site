<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Models\Pizza;
use App\Models\Topping;

// Display all pizzas on the homepage
Route::get('/', function () {
    $pizzas = Pizza::with('sizes')->get();
    $toppings = Topping::all();// Ensure this relationship exists in the Pizza model
    return view('welcome', compact('pizzas', 'toppings'));
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/dashboard', [OrderController::class, 'create'])->name('dashboard');
    Route::get('/orders/new', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/orders/{order}/add-pizza', [OrderController::class, 'addPizza'])->name('orders.addPizza');
    Route::get('/order-items/{orderItem}/customize', [OrderController::class, 'customize'])->name('order-items.customize');
    Route::post('/orders/{order}/update-delivery', [OrderController::class, 'updateDelivery'])->name('orders.updateDelivery');
    Route::post('/orders/{order}/submit', [OrderController::class, 'submit'])->name('orders.submit');
    Route::post('/order-items/{orderItem}/customize', [OrderController::class, 'updateCustomization'])->name('order-items.updateCustomization');
    Route::get('/orders/{order}/review', [OrderController::class, 'review'])->name('orders.review');
    Route::post('/orders/{order}/submit', [OrderController::class, 'submit'])->name('orders.submit');

});



require __DIR__.'/auth.php';
