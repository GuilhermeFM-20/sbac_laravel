<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ItemManager; // Changed from Items to ItemManager for clarity

Route::get('/', function () {
    return view('dashboard');
});

// Using the correct ::class syntax
Route::get('/items', ItemManager::class);
