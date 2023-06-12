@extends('layouts.app_admin')

@section('content')
<div class="px-4 my-5">
  <div class="flex justify-between items-end">
    <div>
      <nav class="flex mb-1" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
          <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm text-gray-700 hover:text-blue-600">
              <i data-feather="home" class="w-3.5 h-3.5"></i>
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
              <a href="{{ route('admin.sellers.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Penjual</a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
              <span class="ml-1 text-sm text-gray-500 md:ml-2">Detail Penjual</span>
            </div>
          </li>
        </ol>
      </nav>
      <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl">Detail {{ $seller->name }}</h2>
    </div>
  </div>

  <div class="my-5 p-4 sm:p-6 flex justify-between border border-gray-200 rounded-lg">
    <div class="flex">
      <div class="inline-block">
        @isset($seller->photo)
        <img class="rounded-lg aspect-square object-cover w-12 md:w-16 h-12 md:h-16" src="{{ $seller->photo }}" alt="image description">
        @endisset
        @empty($seller->photo)
        <img class="border border-gray-200 rounded-lg aspect-square object-cover w-12 md:w-16 h-12 md:h-16 p-2" src="{{ asset('images/seller.png') }}" alt="image description">
        @endempty
      </div>
      <div class="ml-2.5 sm:ml-3.5">
        <h5 class="text-base sm:text-xl tracking-wide font-bold text-gray-900 line-clamp-1">{{ $seller->name }}</h5>      
          <div>
            <div class="text-xs sm:text-sm text-gray-500">
              {{ $seller->address }}
            </div>
            <div class="flex items-center text-xs sm:text-sm text-gray-500">
              <i data-feather="map-pin" class="w-3 h-3 mr-1"></i>
              <span class="line-clamp-1">{{$seller->village->name}}, {{$seller->district->name}}</span>
            </div>
          </div>
      </div>
    </div>
    <div class="md:hidden">
      <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center py-1 sm:p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button"> 
        <i data-feather="more-vertical" class="w-4 h-4 sm:w-5 sm:h-5"></i>
      </button>
      <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">
          <li>
            <button data-modal-target="contact-modal" data-modal-toggle="contact-modal" class="block w-full px-4 py-2 text-start hover:bg-gray-100">Hubungi Penjual</button>
          </li>
          <li>
          <button data-modal-target="seller-edit-modal" data-modal-toggle="seller-edit-modal" class="block w-full px-4 py-2 text-start hover:bg-gray-100">Edit</button>
          </li>
        </ul>
      </div>
    </div>
    <div class="hidden md:flex space-x-3">
      <button type="button" data-modal-target="contact-modal" data-modal-toggle="contact-modal"
      class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 h-fit">
        Hubungi Penjual
      </button>
      <button type="button" data-modal-target="seller-edit-modal" data-modal-toggle="seller-edit-modal"
      class="flex items-center h-fit py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
        <i data-feather="edit" class="w-3 h-3 mr-2"></i>
        Edit
      </button>
    </div>
  </div>

  <div class="flex justify-end sm:justify-between items-center mt-8 mb-5">
    <div class="hidden sm:inline-block">   
      <form>
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari</label>
          <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i data-feather="search" class="w-5 h-5 text-gray-500"></i>
              </div>
              <input type="search" id="default-search" class="block w-96 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Cari nama produk..." required>
              <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Cari</button>
          </div>
      </form>

    </div>
    <div>
      <a href="{{ route('admin.sellers.products.create', ['seller' => $seller->id]) }}"
      class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs sm:text-sm px-5 py-2.5 text-center">
        Tambah Produk
      </a>
    </div>
  </div>

  <div class="overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Nama Produk</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Kategori</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Harga</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Status</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($seller->products as $product)
        <tr class="bg-white border-b">
          <th scope="row" class="px-6 py-4 font-normal text-gray-900 max-w-sm truncate">
            <div class="flex items-center">
              <img class="w-8 h-8 object-contain rounded-full mr-2" src="{{ $product->photo }}" alt="product photo">
              <div>
                <div class="text-sm">{{ $product->name }}</div>
              </div>
            </div>
          </th>
          <td class="px-6 py-4 max-w-xs">
            <div>
              @foreach($product->categories as $category)
              <div class="font-light text-gray-700 capitalize">{{ $category->name }}</div>
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

@include('admin.sellers.modal_edit', ['seller' => $seller, 'districts' => $districts])
@include('templates.admin.modal_contact', ['seller' => $seller])
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