<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <meta name="description" content="Discover the full spectrum of luxury car services at Exotic Cars Dubai, offering specialized services. maintain and enhance your vehicle's excellence.">
    <link rel="preconnect" href="https://fonts.gstatic.com/">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/icons/font-awesome/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/bootstrap-docs.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin_panel/libs/clockpicker/bootstrap-clockpicker.min.css') }}" type="text/css">
    <!-- Dropzone CSS -->

   

    @stack('css')




</head>

<body>

    @include('partials.sidebar')
    <div class="layout-wrapper">
        @include('partials.header')
        <div class="content">
            @yield('content')
        </div>
        @include('partials.footer')
    </div>



    <script src="{{ asset('admin_panel/libs/bundle.js') }}"></script>
    <script src="{{ asset('admin_panel/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    @stack('js')
    <script src="{{ asset('admin_panel/dist/js/app.min.js') }}"></script>
</body>

</html>