<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionproductController;
use App\Http\Controllers\CategoryDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MultiplePriceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ActivityLogController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('visitor.landingpage');
// });
Route::get('/', [App\Http\Controllers\VisitorController::class, 'index'])->name('visitor');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users', UserController::class);
Route::get('user/export-excel', [UserController::class, 'export_excel'])->name('user.export-excel');
Route::get('user/export-csv', [UserController::class, 'export_csv'])->name('user.export-csv');
Route::get('user/export-pdf', [UserController::class, 'export_pdf'])->name('user.export-pdf');
Route::get('user/is-online', [UserController::class, 'is_online'])->name('user.is-online');


Route::resource('carts', CartController::class);
Route::resource('categories', CategoryController::class);
Route::resource('categorydetails', CategoryDetailController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('productimages', ProductImageController::class);
Route::resource('orders', OrderController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('multipleprices', MultiplePriceController::class);
Route::resource('payments', PaymentController::class);
Route::resource('transactionproducts', PaymentController::class);
Route::resource('reports', ReportController::class);
Route::resource('members', MemberController::class);

// Route::resource('visitors', VisitorController::class);

Route::resource('products', ProductController::class);


Route::get('product', [ProductController::class, 'productList'])->name('products.listt');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');