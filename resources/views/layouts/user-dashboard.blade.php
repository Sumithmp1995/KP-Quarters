<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kerala police QMS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ URL::to('/') }}/assets/css/style.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/assets/css/notification.css" rel="stylesheet">

  <!-- Favicons -->
  <link href="{{ URL::to('/') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ URL::to('/') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::to('/') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  {{-- <link href="resources/css/adminstyle.css" rel="stylesheet"> --> --}}

  
  <script src="{{ URL::to('/') }}/assets/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  
  <!-- Template Main CSS File -->
  <link href="{{ URL::to('/') }}/assets/css/style.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/assets/css/notification.css" rel="stylesheet">
 
</head>

<body>
  @include('layouts.navbar')
  @include('layouts.user-sidebar')
  <main id="main" class="main"> 
    <section class="section dashboard"> 
             @yield('content')
    </section>
  </main>
  @include('layouts.footer')
</body>
</html>