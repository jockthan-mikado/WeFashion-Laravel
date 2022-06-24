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
			'category_id'    => 'integer',//On dit un champ entier
			'sizes'   => 'required|min:1',
			'sizes.*'   => 'integer|required', //On dit un tableau des entiers
			'visibility'      => 'in:Published,Unpublished', //On dit on attend comme données in:Published,Unpublished
			'status'      => 'in:Solde,Standard',
			'picture'     => 'image|max:1000|required', // On attend une image et la taille maximale 1000ko
		];
    }
    public function messages()
    {
        return [
			'description.required' => 'La description du produit est obligatiore !',
			'description.string'   => 'La description doit être un texte.',
			'name.required'       => 'Le nom du produit est obligatiore !',
			'name.min'            => 'Le nom doit faire 5 caractères minimum et 100 caractères maximum.',
            'sizes.required'              => 'La taille du produit est obligatiore !',
            'picture.required'             => 'La photo du produit est obligatiore !',
		];
    }
}
