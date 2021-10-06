<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
            'name' => 'string|max:150',
            'email' => 'string|email|max:255|unique:users',
            'username' => 'alpha_dash|max:30|unique:users',
            'phone' => 'string|max:15',
            'bio' => 'string|max:255',
            'postal' => 'string|max:10',
            'city' => 'string|max:100',
            'gender' => 'string'
            'country' => [
                'string',
                Rule::in_array(get_country_list())
            ],
            'current_password' => [
                'string',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail('Your current password does not match!');
                    }
                }
            ]
            'password' => [
                'required_with:current_password',
                'confirmed',
                Password::min(8)->mixedCase()
            ]
        ];
    }
}
