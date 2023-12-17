<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Meraih Mimpi| @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script type="text/javascript" src="{{ asset('assets') }}/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head> 

<body>
    <div class="container" style="background:#ccc">
    <div class="alert alert-info text-center">
    <h3 style="margin-bottom: 0px"><b>Selamat datang Di Perpustakaan Meraih Mimpi </b></h3>

    </div>
        @include('menu')
        @include('benner')
        @include('perpus')
        @include('konten')
        @include('footer')
    </div>
</body>