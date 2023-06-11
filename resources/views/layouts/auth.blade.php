<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <!--begin::Fonts-->
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/global/fonts/yekan-perrsian-numeral/font.css') }}"/>
        <!--end::Fonts-->
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
          {{ $slot }}
        </div>
        @livewireScripts
    </body>
</html>
