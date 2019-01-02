<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>
    @include('inc.header')
         @include('inc.navbar')
            <div id="app">
                @include('inc.messages')
                @yield('content')
    
    @include('inc.footer')
     <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <!--
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
       <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
                <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace( 'article-ckeditor');
                        CKEDITOR.add
                        CKEDITOR.replace( 'ingredient-ckeditor');
                        CKEDITOR.add
                    </script>

                <!-- ##### All Javascript Files ##### -->
                <!-- jQuery-2.2.4 js -->
                <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
                <!-- Popper js -->
                <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
                <!-- Bootstrap js -->
                <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
                <!-- All Plugins js -->
                <script src="{{ asset('js/plugins/plugins.js') }}"></script>
                <!-- Google-map js -->
                <script src="{{ asset('js/google-map/map-active.js') }}"></script>
                <!-- Active js -->
                <script src="{{ asset('js/active.js') }}"></script>


                <!-- Foto skatīšanās skripts(mans) -->
                <script src="{{ asset('js/preview.js') }}"></script>
            </div>
</body>
</html>
