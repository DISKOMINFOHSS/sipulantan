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
          <div class="col-span-6 md:col-span-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Toko <span class="text-red-600">*</span></label>
            <input type="text" name="name" id="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Warung Mama" required="">
          </div>
          <div class="col-span-6 md:col-span-3">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="photo">Upload Gambar</label>
            <input class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" id="photo" name="photo" type="file">
          </div>
          <div class="col-span-6">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
            <input type="text" name="address" id="address" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Jalan Panglima Batur">
          </div>
          <div class="col-span-6 md:col-span-3">
            <select id="districts" name="district" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
              <option value="" selected>Pilih Kecamatan</option>
              @foreach($districts as $district)
              <option value="{{ $district->code }}">{{ $district->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-span-6 md:col-span-3">
            <select id="villages" name="village" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
              <option value="" selected>Pilih Desa/Kelurahan</option>
            </select>
          </div>
          <div class="col-span-6 md:col-span-2">
            <label for="contact-type" class="block mb-2 text-sm font-medium text-gray-900">Informasi Kontak <span class="text-red-600">*</span></label>
            <select id="contact-type" name="type" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
              <option selected value="whatsapp">WhatsApp</option>
              <!-- <option value="email">Email</option>
              <option value="phone number">No. Handphone</option> -->
            </select>
          </div>
          <div class="col-span-6 md:col-span-4">
            <label class="hidden md:block mb-2 text-sm font-medium text-white">Kontak</label>
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

        option.setAttribute('value', village['code']);
        option.innerText = village['name'];

        villageSelect.appendChild(option);
      });
    });
  });
</script>
@endpush