@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted"><a href="" class="text-muted">
            {{ __($trans . '.plural') }}</a></li>
    <li class="breadcrumb-item text-dark">{{ __($trans . '.add') }}</li>
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
        <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">

            
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-5">
                            <div class="separator"></div>
                            <x-backend.langs.ulTabs />
                            <div class="tab-content">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'show active' : '' }}"
                                        id="{{ substr($properties['regional'], 0, 2) }}" role="tabpanel">
                                        <div class="d-flex flex-column gap-5">
                                            <div class="fv-row fl">
                                                <label class="required form-label"
                                                    for="title-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.title') }}</label>
                                                <input placeholder="{{ __('site.title') . ' ' . $properties['name'] }}"
                                                    type="text" id="title_{{ substr($properties['regional'], 0, 2) }}"
                                                    name="title_{{ substr($properties['regional'], 0, 2) }}"
                                                    class="form-control mb-2" required
                                                    data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'title' . '&nbsp;' . substr($properties['regional'], 0, 2)]) }}"/>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="fv-row fl">
                                <label class="required form-label" for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control mb-2" required
                                    data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'name' . '&nbsp;']) }}"/>
                                    <small class="fs-7 fw-semibold text-danger">English Only No Spaces</small>
                            </div>
                        </div>
                    </div>


                  
                </div>
                <x-backend.btns.button />
            </div>




        </form>
    </div>
@stop
@section('scripts')
    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
    <script>
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
        });
    </script>
@stop
