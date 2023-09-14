@extends('backend.base.base')
@section('breadcrumbs')
    <li class="breadcrumb-item text-dark">{{ __($trans . '.plural') }}</li>
@stop
@section('style')
    @if (app()->getLocale() === 'ar')
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
            type="text/css" />
    @endif
    <link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div class="container-xxl" id="kt_content_container">
        <div class="row">
            <div class="col-5">
                <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}"
                    data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                    data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
                    <div class="card card-flush py-2">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __($trans.'.add')}}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5">
                                <div class="separator"></div>
                                
                                <x-backend.langs.ulTabs/>
                                <x-backend.langs.LangInputs :showDescription="1" :richTextArea="0" :showSlug="1" />
                                
                                <x-backend.cms.select-single-option-parent :categories="$categories" :level="0" />
                                
                                <x-backend.cms.image />

                                <x-backend.cms.status />
                                
                                <div class="separator mb-6"></div>
                                <x-backend.btns.button />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-7">
                @include('backend.tags.listing')
            </div>
        </div>
    </div>
    @stop
    @section('scripts')
    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
    KTUtil.onDOMContentLoaded(function() {
       handleFormSubmitFunc('Add{{ $trans }}');
    });
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    tinymce.init({selector: ('.editor{{ substr($properties['regional'], 0, 2) }}'), height : "280"});
    @endforeach
    </script>
    @stop
