<header>
  <nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between lg:justify-end mx-auto p-4 my-4">
      <button class="flex items-center lg:hidden"
      type="button" data-drawer-target="drawer-sidebar" data-drawer-show="drawer-sidebar" aria-controls="drawer-navigation">      
          <i class="w-5 h-5 mr-2" data-feather="menu"></i>
      </button>
      <div class="flex items-center">
        <button type="button" class="flex mr-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <div class="rounded-full w-10 h-10 bg-gray-100 flex items-center justify-center">
            <i data-feather="user" class="w-4 h-4 text-gray-600"></i>
          </div>
        </button>
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
            <span class="block text-sm  text-gray-500 truncate">name@flowbite.com</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
            </li>
            <li>
              <form action="{{ route('auth.post.logout') }}" method="post" class="block hover:bg-gray-100">
                @csrf
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                  Sign Out
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>