<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
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
            'judul_buku'   => ['required', 'string'],
            'penulis'      => ['required', 'string'],
            'penerbit'     => ['required', 'string'],
            'tahun_terbit' => ['required', 'integer', 'gt:1800', 'lt:2024'],
        ];
    }

    public function messages(): array
    {
        return [
            'tahun_terbit.gt' => 'Tahun terbit harus lebih besar dari 1800.',
            'tahun_terbit.lt' => 'Tahun terbit harus lebih kecil dari 2024.',
        ];
    }
}
