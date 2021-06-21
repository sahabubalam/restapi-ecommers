<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\UserController;


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



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin-login', [AdminController::class, 'adminLogin']);


Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');




Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin')->middleware('admin');

Route::get('/admin/dashboard/{any}', [AdminController::class, 'dashboard'])->middleware('admin')->where('any','.*');

// Route::get('/admin/@{dashboard}/{vue_capture?}',function(){
//     return view('admin.index');

// })->where('vue_capture','[\/\w\.-]*');

   
Route::get('/', [UserController::class, 'user'])->name('user');
Route::get('/{any}', [UserController::class, 'user'])->where('any','.*');




