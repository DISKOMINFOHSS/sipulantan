<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.meta')

  @include('includes.styles')

  <title>{{ env('APP_NAME') }}</title>
</head>
<body class="flex max-w-screen-xl">
  @include('templates.admin.sidebar')

  <div class="w-full mx-auto lg:mx-4">
    @include('templates.admin.navbar')

    @yield('content')
  </div>

  @include('includes.scripts')  
</body>
</html>