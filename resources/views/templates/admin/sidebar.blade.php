<aside id="drawer-sidebar" class="fixed top-0 left-0 z-40 transition-transform -translate-x-full lg:translate-x-0 lg:relative min-h-screen min-w-fit w-64 bg-gray-50 px-4">
  <a href="{{ route('landing') }}" class="flex items-center my-4 py-4 px-2">
    <i class="mr-2" data-feather="octagon"></i>
    <span class="self-center text-2xl font-semibold whitespace-nowrap">LOGO</span>
  </a>
  <div class="mb-5">
    <div class="block text-gray-500 font-light text-sm tracking-wide mb-1 px-2">
      Menu
    </div>
    <ul class="">
      <li>
        <a href="{{ route('admin.dashboard') }}" class="flex items-center text-gray-600 tracking-wide hover:bg-gray-100 hover:rounded-lg p-2">
          <i class="mr-3 w-4 h-4" data-feather="grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="mb-5">
    <div class="block text-gray-500 font-light text-sm tracking-wide mb-1 px-2">
      Data Master
    </div>
    <ul class="">
      <li>
        <a href="{{ route('admin.categories.index') }}" class="flex items-center text-gray-600 tracking-wide hover:bg-gray-100 hover:rounded-lg p-2">
          <i class="mr-3 w-4 h-4" data-feather="list"></i>
          <span>Kategori</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="mb-5">
    <div class="block text-gray-500 font-light text-sm tracking-wide mb-1 px-2">
      Manajemen
    </div>
    <ul class="">
      <li>
        <a href="{{ route('admin.sellers.index') }}" class="flex items-center text-gray-600 tracking-wide hover:bg-gray-100 hover:rounded-lg p-2">
          <i class="mr-3 w-4 h-4" data-feather="users"></i>
          <span>Penjual</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.products.index') }}" class="flex items-center text-gray-600 tracking-wide hover:bg-gray-100 hover:rounded-lg p-2">
          <i class="mr-3 w-4 h-4" data-feather="shopping-bag"></i>
          <span>Produk Barang</span>
        </a>
      </li>
    </ul>
  </div>
</aside>

