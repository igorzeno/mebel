<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3,max:255',
            'desc' => 'nullable|max:255',
            'price' => 'nullable|numeric|between:0,1000',
        ];
    }
}

