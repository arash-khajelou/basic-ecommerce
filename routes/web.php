<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return "Welcome to my shop!";
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth", "admin"])->group(function () {
    Route::get("/admin", [AdminController::class, "index"])->name("admin.index");

    Route::resource("admin/user", UserController::class, ["as" => "admin"]);
    Route::resource("admin/product", ProductController::class, ["as" => "admin"]);
    Route::resource("admin/invoice", InvoiceController::class, ["as" => "admin"]);
});

require __DIR__ . '/auth.php';
