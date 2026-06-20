<?php

namespace App\Livewire;

use App\Models\Items;
use Livewire\Component;

class ItemManager extends Component
{
    public string $mode = 'list';
    public string $search = '';
    public ?int $itemId = null;

    public array $form = [
        'title'              => '',
        'author'             => '',
        'tomb_id'            => '',
        'publisher'          => '',
        'publication_year'   => '',
        'category'           => '',
        'description'        => '',
        'quantity'           => 1,
        'available_quantity' => 1,
        'shelf_location'     => '',
        'status'             => 'available',
    ];

    public function mount(string $mode = 'list', ?Items $item = null): void
    {
        $this->mode = $mode;

        if ($item) {
            $this->itemId = $item->id;
            $this->form   = $item->only(array_keys($this->form));
        }
    }

    public function save(): void
    {
        $validated = $this->validate($this->rules(), $this->messages());

        Items::create($validated['form']);

        session()->flash('success', "Item '{$this->form['title']}' registrado com sucesso!");

        $this->redirect(route('items'), navigate: true);
    }

    public function update(): void
    {
        $validated = $this->validate($this->rules(), $this->messages());

        Items::findOrFail($this->itemId)->update($validated['form']);

        session()->flash('success', "Item '{$this->form['title']}' atualizado com sucesso!");

        $this->redirect(route('items'), navigate: true);
    }

    public function delete(int $id): void
    {
        Items::findOrFail($id)->delete();

        session()->flash('success', "Item excluído com sucesso!");

        $this->redirect(route('items'), navigate: true);
    }

    public function render()
    {
        $view = match ($this->mode) {
            'create' => view('livewire.item-create'),
            'edit'   => view('livewire.item-edit'),
            default  => view('livewire.item-manager', [
                'items' => Items::when(
                    $this->search,
                    fn($q) => $q->where('title', 'like', "%{$this->search}%")
                )->get(),
            ]),
        };

        return $view->layout('layouts.admin');
    }

    private function rules(): array
    {
        return [
            'form.title'              => 'required|string|max:255',
            'form.author'             => 'nullable|string|max:255',
            'form.tomb_id'            => 'nullable|string|max:100',
            'form.publisher'          => 'nullable|string|max:255',
            'form.publication_year'   => 'nullable|integer|min:1000|max:' . date('Y'),
            'form.category'           => 'nullable|string|max:100',
            'form.description'        => 'nullable|string',
            'form.quantity'           => 'required|integer|min:0',
            'form.available_quantity' => 'required|integer|min:0',
            'form.shelf_location'     => 'nullable|string|max:100',
            'form.status'             => 'required|in:available,unavailable,maintenance',
        ];
    }

    private function messages(): array
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
}
