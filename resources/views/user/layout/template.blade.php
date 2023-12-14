<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Personal - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('user/css/styles.css') }}" rel="stylesheet" />
    @stack('style')
    <style>
        .theme-color {
            background-color: burlywood;
        }

        .color-bg {
            background-color: whitesmoke;
        }

        .d-grid a.btn {
            transition: background-color 0.5s ease, color 0.5s ease;
            color: black;
        }

        .d-grid a.btn:hover {
            background-color: burlywood;
            color: white;
        }

        .img-container {
            overflow: hidden;
        }

        <style>.img-zoom {
            transition: transform 0.5s;
        }

        .img-zoom:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="d-flex flex-column h-100 color-bg">
    <main class="flex-shrink-0 justify-content-center">
        {{-- NAVBAR --}}
        @include('user.layout.navbar')

        {{-- CONTENT --}}
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('user.layout.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('user/js/scripts.js') }}"></script>

    @stack('script')
</body>

</html>
