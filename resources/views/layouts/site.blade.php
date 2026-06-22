<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Petson Moída')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/site.css') }}">

</head>

<body>

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/navbar.js') }}"></script>

    <script src="{{ asset('assets/js/hero.js') }}"></script>

    <script src="{{ asset('assets/js/services.js') }}"></script>

    <script src="{{ asset('assets/js/gallery.js') }}"></script>

    <script src="{{ asset('assets/js/contact.js') }}"></script>

    <script src="{{ asset('assets/js/service-modal.js') }}"></script>

    <script src="{{ asset('assets/js/register-modal.js') }}"></script>

    <script src="{{ asset('assets/js/footer.js') }}"></script>

    <script src="{{ asset('assets/js/site.js') }}"></script>

    <script src="{{ asset('assets/js/register.js') }}"></script>

</body>

</html>