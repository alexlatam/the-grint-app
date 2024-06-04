<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreAdvertisementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|alpha:ascii|max:45',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
