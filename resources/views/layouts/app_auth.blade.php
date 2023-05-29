<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.meta')

  @include('includes.styles')

  <title>{{ env('APP_NAME') }}</title>
</head>
<body class="h-screen">
  @yield('content')

  @include('includes.scripts')  
</body>
</html>