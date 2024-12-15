<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Welcome to Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <style>
        .footer#footer {
            border-top: none;
        }
    </style>

    @yield('header-css')

    @include('backend.common.styles')

</head>

<body>

    @include('backend.layouts.header')

    @include('backend.layouts.sidebar')

    <main id="main" class="main">

      @yield('main-content')

    </main>

    @include('backend.layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @yield('footer-script')

    @include('backend.common.scripts')

</body>

</html>
