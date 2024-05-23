<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\Add_onController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Customer CRUD
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/update-customers', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/delete-customers/{id}', [CustomerController::class, 'delete'])->name('customer.delete');



// Item List CRUD
Route::get('/items', [ItemListController::class, 'index'])->name('items.index');
Route::post('/items', [ItemListController::class, 'store'])->name('items.store');
Route::get('/edit-items/{id}', [ItemListController::class, 'edit'])->name('items.edit');
Route::put('/update-items', [ItemListController::class, 'update'])->name('items.update');
Route::get('/delete-items/{id}', [ItemListController::class, 'delete'])->name('items.delete');

// Add_on CRUD
Route::get('/addons', [Add_onController::class, 'index'])->name('addons.index');
Route::post('/addons', [Add_onController::class, 'store'])->name('addons.store');
Route::get('/edit-addons/{id}', [Add_onController::class, 'edit'])->name('addons.edit');
Route::put('/update-addons', [Add_onController::class, 'update'])->name('addons.update');
Route::get('/delete-addons/{id}', [Add_onController::class, 'delete'])->name('addons.delete');


//Products

Route::get('/products', function (){
    return view('products');
});

Route::get('/products-read-more/{id}', [ProductsController::class, 'getProductInfo'])->name('product.getInfo');

Route::get('/products', [ProductsController::class, 'index'],);
Route::get('/orders', [OrdersController::class, 'index']);
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'updateCart'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');
Route::get('/checkout', [ProductsController::class, 'showCheckout'])->name('checkout');
Route::get('/order_confirmation', [ProductsController::class, 'orderConfirmation'])->name('order_confirmation');
Route::post('/checkout', [ProductsController::class, 'checkout']); 