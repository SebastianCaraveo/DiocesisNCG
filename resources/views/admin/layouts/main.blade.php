<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('/dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/dashboard/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body id="page-top">
    <div id="wrapper">
      <!-- Sidebar -->
      @include('admin.layouts.aside')
      <!-- Sidebar -->
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <!-- TopBar -->
          @include('admin.layouts.header')
          <!-- Topbar -->

          <!-- Container Fluid-->
          @yield('contenido')

          @yield('content.user')

          @yield('content.news')

          @yield('content.priest')

          @yield('content.church')

          @yield('content.service')

          <!---Container Fluid-->
        </div>
      </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('/dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('/dashboard/js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('/dashboard/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/dashboard/js/demo/chart-area-demo.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
    
  </body>

</html>


