<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TShirtController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\ForgotPasswordManager;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\SslCommerzPaymentController;



Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/collections', [FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'productView']);
Route::get('/new-arrivals', [FrontendController::class, 'newArrival']);
Route::get('search', [FrontendController::class, 'searchProducts']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tshirts/upload', [TShirtController::class, 'showForm'])->name('tshirt.upload');
    Route::post('/tshirts/upload', [TShirtController::class, 'store'])->name('tshirt.store');
    Route::get('wishlist', [WishlistController::class, 'index']);
    Route::get('cart', [CartController::class, 'index']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{orderId}', [OrderController::class, 'show']);
});

Route::get('thank-you', [FrontendController::class, 'thankyou']);

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/forgotpassword', [ForgotPasswordManager::class, 'forgotpassword'])->name('forgot.password');
Route::post('/forgotpassword', [ForgotPasswordManager::class, 'forgotpasswordPost'])->name('forgot.password.post');

Route::get('/resetpassword/{token}', [ForgotPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/resetpassword/{token}', [ForgotPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::get('products/{product_id}/delete', [ProductController::class, 'destroy']);
    Route::get('product-image/{product_image_id}/delete', [ProductController::class, 'destroyImage']);
    
    Route::post('product-color/{prod_color_id}', [ProductController::class, 'updateProdColorQty']);
    Route::get('product-color/{prod_color_id}/delete', [ProductController::class, 'deleteProdColor']);

});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('colors', [ColorController::class, 'index']);
    Route::get('colors/create', [ColorController::class, 'create']);
    Route::post('colors/create', [ColorController::class, 'store']);
    Route::get('/colors/{color}/edit', [ColorController::class, 'edit']);
    Route::put('/colors/{color_id}', [ColorController::class, 'update']);
    Route::get('/colors/{color_id}/delete', [ColorController::class, 'destroy']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('sliders', [SliderController::class, 'index']);
    Route::get('sliders/create', [SliderController::class, 'create']);
    Route::post('sliders/create', [SliderController::class, 'store']);
    Route::get('sliders/{slider}/edit', [SliderController::class, 'edit']);
    Route::put('sliders/{slider}', [SliderController::class, 'update']);
    Route::get('sliders/{slider}/delete', [SliderController::class, 'destroy']);


});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index']);
    Route::get('/orders/{orderId}', [\App\Http\Controllers\Admin\OrderController::class, 'show']);
    Route::put('/orders/{orderId}', [\App\Http\Controllers\Admin\OrderController::class, 'updateOrderStatus']);
    Route::get('/invoice/{orderId}', [\App\Http\Controllers\Admin\OrderController::class, 'viewInvoice']);
    Route::get('/invoice/{orderId}/generate', [\App\Http\Controllers\Admin\OrderController::class, 'generateInvoice']);
    
});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay-online', [SslCommerzPaymentController::class, 'payOnline'])->middleware('auth');
Route::post('/payment/success', [SslCommerzPaymentController::class, 'paymentSuccess']);

Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END






