<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => ['required', 'regex:/^[^\s]+$/', 'unique:users'],
            'image' => 'required|image',
            'password' => ['required','min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages():array
    {
        return [
            'username.regex' => 'The username field should not contain any spaces.',
            'password.regex' => 'The password filed must contain a lowercase, uppercase, a symbol.',
        ];
    }
}
