<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.meta')

  @include('includes.styles')

  <title>{{ env('APP_NAME') }}</title>
</head>
<body>
  @include('templates.landing.navbar')

  @yield('content')

  @include('includes.scripts')  
</body>
</html>