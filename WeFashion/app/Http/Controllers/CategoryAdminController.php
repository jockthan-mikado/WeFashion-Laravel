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
        return view('back.Category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //we retrieve all the categories in the categories table
         $categories    = Category::All();

         return view('back.Category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\CategoryRequest  $categoryResquest
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $categoryResquest)
    {
       //we create a category according to the data entered in the form
        Category::create($categoryResquest->validated());
        return redirect()->route('categories.index')->with('message','Produit ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //function to display a category
    public function show($id)
    {
        $category = Category::find($id);

        return view('back.Category.show',['category'=>$category]);
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

        return view('back.Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //category data modification function
    public function update(CategoryRequest $categoryResquest, Category $category)
    {

        $category->update($categoryResquest->all());

        return redirect()->route('Category.index')->with('message', 'Modification avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //delete category function
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('message', 'Category supprimé avec succès!');
    }
}
