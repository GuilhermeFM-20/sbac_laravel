<?php

use App\Livewire\Auth\Login;
use App\Livewire\ItemManager;
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
    Route::get('/items/create', ItemManager::class)->name('items.create')->defaults('mode', 'create');
    Route::get('/items/{item}/edit', ItemManager::class)->name('items.edit')->defaults('mode', 'edit');

    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
});
