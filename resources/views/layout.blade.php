<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/search.js'])
    @livewireStyles

    <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/navigate@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class="min-h-screen flex flex-col bg-gray-900 text-white">

    <x-header :categories="$categories" />
    @livewire('header')
    <main class="flex-1">
        @yield('main')
        {{$slot?? ''}}

    </main>

    <x-footer />

</body>
</html>
