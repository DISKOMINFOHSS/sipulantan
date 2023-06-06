<div class="w-full h-fit max-w-sm bg-white border border-gray-200 rounded-lg shadow">
  <a href="{{ route('products.show', ['product' => $product->id])}}">
    <img class="p-4 w-full aspect-square object-cover rounded-t-lg" src="{{ $product->photo }}" alt="product image" />
  </a>
  <div class="px-5 pb-5">
    <a href="{{ route('products.show', ['product' => $product->id])}}">
      <h5 class="text-base sm:text-xl line-clamp-2 font-semibold tracking-tight text-gray-900 ">{{ $product->name }}</h5>
    </a>
    <a href="{{ route('sellers.show', ['seller' => $product->seller->id]) }}">
      <span class="text-xs sm:text-base line-clamp-1 font-light text-gray-500 ">{{ $product->seller->name }}</span>
    </a>
    <div class="flex items-center justify-between sm:mt-2">
      <span class="text-lg sm:text-2xl font-bold text-gray-900 ">Rp{{ $product->price }}</span>
    </div>
  </div>
</div>