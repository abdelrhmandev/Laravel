@extends('backend.base.base')
@section('title', __('site.profile') . ' - ' . __('site.edit') . ' ' . __('site.password'))
@section('breadcrumbs')
<h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __('site.profile') }}</h1>
<span class="h-20px border-gray-200 border-start mx-3"></span>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
    <li class="breadcrumb-item text-muted"><a href="{{ route(config('custom.route_prefix').'.dashboard') }}" class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
    <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
    <li class="breadcrumb-item text-dark">{{ __('site.edit') . ' ' . __('site.profile'). ' ' .__('site.password') }}</li>
</ul>
@stop
@section('style') 
<link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Password Details</h3>
                </div>
            </div>
            <form id="EditProfilePassword" data-route-url="{{ $updatePasswordRoute }}" class="form"
                data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
                @method('PUT')
                <div class="card-body border-top p-6">
                    <div class="d-flex flex-column gap-5">
                     

 

                        <div class="fv-row fl">
                            <label class="required form-label"
                                for="old-password">{{ __('passwords.old') }}</label>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="{{ __('passwords.old') }}" name="current_password"
                                id="current_password" autocomplete="off" required maxlength="20"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'old password']) }}"
                                data-fv-string-length="true" data-fv-string-length___min="6"
                                data-fv-string-length___max="20"
                                data-fv-string-length___message="{{ __('passwords.password', ['attribute' => 'new password' . '&nbsp;']) }}"
                                 />
                        </div>
 


   
 
 
 
                        <div class="fv-row fl" id="kt_password_meter_example" data-kt-password-meter="true">
                            <label class="required form-label" for="password">{{ __('passwords.new') }}</label>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="{{ __('passwords.new') }}" name="new_password" id="new_password"
                                autocomplete="off" required maxlength="20"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'new password' . '&nbsp;']) }}"
                                data-fv-string-length="true" data-fv-string-length___min="6"
                                data-fv-string-length___max="20"
                                data-fv-string-length___message="{{ __('passwords.password', ['attribute' => 'new password' . '&nbsp;']) }}" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility">
                                <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span></i>
                                <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                            </span>
                            <div class="d-flex align-items-center mt-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
                        <div class="fv-row">
                            <button id="kt_password_meter_example_show_score" type="button"
                                class="btn btn-light-success">Show New Password Strength</button>
                        </div>
                        <div class="fv-row fl">
                            <label class="required form-label"
                                for="password-confirm">{{ __('passwords.confirm_new') }}</label>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="{{ __('passwords.confirm_new') }}" name="new_password_confirmation"
                                id="new-password-confirm" autocomplete="off" required maxlength="20"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'new password confirmation']) }}"
                                data-fv-string-length="true" data-fv-string-length___min="6"
                                data-fv-string-length___max="20"
                                data-fv-callback="true"
                                data-fv-callback___callback="checkidenticalPassword"
                                 />
                        </div>

 
   
                        
                    </div>
                </div>
                <div class="card-footer d-flex">
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
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>

    <script>
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('EditProfilePassword');
        });
        function checkidenticalPassword(){
            var form = document.getElementById('EditProfilePassword');            
            var new_password = form.querySelector('[name="new_password"]').value;
            var confirm_password_confirmation = form.querySelector('[name="new_password_confirmation"]').value;
            if(new_password === confirm_password_confirmation){
                    return {
                        valid: true,    // true
                    };                    
            }
            else{
                    return {
                        valid: false,    // or false
                        message: "{{ __('passwords.password_confirmation') }}"
                    };                    
            }
        }
        "use strict";
        var KTGeneralPasswordMeterDemos = {
            init: function() {
                !(function() {
                    const e = document.getElementById("kt_password_meter_example_show_score"),
                        t = document.querySelector("#kt_password_meter_example"),
                        n = KTPasswordMeter.getInstance(t);
                    e.addEventListener("click", (e) => {
                        const t = n.getScore();
                        Swal.fire({
                            text: "Current Password Score: " + t,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

////////////////




                    });
                })();
            },
        };
        KTUtil.onDOMContentLoaded(function() {
            KTGeneralPasswordMeterDemos.init();
        });
    </script>
@stop
