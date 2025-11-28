@extends('layout')

@section('main')
<div class="max-w-xl mx-auto bg-gray-800 p-6 rounded-lg shadow text-white">

    <h1 class="text-3xl font-bold mb-6">Profile Information</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block mb-1" for="name">Name</label>
            <input id="name" name="name" type="text"
                   class="w-full p-2 bg-gray-700 rounded"
                   value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1" for="email">Email</label>
            <input id="email" name="email" type="email"
                   class="w-full p-2 bg-gray-700 rounded"
                   value="{{ old('email', $user->email) }}">
        </div>

        <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">
            Save
        </button>
    </form>

</div>
@endsection
