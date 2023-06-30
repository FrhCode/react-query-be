<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class StorePostRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'title' => "required",
			'author' => "required",
			'category_id' => "required",
		];
	}

	/**
	 * Handle a failed validation attempt.
	 */
	protected function failedValidation(Validator $validator)
	{
		throw new HttpResponseException(response()->json([
			'errors' => $validator->errors(),
		], Response::HTTP_UNPROCESSABLE_ENTITY));
	}
}
