<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'              => 'required|string|max:255',
            'author'             => 'nullable|string|max:255',
            'isbn'               => 'nullable|string|max:50',
            'publisher'          => 'nullable|string|max:255',
            'publication_year'   => 'nullable|integer|min:1000|max:' . date('Y'),
            'category'           => 'nullable|string|max:100',
            'description'        => 'nullable|string',
            'quantity'           => 'required|integer|min:0',
            'available_quantity' => 'required|integer|min:0',
            'shelf_location'     => 'nullable|string|max:100',
            'status'             => 'required|in:available,unavailable,maintenance',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'              => 'O título é obrigatório.',
            'title.max'                   => 'O título não pode ter mais de 255 caracteres.',
            'publication_year.integer'    => 'O ano de publicação deve ser um número.',
            'publication_year.min'        => 'O ano de publicação é inválido.',
            'publication_year.max'        => 'O ano de publicação não pode ser maior que o ano atual.',
            'quantity.required'           => 'A quantidade total é obrigatória.',
            'quantity.integer'            => 'A quantidade deve ser um número inteiro.',
            'quantity.min'                => 'A quantidade não pode ser negativa.',
            'available_quantity.required' => 'A quantidade disponível é obrigatória.',
            'available_quantity.integer'  => 'A quantidade disponível deve ser um número inteiro.',
            'available_quantity.min'      => 'A quantidade disponível não pode ser negativa.',
            'status.required'             => 'O status é obrigatório.',
            'status.in'                   => 'O status selecionado é inválido.',
        ];
    }
}