<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('img/logo.ico')}}" rel="shortcut icon" />
        <meta name="theme-color" content="#2E2EFE">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->

        <script src="{{ asset('js/jquery-3.3.1.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/datatables.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed:900" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/pretty.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <!-- Start of  Zendesk Widget script -->
        <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=271e6fa9-6b72-46b7-b100-113ec88cf622"></script>
        <!-- End of  Zendesk Widget script -->
    </head>
    <body Scroll="NO">
        <div id="app sec-spacer">
            @include('includes.menu')
            
            <main class="py-4">
                @yield('contenido')
            </main>
            <footer>
                <p class="text-center">Web desarrollada por GambitoCorp &COPY; para <span class="text-capitalize">{{ config('app.name', 'Laravel') }} &COPY;</span> todos los derechos reservados {{date('Y')}}</p>
            </footer>
        </div>
        <script>
            /* Smooth scrolling para anclas*/
            $('a.smooth').live('click', function(e) {
                e.preventDefault();
                var link = $(this);
                var anchor = link.attr('href');
                $('html, body').stop().animate({
                    scrollTop: $(anchor).offset().top - ($('#menu').height() + 21)
                }, 1500, 'easeOutBack');
            });
        </script>
    </body>
</html>
