<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen"> -->
         <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        

    </head>
    <body class="hold-transition sidebar-mini">
    
    <div class="wrapper">

        @include('shared.navbar')
        @include('shared.sidebar')
    
        <div class="content-wrapper">
        <title>@yield('title')</title>
        @yield('content')
        </div>
        <br>
        
    </div>
    
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/70c4806ca0.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script> 
        <script src="{{ asset('js/popper.min.js') }}"></script> 
        <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
    </body>
</html>