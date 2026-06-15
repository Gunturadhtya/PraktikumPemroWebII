<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'nama_member' => ['required', 'string', 'max:250'],
            'nomor_member' => ['required', 'string', 'max:15'],
            'alamat' => ['nullable', 'string'],
            'tgl_mendaftar' => ['required', 'date'],
            'tgl_terakhir_bayar' => ['nullable', 'date'],
        ];
    }
}
