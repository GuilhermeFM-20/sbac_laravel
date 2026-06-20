<?php

namespace App\Livewire;

use App\Models\Items;
use Livewire\Component;

class ItemManager extends Component
{
    public string $search = '';
    public string $name = '';
    public string $actor = '';
    public string $newItemName = '';
    public function save(): void
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
        $items = Items::all();

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
