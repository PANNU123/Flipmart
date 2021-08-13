<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Shipping\DistrictController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\Shipping\DivisionController;
use App\Http\Controllers\Shipping\StateController;
use App\Http\Controllers\SiteController\CartController;
use App\Http\Controllers\UserLogin\UserloginController;
use App\Http\Controllers\SiteController\websiteController;


Route::get('/', [websiteController::class, 'index']);
Route::get('/category/subcategory/{id}', [websiteController::class, 'subcategories'])->name('subcategoriesid');
Route::get('/all/category/{id}', [websiteController::class, 'categories'])->name('categoriesid');



//****************cart***********/
Route::get('/cart/model/', [CartController::class, 'cartmodel']);
Route::get('/model/{id}', [CartController::class, 'showproduct']);
Route::post('/cart/add/product', [CartController::class, 'savecartproduct']);
Route::get('/shopping/cart/', [CartController::class, 'ShoppingCart'])->name('shoping-cart');
Route::get('cart/delete/{id}', [CartController::class, 'CartDelete']);
// /cart/product/increment/
Route::get('cart/product/increment/{id}', [CartController::class, 'CartIncreamnet']);
Route::get('cart/product/decrement/{id}', [CartController::class, 'CartDecreamnet']);
/***************User Login***************/
Route::get('/user/login/', [UserloginController::class, 'userLogin'])->name('user-login');


/*************************shipping Area***************/
// division
Route::get('/division/add',[DivisionController::class,'adddivision'])->name('add-division');
Route::get('/division/manage',[DivisionController::class,'managedivision'])->name('manage-division');
Route::post('/division/save',[DivisionController::class,'savedivision'])->name('save-division');
Route::get('/division/divisionstatus/{id}/{s}', [DivisionController::class, 'divisionstatus']);
Route::get('/division/edit/{id}', [DivisionController::class, 'divisionedit']);
Route::post('/division/update', [DivisionController::class, 'divisionupdate'])->name('update-division');

//district
Route::get('/district/add',[DistrictController::class,'adddistrict'])->name('add-district');
Route::get('/district/manage',[DistrictController::class,'managedistrict'])->name('manage-district');
Route::post('/district/save',[DistrictController::class,'savedistrict'])->name('save-district');
Route::get('/district/divisionstatus/{id}/{s}', [DistrictController::class, 'districtstatus']);
Route::get('district/delete/{id}',[DistrictController::class,'removedistrict']);


//state
Route::get('/state/add',[StateController::class,'adddstate'])->name('add-state');
Route::get('/state/manage',[StateController::class,'managestate'])->name('manage-state');
Route::post('/state/save',[StateController::class,'savedstate'])->name('save-state');
Route::get('/state/divisionstatus/{id}/{s}', [StateController::class, 'districtstatus']);
Route::get('state/delete/{id}',[StateController::class,'removedstate']);
Route::get('/division/district/{id}', [StateController::class, 'showdistrict']);


/*************************shipping Area***************/
// Auth
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('adminhome');
Route::middleware(['auth'])->group(function(){
//**************Brand Route***************//
Route::get('/product', [ProductController::class, 'index']);
Route::get('/brand/add-brand', [BrandController::class, 'addBrand'])->name('add-brand');
Route::post('/brand/save-brand', [BrandController::class, 'saveBrand'])->name('save-brand');
Route::post('/brand/update-brand', [BrandController::class, 'updateBrand'])->name('update-brand');
Route::get('brands/edit/{id}', [BrandController::class, 'editBrand']);
Route::get('/brand/manage-brand', [BrandController::class, 'manageBrand'])->name('manage-brand');
Route::get('brands/delete/{id}', [BrandController::class, 'brandremvoe']);
Route::get('/brand/brandstatus/{id}/{s}', [BrandController::class, 'brandStatus']);
// Route::get('brands/active/{id}', [BrandController::class, 'active']);
// Route::get('brands/inactive/{id}', [BrandController::class, 'inactive']);

//***************Category Route*************//
Route::get('/category/add-category', [CategoryController::class, 'addcategory'])->name('add-category');
Route::post('/category/save-category', [CategoryController::class, 'savecategory'])->name('save-category');
Route::get('/category/manage-category', [CategoryController::class, 'manageCategory'])->name('manage-category');
Route::get('/category/categorystatus/{id}/{s}', [CategoryController::class, 'categorystatus']);
Route::get('category/delete/{id}',[CategoryController::class, 'removecategory']);
Route::get('category/edit/{id}', [CategoryController::class, 'editCategory']);
Route::post('/category/update-category', [CategoryController::class, 'updatecategory'])->name('update-category');

/******************Sub Category subcategorystatus************/
Route::get('/sub-category/manage-sub-category', [SubcategoryController::class, 'manageSubcategory'])->name('manage-sub-category');
Route::get('/sub-category/add-sub-category', [SubcategoryController::class, 'addSubcategory'])->name('add-sub-category');
Route::post('/category/save-sub-category', [SubcategoryController::class, 'savesubcategory'])->name('save-sub-category');
// Route::get('/sub-category/sub-category-status/{id}/{s}', [SubcategoryController::class, 'subcategorystatus']);
Route::get('subcategory/delete/{id}',[SubcategoryController::class, 'removesubcategory']);
Route::get('subcategory/edit/{id}', [SubcategoryController::class, 'editSubcategory']);
Route::get('subcategory/active/{id}', [SubcategoryController::class, 'active']);
Route::get('subcategory/inactive/{id}', [SubcategoryController::class, 'inactive']);
Route::post('/category/update-sub-category', [SubcategoryController::class, 'updateSubcategory'])->name('update-sub-category');
Route::get('/sub-category/subcategorystatus/{id}/{s}', [SubcategoryController::class, 'subStatus']);

/*******************Slider*****************/
Route::get('/slider/add-slider', [SliderController::class, 'addSlider'])->name('add-slider');
Route::post('/slider/save-slider', [SliderController::class, 'saveSlider'])->name('save-slider');
Route::post('/slider/update-slider', [SliderController::class, 'updateSlider'])->name('update-slider');
Route::get('sliders/edit/{id}', [SliderController::class, 'editSlider']);
Route::get('/slider/manage-slider', [SliderController::class, 'manageSlider'])->name('manage-slider');
Route::get('sliders/delete/{id}', [SliderController::class, 'Slideremvoe']);
Route::get('/slider/sliderstatus/{id}/{s}', [SliderController::class, 'SliderStatus']);


/*******************Product*****************/
Route::get('/product/add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::post('/product/save-product', [ProductController::class, 'saveProduct'])->name('save-product');
Route::post('/product/update-product', [ProductController::class, 'updateProduct'])->name('update-product');
Route::get('product/edit/{id}', [ProductController::class, 'editProduct']);
Route::get('/product/manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
Route::get('product/delete/{id}', [ProductController::class, 'remvoeProduct']);
Route::get('/product/productstatus/{id}/{s}', [ProductController::class, 'ProductStatus']);
Route::get('/product/showsubcat/{id}', [ProductController::class, 'showSbucategory']);


});






