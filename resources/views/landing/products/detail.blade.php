@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl min-h-[calc(100vh-22rem)] mx-auto my-4 xl:my-8 px-4">
  <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
    <div class="border rounded-lg h-fit">
      <img class="p-4 w-full object-cover aspect-square rounded-lg" src="{{ $product->photo }}" alt="product image" />
    </div>
    <div class="col-span-2 mt-4">
      <h5 class="text-xl md:text-2xl font-semibold tracking-tight text-gray-900">{{ $product->name }}</h5>
      <div class="flex items-center mt-2 space-x-2">
        @foreach($product->categories as $category)
        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">{{ $category->name }}</span>
        @endforeach
      </div>
      <div class="flex items-center justify-between mt-2 mb-3">
        <span class="text-2xl font-bold text-gray-900">Rp{{ $product->price }}</span>
      </div>
      <div class="">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Deskripsi Produk</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Spesifikasi</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p class="text-sm text-gray-500">
                  @isset($product->description)
                  {{ $product->description }}
                  @endisset
                  @empty($product->description)
                  Tidak ada deskripsi produk.
                  @endempty
                </p>
            </div>
            <div class="hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <p class="text-sm text-gray-500">
                  @isset($product->specification)
                  {{ $product->specification }}
                  @endisset
                  @empty($product->specification)
                  Tidak ada spesifikasi produk.
                  @endempty
                </p>
            </div>
        </div>
      </div>
      <button type="button" data-modal-target="contact-modal" data-modal-toggle="contact-modal"
      class="mt-4 w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Hubungi Penjual
      </button>
      <div class="my-4 p-4 flex justify-between items-center border border-gray-200 rounded-lg">
        <div class="flex items-center">
          @isset($product->seller->photo)
            <img class="rounded-lg aspect-square object-cover w-12 h-12" src="{{ $product->seller->photo }}" alt="image description">
          @endisset
          @empty($product->seller->photo)
            <img class="border border-gray-200 rounded-lg aspect-square object-cover w-12 h-12 p-1.5" src="{{ asset('images/seller.png') }}" alt="image description">
          @endempty
          <div class="ml-2">
            <h5 class="text-base md:text-xl font-bold text-gray-900 line-clamp-1">{{ $product->seller->name }}</h5>
            <div class="flex items-center font-light text-xs md:text-sm text-gray-700">
              <i data-feather="map-pin" class="w-3 h-3 mr-1"></i>
              <span class="line-clamp-1">@isset($product->seller->village){{$product->seller->village->name}}@endisset, @isset($product->seller->district){{ $product->seller->district->name }}@endisset</span>
            </div>
          </div>
        </div>
        <div class="self-start md:hidden">
          <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button"> 
            <i data-feather="more-vertical" class="w-4 h-4 sm:w-5 sm:h-5"></i>
          </button>
          <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">
              <li>
                <button data-modal-target="contact-modal" data-modal-toggle="contact-modal" class="block w-full px-4 py-2 text-start hover:bg-gray-100">Hubungi Penjual</button>
              </li>
              <li>
                <a href="{{ route('sellers.show', ['seller' => $product->seller_id]) }}" class="block px-4 py-2 hover:bg-gray-100">Kunjungi Toko</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="hidden md:flex items-center">
          <button type="button" data-modal-target="contact-modal" data-modal-toggle="contact-modal"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Hubungi
          </button>
          <a href="{{ route('sellers.show', ['seller' => $product->seller_id]) }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
            Kunjungi <span class="md:hidden lg:inline">Toko</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@include('templates.admin.modal_contact', ['seller' => $product->seller])

@endsection