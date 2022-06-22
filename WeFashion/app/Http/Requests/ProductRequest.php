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
			'title'       => 'required|min:5',
			'description' => 'required|string',
			
			'picture'     => 'image|max:1000',
		];
	}

	public function messages()
	{
		return [
			'description.required' => 'La description du produit est obligatiore !',
			'description.string'   => 'La description doit être un texte.',
			'title.required'       => 'Le titre du livre est obligatiore !',
			'title.min'            => 'Le titre doit faire 5 caractères minimum.',
		];
	}
}
