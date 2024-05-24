<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => __('messages.current_password_required'),
            'new_password.required' => __('messages.new_password_required'),
            'new_password.min' => __('messages.new_password_min'),
            'new_password.confirmed' => __('messages.new_password_confirmed'),
        ];
    }
}
