<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenewPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5'
        ];
    }
}
