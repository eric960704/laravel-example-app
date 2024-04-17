<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return match ($this->route()->getActionMethod()) {
            'createUser' =>  [
                'name' => 'required|string|unique:users|max:10',
                'email' => 'required',
                'password' => 'required',  
            ],
            'updateUser' =>  [
                'name' => 'string|max:10',
            ],
        };
    }
}
