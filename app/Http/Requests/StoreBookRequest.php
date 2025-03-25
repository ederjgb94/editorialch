<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:books,isbn',
            'publication_date' => 'required|date',
            'edition' => 'required|string|max:50',
            'partner' => 'required|string|max:255',
            'volume' => 'nullable|integer|min:1',
            'pages' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'cover' => 'nullable|url|max:255',
        ];
    }
}
