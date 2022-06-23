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
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		// https://laravel.com/docs/9.x/validation#available-validation-rules

		return [
			'name'        => 'required|min:5',
			'description' => 'required|string',
            'price'        => 'float',
			'category_id' => 'integer',
			'sizes' 	  => 'required',
			'status'      => 'in:Published,Unpublished',
			'picture'     => 'image|max:1000'
		];
	}

	public function messages()
	{
		return [
			'description.required' => 'La description du produit est obligatiore !',
			'description.string'   => 'La description doit être un texte.',
			'name.required'       => 'Le nom du produit est obligatiore !',
			'name.min'            => 'Le nom doit faire 5 caractères minimum.',
		];
	}
}
