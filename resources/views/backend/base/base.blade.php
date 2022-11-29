<!DOCTYPE html>
<html direction="{{ LaravelLocalization::getCurrentLocaleDirection() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" style="direction: {{ LaravelLocalization::getCurrentLocaleDirection() }}" lang="{{ app()->getLocale() }}" lang="{{ app()->getLocale() }}">
	<!--begin::Head-->
	<head>
		<title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('assets/backend/media/logos/favicon.ico')}}" />
		<!--begin::Fonts-->
		
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		@yield('style')
		<!--end::Vendor Stylesheets-->
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>		
		@if(app()->getLocale() === 'ar')
 
			<link href="https://fonts.googleapis.com/css2?family=Cairo:700"> 		
			<link href="{{ asset('assets/backend/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{ asset('assets/backend/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{ asset('assets/backend/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		@else
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/backend/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/backend/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		@endif
		<!--end::Global Stylesheets Bundle-->		
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url()" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				@include('layouts.backend.aside._base') 
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					@include('layouts.backend.header._base') 
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						@yield('content')
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					@include('layouts.backend._footer') 
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->
		@include('backend.partials.topbar._activity-drawer')
		<!--end::Drawers-->
		<!--end::Main-->
 
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			@include('layouts.backend._scrolltop') 
		</div>
		<!--end::Scrolltop-->
		<!--begin::Modals-->
		@include('backend.partials.modals._main')
		<!--end::Modals-->
		<!--begin::Javascript-->
	 
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/backend/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
 
		<!--begin::Custom Javascript(used for this page only)-->
		@yield('scripts')
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>