<!DOCTYPE html>
<html lang="fa">
    <head>
        <title>@yield('title')|پنل مدیریت</title>
        @include('livewire.admin.layouts.head')
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
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="post d-flex flex-column-fluid" id="kt_post">
                            <div id="kt_content_container" class="container-xxl">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                    <!--end::Content-->
					<!--begin::Footer-->
					@include('livewire.admin.layouts.footer')
					<!--end::Footer-->
				</div>
			</div>
		</div>
        <!--begin::Javascript-->
	    @include('livewire.admin.layouts.scripts')
        @stack('custom-scripts')
    	<!--end::Javascript-->
	</body>
</html>
