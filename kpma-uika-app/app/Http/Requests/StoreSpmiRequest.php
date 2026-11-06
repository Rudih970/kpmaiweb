<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpmiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'cycle_category' => [
                'required',
                'string',
                'in:dokumen_spmi,pelaksanaan,evaluasi,pengendalian,peningkatan',
            ],
            'file' => ['required', 'file', 'mimes:pdf', 'max:10240'], // PDF max 10MB (10240 KB)
            'description' => ['nullable', 'string', 'max:1000'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul dokumen SPMI wajib diisi.',
            'cycle_category.required' => 'Kategori siklus PPEPP wajib dipilih.',
            'cycle_category.in' => 'Kategori siklus PPEPP tidak valid.',
            'file.required' => 'File dokumen PDF wajib diunggah.',
            'file.mimes' => 'Format file harus berformat PDF.',
            'file.max' => 'Ukuran file PDF maksimal adalah 10 MB.',
        ];
    }
}
