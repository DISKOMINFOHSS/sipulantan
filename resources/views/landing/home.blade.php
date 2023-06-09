@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl mx-auto my-4 xl:my-8 px-4">

  <!-- <div class="block w-full h-48 sm:h-64 md:h-96 rounded-lg bg-gray-200">
    </div> -->
  <a href="{{ route('products.index') }}">
    <img src="{{ asset('/images/home-banner.png')}}" class="block w-full aspect-video object-cover rounded-lg" alt="...">
  </a>

  <!-- <section class="bg-white">
    <div class="grid max-w-screen-xl pt-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-3xl font-extrabold leading-none md:text-4xl xl:text-5xl">Payments tool for software companies</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
              From checkout to global sales tax compliance, companies around the world use Flowbite to simplify their payment stack.
            </p>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
          <div class="bg-gray-200 w-full aspect-square rounded-lg"></div>
        </div>                
    </div>
  </section> -->

  <div class="text-center mt-8">
    <h2 class="text-2xl md:text-3xl font-bold mb-1 tracking-wide">Kategori</h2>
    <!-- <div>Lorem ipsum dolor sit amet</div> -->
  </div>

  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 my-5">
    @foreach($categories->slice(0, 3) as $category)
    <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="flex flex-col justify-center items-center p-4 md:h-40 w-full bg-blue-50 rounded-lg hover:bg-blue-200">
      <div class="bg-blue-600 rounded-full p-3 mb-2">
        <i data-feather="grid" class="w-6 h-6 text-white"></i>
      </div>
        <div class="font-medium tracking-wide text-base md:text-xl">{{ $category->name }}</div>
        <div class="text-xs md:text-base line-clamp-1 font-light text-gray-500 ">{{ count($category->products) }} Produk</div>
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
