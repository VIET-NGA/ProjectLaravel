<?php

use App\Http\Controllers\BackEnds\AdminController;
use App\Http\Controllers\BackEnds\CategoryController;
use App\Http\Controllers\FrontEnds\HomeController;
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
Route::get('lien-he',[HomeController::class,'contact'])->name('contact');
Route::get('loginPage',[HomeController::class,'login'])->name('login');


// Admin
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::get('dashboard',[AdminController::class,'ShowDashboard'])->name('dashboard');

    // login
    Route::post('adminDashboard', [AdminController::class,'adminDashboard'])->name('adminDashboard');
    
    // logout
    Route::get('logout',[AdminController::class,'logout'])->name('logout');


    // category
    Route::prefix('category')->group(function(){ 
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
    
});
