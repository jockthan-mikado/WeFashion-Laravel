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
        //on recupère tous les livres avec une pagination de 10 livres en fichage par page
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
        //On recupère tous les genres dans la table genre par ordre alphabétique
		$categoryProduct = Category::orderBy('name')->get();
        //on retourne ses informations recupérées dans le fichier create.blade.php
		return view('back.products.create', compact('sizes', 'categoryProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ProductRequest  $productResquest
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $productResquest)

    {
        $product =Product::create($productResquest->validated());  //on crée un book en fonction du formulaire
        $product->sizes()->attach($productResquest->sizes); //on fait une une laison d'un ou des auteurs qui sont en relation avec la table book qui vient d'etre créer grace aux données du formulaire
        if (!empty($productResquest->picture)) { //on verifie si une image n'est pas vide dans le formulaire
            //Storage::put()
            $link =$productResquest->picture->store('images');//il crée un dossier images en plus
            //on extrait le nom de l'image dans le le chemin $link en utilisant deux fonctions php
            //la fonction strrpos()  nous renvoie la position de l'occurrence d'une chaine .dans notre exemple on cherche la position de '/' dans la chaine $link et on fait plus(+) 1
            //la fonction substr () : Renvoie une partie d'une chaîne. dans notre cas la fonction substr supprime un  nombre de caracters au debut de la chaine $link . c'est nombre provient de ce qui est retourné par la fonction strrpos()
            $imgName = substr($link,strrpos($link ,'/')+1);
            $product->picture()->create([//on crée une image dans la table picture
                'link'=>$imgName,
                'title'=>$productResquest->title_image,
            ]);
            // $bookResquest->picture->store('./'); //on stock l'image dans la racine
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
        //pour recuperer les infos d'un livre dont l'id est passé en paramètre
        $product = Product::find($id);
        //on renvoie la vue  du show
        return view('back.products.show',['product'=>$product]);
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
		// Mettre à jour les données
		$product->update($productRequest->all());
		$product->sizes()->sync($productRequest->sizes);
		//dd($book, $book->authors);

        // on mets à jour le title de l'image (pas besoin de devoir renvoyer une image pour ça)
		$product->picture()->update(['title' => $productRequest->title_image]);

		// on mets à jour l'image si une nouvelle à été envoyée
		if (!empty($productRequest->picture)) {
			$link    = $productRequest->picture->store('images');
			$imgName = substr($link, strrpos($link, '/') + 1);

			Storage::delete('images/'.$oldImg);
			// if (file_exists(public_path('images/'.$oldImg))) {
			// 	unlink(public_path('images/'.$oldImg));
			// }

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
