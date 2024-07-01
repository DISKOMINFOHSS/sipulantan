@extends('layouts.app_admin')

@section('content')
<div class="px-4 my-5">
  <div>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl">Dashboard</h2>
  </div>
  <div class="my-7 md:mb-10 flex flex-row overflow-x-auto space-x-4 lg:space-x-6">
    <div class="basis-1/3 md:basis-1/4 flex justify-between items-end p-4 border border-gray-200 rounded-lg h-32">
      <div class="mr-5">
        <div class="text-sm text-gray-600 uppercase">Kategori</div>
        <div class="text-3xl font-medium">{{ $total_categories }}</div>
      </div>
      <div class="h-fit self-start rounded-lg bg-blue-100 p-2.5 lg:p-3">
        <i data-feather="list" class="w-5 h-5 lg:w-6 lg:h-6 text-blue-800"></i>
      </div>
    </div>
    <div class="basis-1/3 md:basis-1/4 flex justify-between items-end p-4 border border-gray-200 rounded-lg h-32 w-full">
      <div class="mr-5">
        <div class="text-sm text-gray-600 uppercase">Penjual</div>
        <div class="text-3xl font-medium">{{ $total_sellers }}</div>
      </div>
      <div class="h-fit self-start rounded-lg bg-blue-100 p-2.5 lg:p-3">
        <i data-feather="users" class="w-6 h-6 text-blue-800"></i>
      </div>
    </div>
    <div class="basis-1/3 md:basis-1/4 flex justify-between items-end p-4 border border-gray-200 rounded-lg h-32 w-full">
      <div class="mr-5">
        <div class="text-sm text-gray-600 uppercase">Produk</div>
        <div class="text-3xl font-medium">{{ $total_products }}</div>
      </div>
      <div class="h-fit self-start rounded-lg bg-blue-100 p-2.5 lg:p-3">
        <i data-feather="shopping-bag" class="w-6 h-6 text-blue-800"></i>
      </div>
    </div>
    <div class="md:basis-1/4 hidden md:flex justify-between items-end p-4 border border-gray-200 rounded-lg h-32 w-full">
      <div class="mr-5">
        <div class="text-sm text-gray-600 uppercase">Produk Ditampilkan</div>
        <div class="text-3xl font-medium">{{ $total_active_products }}</div>
      </div>
      <div class="h-fit self-start rounded-lg bg-blue-100 p-3">
        <i data-feather="gift" class="w-6 h-6 text-blue-800"></i>
      </div>
    </div>

  </div>
  <div class="flex flex-wrap md:flex-nowrap md:space-x-8">
    <div class="grow overflow-x-auto">
      <div class="flex justify-between items-center">
        {{-- <div>
          <h4 class="text-lg md:text-2xl font-bold tracking-wide">Produk Terbaru</h4>
        </div>
        <a href="#" class="hidden sm:flex items-center text-sm text-blue-700 underline">
            Lihat semua
            <i data-feather="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
        </a> --}}
        <h4 class="text-xl md:text-2xl font-bold tracking-wide">Produk Terbaru</h4>
        <a href="{{ route('admin.products.index') }}" class="flex items-center text-sm text-blue-700 underline">
            Lihat semua
            <i data-feather="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
        </a>
      </div>
      <div class="my-5 overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="font-medium tracking-wide px-6 py-4">Nama Produk</th>
              <th scope="col" class="font-medium tracking-wide px-6 py-4">Penjual</th>
              <th scope="col" class="font-medium tracking-wide px-6 py-4">Harga</th>
              <th scope="col" class="font-medium tracking-wide px-6 py-4">Status</th>
              <th scope="col" class="font-medium tracking-wide px-6 py-4"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr class="bg-white border-b">
              <th scope="row" class="px-6 py-4 font-normal text-gray-900 max-w-sm">
                <div class="flex items-center">
                  <img class="w-8 h-8 object-cover rounded-lg mr-2" src="{{ $product->photo }}" alt="product photo">
                  <div>
                    <div class="text-sm line-clamp-2">{{ $product->name }}</div>
                  </div>
                </div>
              </th>
              <td class="px-6 py-4">
                <div>
                  <a href="{{ route('admin.sellers.show', ['seller' => $product->seller->id ]) }}" class="line-clamp-2 text-gray-700 hover:underline">
                  {{ $product->seller->name }}
                  </a>
                </div>
              </td>
              <td class="px-6 py-4">
                <div>
                  <div class="text-gray-700 capitalize">Rp{{ $product->price }}</div>
                </div>
              </td>
              <td class="px-6 py-4 max-w-xs">
                <div>
                @if($product->is_archived)
                  <span class="bg-yellow-100 text-yellow-500 text-xs font-medium px-2.5 py-0.5 rounded border border-yellow-400">Diarsipkan</span>
                @else
                  <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">Aktif</span>
                @endif
                </div>
              </td>
              <td class="px-6 py-4">
                <button data-dropdown-toggle="product-action-dropdown" data-product-id="{{ $product->id }}"
                class="btn-action-dropdown inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                  <i data-feather="more-horizontal" class="w-5 h-5 text-gray-800"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="w-72">
      <div class="">
        <h4 class="text-xl md:text-2xl font-bold tracking-wide">Penjual</h4>
      </div>
      <div class="mt-5 space-y-3">
        @foreach($sellers as $seller)
        <a href="{{ route('admin.sellers.show', ['seller' => $seller->id]) }}" class="flex items-center p-3 border border-gray-200 rounded-lg">
          @isset($seller->photo)
            <img class="rounded-lg aspect-square object-cover w-8 h-8" src="{{ $seller->photo }}" alt="image description">
          @endisset
          @empty($seller->photo)
            <img class="border border-gray-200 rounded-lg aspect-square object-cover w-8 h-8 p-1.5" src="{{ asset('images/seller.png') }}" alt="image description">
          @endempty
          <div class="ml-2">
            <div class="text-sm line-clamp-1">{{ $seller->name }}</div>
            <div class="text-xs text-gray-600 font-light">{{ $seller->products_count }} Produk</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>

<div id="product-action-dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32">
    <ul class="py-2 text-sm text-gray-700">
      <li>
        <a href="" class="flex items-center px-4 py-2 hover:bg-gray-100" target="_blank">
          <i data-feather="external-link" class="w-4 h-4 mr-2.5"></i>
          Detail
        </a>
      </li>
      <li>
        <a href="" class="flex items-center px-4 py-2 hover:bg-gray-100">
          <i data-feather="edit" class="w-4 h-4 mr-2.5"></i>
          Edit
        </a>
      </li>
    </ul>
</div>

@include('templates.admin.modal_delete', ['title' => 'produk', 'route' => 'products'])

@endsection

@push('after-script')
<script>
  const dropdownMenu = document.querySelectorAll('#product-action-dropdown li a');
  const detail = dropdownMenu[0];
  const edit = dropdownMenu[1];
  const trash = dropdownMenu[2];

  const actionDropdowns = document.querySelectorAll('.btn-action-dropdown');
  actionDropdowns.forEach((actionDropdown, index) => {
    actionDropdown.addEventListener('click', () => {

      let detailRoute = `{{ route('products.show', ':id') }}`
      detailRoute = detailRoute.replace(':id', actionDropdown.dataset.productId);

      detail.setAttribute('href', detailRoute);

      let editRoute = `{{ route('admin.products.edit', ':id') }}`
      editRoute = editRoute.replace(':id', actionDropdown.dataset.productId);

      edit.setAttribute('href', editRoute);

      trash.setAttribute('data-id', actionDropdown.dataset.productId)
    })
  });
</script>
@endpush
