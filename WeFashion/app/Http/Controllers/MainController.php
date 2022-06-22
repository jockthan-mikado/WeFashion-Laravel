<?php


namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Livewire\WithPagination;

class MainController extends Controller
{
    use WithPagination;
    //nous disons à laravel que le thème de notre pagination est de bootstrap
    protected $paginationTheme = "bootstrap";
    public function index(){
        $products = Product::paginate(9);
        //dd($produits);
        return view('shop.index', ['products'=> $products]);
    }
    public function dashbord(){
        $products = Product::paginate(9);
        return view('home' , ['products'=> $products]);
    }
    public function dashbordAddProduct(){
        return view('addproduct');
    }
    public function produit(Request $request){

        //on recupère un produit en fonction de la valeur passée en paramètres
        $product = Product::find($request->id);
        //dd($produit);

        return view('shop.produit', ['product'=>$product]);
    }
}