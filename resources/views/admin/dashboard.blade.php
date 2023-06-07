@extends('layouts.app_admin')

@section('content')
<!-- <div class="px-4 my-5 flex space-x-5">
  <div class="grow">
    <div class="grid grid-cols-4">
      <div class="flex items-center border">Produk</div>
      <div class="flex items-center border">Produk Display</div>
      <div class="flex items-center border">Produk</div>
      <div class="flex items-center border">Produk</div>
    </div>
  </div>
  <div class="w-64 bg-gray-300">

  </div>
</div> -->
<div class="px-4 my-5">
  <div>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl">Dashboard</h2>
  </div>
  <div class="my-6 grid grid-cols-4 gap-6">
    <div class="flex justify-center items-center border border-gray-200 rounded-lg h-32 w-full">Produk</div>
    <div class="flex justify-center items-center border border-gray-200 rounded-lg h-32 w-full">Produk</div>
    <div class="flex justify-center items-center border border-gray-200 rounded-lg h-32 w-full">Produk</div>
    <div class="flex justify-center items-center border border-gray-200 rounded-lg h-32 w-full">Produk</div>
  </div>
  <div class="flex space-x-8">
    <div class="grow">
      <div class="flex justify-center sm:justify-between items-center">
        <div>
          <h4 class="text-lg md:text-2xl font-bold tracking-wide">Produk Terbaru</h4>
          <!-- <h6 class="text-gray-600 font-light text-sm">Daftar produk barang</h6> -->
        </div>
        <a href="#" class="hidden sm:flex items-center text-sm text-blue-700 underline">
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
                  <a href="{{ route('admin.sellers.show', ['seller' => $product->seller->id ]) }}" class="text-gray-700 hover:underline">
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
        <h4 class="text-lg md:text-2xl font-bold tracking-wide">Penjual</h4>
        <!-- <h6 class="text-gray-600 font-light text-sm">Penjual dengan produk terbanyak</h6> -->
      </div>
      <div class="mt-5 space-y-3">
        @foreach($sellers as $seller)
        <a href="{{ route('admin.sellers.show', ['seller' => $seller->id]) }}" class="flex items-center p-3 border border-gray-200 rounded-lg">
          <!-- <img src="" alt="" class="w-8 h-8 rounded object-cover"> -->
          <div class="bg-gray-300 w-8 h-8 rounded"></div>
          <div class="ml-2">
            <div class="text-sm line-clamp-1">{{ $seller->name }}</div>
            <div class="text-xs text-gray-600 font-light">{{ count($seller->products) }} Produk</div>
          </div>
        </a>
        @endforeach
        <!-- <div class="flex items-center p-3 border border-gray-200 rounded-lg">
          <div class="bg-gray-300 w-8 h-8 rounded"></div>
          <div class="ml-2">
            <div class="text-sm line-clamp-1">Toko ABC Baru</div>
            <div class="text-xs text-gray-600 font-light">12 Produk</div>
          </div>
        </div> -->
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
      <li>
        <a href="#" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
        class="btn-delete flex items-center px-4 py-2 hover:bg-gray-100 text-red-500" data-id="">
          <i data-feather="trash-2" class="w-4 h-4 mr-2.5"></i>
          Hapus
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