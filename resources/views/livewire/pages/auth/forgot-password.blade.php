<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layout')] class extends Component
{
    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
            return;
        }

        $this->reset('email');
        session()->flash('status', __($status));
    }
}; ?>


<div class="mx-auto flex items-center justify-center content-center mt-10">
    <div class="w-full max-w-xl bg-gray-800 text-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-center mb-6">
            <a href="/" class="flex items-center">
                <img src="{{ asset('storage/logo.jpg') }}"
                     alt="logo"
                     class="h-14 w-36 rounded-md object-cover">
            </a>
        </div>
        <h1 class="text-2xl font-bold mb-6 text-center">Forgot Password</h1>

        <p class="text-gray-300 text-sm mb-6">
            Enter your email address and we will send you a link to reset your password.
        </p>

        <x-auth-session-status class="mb-4 text-green-400" :status="session('status')" />

        <form wire:submit="sendPasswordResetLink" class="space-y-5">

            <div>
                <x-input-label for="email" value="Email" class="text-white" />
                <x-text-input wire:model="email"
                              id="email"
                              type="email"
                              class="mt-1 w-full text-black"
                              required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <button class="w-full bg-orange-600 hover:bg-orange-700 py-2 rounded text-white font-semibold">
                Send Reset Link
            </button>

            <p class="text-center mt-4 text-gray-300">
                Remember your password?
                <a href="{{ route('login') }}" class="text-orange-400 hover:text-orange-300">Log in</a>
            </p>

        </form>
    </div>
</div>


