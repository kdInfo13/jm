<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        @yield('meta')
        
        

<!--        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

         Check if the language is set to RTL, so apply the RTL layouts 
         Otherwise apply the normal LTR layouts 
        {{ style(mix('css/frontend.css')) }}

        @stack('after-styles')-->

        <link rel="stylesheet" href="{{ asset('css/theme/css.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/css-1.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/hover-min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/bootstrap.min.css') }}">
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="{{ asset('css/theme/bootsnav.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/responsive.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
        
    </head>
    <body>
        <div id="app">
            <!--<div class="wrapper">-->
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <!--<div class="container">-->
                @include('includes.partials.messages')
                @yield('content')
                @include('frontend.includes.footer')
            <!--</div> container -->
        <!--</div>-->
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}
        @stack('after-scripts')
        
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
  
        <script src="{{ asset('js/modernizr.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/bootsnav.js') }}"></script>
        <script src="{{ asset('js/jquery.filterizr.min.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <!--<script src="{{ asset('js/waypoints.min.js') }}"></script>-->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <!--<script src="{{ asset('js/datepicker.js') }}"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        @include('includes.partials.ga')
    </body>
</html>
