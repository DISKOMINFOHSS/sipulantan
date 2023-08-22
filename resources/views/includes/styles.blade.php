@stack('before-style')

<link rel="icon" href="{{ asset('/images/logo-hss.png')}}">

<!-- Google Font | Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<script src="https://unpkg.com/feather-icons"></script>

<!-- Flowbite - Tailwind CSS -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

@stack('after-style')