<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layout')] class extends Component
{
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
            return;
        }

        Auth::user()->sendEmailVerificationNotification();
        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
};

?>

<div class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-gray-800 text-white p-8 rounded-lg shadow-lg">

        <h1 class="text-2xl font-bold mb-4 text-center">Verify Your Email</h1>

        <p class="text-gray-300 text-sm mb-6 text-center">
            Thanks for signing up! Before you start, please verify your email by clicking
            on the link we sent. If you didn’t receive the message, click the button below.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-green-400 text-center">
                A new verification link has been sent to your email.
            </div>
        @endif

        <div class="space-y-4">

            <button
                wire:click="sendVerification"
                class="w-full bg-orange-600 hover:bg-orange-700 py-2 rounded text-white font-semibold">
                Resend Verification Email
            </button>

            <button
                wire:click="logout"
                class="w-full text-sm text-gray-300 hover:text-white underline">
                Log Out
            </button>

        </div>

    </div>

</div>
