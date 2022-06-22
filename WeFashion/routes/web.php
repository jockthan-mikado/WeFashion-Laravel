<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;



Route::get('/', [ MainController::class, 'index' ] );

// Route::controller(ProductController::class)->prefix('product')->group(function () {
// 	Route::get('/', 'index')->name('product.list');
// 	Route::get('/{product}', 'show')->name('show.product')->where('product', '[0-9]+');
// });




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/produit/{id}',[MainController::class, 'produit'])->name('voir_produit')->where('id', '[0-9]+');

Auth::routes();

Route::get('/admin', [MainController::class,'dashbord'])->middleware('auth')->name('admin');

Route::resource('admin/products', ProductController::class)->middleware('auth')->parameters([
	'admin/products' => 'product',
]);

Route::get('/admin/addProduct', [MainController::class,'formProduct'])->middleware('auth')->name('admin.product');
        
    

