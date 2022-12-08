<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\InvoiceController as AdminInvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController as PublicInvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, "index"])->name("public.index");
Route::get('/contact-us', [PublicController::class, "contactUs"])->name("public.contacts");
Route::get("/products", [PublicController::class, "productIndex"])->name("public.product.index");
Route::get("/product/{product}", [PublicController::class, "productShow"])->name("public.product.show");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth", "admin"])->group(function () {
    Route::get("/admin", [AdminController::class, "index"])->name("admin.index");

    Route::resource("admin/user", UserController::class, ["as" => "admin"]);
    Route::resource("admin/product", ProductController::class, ["as" => "admin"]);
    Route::resource("admin/invoice", AdminInvoiceController::class, ["as" => "admin"]);
});

Route::middleware(["auth", "customer"])->group(function () {
    Route::any("/cart/{product}/add", [CartController::class, "addProductToCart"])
        ->name("cart.add-product");
    Route::any("/cart/{product}/remove", [CartController::class, "removeProductFromCart"])
        ->name("cart.remove-product");
    Route::patch("cart/{product}/update", [CartController::class, "updateProductInCart"])
        ->name("cart.update-product");
    Route::get("/cart", [CartController::class, "index"])->name("cart.index");
    Route::get("/cart/submit", [CartController::class, "submitCart"])->name("cart.submit");

    Route::get("/invoice/{invoice}", [PublicInvoiceController::class, "showCheckout"])
        ->name("invoice.checkout");
});

require __DIR__ . '/auth.php';
