<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Ada Kesalahan',
            html: "<p>{{ Session::get('error') }}</p>",
            showConfirmButton: false,
        })
    </script>
    @endif

    <script type="module" src="{{ asset('assets/static/js/firebase.js') }}"></script>
</body>

</html>