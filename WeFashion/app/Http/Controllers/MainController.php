<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Livewire\WithPagination;

class MainController extends Controller
{
    use WithPagination;
    protected $paginate = 6;
    public function __construct(){

        // méthode pour injecter des données à une vue partielle
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }
    //nous disons à laravel que le thème de notre pagination est de bootstrap
    protected $paginationTheme = "bootstrap";
    public function index(){
        $products = Product::latest()->paginate(6);
        $numberProducts = count(Product::all());
        //dd($produits);
        return view('front.index', ['products'=> $products, 'numberProducts' => $numberProducts]);

    }
    public function showProductBySolde(){
        //
        $products = Product::with('picture')->where('status', 'Solde');
        $numberProducts = count($products->get());
        $products = $products->paginate($this->paginate);

        return view('front.solde', ['products' => $products, 'numberProducts' => $numberProducts]);
    }

    public function showProductByCategorie(int $id){
        // on récupère le modèle genre.id

        $category = Category::find($id);

        $products = Product::where('category_id', $id);
        $numberProducts = count($products->get());
        $products = $products->paginate($this->paginate);

        return view('front.category', ['products' => $products, 'category' => $category, 'numberProducts' => $numberProducts]);
    }


    public function show(Request $request){

        //on recupère un produit en fonction de la valeur passée en paramètres
        $product = Product::find($request->id);
        $sizes = $product->sizes->toArray();
        //dd($produit);

        return view('front.show', ['product'=>$product, 'sizes' => $sizes] );
    }

}
