<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'name'       => 'required|between:5,100', //On exige l'obligation de la saisie du champ et avec 5 caractères au minimum
			'description' => 'required|string',//On exige l'obligation de la saisie du champ avec des chaines caractères (string)
			'price'        => 'required',
			'category_id'    => 'integer|required',//On dit un champ entier
			'sizes'   => 'required|min:1',
			'sizes.*'   => 'integer|required', //On dit un tableau des entiers
			'visibility'      => 'required|in:Publié,Non-Publié', //On dit on attend comme données in:Published,Unpublished
			'status'      => 'required|in:Solde,Standard',
			'picture'     => 'image|max:1000|required', // On attend une image et la taille maximale 1000ko
            'reference'   =>  'required|min:16|max:16'
        ];
    }
    public function messages()
    {
        return [
			'description.required' => 'La description du produit est obligatoire !',
			'description.string'   => 'La description doit être un texte.',
			'name.required'        => 'Le nom du produit est obligatoire !',
			'name.min'             => 'Le nom doit faire 5 caractères minimum et 100 caractères maximum.',
            'sizes.required'       => 'La taille du produit est obligatoire !',
            'picture.required'     => 'La photo du produit est obligatoire !',
            'visibility.required'  => 'La visibilité du produit est obligatoire !',
            'status.required'      => 'L\' état du produit est obligatoire !',
            'reference.required'   => 'La référence du produit est obligatoire !',
            'reference.min'        => 'La référence du produit doit avoir 16 caractères !',
            'reference.max'        => 'La référence du produit doit avoir 16 caractères !',
            'category_id.required' => 'La categorie du produit est obligatoire !',
            'price.required'       => 'Le prix du produit est obligatoire !',


		];
    }
}
