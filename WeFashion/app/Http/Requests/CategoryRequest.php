<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
			'name'       => 'required', //On exige l'obligation de la saisie du champ et avec 5 caractères au minimum

		];
    }
    public function messages()
    {
        return [

			'name.required'       => 'Le nom de la categorie est obligatiore !',

		];
    }
}
