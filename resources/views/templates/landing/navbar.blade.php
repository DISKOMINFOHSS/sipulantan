<header>
  <nav class="bg-white border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="{{ route('landing') }}" class="flex items-center pl-1">
        <!-- <i class="mr-2" data-feather="octagon"></i> -->
        <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap">SIPULANTAN</span> -->
        <img src="{{ asset('/images/logo-sipulantan.png') }}" alt="" class="w-56">
      </a>
      <div class="flex">
        <div id="mega-menu" class="items-center justify-between hidden w-full md:flex md:w-auto mr-4">
          <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
            <li>
              <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="flex items-center justify-between w-full py-2 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">
                Kategori
                <i data-feather="chevron-down" class="w-5 h-5 ml-1"></i>
              </button>
              <div id="mega-menu-dropdown" class="absolute z-10 grid hidden w-auto grid-cols-1 text-sm bg-white border border-gray-100 rounded-lg shadow-md">
                <div class="p-4 pb-0 text-gray-900 md:pb-4">
                  <ul class="space-y-4">
                    @foreach($categories as $category)
                    <li>
                      <a href="{{ route('categories.show', ['category' => $category->id ]) }}" class="text-gray-500 hover:text-blue-600">
                        {{ $category->name }}
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 rounded-lg text-sm px-1 py-2.5 mr-1" >
          <i class="w-6 h-6 text-gray-500" data-feather="search"></i>
          <span class="sr-only">Search</span>
        </button>
        <form class="hidden md:block" method="get" action="{{ route('products.search') }}">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <i class="w-5 h-5 text-gray-500" data-feather="search"></i>
                </div>
                <input type="search" name="query" id="default-search" value="@isset($query){{ $query }}@endisset" class="block w-96 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Cari nama produk atau penjual...">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Cari</button>
            </div>
        </form>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-search">
        @auth
        <a href="{{ route('admin.dashboard') }}" class="hidden md:inline-block text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Dashboard
        </a>
        @endauth
        
        @guest
        <a href="{{ route('auth.get.login') }}" class="hidden md:inline-block text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Masuk
        </a>
        @endguest
        <!-- <button type="button" class="hidden md:inline-block text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button> -->
        <form class="md:hidden mt-3.5"  method="get" action="{{ route('products.search') }}">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="w-5 h-5 text-gray-500" data-feather="search"></i>
                </div>
                <input type="search" id="search" name="query" value="@isset($query){{ $query }}@endisset" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Cari nama produk atau penjual...">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Cari</button>
            </div>
        </form>
      </div>
    </div>
  </nav>
</header>