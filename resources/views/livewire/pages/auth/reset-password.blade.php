<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layout')] class extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(string $token): void
    {
        $this->token = $token;
        $this->email = request()->string('email');
    }

    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));
            return;
        }

        Session::flash('status', __($status));
        $this->redirectRoute('login', navigate: true);
    }
}; ?>


<div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-gray-800 text-white p-8 rounded-lg shadow-lg">

        <h1 class="text-2xl font-bold mb-6 text-center">Reset Password</h1>

        <p class="text-gray-300 text-sm mb-6">
            Enter your email and new password to reset access to your account.
        </p>

        <form wire:submit="resetPassword" class="space-y-5">

            <div>
                <x-input-label for="email" value="Email" class="text-white" />
                <x-text-input wire:model="email"
                              id="email"
                              type="email"
                              class="mt-1 w-full text-black"
                              required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" value="New Password" class="text-white" />
                <x-text-input wire:model="password"
                              id="password"
                              type="password"
                              class="mt-1 w-full text-black"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" value="Confirm Password" class="text-white" />
                <x-text-input wire:model="password_confirmation"
                              id="password_confirmation"
                              type="password"
                              class="mt-1 w-full text-black"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button class="w-full bg-orange-600 hover:bg-orange-700 py-2 rounded text-white font-semibold">
                Reset Password
            </button>

            <p class="text-center mt-4 text-gray-300">
                Remember your password?
                <a href="{{ route('login') }}" class="text-orange-400 hover:text-orange-300">
                    Log in
                </a>
            </p>

        </form>
    </div>
</div>
