@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl mx-auto my-4 xl:my-8 px-4">

  <!-- <div id="default-carousel" class="relative w-full" data-carousel="slide">
    
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <i class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" data-feather="chevron-left"></i>  
          <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <i class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" data-feather="chevron-right"></i>  
            <span class="sr-only">Next</span>
        </span>
    </button>
  </div> -->

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

</div>
@endsection
