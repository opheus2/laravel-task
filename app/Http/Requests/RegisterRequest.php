<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'alpha_dash', 'max:30', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
            'confirm_age' => ['required', 'boolean']
        ];
    }

    public function messages()
    {
        return [
            'username.unique' => 'Whoops! That username has been selected.',
            'confirm_age.required' => 'Sorry you must be atleast 18 years of age.'
        ];
    }
}
