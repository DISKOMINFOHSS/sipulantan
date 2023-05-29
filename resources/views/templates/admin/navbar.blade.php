<header>
  <nav class="bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4 my-4">
      <!-- <a href="#" class="flex items-center">
        <i class="mr-2" data-feather="menu"></i>
      </a> -->
      <div class="flex items-center">
        <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="user photo">
        </button>
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
            </li>
            <li>
              <form action="{{ route('auth.post.logout') }}" method="post">
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