<?php

namespace App\Livewire;

use Livewire\Component;

class ItemManager extends Component
{
    public string $search = '';
    public string $newItemName = '';
    public function saveItem(): void
    {
        $this->validate([
            'newItemName' => 'required|min:3',
        ]);

        session()->flash('success', "Item '{$this->newItemName}' successfully added!");

        $this->reset('newItemName');
    }

    /**
     * Renderiza o HTML dentro do layout master
     */
    public function render()
    {
        $items = collect([
            (object)['id' => 1, 'name' => 'University Notebook', 'created_at' => now()],
            (object)['id' => 2, 'name' => 'Blue Pen', 'created_at' => now()],
        ]);

        if ($this->search) {
            $items = $items->filter(function($item) {
                return str_contains(strtolower($item->name), strtolower($this->search));
            });
        }

        return view('livewire.item-manager', [
            'items' => $items
        ])->layout('layouts.admin');
    }
}
