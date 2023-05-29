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
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Nama Kategori</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Lokasi</th>
          <th scope="col" class="font-medium tracking-wide px-6 py-4">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sellers as $seller)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
            <div class="flex items-center">
              @isset($seller->photo)
              <img class="w-10 h-10 rounded-full mr-2" src="{{ $seller->photo }}" alt="seller photo">
              @endisset
              <div>
                <div class="text-base">{{ $seller->name }}</div>
                <div class="font-light text-gray-500">0 Produk</div>
              </div>
            </div>
          </th>
          <td class="px-6 py-4">
            <div>
              <div class="text-gray-700 capitalize">{{ $seller->village->name }}</div>
              <div class="font-light text-gray-700 capitalize">{{ $seller->district->name }}</div>
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="flex space-x-2.5">
              <a href="{{ route('admin.sellers.show', ['seller' => $seller->id]) }}" class="flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center">
                <i data-feather="external-link" class="w-3 h-3 mr-2"></i>
                Detail  
              </a>
              <button data-modal-target="seller-modal" data-modal-toggle="seller-modal" type="button" disabled
              class="btn-edit flex items-center text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg text-sm px-5 py-2.5 text-center cursor-not-allowed">
                <i data-feather="edit" class="w-3 h-3 mr-2"></i>
                Edit
              </button>
              <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" data-id="{{ $seller->id }}" type="button"
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
    </div>
  </div>

</div>

<div id="seller-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-2xl max-h-full">
    <form action="{{ route('admin.sellers.store') }}" method="post" enctype="multipart/form-data" class="relative bg-white rounded-lg pb-4">
      @csrf
      <div class="flex items-start justify-between p-4 rounded-t">
        <h3 class="text-xl font-medium text-gray-900 ml-2 mt-2">
          Tambah Penjual Baru
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="seller-modal">
          <i data-feather="x" class="w-5 h-5"></i>
        </button>
      </div>
      <div class="px-6 mt-3 space-y-6">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Toko <span class="text-red-600">*</span></label>
            <input type="text" name="name" id="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Warung Mama" required="">
          </div>
          <div class="col-span-3">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="photo">Upload Gambar</label>
            <input class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" id="photo" name="photo" type="file">
          </div>
          <div class="col-span-6">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
            <input type="text" name="address" id="address" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Jalan Panglima Batur">
          </div>
          <div class="col-span-3">
            <select id="districts" name="district" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              <option selected>Pilih Kecamatan</option>
              @foreach($districts as $district)
              <option value="{{ $district->id }}">{{ $district->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-span-3">
            <select id="villages" name="village" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              <option selected>Pilih Desa/Kelurahan</option>
            </select>
          </div>
          <div class="col-span-2">
            <label for="contact-type" class="block mb-2 text-sm font-medium text-gray-900">Informasi Kontak <span class="text-red-600">*</span></label>
            <select id="contact-type" name="type" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              <option selected value="whatsapp">WhatsApp</option>
              <option value="email">Email</option>
              <option value="phone number">No. Handphone</option>
            </select>
          </div>
          <div class="col-span-4">
            <label class="block mb-2 text-sm font-medium text-white">Kontak</label>
            <input type="text" name="contact" id="contact" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Misal. 08123456789" required="">
          </div>
        </div>
      </div>
      <div class="flex justify-end items-center p-6 space-x-2 rounded-b">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
      </div>
    </form>
  </div>
</div>

@include('templates.admin.modal_delete', ['title' => 'penjual', 'route' => 'sellers'])

@endsection

@push('after-script')
<script>
  const districts = {{ Js::from($districts) }};

  const districtOptions = document.querySelector('#districts').querySelectorAll('option');
  const villageSelect = document.querySelector('#villages');

  districtOptions.forEach((option, index) => {
    option.addEventListener('click', () => {
      
      while (villageSelect.lastElementChild) {
        villageSelect.removeChild(villageSelect.lastElementChild);
      }

      const villages = districts[index-1]['villages'];
      villages.forEach((village) => {
        const option = document.createElement('option');

        option.setAttribute('value', village['id']);
        option.innerText = village['name'];

        villageSelect.appendChild(option);
      });
    });
  });
</script>
@endpush