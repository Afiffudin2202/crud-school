<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Dashboard</title>

    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugin/css/all.min.css">
    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}assets/dist/css/dashboard.css" rel="stylesheet">
</head>

<body>


    <!-- header -->
    @include('dashboard.partials.header')

    <div class="container-fluid">
        <div class="row">

            <!-- sidebar -->
            @include('dashboard.partials.sidebar')

            <!-- main -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
        integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/') }}assets/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assets/plugin/js/all.min.js"></script>
</body>

</html>
