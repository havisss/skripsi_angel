<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'principal_amount' => [
                'required',
                'numeric',
                'min:1000000',
                'max:25000000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'principal_amount.max' => 'Pengajuan pinjaman maksimal adalah Rp 25.000.000.',
            'principal_amount.min' => 'Pengajuan pinjaman minimal adalah Rp 1.000.000.',
        ];
    }
}
