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

  <!-- <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

   <!-- Google Fonts -->
  <!-- <link href="https://fonts.gstatic.com" rel="preconnect"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
  

  
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /> -->
  
  
  <!-- <link href="/assets/css/style.css" rel="stylesheet">
  <link href="/assets/css/notification.css" rel="stylesheet"> -->

  <!-- Favicons -->
  <!-- <link href="/assets/img/favicon.png" rel="icon"> -->
  <!-- <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.gstatic.com" rel="preconnect"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

    <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  
  
  <!-- <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->
  
  <!-- <link href="/resources/css/adminstyle.css" rel="stylesheet">  -->
    <!-- <link href="resources/css/navbar.css" rel="stylesheet">
  <link href="resources/css/adminstyle.css" rel="stylesheet"> -->


  <!-- <script src="/assets/bootstrap/js/bootstrap.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  
  <link href="{{ URL::to('/') }}/assets/css/bootstrap.min.lettersize.css" rel="stylesheet">
    
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>   -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   -->
  
  
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>  
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>  
  
    
  <!-- Template Main CSS File -->
  
    <link href="/assets/css/style.css" rel="stylesheet">
  <link href="/assets/css/notification.css" rel="stylesheet">
  <link href="/assets/css/unitheadcard.css" rel="stylesheet"> 
  @yield('headers')
</head>

<body>
  @include('layouts.navbar')
  @include('layouts.ri-sidebar')
  <main id="main" class="main"> 
    <section class="section dashboard"> 
             @yield('content')
    </section>
  </main>
  @include('layouts.footer')
</body>

</html>
@yield('scripts')
<script src="assets/js/main.js"></script>