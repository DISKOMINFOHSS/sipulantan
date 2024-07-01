@extends('layouts.app_landing')

@section('content')
<div class="max-w-screen-xl min-h-[calc(100vh-24rem)] mx-auto my-4 xl:my-8 px-4">
  <div class="text-center mt-8 md:mt-12">
    <h2 class="text-3xl md:text-4xl font-bold mb-2 tracking-wide">{{ $category->name }}</h2>
    <div>Menampilkan semua produk yang memiliki kategori "<span class="font-semibold">{{ $category->name }}</span>"</div>
  </div>
  <div class="my-8 flex items-center">
    <div>
      <span class="mr-2 text-gray-700 tracking-wide">Kategori</span>
      <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-900 border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        {{ $category->name }}
        <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i>
      </button>
      <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-fit">
          <ul class="py-2 w-full text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
            <li>
              <a href="{{ route('products.index') }}" class="block px-4 py-2 hover:bg-gray-100">Semua Kategori</a>
            </li>
            @foreach($categories as $category)
            <li>
              <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="block w-full px-4 py-2 hover:bg-gray-100">{{ $category->name }}</a>
            </li>
            @endforeach
          </ul>
      </div>
    </div>
  </div>
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-8 my-8">
    @forelse($products as $product)
      @include('templates.landing.card_product', ['product' => $product])
    @empty
    <div class="col-span-2 md:col-span-3 lg:col-span-4 text-center my-8">
      Tidak ada produk pada kategori <span class="font-semibold">{{ $category->name }}</span>.
    </div>
    @endforelse
  </div>
  <div class="my-10">
    {{ $products->links() }}
  </div>
</div>
@endsection
