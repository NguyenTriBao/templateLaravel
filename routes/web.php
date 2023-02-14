<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllers;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\ProductController;

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

Route::get('/wishlist', function () {
    return view('wishlist');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/my-account', function () {
    return view('my-account');
});
Route::get('/admin/product', function () {
    return view('/admin/product');
});

Route::get('/admin/add-product', function () {
    return view('/admin/add-product');
});

Route::get('/admin', function () {
    return view('admin');
});


Route::group(['prefix' => ''], function () {
    Route::get('/index', [Controllers::class,'index']);
    Route::get('/tim-kiem', [Controllers::class,'search']);
    Route::get('/shop', [Controllers::class,'protype'])->name('protype');
    Route::get('/add-to-cart/{id}', [Controllers::class,'addCart'])->name('addToCart');
    Route::get('/cart', [Controllers::class,'showCart'])->name('showCart');
    Route::get('/detail/{id}', [Controllers::class,'product'])->name('detail');
    Route::get('/detail2/{id}', [Controllers::class,'product2'])->name('detail2');
    Route::post('/detail/{id}', [Controllers::class,'comments'])->name('comments');
    //Route::get('/dashboard', [Controllers::class,'show_dashboard']);
    Route::get('/admin/product', [ProductController::class,'product'])->name('product');
    Route::get('/admin/protype', [ProductController::class,'protype'])->name('protype');
    Route::get('/admin/manufacture', [ProductController::class,'manufacture'])->name('manufacture');
    Route::get('/admin/users', [ProductController::class,'users'])->name('users');
    Route::get('/category/{type_id}', [Controllers::class,'category'])->name('category');
    Route::get('/manufacture/{manu_id}', [Controllers::class,'manufacture'])->name('manufacture');
});

//Product
Route::match(['get','post'],'/admin/add-product',[ProductController::class ,'addProduct']);
Route::match(['get','post'],'/admin/edit-product/{id}',[ProductController::class ,'editProduct']);
Route::match(['get','post'],'/admin/delete-product/{id}',[ProductController::class ,'deleteProduct']);

//Protype
Route::match(['get','post'],'/admin/add-protype',[ProductController::class ,'addProtype']);
Route::match(['get','post'],'/admin/edit-protype/{type_id}',[ProductController::class ,'editProtype']);
Route::match(['get','post'],'/admin/delete-protype/{type_id}',[ProductController::class ,'deleteProtype']);

//Manufacture
Route::match(['get','post'],'/admin/add-manufacture',[ProductController::class ,'addManufacture']);
Route::match(['get','post'],'/admin/edit-manufacture/{manu_id}',[ProductController::class ,'editManufacture']);
Route::match(['get','post'],'/admin/delete-manufacture/{manu_id}',[ProductController::class ,'deleteManufacture']);

//Comment
Route::get('/admin/comments', [ProductController::class,'comment'])->name('comment');
Route::match(['get','post'],'/admin/delete-comment/{com_id}',[ProductController::class ,'deleteComment']);

//User
Route::match(['get','post'],'/admin/delete-user/{id}',[ProductController::class ,'deleteUser']);

Route::get('/welcome', function () {
    return view('welcome');
});

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('/admin/dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/product', function () {
//     return view('/admin/product');
// })->middleware(['auth'])->name('product');


require __DIR__.'/auth.php';
