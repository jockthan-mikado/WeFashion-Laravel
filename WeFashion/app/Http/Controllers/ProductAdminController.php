<?php

namespace App\Http\Controllers;
use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //we retrieve all the products with a pagination of 15 products per page
        $products= Product::latest()->paginate(15);
        return view('back.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //on recupère toutes les tailles dans la table sizes
        $sizes    = Size::All();

		$categoryProduct = Category::orderBy('name')->get();
        //we return the information retrieved in the create.blade.php file
		return view('back.products.create', compact('sizes', 'categoryProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ProductRequest  $productResquest
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $productResquest)

    {   //we create a product based on the data form in the form
        $product =Product::create($productResquest->validated());
        $product->sizes()->attach($productResquest->sizes);
        if (!empty($productResquest->picture)) {

            $link =$productResquest->picture->store('images');

            $imgName = substr($link,strrpos($link ,'/')+1);
            $product->picture()->create([
                'link'=>$imgName,
                'title'=>$productResquest->title_image,
            ]);

        }
        return redirect()->route('products.index')->with('message','Produit ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //We retrieve the information of a book whose id is passed as a paramete
        $product = Product::find($id);
        $sizes = Size::All();
        $checkedSizes = [];
		foreach ($product->sizes as $value) {
			$checkedSizes[] = $value->id;
		}

        return view('back.products.show',['product'=>$product ,'sizes'=> $sizes,'checkedSizes'=>$checkedSizes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product   = Product::find($id);
		$sizes = Size::All();
        $categoryProduct = Category::orderBy('name')->get();

        $checkedSizes = [];
		foreach ($product->sizes as $value) {
			$checkedSizes[] = $value->id;
		}
        //dd($product->visibility);

		return view('back.products.edit', compact('product', 'sizes', 'checkedSizes', 'categoryProduct'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $productRequest, Product $product)
    {

		$oldImg = $product->picture->link;
		//Update form data
		$product->update($productRequest->all());
		$product->sizes()->sync($productRequest->sizes);

		$product->picture()->update(['title' => $productRequest->title_image]);

		if (!empty($productRequest->picture)) {
			$link    = $productRequest->picture->store('images');
			$imgName = substr($link, strrpos($link, '/') + 1);

			Storage::delete('images/'.$oldImg);


			$product->picture()->update([
				'link' => $imgName,
			]);
		}

		return redirect()->route('products.index')->with('message', 'Modification avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Product $product)
    {
        $product->delete();

		return redirect()->back()->with('message', 'Produit supprimé avec succès!');
    }
}
