<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$products = Product::paginate(15);

		return view('back.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes    = Size::All();
		$categoryProduct = Category::orderBy('name')->get();

		return view('back.books.create', compact('sizes', 'categoryProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $productRequest)
    {
        $product = Product::create($productRequest->all());
		$product->sizes()->attach($productRequest->authors);

		if (!empty($productRequest->picture)) {
			$link = $productRequest->picture->store('images');
			// On récupère juste le nom du fichier :
			$imgName = substr($link, strrpos($link, '/') + 1);

			$product->picture()->create([
				'link'  => $imgName,
				'title' => $productRequest->title_image,
			]);
		}

		return redirect()->route('back.products.index')->with('message', 'Produit ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

		return view('back.products.create', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
