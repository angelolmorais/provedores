<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'business' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'activity' => 'required',
            'country' => 'required',
            'city' => 'required',
            'telephone' => 'required',
            'state_province' => 'required',
            'address' => 'required',
            'company' => 'required',
            'cnpj' => 'required_if:company,N',
            'nit' => 'required_if:company,I',
            'privacy_policy' => 'required|accepted',
        ];
    }
}
