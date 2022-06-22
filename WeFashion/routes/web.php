<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
Use App\Http\Livewire\Utilisateurs;



 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [ MainController::class, 'index' ] );

Route::get('/produit/{id}',[MainController::class, 'produit'])->name('voir_produit');


Auth::routes();

Route::get('/admin', [MainController::class,'dashbord'])->middleware('auth')->name('admin');

Route::get('/admin/addUser', [MainController::class,'dashbordAddProduct'])->middleware('auth')->name('admin.product');
        
    

