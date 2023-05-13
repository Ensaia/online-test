<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('favicons/mcq.ico') }}" type="image/x-icon"/>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Style -->
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bt.css') }}"> --}}
        <!-- Font awesome -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
        @vite('resources/js/app.js','resources/css/app.css')
    </head>
    <body class="antialiased">
        <div id="app"></div>
        <!-- jQuery -->
        <script src="{{ asset('js/jquery.js') }}"></script>
        <!-- Font awesome -->
        <script src="{{ asset('js/fontawesome.min.js') }}"></script>
        <!-- Notifications -->
        <script src="{{ asset('js/notifications.js') }} "></script>
        <!-- Bootbox -->
        <script src="{{ asset('js/bootbox.all.js') }}"></script>
        <!-- easytimer -->
{{--        <script src="{{ asset('js/easytimer.js') }}"></script>--}}
    </body>
</html>
