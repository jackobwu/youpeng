<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
        {{ !empty($__env->yieldContent('title')) ? ' | ' : '' }}
        {{ config('app.name') }}
    </title>
    <!-- Scripts -->
    
    <!-- Fonts -->
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <!-- Styles -->
    
    <!-- Bulma Version 0.7.1-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />

</head>
    <body>
        @include('partials.nav')
        @include('partials.alert')
        <section class="section">
            <div class="container">   
                @yield('content')
            </div>
        </section>
    </body>
</html>