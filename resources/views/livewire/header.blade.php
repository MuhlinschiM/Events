<header class="sticky top-0 z-50 w-full">
    <nav class="bg-gray-800 border-gray-200">
        <div class="flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="bg-red-500 text-white rounded p-2">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('storage/logo.jpg') }}" alt="logo" class="h-12 w-32 rounded-md object-cover">
                </a>
            </div>
            <div class="relative p-2 rounded-full border border-gray-200 flex items-center justify-between bg-gray-800">
                <input class="px-2 outline-none w-full bg-gray-800 border-none text-2xl" type="text" placeholder="Search" id="search">
                <div class="flex items-center justify-center block py-2 px-3 text-white hover:text-orange-400">
                    <x-tni-search-circle class="h-12 w-12 text-red-500 hover:bg-white rounded-full" />
                    </div>

                    <div id="search-results" class="hidden absolute top-[125%] z-100 border border-gray-200 p-2 rounded-xl left-0">
                </div>
            </div>
            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="block py-2 px-3 text-white hover:text-orange-400">
                        <x-pepicon-enter-circle class='h-12 text-red-500 hover:bg-white rounded-full'/>
                    </a>
                @endguest

                @auth
                    <a href="{{ route('profile.edit') }}" class="block py-2 px-3 text-white hover:text-orange-400">
                        <x-iconsax-bol-profile-tick class='h-12 text-red-500 hover:bg-white rounded-full'/>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block py-2 px-3 text-white hover:text-orange-400">
                            <x-mdi-location-exit class="h-12 text-red-500 hover:bg-white rounded-full"/>
                        </button>
                    </form>
                @endauth
                @if(auth()->check() && auth()->user()->is_admin)
                        <a href="/admin" class="btn btn-primary"><x-ri-admin-fill class="h-12 text-red-500 hover:bg-white rounded-full"/></a>
                        @endif
            </div>
        </div>
    </nav>    

    @isset($categories)
        <div class="bg-gray-900 top-[72px] container mx-auto w-full z-40 py-3 flex items-center justify-center">
            <ul class="container mx-auto flex gap-5 items-center flex-wrap justify-center text-white text-xxl font-bold">
                @foreach ($categories->take(10) as $category)
                    <li>
                        <a class="hover:text-orange-600 duration-200 text-lg font-bold text-xl"
                           href="{{ route('show-category', $category->slug_en) }}">
                            {{ $category->name_en }}
                        </a>
                    </li>
                @endforeach
                    <li>
                        <a class="hover:text-orange-600 duration-200 text-lg font-bold text-xl"
                           href="{{ route('about') }}">
                            About Us
                        </a>
                    </li>
            </ul>
        </div>
    @endisset
</header>
