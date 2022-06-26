<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\CategoryAdminController;


Route::get('/', [ MainController::class, 'index' ] )->name('accueil');;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/product/{id}',[MainController::class, 'show'])->name('showProduct')->where('id', '[0-9]+');



Route::get('solde', [MainController::class, 'showProductBySolde']);

Route::get('categorie/{id}', [MainController::class, 'showProductByCategorie'])->where(['id' => '[0-9]+']);

Auth::routes();



Route::resource('admin/products', ProductAdminController::class)->middleware('auth');

Route::resource('admin/categories', CategoryAdminController::class)->middleware('auth');






