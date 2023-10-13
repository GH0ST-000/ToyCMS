<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id'=>['required'],
            'name'=>['required'],
            'price'=>['required'],
            'description'=>['required'],
            'image_id'=>['required'],
            'qty'=>['required'],
            'sku'=>['required'],
            'tags'=>['sometimes'],
            'discount'=>['sometimes'],
            'rating'=>['sometimes'],
            'product_status'=>['sometimes'],

        ];
    }
}
