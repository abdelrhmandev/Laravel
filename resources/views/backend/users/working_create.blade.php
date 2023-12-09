@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted"><a href="" class="text-muted">
            {{ __($trans . '.plural') }}</a></li>
    <li class="breadcrumb-item text-dark">{{ __($trans . '.edit') }}</li>
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
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Account Details</h3>
                </div>
            </div>
            <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form"
                data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
                <div class="card-body border-top p-9">

                    <div class="d-flex flex-column gap-5">
                        <div class="fv-row fl">
                            <label class="required form-label" for="name">{{ __('site.name') }}</label>
                            <input placeholder="{{ __('site.name') }}" type="text" id="name" name="name"
                                class="form-control form-control-lg form-control-solid" required
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'name' . '&nbsp;']) }}" />
                        </div>

                        <div class="fv-row fl" data-kt-password-meter="true">
                            <label class="required form-label" for="password">{{ __('site.password') }}</label>                            
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="{{ __('site.password') }}" name="password" id="password" autocomplete="off"
                                required
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'password' . '&nbsp;']) }}"
                                data-fv-string-length="true" 
                                data-fv-string-length___min="6"
                                data-fv-string-length___max="20"
                                data-fv-string-length___message="{{ __('passwords.password', ['attribute' => 'password' . '&nbsp;']) }}" />                                                    
                            <div class="d-flex align-items-center mt-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <button id="kt_password_meter_example_show_score" type="button" class="btn btn-primary mt-5">Show Password Strength</button>
                        </div>









                        
                    </div>





                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <x-backend.btns.button />
                </div>
            </form>
        </div>
    </div>
@stop
@section('scripts')

<script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
{{-- <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script> --}}


<script src="{{ asset('assets/backend/js/custom/handleUserFormSubmit.js') }}"></script>


<script>
"use strict";
var KTGeneralPasswordMeterDemos = {
    init: function () {
        !(function () {
            const e = document.getElementById("kt_password_meter_example_show_score"),
                t = document.querySelector("#kt_password_meter_example"),
                n = KTPasswordMeter.getInstance(t);
            e.addEventListener("click", (e) => {
                const t = n.getScore();
                Swal.fire({ text: "Current Password Score: " + t, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
            });
        })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTGeneralPasswordMeterDemos.init();
});
</script>
@stop
