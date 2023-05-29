@extends('layouts.app_admin')

@section('content')
<div class="px-4 my-8">
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
              <span class="ml-1 text-sm text-gray-500 md:ml-2">Kategori</span>
            </div>
          </li>
        </ol>
      </nav>
      <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl">Daftar Kategori</h2>
    </div>
    <div>      
      <button data-modal-target="category-modal" data-modal-toggle="category-modal" type="button"
      class="btn-add block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Tambah Kategori
      </button> 
    </div>
  </div>

  <div class="my-10 overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Nama Kategori</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Jumlah Produk</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr class="bg-white border-b">
          <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
            <div class="flex items-center">
              @isset($category->photo)
              <img src="{{ $category->photo }}" class="w-8 h-8 rounded-lg mr-2" alt="">
              @endisset
              @empty($category->photo)
              <div class="flex items-center justify-center bg-gray-100 rounded-lg w-8 h-8 mr-2">
                <i data-feather="tag" class="text-gray-700 w-4 h-4 ml-1"></i>
              </div>
              @endempty
              {{ $category->name }}
            </div>
          </th>
          <td class="px-6 py-4">0</td>
          <td class="px-6 py-4">
            <div class="flex space-x-2.5">
              <button data-modal-target="category-modal" data-modal-toggle="category-modal" type="button"
              class="btn-edit flex items-center py-2.5 px-5 text-sm text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                <i data-feather="edit" class="w-3 h-3 mr-2"></i>
                Edit
              </button>
              <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" data-id="{{ $category->id }}" type="button"
              class="btn-delete flex items-center py-2.5 px-5 text-sm focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 rounded-lg focus:z-10">
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
      {{ $categories->links() }}
    </div>
  </div>
</div>

@include('admin.categories.modal_add_edit')
@include('templates.admin.modal_delete', ['title' => 'kategori', 'route' => 'categories'])

@endsection