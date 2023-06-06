@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl mx-auto my-4 xl:my-8 px-4">

  <div class="block w-full h-48 sm:h-64 md:h-96 rounded-lg bg-gray-200">
    <!-- <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg" class="block w-full h-48 sm:h-64 md:h-96 object-cover rounded-lg" alt="..."> -->
  </div>

  <div class="text-center mt-8">
    <h2 class="text-2xl md:text-3xl font-bold mb-1 tracking-wide">Kategori</h2>
    <!-- <div>Lorem ipsum dolor sit amet</div> -->
  </div>

  <div class="grid grid-cols-3 gap-4 my-5">
    @foreach($categories->slice(0, 3) as $category)
    <a href="" class="flex flex-col justify-center items-center h-40 w-full bg-white border border-gray-200 rounded-lg hover:bg-gray-200">
        <div class="font-medium tracking-wide text-xl">{{ $category->name }}</div>
        <div class="text-xs sm:text-base line-clamp-1 font-light text-gray-500 ">0 Produk</div>
    </a>
    @endforeach
  </div>

  <div class="flex justify-center sm:justify-between items-center mt-8">
    <h2 class="text-2xl md:text-3xl font-bold tracking-wide">Produk Terbaru</h2>
    <a href="{{ route('products.index') }}" class="hidden sm:flex items-center text-sm text-blue-700 underline">
        Lihat semua
        <i data-feather="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
    </a>
  </div>

  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-8 my-8">
    @foreach($products as $p)
      @include('templates.landing.card_product', ['product' => $p])
    @endforeach
  </div>

</div>

@endsection
