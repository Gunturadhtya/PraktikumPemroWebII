<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePeminjamanRequest extends FormRequest
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
            'id_member' => ['required', 'exists:members,id_member'],
            'id_buku' => ['required', 'exists:buku,id_buku'],
            'tgl_pinjam' => ['required', 'date'],
            'tgl_kembali' => ['nullable', 'date', 'after_or_equal:tgl_pinjam'],
        ];
    }
}
