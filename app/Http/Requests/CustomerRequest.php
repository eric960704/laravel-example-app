<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            case 'createCustomer':
                return [
                    'customerName' => 'required|string|max:50',
                    'customerName' => 'required|string|max:50',
                    'contactLastName' => 'required|string|max:50',
                    'contactFirstName' => 'required|string|max:50',
                    'phone' => 'required|string|max:50',
                    'addressLine1' => 'required|string|max:50',
                    'addressLine2' => 'nullable|string|max:50',
                    'city' => 'required|string|max:50',
                    'state' => 'nullable|string|max:50',
                    'postalCode' => 'nullable|string|max:50',
                    'country' => 'nullable|string|max:50',
                    'salesrepemployeenumber' => 'required|integer|max_digits:10',
                    'creditLimit' => 'required|decimal:2|max:8',
                ];
            case 'updateCustomer':
                return [
                    'customerName' => 'string|max:50',
                    'contactLastName' => 'string|max:50',
                    'contactFirstName' => 'string|max:50',
                    'phone' => 'string|max:50',
                    'addressLine1' => 'string|max:50',
                    'addressLine2' => 'string|max:50',
                    'city' => 'string|max:50',
                    'state' => 'string|max:50',
                    'postalCode' => 'string|max:50',
                    'country' => 'string|max:50',
                    'salesrepemployeenumber' => 'integer|max_digits:10',
                    'creditLimit' => 'decimal:2|max:8',
                ];
            default:
                return [];
        }

    }
}
