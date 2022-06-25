<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::paginate(15);
        return view('back.products.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //on recupère toutes les tailles dans la table sizes
         $categories    = Category::All();

         return view('back.products.create', compact('categories', 'categoryProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\CategoryRequest  $categoryResquest
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $categoryResquest)
    {
        $product =Category::create($categoryResquest->validated());  //on crée un book en fonction du formulaire
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
        $category = Category::find($id);
        //on renvoie la vue  du show
        return view('back.products.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category   = Category::find($id);

        return view('back.products.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $categoryResquest, Category $category)
    {

        $category->update($categoryResquest->all());

        return redirect()->route('products.index')->with('message', 'Modification avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('message', 'Produit supprimé avec succès!');
    }
}
