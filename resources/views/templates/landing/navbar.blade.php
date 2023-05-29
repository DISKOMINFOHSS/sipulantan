<header>
  <nav class="bg-white border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center pl-1">
        <i class="mr-2" data-feather="octagon"></i>
        <span class="self-center text-2xl font-semibold whitespace-nowrap">LOGO</span>
      </a>
      <div class="flex">
        <div id="mega-menu" class="items-center justify-between hidden w-full md:flex md:w-auto mr-4">
          <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
            <li>
              <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="flex items-center justify-between w-full py-2 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">
                Kategori
                <i data-feather="chevron-down" class="w-5 h-5 ml-1"></i>
              </button>
              <div id="mega-menu-dropdown" class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md">
                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                  <ul class="space-y-4">
                    <li>
                      <a href="#" class="text-gray-500 hover:text-blue-600">
                        Blog
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-gray-500 hover:text-blue-600">
                        Newsletter
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-gray-500 hover:text-blue-600">
                        Playground
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-gray-500 hover:text-blue-600">
                        License
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- <div class="p-4">
                  <ul class="space-y-4">
                    <li>
                      <a href="#" class="text-gray-500 hover:text-blue-600">
                        Contact Us
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-gray-500 hover:text-blue-600">
                        Support Center
                      </a>
                    </li>
                    <li>
                      <a href="#" class="text-gray-500 hover:text-blue-600">
                        Terms
                      </a>
                    </li>
                  </ul>
                </div> -->
              </div>
            </li>
          </ul>
        </div>
        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 rounded-lg text-sm px-1 py-2.5 mr-1" >
          <i class="w-6 h-6 text-gray-500" data-feather="search"></i>
          <span class="sr-only">Search</span>
        </button>
        <div class="relative hidden md:block">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <i class="w-5 h-5 text-gray-500" data-feather="search"></i>
            <span class="sr-only">Search icon</span>
          </div>
          <input type="text" id="search-navbar" class="inline-block w-80 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari...">
        </div>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-search">
        <a href="{{ route('auth.get.login') }}" class="hidden md:inline-block text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Masuk
        </a>
        <!-- <button type="button" class="hidden md:inline-block text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button> -->
        <div class="relative mt-3 md:hidden">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <i class="w-5 h-5 text-gray-500" data-feather="search"></i>
          </div>
          <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari...">
        </div>
      </div>

    </div>
    
  </nav>
</header>