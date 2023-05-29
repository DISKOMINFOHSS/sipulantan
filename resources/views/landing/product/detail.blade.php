@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl mx-auto my-4 xl:my-8 px-4">
  <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
    <div class="border rounded-lg h-fit">
      <img class="p-4 rounded-lg" src="https://images.tokopedia.net/img/cache/700/product-1/2020/6/25/99952732/99952732_b4b556d1-503d-4131-ad8b-b8e4d96434da_2048_2048.webp?ect=4g" alt="product image" />
    </div>
    <div class="col-span-2 mt-4">
      <h5 class="text-xl md:text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Cimory UHT Choco Series Choco Malt 250 ml</h5>
      <div class="flex items-center mt-2 space-x-2">
        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Makanan & Minuman</span>
      </div>
      <div class="flex items-center justify-between mt-2 mb-3">
        <span class="text-2xl font-bold text-gray-900 dark:text-white">Rp6.500</span>
      </div>
      <div class="">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Deskripsi Produk</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Spesifikasi</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
            <div class="hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
        </div>
      </div>
      <button type="button" class="mt-4 w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Hubungi Penjual</button>
      <div class="my-4 p-4 flex justify-between items-center border border-gray-200 rounded-lg">
        <div class="flex items-center">
          <img class="rounded-full w-12 h-12" src="https://flowbite.com/docs/images/examples/image-4@2x.jpg" alt="image description">
          <div class="ml-2">
            <h5 class="text-xl font-bold text-gray-900 line-clamp-1">Cimory Official Store</h5>
            <div class="flex items-center font-light text-sm text-gray-700">
              <i data-feather="map-pin" class="w-3 h-3 mr-1"></i>
              <span class="line-clamp-1">Kandangan Kota, Kandangan</span>
            </div>
          </div>
        </div>
        <div class="md:hidden">
          <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button"> 
            <i data-feather="more-vertical" class="w-5 h-5"></i>
          </button>
          <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hubungi Penjual</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kunjungi</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="hidden md:flex items-center">
          <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Hubungi</button>
          <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Kunjungi</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection