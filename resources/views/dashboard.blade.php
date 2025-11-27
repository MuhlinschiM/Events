@extends('layout')

@section('main')

<div class="max-w-5xl mx-auto py-16 px-6">

    <div class="bg-gray-800 text-white shadow-lg rounded-lg p-8">

        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>

        <p class="text-gray-300 text-lg">
            You’re logged in!
        </p>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Profile Settings --}}
            <a href="{{ route('profile.edit') }}"
               class="block bg-gray-700 hover:bg-gray-600 transition duration-200 p-6 rounded-lg border border-gray-600">
                <h2 class="text-xl font-semibold">Profile Settings</h2>
                <p class="text-gray-400 mt-2">Update your personal information, name and email.</p>
            </a>

            {{-- Change Password --}}
            <a href="{{ route('profile.edit') }}#password-section"
               class="block bg-gray-700 hover:bg-gray-600 transition duration-200 p-6 rounded-lg border border-gray-600">
                <h2 class="text-xl font-semibold">Change Password</h2>
                <p class="text-gray-400 mt-2">Update your account password for better security.</p>
            </a>

        </div>

        <div class="mt-8 border-t border-gray-700 pt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">
                    Log out
                </button>
            </form>
        </div>

    </div>

</div>

@endsection
