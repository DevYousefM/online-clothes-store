<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserpageController;
use App\Mail\OrderShipped;
use App\Models\Catagory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
// Routes

// User Routes
Route::get('/', [UserpageController::class, "index"])->name("index");
Route::get('/single_product/{id}', [UserpageController::class, "single_product"])->name("single_product");
Route::get('/products', [UserpageController::class, "getProducts"])->name("products");
Route::get('/single_catagory/{name}', [UserpageController::class, "single_catagory"])->name("single_catagory");
Route::get('/add_to_cart/{id}', [UserpageController::class, "add_to_cart"])->name("add_to_cart");
Route::get('/add_cart', [UserpageController::class, "add_cart"])->name("add_cart");
Route::get('/fill_informations', [UserpageController::class, "fill_informations"])->name("fill_informations");
Route::get('/getRegion', [UserpageController::class, "getRegion"])->name("getRegion");
Route::get('/cart', [UserpageController::class, "cart"])->name("cart");
Route::get('/update_cart', [UserpageController::class, "update_cart"])->name("update_cart");
Route::get('/del_cart/{id}', [UserpageController::class, "del_cart"])->name("del_cart");
// Guest
Route::get('/checkout/{id}', [CheckoutController::class, "index"])->name("checkout");
Route::post('/make_order/{id}', [CheckoutController::class, "store"])->name("guest.make_order");
// User
Route::post('/complete_user_info', [UserpageController::class, "complete_user_info"])->name("complete_user_info");
Route::get('/checkout_cart', [CheckoutController::class, "make_order"])->name("make_order.user");
Route::post('/store_order', [CheckoutController::class, "store_order"])->name("store_order");

Route::get('/complete_order', [CheckoutController::class, "complete_order"])->name("complete_order");

// Admin Routes
Route::middleware(['auth', "check"])->group(function () {
    Route::get('/dashboard', function () {
        $catagories =  Catagory::all();
        return view('admin.dashboard', ["catagories" => $catagories]);
    })->name('dashboard');
    Route::get("/add_product", [ProductController::class, "add_product"])->name("add_product");
    Route::get("/catagory/{name}", [ProductController::class, "catagory"])->name("catagory");
    Route::post("/store", [ProductController::class, "store"])->name("store");
    Route::get("/product_page/{id}", [ProductController::class, "product_page"])->name("product_page");
    Route::get("/edit_product/{id}", [ProductController::class, "edit_product"])->name("edit_product");
    Route::post("/update_product", [ProductController::class, "update_product"])->name("update_product");
    Route::get("/del_product/{id}", [ProductController::class, "del_product"])->name("del_product");

    Route::get("/new_orders", [OrderController::class, "new_orders"])->name("new_orders");
    Route::get("/users_orders", [OrderController::class, "users_orders"])->name("users_orders");
    Route::get("/companies_orders", [OrderController::class, "companies_orders"])->name("companies_orders");
    Route::get("/reviewed_orders", [OrderController::class, "reviewed_orders"])->name("reviewed_orders");
    Route::get("/completed_orders", [OrderController::class, "completed_orders"])->name("completed_orders");
    Route::post("/update_order", [OrderController::class, "update_order"])->name("update_order");
});


require __DIR__ . '/auth.php';
