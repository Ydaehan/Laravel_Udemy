<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'name' => ['required', 'max:20', 'min:2'],
			'email' => ['required', 'email'],
			'subject' => ['required', 'max:255'],
			'message' => ['required', 'max:5000'],
		];
	}

	function messages()
	{
		return [
			'name.required' => '名前は必須です',
			'name.max' => '名前は20文字以内で入力してください',
			'name.min' => '名前は2文字以上で入力してください',
			'email.required' => 'メールアドレスは必須です',
			'email.email' => 'メールアドレスの形式で入力してください',
		];
	}
}
