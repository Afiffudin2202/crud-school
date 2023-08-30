<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    {{-- bootstraps --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/bootstrap.css">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/style.css">
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugin/css/all.min.css">
</head>

<body>

    <div class="home container-fluid p-0 bg-dark" data-bs-theme="dark">
        @include('partials.nav')
        <div class="main">
            @yield('content')
        </div>

    </div>

    <script src="{{ asset('/') }}assets/dist/js/bootstrap.js"></script>
    <script src="{{ asset('/') }}assets/plugin/js/all.min.js"></script>
</body>

</html>
