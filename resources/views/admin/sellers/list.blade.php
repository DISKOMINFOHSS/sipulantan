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
          <li aria-current="page">
            <div class="flex items-center">
              <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
              <span class="ml-1 text-sm text-gray-500 md:ml-2">Penjual</span>
            </div>
          </li>
        </ol>
      </nav>
      <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl">Daftar Penjual</h2>
    </div>
    <div>      
      <button data-modal-target="seller-modal" data-modal-toggle="seller-modal" type="button"
      class="btn-add block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Tambah Penjual
      </button> 
    </div>
  </div>

  <div class="my-10 overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Nama Toko</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Lokasi</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sellers as $seller)
        <tr class="bg-white border-b">
          <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
            <div class="flex items-center">
              @isset($seller->photo)
              <img class="rounded-lg aspect-square object-cover w-10 h-10 mr-2" src="{{ $seller->photo }}" alt="image description">
              @endisset
              @empty($seller->photo)
              <img class="border border-gray-200 rounded-lg aspect-square object-cover w-10 h-10 mr-2 p-1.5" src="{{ asset('images/seller.png') }}" alt="image description">
              @endempty
              <div>
                <div class="text-base">{{ $seller->name }}</div>
                <!-- <div class="font-light text-gray-500">{{ count($seller->products) }} Produk</div> -->
              </div>
            </div>
          </th>
          <td class="px-6 py-4">
            <div>
              <div class="text-gray-700">@isset($seller->village) {{ $seller->village->name }} @endisset</div>
              <div class="font-light text-gray-700">@isset($seller->district) {{ $seller->district->name }} @endisset</div>
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="flex space-x-2.5">
              <a href="{{ route('admin.sellers.show', ['seller' => $seller->id]) }}" class="flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center">
                <i data-feather="external-link" class="w-3 h-3 mr-2"></i>
                Detail  
              </a>
              <!-- <button data-modal-target="seller-edit-modal" data-modal-toggle="seller-edit-modal" type="button"
              class="btn-edit flex items-center text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg text-sm px-5 py-2.5 text-center cursor-not-allowed">
                <i data-feather="edit" class="w-3 h-3 mr-2"></i>
                Edit
              </button> -->
              <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" data-id="{{ $seller->id }}" type="button"
              class="btn-delete flex items-center py-2.5 px-5 text-sm text-red-500 hover:text-white border border-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg focus:z-10">
                <i data-feather="trash-2" class="w-3 h-3 mr-2"></i>
                Hapus
              </button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="my-4">
      {{ $sellers->links() }}
    </div>
  </div>

</div>

@include('admin.sellers.modal_create')
@include('templates.admin.modal_delete', ['title' => 'penjual', 'route' => 'sellers'])

@endsection