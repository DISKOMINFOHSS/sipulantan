<div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-fit max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="delete-modal">
        <i data-feather="x" class="w-5 h-5"></i>
        <span class="sr-only">Close modal</span>
      </button>
      <div class="p-6 text-center">
        <i data-feather="trash-2" class="mx-auto my-5 text-gray-400 w-14 h-14"></i>
        <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Anda yakin ingin menghapus {{ $title }} ini?</h3>
        <button data-modal-hide="delete-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
          Tidak
        </button>
        <form class="inline-flex" action="" method="post">
          @method('delete')
          @csrf
          <button data-modal-hide="delete-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
            Ya, hapus
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

@push('after-script')
<script>
  const deleteForm = document.querySelector('#delete-modal');

  const deleteButtons = document.querySelectorAll('.btn-delete');
  deleteButtons.forEach(deleteButton => {
    deleteButton.addEventListener('click', () => {
      let route = `{{ route('admin.' . $route . '.destroy', ':id') }}`;
      route = route.replace(':id', deleteButton.dataset.id);

      deleteForm.querySelector('form').setAttribute('action', route);
    });
  });
</script>
@endpush