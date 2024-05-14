<?php

namespace App\Http\Requests\ExperimentFunction;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
        switch ($this->route()->getActionMethod()) {
            case 'testStorage':
                return [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
            default:
                return [];
        }
    }
}
