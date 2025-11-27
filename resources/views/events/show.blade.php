@extends('layout')

@section('main')

<div class="container mx-auto bg-gray-800 text-white p-6 rounded-lg shadow-lg">

    <h1 class="text-3xl font-bold mb-4">
        {{ $event->title_en }}
    </h1>

    <p class="text-lg text-gray-300">
        {{ $event->date_event }} • {{ $event->time_event }}
    </p>

    <p class="text-lg text-gray-300 mb-4">
        {{ $event->location_en }}
    </p>

    <p class="text-xl font-semibold mb-4">
        Price:
        @if($event->price > 0)
            <span class="text-orange-400">{{ $event->price }} MDL</span>
        @else
            <span class="text-green-400">Free</span>
        @endif
    </p>

    @if($event->image)
        <img src="{{ asset('storage/' . $event->image) }}"
             alt="{{ $event->title_en }}"
             class="rounded-xl w-full object-cover mb-6">
    @endif

    <p class="text-lg text-gray-400 mb-4">
        Category:
        <span class="font-semibold text-white">
            {{ $event->category->name_en }}
        </span>
    </p>

    <div class="mt-4">
        <h2 class="text-xl font-semibold mb-2">Description:</h2>

        @if($event->description)
            <p class="text-gray-300 text-lg leading-relaxed">
                {{ $event->description }}
            </p>
        @else
            <p class="text-gray-400 text-lg leading-relaxed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta odit ratione,
                itaque mollitia vel libero velit nobis laborum labore illo maiores. Consequatur
                asperiores praesentium tenetur et repellendus possimus labore ipsam delectus
                molestiae odit rerum mollitia ducimus, reprehenderit vitae quo maxime? Dolorem
                veniam iusto, et repudiandae fugiat illo dicta molestias non.
            </p>
        @endif
    </div>

</div>

@endsection
