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
    <!--begin::Fonts-->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/global/fonts/yekan-perrsian-numeral/font.css') }}"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/global/plugins.bundle.rtl.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.bundle.rtl.css') }}" />
    <!--end::Global Stylesheets Bundle-->
    @vite('resources/css/app.css')
    <!-- Styles -->
    @livewireStyles
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body font-iy">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    {{ $slot }}
</div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by background and verify pages)-->
<script src="{{ asset('admin/assets/js/custom/authentication/sign-in/general.js') }}"></script>
<!--end::Page Custom Javascript-->
@vite('resources/js/app.js')
@livewireScripts
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>

