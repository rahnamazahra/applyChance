<!DOCTYPE html>
<html lang="fa">
    <head>
        @include('livewire.admin.layouts.head')
        <title>@yield('title')|پنل مدیریت</title>
    </head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" data-kt-app-layout="light-sidebar" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				@include('livewire.admin.layouts.sidebar')
				<!--end::Aside-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					@include('livewire.admin.layouts.header')
                    <!--begin::breadcrumb-->
                    <div class="toolbar" id="kt_toolbar">
                        @include('livewire.admin.layouts.breadcrumb')
                    </div>
                    <!--end::breadcrumb-->
					<!--end::Header-->
					<!--begin::Content-->
                   {{ $slot }}
                    <!--end::Content-->
					<!--begin::Footer-->
					@include('livewire.admin.layouts.footer')
					<!--end::Footer-->
				</div>
			</div>
		</div>
        <!--begin::Javascript-->
	    @include('livewire.admin.layouts.scripts')
        @yield('custom_scripts')
    	<!--end::Javascript-->
	</body>
</html>
