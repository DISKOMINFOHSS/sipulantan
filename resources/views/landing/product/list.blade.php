@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl mx-auto my-4 xl:my-8 px-4">
  <div class="text-center mt-8 md:mt-12">
    <h2 class="text-3xl md:text-4xl font-bold mb-2 tracking-wide">Hasil Pencarian</h2>
    <div>Menampilkan hasil pencarian produk dengan kata kunci <span class="font-semibold">"cimory"</span></div>
  </div>
  <div class="my-8 flex items-center">
    <div>
      <span class="mr-2 text-gray-700 tracking-wide">Kategori</span>
      <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-900 border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Semua Kategori
        <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i>
      </button>
      <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
            </li>
          </ul>
      </div>

    </div>
  </div>
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-8 my-8">
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="p-4 rounded-t-lg" src="https://images.tokopedia.net/img/cache/700/product-1/2020/6/25/99952732/99952732_b4b556d1-503d-4131-ad8b-b8e4d96434da_2048_2048.webp?ect=4g" alt="product image" />
        </a>
        <div class="px-5 pb-5">
            <a href="#">
                <h5 class="text-base sm:text-xl line-clamp-2 font-semibold tracking-tight text-gray-900 dark:text-white">Cimory UHT Choco Series Choco Malt 250 ml</h5>
            </a>
            <a href="#">
                <span class="text-xs sm:text-base line-clamp-1 font-light text-gray-500 dark:text-white">Warung Mama Kandangan</h5>
            </a>
            <div class="flex items-center justify-between sm:mt-2">
                <span class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white">Rp6.500</span>
            </div>
        </div>
    </div>
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="p-4 rounded-t-lg" src="https://images.tokopedia.net/img/cache/700/product-1/2020/6/25/99952732/99952732_74e5c309-a6fb-4dad-b27c-d01ebc50b787_2048_2048.webp?ect=4g" alt="product image" />
        </a>
        <div class="px-5 pb-5">
            <a href="#">
                <h5 class="text-base sm:text-xl line-clamp-2 font-semibold tracking-tight text-gray-900 dark:text-white">Cimory UHT Choco Series Hazelnut 250 ml</h5>
            </a>
            <a href="#">
                <span class="text-xs sm:text-base line-clamp-1 font-light text-gray-500 dark:text-white">Warung Mama Kandangan</h5>
            </a>
            <div class="flex items-center justify-between sm:mt-2">
                <span class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white">Rp6.500</span>
            </div>
        </div>
    </div>
    <div class="w-full h-fit max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="p-4 rounded-t-lg" src="https://flowbite.com/docs/images/products/apple-watch.png" alt="product image" />
        </a>
        <div class="px-5 pb-5">
          <a href="#">
            <h5 class="text-base sm:text-xl line-clamp-2 font-semibold tracking-tight text-gray-900 dark:text-white">Cimory UHT Choco Series Choco Malt 250 ml</h5>
          </a>
          <a href="#">
                <span class="text-xs sm:text-base line-clamp-1 font-light text-gray-500 dark:text-white">Warung Mama Kandangan</h5>
            </a>
            <div class="flex items-center justify-between sm:mt-2">
                <span class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white">Rp6.500</span>
            </div>
        </div>
    </div>
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="p-4 rounded-t-lg" src="https://images.tokopedia.net/img/cache/700/product-1/2020/6/25/99952732/99952732_b4b556d1-503d-4131-ad8b-b8e4d96434da_2048_2048.webp?ect=4g" alt="product image" />
        </a>
        <div class="px-5 pb-5">
          <a href="#">
            <h5 class="text-base sm:text-xl line-clamp-2 font-semibold tracking-tight text-gray-900 dark:text-white">Cimory UHT Choco Series Choco Malt 250 ml</h5>
          </a>
          <a href="#" class="overflow-hidden w-10">
                  <span class="text-xs sm:text-base line-clamp-1 font-light text-gray-500 dark:text-white">Warung Mama Kandangan</h5>
              </a>
            <div class="flex items-center justify-between sm:mt-2">
                <span class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white">Rp6.500</span>
            </div>
        </div>
    </div>
  </div>

  <!-- <nav class="flex justify-center md:justify-end items-center my-12 md:my-16">
    <ul class="inline-flex items-center -space-x-px">
      <li>
        <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Previous</span>
          <i data-feather="chevron-left" class="w-5 h-5"></i>
        </a>
      </li>
      <li>
        <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
      </li>
      <li>
        <a href="#" aria-current="page" class="z-10 px-3 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">2</a>
      </li>
      <li>
        <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
      </li>
      <li>
        <a href="#" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <span class="sr-only">Next</span>
          <i data-feather="chevron-right" class="w-5 h-5"></i>
        </a>
      </li>
    </ul>
  </nav> -->



</div>
@endsection
