<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="--iq-primary: rgb(78, 55, 178); --iq-light-primary: rgba(78, 55, 178,0.1); --iq-primary-hover: rgba(78, 55, 178,0.8);">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>CSPU - TEST</title>
      <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.min.css">
      @if (Route::currentRouteNamed('dashboard.library-book-detal'))
        
      @else
         @vite(['resources/css/app.css', 'resources/js/app.js'])
      @endif
     
      @include('library.assets.header')
   </head>
   <body>
         <!-- Wrapper Start -->
         <div class="wrapper">
            @include('library.sidebar')
            @include('library.topbar')
            @yield('content')      
        </div>
        <!-- Wrapper END -->        

        @include('library.footer')
        <!-- color-customizer END -->        
        @include('library.assets.js')
   </body>
</html>
