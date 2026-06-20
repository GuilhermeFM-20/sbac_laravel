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
            'form.title'              => 'required|string|max:255',
            'form.author'             => 'nullable|string|max:255',
            'form.isbn'               => 'nullable|string|max:50',
            'form.publisher'          => 'nullable|string|max:255',
            'form.publication_year'   => 'nullable|integer|min:1000|max:' . date('Y'),
            'form.category'           => 'nullable|string|max:100',
            'form.description'        => 'nullable|string',
            'form.quantity'           => 'required|integer|min:0',
            'form.available_quantity' => 'required|integer|min:0',
            'form.shelf_location'     => 'nullable|string|max:100',
            'form.tomb_id'            => 'nullable|string|max:100',
            'form.status'             => 'required|in:available,unavailable,maintenance',
        ];
    }

    public function messages(): array
    {
        return [
            'form.title.required'              => 'O título é obrigatório.',
            'form.title.max'                   => 'O título não pode ter mais de 255 caracteres.',
            'form.publication_year.integer'    => 'O ano de publicação deve ser um número.',
            'form.publication_year.min'        => 'O ano de publicação é inválido.',
            'form.publication_year.max'        => 'O ano de publicação não pode ser maior que o ano atual.',
            'form.quantity.required'           => 'A quantidade total é obrigatória.',
            'form.quantity.integer'            => 'A quantidade deve ser um número inteiro.',
            'form.quantity.min'                => 'A quantidade não pode ser negativa.',
            'form.available_quantity.required' => 'A quantidade disponível é obrigatória.',
            'form.available_quantity.integer'  => 'A quantidade disponível deve ser um número inteiro.',
            'form.available_quantity.min'      => 'A quantidade disponível não pode ser negativa.',
            'form.status.required'             => 'O status é obrigatório.',
            'form.status.in'                   => 'O status selecionado é inválido.',
        ];
    }

    public function validated($key = null, $default = null)
    {
        return data_get(parent::validated(), 'form', []);
    }
}