@extends('layouts.app_admin')

@section('content')
<div class="px-4 my-5">
  <div class="flex justify-between items-end">
    <div class="ml-1 sm:ml-0">
      <nav class="flex mb-1" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
          <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm text-gray-700 hover:text-blue-600">
              <i data-feather="home" class="w-3.5 h-3.5"></i>
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
              <span class="ml-1 text-sm text-gray-500 md:ml-2">Produk Barang</span>
            </div>
          </li>
        </ol>
      </nav>
      <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl">Daftar Produk<span class="hidden sm:inline"> Barang</span></h2>
    </div>
    <div>
      <a href="{{ route('admin.products.create') }}"
      class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Tambah<span class="hidden sm:inline"> Produk</span>
      </a>
    </div>
  </div>

<div class="w-80 my-5">


<form class="flex items-center">
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
            </svg>
        </div>
        <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search branch name..." required>
    </div>
    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>
</div>


  <div class="my-7 overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Nama Produk</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Penjual</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Kategori</th>
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
              <a href="{{ route('admin.sellers.show', ['seller' => $product->seller->id])}}" class="text-gray-700 hover:underline">
              {{ $product->seller->name }}
              </a>
              <!-- <div class="text-gray-700 capitalize">{{ $product->seller->name }}</div> -->
            </div>
          </td>
          <td class="px-6 py-4 max-w-xs">
            <div>
              <!-- <div class="text-gray-700 capitalize"></div> -->
              @foreach($product->categories as $category)
              <div class="font-light text-gray-700 capitalize">{{ $category->name }}</div>
              <!-- <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">{{ $category->name }}</span> -->
              @endforeach
            </div>
          </td>
          <td class="px-6 py-4">
            <div>
              <div class="text-gray-700 capitalize">Rp{{$product->price}}</div>
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
    <div class="my-4">
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
