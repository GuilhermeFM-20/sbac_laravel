<?php

use App\Livewire\Auth\Login;
use App\Livewire\ItemManager;
use App\Models\Items;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});


Route::middleware('auth')->group(function () {
    Route::redirect('/', '/dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/items', ItemManager::class)->name('items');
    Route::get('/items/create', fn() => view('livewire.item-create'))->name('items.create');
    Route::post('/items', function (StoreItemRequest $request) {
        Items::create($request->validated());

        return redirect()->route('items')->with('success', "Item '$request->title' registrado com sucesso!");
    })->name('items.store');

    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
});
