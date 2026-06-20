<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected array $rules = [
        'email'    => 'required|email',
        'password' => 'required|min:6',
    ];

    protected array $messages = [
        'email.required'    => 'O e-mail é obrigatório.',
        'email.email'       => 'Informe um e-mail válido.',
        'password.required' => 'A senha é obrigatória.',
        'password.min'      => 'A senha deve ter pelo menos 6 caracteres.',
    ];

    public function login()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', 'E-mail ou senha incorretos.');
            return;
        }

        session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.guest');
    }
}
