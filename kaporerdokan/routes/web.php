<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgotPasswordManager;
use App\Http\Controllers\TShirtController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/forgotpassword', [ForgotPasswordManager::class, 'forgotpassword'])->name('forgot.password');
Route::post('/forgotpassword', [ForgotPasswordManager::class, 'forgotpasswordPost'])->name('forgot.password.post');

Route::get('/resetpassword/{token}', [ForgotPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/resetpassword/{token}', [ForgotPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');

Route::get('/tshirts/upload', [TShirtController::class, 'showForm'])->name('tshirt.upload');
Route::post('/tshirts/upload', [TShirtController::class, 'store'])->name('tshirt.store');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Category Route

    Route::get('category', [CategoryController::class,'index'])->name('admin.category');
    Route::get('category/create', [CategoryController::class,'create']);
    Route::post('category', [CategoryController::class,'store']);
    Route::post('category', [CategoryController::class,'store']);
    Route::get('category/{category}/edit', [CategoryController::class,'edit']);
    Route::put('category/{category}', [CategoryController::class,'update']);
    Route::get('brands', App\Http\Livewire\Admin\Brand\Index::class);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::get('/products/{product_id}/delete', [ProductController::class, 'destroy']);
    Route::get('product-image/{product_image_id}/delete', [ProductController::class, 'destroyImage']);

});






