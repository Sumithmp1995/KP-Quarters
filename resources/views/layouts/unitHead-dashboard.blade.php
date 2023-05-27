<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kerala police QMS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ URL::to('/') }}/assets/css/bootstrap.min.lettersize.css" rel="stylesheet">

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Template Main CSS File -->

    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/notification.css" rel="stylesheet">
    <link href="/assets/css/unitheadcard.css" rel="stylesheet">
    @yield('headers')
</head>

<body>
    @include('layouts.navbar')
    @include('layouts.unitHead-sidebar')
    <main id="main" class="main">
        <section class="section dashboard">
            @yield('content')
        </section>
    </main>
    @include('layouts.footer')

</body>

</html>
<script src="assets/js/main.js"></script>
@yield('scripts')

