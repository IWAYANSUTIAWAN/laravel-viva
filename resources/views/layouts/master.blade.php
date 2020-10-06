<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title'){{config('app.name')  }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
 <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">


  <!-- Template CSS -->
  {{-- <link rel="stylesheet" href="../assets/css/style.css"> --}}
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  {{-- <link rel="stylesheet" href="../assets/css/components.css"> --}}
   <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

   {{-- sweetalert css --}}
    <link rel="stylesheet" href="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">


  @stack('page-style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
     @include('layouts.header') 
     @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1> @yield('title')</h1>
           
            <div class="section-header-breadcrumb">
                @yield('tombol-cetak')
            </div>
          </div>

         @yield('content')
         
        </section>
        @yield('modal')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="">Wayan Sutiawan</a>
        </div>
        <div class="footer-right">
          -
        </div>
      </footer>
    </div>
  </div>

@stack('before-scripts')

  <!-- General JS Scripts -->
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
 
    <!-- General JS Scripts -->
  {{-- <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script> --}}

  <!-- JS Libraies -->
  @stack('page-scripts')

    <!-- JS Libraies -->
  <script src="{{ asset('assets/node_modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/jquery-ui/jquery-ui.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  @stack('after-scripts')
  <!-- Page Specific JS File -->

 
</body>
</html>
