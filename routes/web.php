<?php

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

Route::get('/', function () {
    return view('website.website');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('adminhome');

Auth::routes();
//**************Brand Route***************//
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/brand/add-brand', [App\Http\Controllers\BrandController::class, 'addBrand'])->name('add-brand');
Route::post('/brand/save-brand', [App\Http\Controllers\BrandController::class, 'saveBrand'])->name('save-brand');
Route::post('/brand/update-brand', [App\Http\Controllers\BrandController::class, 'updateBrand'])->name('update-brand');
Route::get('brands/edit/{id}', [App\Http\Controllers\BrandController::class, 'editBrand']);
Route::get('/brand/manage-brand', [App\Http\Controllers\BrandController::class, 'manageBrand'])->name('manage-brand');
Route::get('brands/delete/{id}', [App\Http\Controllers\BrandController::class, 'brandremvoe']);
Route::get('/brand/brandstatus/{id}/{s}', [App\Http\Controllers\BrandController::class, 'brandStatus']);
// Route::get('brands/active/{id}', [App\Http\Controllers\BrandController::class, 'active']);
// Route::get('brands/inactive/{id}', [App\Http\Controllers\BrandController::class, 'inactive']);

//***************Category Route*************//
Route::get('/category/add-category', [App\Http\Controllers\CategoryController::class, 'addcategory'])->name('add-category');
Route::post('/category/save-category', [App\Http\Controllers\CategoryController::class, 'saveategory'])->name('save-category');
Route::get('/category/manage-category', [App\Http\Controllers\CategoryController::class, 'manageCategory'])->name('manage-category');
Route::get('/category/categorystatus/{id}/{s}', [App\Http\Controllers\CategoryController::class, 'categorystatus']);
Route::get('category/delete/{id}',[App\Http\Controllers\CategoryController::class, 'removecategory']);
Route::get('category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory']);
Route::post('/category/update-category', [App\Http\Controllers\CategoryController::class, 'updatecategory'])->name('update-category');





