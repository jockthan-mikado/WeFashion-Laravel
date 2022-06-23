<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
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
        
        $products = Product::paginate(15);
        return view('back.products.index' , ['products'=> $products]);
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

		return view('back.products.create', compact('sizes', 'categoryProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(ProductRequest $productRequest)
    public function store(Request $request)
    {
        
         Validator::make($request->all(), [
            'name'        => 'required|min:5',
			'description' => 'required|string',
            'price'        => 'float',
			'category_id' => 'integer',
			'sizes' 	  => 'required',
			'status'      => 'in:Published,Unpublished',
			'picture'     => 'image|max:1000'
        ]);
        
        $product = Product::create($request->all());
        $product->sizes()->attach($request->sizes);
         // image
         $im = $request->file('picture');
         
         // si on associe une image à un produit
         if (!empty($im)) {
 
             $link = $request->file('picture')->store('images');
 
             // mettre à jour la table picture pour le lien vers l'image dans la base de données;
             $product->picture()->create([
                 'link' => $link,
                 'title' => $request->title_image?? $request->title_image
             ]);
         }
        return redirect()->route('products.index')->with('message', 'Produit ajouté !');
    

        // $product = Product::create($productRequest->all());
		// $product->sizes()->attach($productRequest->sizes);

		// if (!empty($productRequest->picture)) {
		// 	$link = $productRequest->picture->store('images');
		// 	// On récupère juste le nom du fichier :
		// 	$imgName = substr($link, strrpos($link, '/') + 1);

		// 	$product->picture()->create([
		// 		'link'  => $imgName,
		// 		'title' => $productRequest->title_image,
		// 	]);
		// }

		// return redirect()->route('products.index')->with('message', 'Produit ajouté !');
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

		return view('back.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $product       = Product::find($id);
		$sizes    = Size::All();
		$categoryProduct = Category::orderBy('name')->get(); // tri par nom => ne marche pas sur All()

		$checkedSizes = [];
		foreach ($product->sizes as $value) {
			$checkedSizes[] = $value->id;
		}
        
		// return view('back.books.edit', ['book' => $book, 'authors' => $authors]);
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
        // Valider/vérifier les données
		// $this->validate($request, [
		// 	'title'       => 'required',
		// 	'description' => 'required|string',
		// 	// 'genre_id' => 'integer',
		// 	'authors'   => 'required',
		// 	'authors.*' => 'integer',
		// ]);
		// Ancienne image :
		$oldImg = $product->picture->link;

		// Mettre à jour les données
		$product->update($productRequest->all());
		$product->sizes()->sync($productRequest->sizes);

		// on mets à jour le title de l'image (pas besoin de devoir renvoyer une image pour ça)
		$product->picture()->update(['title' => $productRequest->title_image]);

		// on mets à jour l'image si une nouvelle à été envoyée
		if (!empty($productRequest->picture)) {
			$link    = $productRequest->picture->store('images');
			$imgName = substr($link, strrpos($link, '/') + 1);

			Storage::delete('images/'.$oldImg);
			// if (file_essxists(public_path('images/'.$oldImg))) {
			// 	unlink(public_path('images/'.$oldImg));
			// }

			$product->picture()->update([
				'link' => $imgName,
			]);
		}

		return redirect()->route('products.index')->with('message', 'Modification avec Succès');
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

        return redirect()->back()->with('message', 'Produit supprimé  avec Succès!');
    }
} 
