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
              @if(session('seller_id'))
              <a href="{{ route('admin.sellers.show', ['seller' => session('seller_id')]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Penjual</a>
              @else
              <a href="{{ route('admin.products.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Produk Barang</a>
              @endif
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
              <span class="ml-1 text-sm text-gray-500 md:ml-2">Buat Produk</span>
            </div>
          </li>
        </ol>
      </nav>
      <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl">Buat Produk</h2>
    </div>
  </div>

  <div class="my-10 mx-auto">
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk <span class="text-red-500">*</span></label>
          <input type="text" name="name" id="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Dodol Asli Kandangan" required="">
        </div>
        <div class="sm:col-span-2">
          <label for="seller" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penjual <span class="text-red-500">*</span></label>
            <select id="seller" name="seller" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              <option selected="">Pilih Penjual</option>
              @foreach($sellers as $seller)
              <option value="{{ $seller->id }}" @if($seller->id == session('seller_id')) selected @endif>{{ $seller->name }}</option>
              @endforeach
            </select>
        </div>
        <div class="w-full">
          <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga <span class="text-red-500">*</span></label>
          <div class="relative rounded-lg">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <span class="text-gray-500 sm:text-sm">Rp</span>
            </div>
            <input type="number" name="price" id="price" class="block w-full rounded-lg border-0 py-2.5 pl-9 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm" placeholder="200000">
          </div>
        </div>
        <div class="w-full">
          <label for="discount" class="block mb-2 text-sm font-medium text-gray-900">Diskon (%)</label>
          <input type="number" name="discount" id="discount" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
        </div>
        <div>
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
          <select id="category" name="category" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected="">Pilih Kategori</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900" for="photo">Foto Produk <span class="text-red-500">*</span></label>
          <input class="block mb-3 w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" id="photo" name="photo" type="file">
        </div>
        <div>
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
          <textarea id="description" name="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <div>
          <label for="specification" class="block mb-2 text-sm font-medium text-gray-900">Spesifikasi</label>
          <textarea id="specification" name="specification" rows="5" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <div>
          <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" name="archive" id="archive" value="" class="sr-only peer">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
            <span class="ml-3 text-sm text-gray-900">Arsipkan produk ini</span>
          </label>
        </div>
      </div>
      <div class="flex justify-end mt-4 sm:mt-6 space-x-3">
        <a href="{{ url()->previous() }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
          Batal
        </a>
        <button type="submit" class="inline-block items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
          Tambah Produk
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('after-script')
<script>
  const checkBoxArchive = document.querySelector('#archive');
  checkBoxArchive.addEventListener('click', () => {
    const status = checkBoxArchive.getAttribute('value');
    if (status) {
      checkBoxArchive.setAttribute('value', '');
    } else {
      checkBoxArchive.setAttribute('value', 1);
    }
  });
</script>
@endpush