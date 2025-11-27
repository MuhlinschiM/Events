<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layout')] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
};

?>

<div class="mx-auto flex items-center justify-center content-center mt-10"> 
    <div class="w-full max-w-xl bg-gray-800 text-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-center mb-6">
            <a href="/" class="flex items-center">
                <img src="{{ asset('storage/logo.jpg') }}"
                     alt="logo"
                     class="h-14 w-36 rounded-md object-cover">
            </a>
        </div>

        <h1 class="text-2xl font-bold mb-6 text-center">LOGIN</h1>

        <form wire:submit="login" class="space-y-5">
            <div>
                <x-input-label for="email" value="Email" class="text-white" />
                <x-text-input wire:model="form.email" id="email" type="email" class="mt-1 w-full text-black"
                              required autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password" value="Password" class="text-white"/>
                <x-text-input wire:model="form.password" id="password" type="password" class="mt-1 w-full text-black"
                              required autocomplete="current-password"/>
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <div class="flex justify-between items-center">
                <label class="flex items-center space-x-2">
                    <input wire:model="form.remember" type="checkbox" class="rounded">
                    <span class="text-sm text-gray-300">Remember me</span>
                </label>

                <a href="{{ route('password.request') }}" class="text-sm text-orange-400">Forgot password?</a>
            </div>

            <button class="w-full bg-orange-600 hover:bg-orange-700 py-2 rounded text-white font-semibold">
                Log in
            </button>

            <p class="text-center mt-4 text-gray-300">
                No account?
                <a href="{{ route('register') }}" class="text-orange-400">Create</a>
            </p>
        </form>
    </div>
</div>

