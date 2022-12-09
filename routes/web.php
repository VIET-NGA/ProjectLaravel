<?php

use App\Http\Controllers\BackEnds\AdminController;
use App\Http\Controllers\BackEnds\BrandController;
use App\Http\Controllers\BackEnds\CategoryController;
use App\Http\Controllers\BackEnds\CouponController;
use App\Http\Controllers\BackEnds\OrderController;
use App\Http\Controllers\BackEnds\ProductController;
use App\Http\Controllers\FrontEnds\CartController;
use App\Http\Controllers\FrontEnds\CheckoutController;
use App\Http\Controllers\FrontEnds\HomeController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('partials.home.home');
// });
Route::get('/',[HomeController::class,'index'])->name('index');

// Danh muc & thuong hieu theo ID
Route::get('danh-muc-san-pham/{id}',[HomeController::class,'DanhMucSanPham'])->name('danh-muc-san-pham');
Route::get('thuong-hieu-san-pham/{id}', [HomeController::class,'ThuongHieuSanPham'])->name('thuong-hieu-san-pham');
// chi tiet san pham
Route::get('chi-tiet-san-pham/{id}',[HomeController::class,'ProductDetail'])->name('chi-tiet-san-pham');
// search
Route::get('search',[HomeController::class,'Search'])->name('search');


// giỏ hàng
// saveCart/{id?} gửi cả id sản phẩm theo
Route::post('saveCart', [CartController::class,'saveCart'])->name('saveCart');
Route::get('showCart', [CartController::class, 'showCart'])->name('showCart');
// update Cart
Route::get('updateCart/{id}', [CartController::class, 'updateCart'])->name('updateCart');
// delete Cart
Route::get('deleteCart/{id}',[CartController::class, 'deleteCart'])->name('deleteCart');


// checkout
Route::get('login-checkout',[CheckoutController::class, 'login_Checkout'])->name('loginCheckout');
// save login
Route::post('save-login', [CheckoutController::class, 'Save_login'])->name('saveLogin');
// logout
Route::get('logout',[CheckoutController::class, 'LogOut'])->name('logout-customer');
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
// register account
Route::post('saveRegister', [CheckoutController::class, 'Save_Register'])->name('saveRegister');
// save shipping 
Route::post('save-shipping', [CheckoutController::class, 'Save_Shipping'])->name('save-shipping');
// payment
Route::get('payment', [CheckoutController::class, 'payment'])->name('payment');
// order-place
Route::post('order-place', [CheckoutController::class, 'Order_place'])->name('order-place');




Route::get('lien-he',[HomeController::class,'contact'])->name('contact');
// Route::get('loginPage',[HomeController::class,'login'])->name('login');


// Admin
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::get('dashboard',[AdminController::class,'ShowDashboard'])->name('dashboard');

    // login
    Route::post('adminDashboard', [AdminController::class,'adminDashboard'])->name('adminDashboard');

    // logout
    Route::get('logout',[AdminController::class,'logout'])->name('logout');


    // category
    Route::prefix('category')->middleware('checkAuth')->group(function(){ 
        Route::get('/',[CategoryController::class,'index'])->name('category');

        // add
        Route::get('addCate',[CategoryController::class,'addCategory'])->name('addCategory');
        Route::post('postaddCate',[CategoryController::class,'postCategory'])->name('postCategory');

        // Edit
        Route::get('editCate/{id}',[CategoryController::class,'editCategory'])->name('editCategory');
        Route::post('posteditCate/{id}',[CategoryController::class,'posteditCategory'])->name('posteditCategory');

        // delete
        Route::get('deleteCate/{id}',[CategoryController::class,'deleteCategory'])->name('deleteCategory');
    });

    // Brand 
    Route::prefix('brand')->middleware('checkAuth')->group(function(){
        Route::get('/',[BrandController::class,'index'])->name('brand');

        // add
        Route::get('addBrand',[BrandController::class,'addBrand'])->name('addBrand');
        Route::post('saveBrand',[BrandController::class, 'saveBrand'])->name('saveBrand');

        // edit
        Route::get('editBrand/{id}',[BrandController::class, 'editBrand'])->name('editBrand');
        Route::post('updateBrand/{id}',[BrandController::class, 'updateBrand'])->name('updateBrand');

        // delete
        Route::get('deleteBrand/{id}',[BrandController::class,'deleteBrand'])->name('deleteBrand');
    });

    // Product
    Route::prefix('product')->middleware('checkAuth')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('product');

        // add
        Route::get('addProduct',[ProductController::class,'addProduct'])->name('addProduct');
        Route::post('saveProduct',[ProductController::class,'saveProduct'])->name('saveProduct');

        // edit
        Route::get('editProduct/{id}',[ProductController::class,'editProduct'])->name('editProduct');
        Route::post('updateProduct/{id}',[ProductController::class,'updateProduct'])->name('updateProduct');

        // delete
        Route::get('deleteProduct/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct');
    });

    // Order
    Route::prefix('order')->middleware('checkAuth')->group(function(){
        Route::get('/',[OrderController::class,'index'])->name('order');
        Route::get('show-order/{id}',[OrderController::class,'Show_Order'])->name('showOrder');
        Route::get('edit-order/{id}',[OrderController::class,'Edit_Order'])->name('editOrder');
        Route::post('update-order/{id}',[OrderController::class,'Update_Order'])->name('updateOrder');
    });

    // Mã Giảm Giá: coupon
    Route::resource('coupon', CouponController::class)->middleware('checkAuth');
});
