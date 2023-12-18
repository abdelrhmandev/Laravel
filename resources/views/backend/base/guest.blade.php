<!DOCTYPE html>
<html direction="{{ LaravelLocalization::getCurrentLocaleDirection() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" style="direction: {{ LaravelLocalization::getCurrentLocaleDirection() }}" lang="{{ app()->getLocale() }}">
	<head>
		<title>{{ config('app.name', 'Laravel') }}  @yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="The most advanced Bootstrap Admin " />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React" />
		<meta property="og:url" content="#" />
		<meta property="og:site_name" content= Metronic" />
		<link rel="canonical" href="google.com" />
		<link rel="shortcut icon" href="{{ asset('assets/backend/media/logos/favicon.ico')}}" />
		@yield('style')
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>		
		@if(app()->getLocale() === 'ar') 
		<link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&family=Roboto:wght@500&display=swap" rel="stylesheet">
			<link href="{{ asset('assets/backend/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{ asset('assets/backend/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		@else 
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
		<link href="{{ asset('assets/backend/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/backend/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		@endif

		<link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />


	</head>
	<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<div class="d-flex flex-column flex-root">
			@yield('content')
		</div>
		<script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/backend/js/scripts.bundle.js')}}"></script> 
		@yield('scripts')
	</body>
</html>