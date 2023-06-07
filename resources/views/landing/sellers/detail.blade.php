@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl min-h-[calc(100vh-22rem)] mx-auto my-4 xl:my-8 px-4">

  <div class="my-4 p-4 sm:p-6 flex flex-col sm:flex-row sm:justify-between sm:items-center border border-gray-200 rounded-lg">
    <div class="flex items-center">
      @isset($seller->photo)
      <img class="rounded-lg aspect-square object-cover w-14 h-14" src="{{ $seller->photo }}" alt="image description">
      @endisset
      @empty($seller->photo)
      <img class="border border-gray-200 rounded-lg aspect-square object-cover w-14 h-14 p-1.5" src="{{ asset('images/seller.png') }}" alt="image description">
      @endempty
      <div class="ml-3">
        <h5 class="text-xl tracking-wide font-bold text-gray-900 line-clamp-1">{{ $seller->name }}</h5>
        <div class="flex items-center font-light text-sm text-gray-700">
          <i data-feather="map-pin" class="w-3 h-3 mr-1"></i>
          <span class="line-clamp-1">{{$seller->village->name}}, {{$seller->district->name}}</span>
        </div>
      </div>
    </div>
        <!-- <div class="md:hidden">
          <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button"> 
            <i data-feather="more-vertical" class="w-5 h-5"></i>
          </button>
          <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hubungi Penjual</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kunjungi Toko</a>
              </li>
            </ul>
          </div>
        </div> -->
    <div class="flex items-center mt-3 sm:mt-0">
      <button type="button" data-modal-target="contact-modal" data-modal-toggle="contact-modal"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Hubungi
      </button>
      <button type="button" data-modal-target="seller-info-modal" data-modal-toggle="seller-info-modal"
      class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
        Informasi Toko
      </button>
    </div>
  </div>

      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-8 mt-4 mb-8">
        @foreach($seller->products as $product)
          @include('templates.landing.card_product', ['product' => $product])
        @endforeach
      </div>
  </div>
</div>

<div id="seller-info-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between px-5 pt-5 rounded-t">
                <h3 class="text-xl font-medium text-gray-900">
                    {{ $seller->name }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="seller-info-modal">
                    <i data-feather="x" class="w-5 h-5"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="mb-4 p-6 space-y-6">
                <p class="text-sm text-gray-500">
                  <span class="block font-semibold text-gray-800 tracking-wide">Deskripsi</span>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et orci lacinia, facilisis neque non, imperdiet arcu. Quisque efficitur eleifend ex auctor dignissim.
                </p>
                <div>
                  <p class="text-sm text-gray-500">
                    <span class="block font-semibold text-gray-800 tracking-wide">Alamat Toko</span>
                    {{ $seller->address }}
                  </p>
                  <div class="flex items-center text-sm text-gray-500">
                    <i data-feather="map-pin" class="w-3 h-3 mr-1"></i>
                    <span class="line-clamp-1">{{ $seller->village->name }}, {{ $seller->district->name }}</span>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('templates.admin.modal_contact', ['seller' => $seller])


@endsection