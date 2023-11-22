@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl mx-auto my-4 xl:my-8 px-4">

<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden rounded-lg w-full aspect-video object-cover">
         <!-- Item 1 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="{{ asset('/images/home-banner-1.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-lg" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="{{ asset('/images/home-banner-2.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-lg" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
  <div class="text-center mt-4">
    <h2 class="text-2xl md:text-3xl font-bold mb-1 tracking-wide">Kategori</h2>
  </div>

  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 my-5">
    <a href="{{ route('products.index') }}" class="flex flex-col justify-center items-center p-4 md:h-40 w-full bg-blue-50 rounded-lg hover:bg-blue-200">
        <div class="bg-blue-600 rounded-full p-3 mb-2">
          <i data-feather="grid" class="w-6 h-6 text-white"></i>
        </div>
        <div class="font-medium tracking-wide text-base md:text-xl">Semua Kategori</div>
        <div class="text-xs md:text-base line-clamp-1 font-light text-gray-500 ">x Produk</div>
    </a>
    @foreach($categories as $category)
    <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="flex flex-col justify-center items-center p-4 md:h-40 w-full bg-blue-50 rounded-lg hover:bg-blue-200">
      <div class="bg-blue-600 rounded-full p-3 mb-2">
        <i data-feather="grid" class="w-6 h-6 text-white"></i>
      </div>
        <div class="font-medium tracking-wide text-base md:text-xl">{{ $category->name }}</div>
        <div class="text-xs md:text-base line-clamp-1 font-light text-gray-500 ">{{ $category->products_count }} Produk</div>
    </a>
    @endforeach
  </div>

  <div class="flex justify-between items-center mt-8">
    <h2 class="text-2xl md:text-3xl font-bold tracking-wide">Produk Terbaru</h2>
    <a href="{{ route('products.index') }}" class="flex items-center text-sm text-blue-700 underline">
        Lihat semua
        <i data-feather="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
    </a>
  </div>

  <!-- <div class="text-center mt-8">
    <h2 class="text-2xl md:text-3xl font-bold mb-1 tracking-wide">Produk Terbaru</h2>
  </div> -->

  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-8 my-8">
    @foreach($products as $p)
      @include('templates.landing.card_product', ['product' => $p])
    @endforeach
    <!-- <div class="w-full h-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">

    </div> -->
  </div>

</div>

@endsection
