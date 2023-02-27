<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyOtpRequest extends FormRequest
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
            'otp' => [
                'required',
                Rule::exists('user_otps')->where('user_id', auth()->user()->id),
            ],
        ];
    }

    public function messages():array
    {
        return [
            'otp.exists' => 'Invaild OTP.',
        ];
    }
}
