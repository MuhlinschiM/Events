@extends('layout')

@section('main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<div class="swiper mySwiper container mx-auto mt-10 px-4">

    <div class="swiper-wrapper">

        @foreach ($events->take(6) as $event)
            <div class="swiper-slide relative">
                <a href="{{ route('show-event', $event->slug_en) }}">
                    @if ($event->price > 0)
                    <span class="absolute bottom-4 left-4 z-30 bg-red-600 
                                 text-white text-lg font-semibold px-4 py-2 
                                 rounded-lg shadow-xl">
                        {{ number_format($event->price, 2) }} MDL
                    </span>
                @endif
                <img
                    src="{{ asset('storage/' . $event->image) }}"
                    class="w-full h-56 sm:h-72 md:h-96 lg:h-[480px] object-cover rounded-xl"
                    alt="{{ $event->title_en }}"
                >
</a>

            </div>
        @endforeach

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>

</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });
</script>



<div class="container mx-auto mt-10 px-4">
    @foreach ($categories as $category)
        <h2 class="text-2xl font-bold mt-10 mb-4">{{ $category->name_en }}</h2>
            <ul class="grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-4 gap-6">
            @foreach ($category->events->take(4) as $event)
                <li>

                    <div class="bg-white shadow-md border border-gray-200 rounded-lg h-full flex flex-col">
                        <a href="{{ route('show-event', $event->slug_en) }}">
                            <img
                                class="rounded-t-lg w-full h-48 object-cover"
                                src="{{ asset('storage/' . $event->image) }}"
                                alt="{{ $event->title_en }}"
                            >
                        </a>

                        <div class="p-5 flex flex-col flex-1">
                            <a href="{{ route('show-event', $event->slug_en) }}">
                                <h5 class="text-gray-900 font-bold text-xl tracking-tight mb-2">
                                    {{ $event->title_en }}
                                </h5>
                            </a>

                            <p class="font-normal text-gray-700 mb-3 text-sm">
                                {{ $event->date_event }} • {{ $event->time_event }}<br>
                                {{ $event->location_en ?? '' }}
                            </p>

                            <div class="mt-auto flex items-center justify-between gap-2">
                                @if(!is_null($event->price) && $event->price > 0)
                                    <span class="text-gray-900 font-semibold text-sm">
                                        {{ number_format($event->price, 2) }} MDL
                                    </span>
                                @else
                                    <span class="text-gray-500 text-xs">
                                        Free entrance
                                    </span>
                                @endif
                                    <div class="inline-block">
                                        @include('components.share')
                                    </div>


                                <a href="{{ route('show-event', $event->slug_en) }}"
                                   class="text-white bg-gray-700 hover:text-orange-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 inline-flex items-center">
                                    Details
                                    <svg class="-mr-1 ml-2 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>

@endsection


