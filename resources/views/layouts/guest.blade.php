<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.0.0-rc.0/dist/css/coreui.min.css" rel="stylesheet"
          integrity="sha384-/FoOwMQDZHR+AUn9Z0QeIGSKLStU7et6p5Nu9yXtI22ZOxRUP/jIvHXC6Yc1td51" crossorigin="anonymous">
    <link href="https://coreui.io/demos/bootstrap/4.2/free/vendors/simplebar/css/simplebar.css" rel="stylesheet">

    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css')  }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- CoreUI and necessary plugins-->
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.0.0-rc.0/dist/js/coreui.bundle.min.js"
        integrity="sha384-ndYvZ1pzCEl0ODt53q58pd9sKJKiqtXq9fe2jFIPtDbZ9BREZw+XZHoaFag0qWxy"
        crossorigin="anonymous"></script>
<script src="https://coreui.io/demos/bootstrap/4.2/free/vendors/simplebar/js/simplebar.min.js"></script>

</body>
</html>
