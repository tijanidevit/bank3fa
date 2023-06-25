<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransferFundRequest extends FormRequest
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
            'bank_code' => ['required','exists:banks,code'],
            'account_number' => ['required'],
            'amount' => ['required'],
            'account_name' => ['required','string'],
        ];
    }

    public function messages():array
    {
        return [
            'bank.exists' => 'Bank not found',
        ];
    }
}
