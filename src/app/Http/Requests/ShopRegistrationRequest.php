<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'shop_name' => 'required|string',
            'shop_description' => 'required|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => '店舗名は入力必須です',
            'shop_name.string' => '店舗名を文字列で入力してください',
            'shop_description.required' => '店舗詳細は入力必須です',
            'shop_description.string' => '店舗詳細は文字列で入力してください',
            'shop_description.string' => '店舗詳細は200文字以内で入力してください',
        ];
    }
}
