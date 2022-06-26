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

        // method to inject data to a partial view
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all(); // we get an associative array
            $view->with('categories', $categories ); // we pass the data to the view
        });
    }

    protected $paginationTheme = "bootstrap";
    public function index(){
        $products = Product::latest()->paginate(6);
        $numberProducts = count(Product::all());

        return view('front.index', ['products'=> $products, 'numberProducts' => $numberProducts]);

    }
    public function showProductBySolde(){

        $products = Product::with('picture')->where('status', 'Solde');
        $numberProducts = count($products->get());
        $products = $products->paginate($this->paginate);

        return view('front.solde', ['products' => $products, 'numberProducts' => $numberProducts]);
    }

    public function showProductByCategorie(int $id){
        //we retrieve the category model according to the id passed in parameters

        $category = Category::find($id);

        $products = Product::where('category_id', $id);
        $numberProducts = count($products->get());
        $products = $products->paginate($this->paginate);

        return view('front.category', ['products' => $products, 'category' => $category, 'numberProducts' => $numberProducts]);
    }


    public function show(Request $request){

        //we retrieve a product according to the value passed in parameters
        $product = Product::find($request->id);
        $sizes = $product->sizes->toArray();


        return view('front.show', ['product'=>$product, 'sizes' => $sizes] );
    }

}
