<!DOCTYPE html>
<html direction="rtl" dir="rtl" lang="fa" style="direction: rtl">
<!--begin::Head-->
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:site_name" content="apply" />
    <link rel="shortcut icon" href="" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/global/fonts/yekan-perrsian-numeral/font.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/global/plugins.bundle.rtl.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.bundle.rtl.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}" />
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body id="kt_body" class="bg-body font-iy">
<div class="d-flex flex-column flex-root">
    {{ $slot }}
</div>
<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/js.js') }}"></script>
<!--end::Page Custom Javascript-->
@vite('resources/js/app.js')
@livewireScripts
</body>
</html>

