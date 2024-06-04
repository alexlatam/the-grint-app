<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class AuthRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:45',
            'lastname' => 'sometimes|string|max:45',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }
}
