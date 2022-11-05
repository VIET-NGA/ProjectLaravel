<?php

use App\Http\Controllers\BackEnds\AdminController;
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
});
