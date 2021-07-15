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
Route::middleware(['auth'])->group(function(){

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
Route::post('/category/save-category', [App\Http\Controllers\CategoryController::class, 'savecategory'])->name('save-category');
Route::get('/category/manage-category', [App\Http\Controllers\CategoryController::class, 'manageCategory'])->name('manage-category');
Route::get('/category/categorystatus/{id}/{s}', [App\Http\Controllers\CategoryController::class, 'categorystatus']);
Route::get('category/delete/{id}',[App\Http\Controllers\CategoryController::class, 'removecategory']);
Route::get('category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory']);

Route::post('/category/update-category', [App\Http\Controllers\CategoryController::class, 'updatecategory'])->name('update-category');

/******************Sub Category subcategorystatus************/
Route::get('/sub-category/manage-sub-category', [App\Http\Controllers\SubcategoryController::class, 'manageSubcategory'])->name('manage-sub-category');
Route::get('/sub-category/add-sub-category', [App\Http\Controllers\SubcategoryController::class, 'addSubcategory'])->name('add-sub-category');
Route::post('/category/save-sub-category', [App\Http\Controllers\SubcategoryController::class, 'savesubcategory'])->name('save-sub-category');
// Route::get('/sub-category/sub-category-status/{id}/{s}', [App\Http\Controllers\SubcategoryController::class, 'subcategorystatus']);
Route::get('subcategory/delete/{id}',[App\Http\Controllers\SubcategoryController::class, 'removesubcategory']);
Route::get('subcategory/edit/{id}', [App\Http\Controllers\SubcategoryController::class, 'editSubcategory']);
Route::get('subcategory/active/{id}', [App\Http\Controllers\SubcategoryController::class, 'active']);
Route::get('subcategory/inactive/{id}', [App\Http\Controllers\SubcategoryController::class, 'inactive']);
Route::post('/category/update-sub-category', [App\Http\Controllers\SubcategoryController::class, 'updateSubcategory'])->name('update-sub-category');
Route::get('/sub-category/subcategorystatus/{id}/{s}', [App\Http\Controllers\SubcategoryController::class, 'subStatus']);

/*******************Slider*****************/

Route::get('/slider/add-slider', [App\Http\Controllers\SliderController::class, 'addSlider'])->name('add-slider');
Route::post('/slider/save-slider', [App\Http\Controllers\SliderController::class, 'saveSlider'])->name('save-slider');
Route::post('/slider/update-slider', [App\Http\Controllers\SliderController::class, 'updateSlider'])->name('update-slider');
Route::get('sliders/edit/{id}', [App\Http\Controllers\SliderController::class, 'editSlider']);
Route::get('/slider/manage-slider', [App\Http\Controllers\SliderController::class, 'manageSlider'])->name('manage-slider');
Route::get('sliders/delete/{id}', [App\Http\Controllers\SliderController::class, 'Slideremvoe']);
Route::get('/slider/sliderstatus/{id}/{s}', [App\Http\Controllers\SliderController::class, 'SliderStatus']);
});



