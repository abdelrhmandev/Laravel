@extends('backend.base.guest')
@section('title', 'We cant find that page')
@section('style')
    <style>
        body {
            background-image: url('{{ asset('assets/backend/media/auth/bg1.jpg') }}');
        }

        [data-theme="dark"] body {
            background-image: url('{{ asset('assets/backend/media/auth/bg1-dark.jpg') }}');
        }
    </style>
@stop
@section('content')

<div class="d-flex flex-column flex-center flex-column-fluid">
  <!--begin::Content-->
  <div class="d-flex flex-column flex-center text-center p-10">
    <!--begin::Wrapper-->
    <div class="card card-flush w-lg-650px py-5">
      <div class="card-body py-15 py-lg-20">
        <!--begin::Title-->
        <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">Oops!</h1>
        <!--end::Title-->
        <!--begin::Text-->
        <div class="fw-semibold fs-6 text-gray-500 mb-7">We can't find that page.</div>
        <!--end::Text-->
        <!--begin::Illustration-->
        <div class="mb-3">
          <img src="{{ asset('assets/backend/media/auth/404-error.png') }}" class="mw-100 mh-300px theme-light-show" alt="" />
          <img src="{{ asset('assets/backend/media/auth/404-error-dark.png') }}" class="mw-100 mh-300px theme-dark-show" alt="" />
        </div>
        <!--end::Illustration-->
        <!--begin::Link-->
        <div class="mb-0">
          <a href="{{ url('/') }}" class="btn btn-sm btn-primary">{{ __('site.home') }}</a>
        </div>
        <!--end::Link-->
      </div>
    </div>
    <!--end::Wrapper-->
  </div>
  <!--end::Content-->
</div>

    <!--end::Authentication - Sign-in-->
@stop
@section('scripts')
    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
@stop
