<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:150'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function getData(): array
    {
        $data             = $this->validated();
        $data['password'] = bcrypt($data['password']);

        return $data;
    }
}
