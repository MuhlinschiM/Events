@extends('layout')

@section('main')
<div class="container mx-auto p-6 rounded-lg shadow-lg">

    <h1 class="text-3xl font-bold text-white mb-6">
        {{ $category->name_en }}
    </h1>

    @if($category->events->count())
        <h2 class="text-xl text-white font-semibold mb-4">Events:</h2>

        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($category->events as $event)
                <li class="bg-gray-800 p-4 rounded-lg shadow">
                    <a href="{{ route('show-event', $event->slug_en) }}">
                        <img
                            class="h-40 w-full object-cover rounded-md mb-3"
                            src="{{ asset('storage/' . $event->image) }}"
                            alt="{{ $event->title_en }}"
                        >
                        <h3 class="text-white text-lg font-medium">
                            {{ $event->title_en }}
                        </h3>
                    </a>
                </li>
            @endforeach
        </ul>

    {{-- Если событий нет --}}
    @else
        <p class="text-gray-300">No events.</p>
    @endif

</div>
@endsection
