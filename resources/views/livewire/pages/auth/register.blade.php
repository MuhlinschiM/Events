<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layout')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
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

        <h1 class="text-2xl font-bold mb-6 text-center">Create Account</h1>

        <form wire:submit="register" class="space-y-5">

            <div>
                <x-input-label for="name" value="Name" class="text-white" />
                <x-text-input wire:model="name" id="name" type="text"
                              class="mt-1 w-full text-black" required autofocu s />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" value="Email" class="text-white" />
                <x-text-input wire:model="email" id="email" type="email"
                              class="mt-1 w-full text-black" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" value="Password" class="text-white" />
                <x-text-input wire:model="password" id="password" type="password"
                              class="mt-1 w-full text-black" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" value="Confirm Password" class="text-white" />
                <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password"
                              class="mt-1 w-full text-black" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('login') }}"
                   class="text-sm text-orange-400 hover:text-orange-300">
                    Already have an account?
                </a>

                <button
                    class="px-6 py-2 bg-orange-600 hover:bg-orange-700 rounded text-white font-semibold">
                    Register
                </button>
            </div>

        </form>

    </div>
</div>
