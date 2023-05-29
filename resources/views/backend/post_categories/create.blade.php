@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">Recipes</li>
    <li class="breadcrumb-item text-dark">Listings</li>
@stop

@section('style')
    @if (app()->getLocale() === 'ar')
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
            type="text/css" />
    @endif



    <style>
        .ribbon.ribbon-right .ribbon-target {
            border-top-left-radius: 0.42rem;
            border-bottom-left-radius: 0.42rem;
        }

        .ribbon .ribbon-target {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 5px 10px;
            position: absolute;
            z-index: 1;
        }

        .my-field-error .fv-plugins-message-container,
        .my-field-error .fv-plugins-icon {
            font-size: 0.925rem;
            color: #f1416c;

        }

        .fv-plugins-tachyons .fv-plugins-icon {
            top: 30px;
        }

        .my-field-success .fv-plugins-message-container,
        .my-field-success .fv-plugins-icon {
            font-size: 0.925rem;
            color: #28a745;
        }
    </style>
@stop




@section('content')

    <div class="container-xxl" id="kt_content_container">



        <form id="CreatePostCategory" action="{{ $storeUrl }}" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="{{ $redirectUrl }}" enctype="multipart/form-data">
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 mb-7 me-lg-10">
                <!--begin:::Tabs-->
                <x-backend.langs.ulTabs />
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <x-backend.langs.LangInputs />
                <!--end::Tab content-->
                <x-backend.btns.create />
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-7 w-lg-400px gap-lg-10">
                <!--begin::Thumbnail settings-->
                <x-backend.cms.image />
                <!--end::Thumbnail settings-->
                <!--begin::Status-->         
            </div>
        </form>
    </div>
@stop








@section('scripts')

    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>

    <script>
        handleFormSubmit();
    </script>

    {{-- @include('backend.form') --}}
@stop
