<div id="category-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="category-modal">
        <i data-feather="x" class="w-5 h-5"></i>
        <span class="sr-only">Close modal</span>
      </button>
      <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-5 text-xl font-medium text-gray-900">Tambah Kategori Baru</h3>
          <form class="space-y-6 my-5" action="" method="post" enctype="multipart/form-data">
            @method('')
            @csrf
            <div>
              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori <span class="text-red-500">*</span></label>
              <input type="text" name="name" id="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <!-- <div>
              <label class="block mb-2 text-sm font-medium text-gray-900" for="photo">Upload Gambar</label>
              <input class="block mb-3 w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" id="photo" name="photo" type="file">
            </div> -->
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center">Simpan</button>
          </form>
      </div>
    </div>
  </div>
</div>

@push('after-script')
<script>
  const arr = {{ Js::from($categories) }};
  
  const categoryForm = document.querySelector('#category-modal');
  const fillCategoryForm = (method, data) => {
    let title, route;

    if (method === 'post') {
      title = 'Tambah Kategori Baru';
      route = `{{ route('admin.categories.store') }}`;
    } else if (method === 'put') {
      title = 'Edit Kategori';
      route = `{{ route('admin.categories.update', ':id' )}}`;
      route = route.replace(':id', `${data['id']}`);
    }

    categoryForm.querySelector('h3').innerText = `${title}`;
    categoryForm.querySelector('form').setAttribute('action', route);
    categoryForm.querySelector(`input[name='_method']`).setAttribute('value', method);
    categoryForm.querySelector('#name').setAttribute('value', data['name']);
  }

  const addButton = document.querySelector('.btn-add');
  addButton.addEventListener('click', () => {
    fillCategoryForm('post', {'name': ''});
  });

  const editButtons = document.querySelectorAll('.btn-edit');
  editButtons.forEach((editButton, index) => {
    editButton.addEventListener('click', () => {
      fillCategoryForm('put', arr['data'][index]);
    });
  });
</script>
@endpush