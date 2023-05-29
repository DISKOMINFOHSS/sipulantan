@extends('layouts.app_auth')

@section('content')
<div class="min-h-full mt-8 sm:mt-16">
  <div class="sm:border mx-auto sm:rounded-lg p-8 sm:max-w-sm">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <i class="mx-auto w-12 h-12" data-feather="octagon"></i>
      <h2 class="mt-5 text-center text-2xl font-bold leading-9 text-gray-900">Masuk ke Akun</h2>
    </div>
    <div class="my-5 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-4" action="{{ route('auth.post.login') }}" method="POST">
        @csrf
        <div>
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="username" name="username" type="text" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>
        </div>
        <div>
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>
        </div>
        <div>
          <button type="submit" class="flex w-full mt-8 justify-center rounded-md bg-blue-700 px-5 py-2.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Masuk</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection