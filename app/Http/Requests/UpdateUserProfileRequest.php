<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
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
            'name' => 'sometimes|regex:/^[\pL\s\-]+$/u|max:150',
            'email' => [
                'sometimes',
                'email:rfc,filter',
                Rule::unique('users', 'email')
                    ->ignore(request()->route('profile'))
            ],
            'username' => [
                'sometimes',
                'alpha_dash',
                Rule::unique('users', 'username')
                    ->ignore(request()->route('profile')),
                'max:50'
            ],
            'headline' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 6) {
                        $fail('Your headline should not be more than 6 words!');
                    }
                }
            ],
            'phone' => 'nullable|numeric|min:10|max:15',
            'about' => 'nullable|string|max:255',
            'postal' => 'nullable|string|max:10',
            'city' => 'nullable|string|max:100',
            'gender' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,gif,png,jpg|max:1024',
            'country' => [
                'string',
                Rule::in(get_country_list())
            ],
            'current_password' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail('Your current password does not match!');
                    }
                }
            ],
            'password' => [
                'sometimes',
                'required_with:current_password',
                'confirmed',
                Password::min(8)->mixedCase()
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'Please fill only letters'
        ];
    }
}
