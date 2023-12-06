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
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_profile_details" aria-expanded="true"
                aria-controls="kt_account_profile_details">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Account Details</h3>
                </div>
            </div>
            <form id="demoForm" data-route-url="{{ $storeRoute }}" class="form"
                data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">

                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url(assets/media/avatars/300-1.jpg)"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-outline ki-pencil fs-7"></i>
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                    </div>
                    <div class="row mb-6 fv-row">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6"
                            for="name">Name</label>

                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg fv-row fl">

                        <input placeholder="Name" type="text" id="name"
                            name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required
                            pattern="^[a-zA-Z]*$" data-fv-regexp___message="{{ __('validation.alpha', ['attribute' => 'name' . '&nbsp;']) }}"
                            data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'name' . '&nbsp;']) }}"
                            />
                    </div>
                </div>
            </div>
        </div>

                     <div class="row mb-6">
                        <label for="emailaddress" class="col-lg-4 col-form-label required fw-semibold fs-6">Enter New Email
                            Address</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg fv-row fl">
                                    <input type="email"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        id="email" placeholder="Email Address" name="email" required
                                        data-fv-email-address___message="{{ __('validation.email', ['attribute' => 'email' . '&nbsp;']) }}"
                                        data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'email' . '&nbsp;']) }}"
                                        />
                                </div>
                            </div>
                        </div>
                    </div>

 
<div class="row mb-6">
    <label for="mobile" class="col-lg-4 col-form-label required fw-semibold fs-6">Mobile</label>
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg fv-row fl">
                <input type="text"
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                    id="mobile" placeholder="mobile" name="mobile" required
                    data-fv-numeric="true"
                    data-fv-numeric___message="{{ __('validation.numeric', ['attribute' => 'mobile' . '&nbsp;']) }}"
                    data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'email' . '&nbsp;']) }}"
                    />
            </div>
        </div>
    </div>
</div>
 

 
<div id="kt_password_meter_example" class="fv-row" data-kt-password-meter="true">
    <!--begin::Wrapper-->
    <div class="mb-1">
        <!--begin::Label-->
        <label class="form-label fw-semibold fs-6 mb-2">
            New Password
        </label>
        <!--end::Label-->

        <!--begin::Input wrapper-->
        <div class="position-relative mb-3">
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off">

            <!--begin::Visibility toggle-->
            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>                            <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                        </span>
            <!--end::Visibility toggle-->
        </div>
        <!--end::Input wrapper-->

        <!--begin::Highlight meter-->
        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
        </div>
        <!--end::Highlight meter-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Hint-->
    <div class="text-muted">
        Use 8 or more characters with a mix of letters, numbers &amp; symbols.
    </div>
    <!--end::Hint-->
</div>


                    {{-- <div class="fv-row fl" data-kt-password-meter="true">
                        <div class="mb-1">
                            <label class="required form-label fw-semibold fs-6 mb-2">
                                Password
                            </label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="Enter Password" name="pwd" id="pwd" autocomplete="off" required
                                    {{-- data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'password' . '&nbsp;']) }}" --}}
                                    {{-- data-fv-string-length="true" --}}
                                    {{-- data-fv-string-length___min="6" --}}
                                    {{-- data-fv-string-length___max="20" --}}
                                    
                                    {{-- data-fv-string-length___message="The Password must be more than 6 and less than 20 characters long" --}}
                                    />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></i>
                                    <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span></i>
                                </span>
                            </div>
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>

                        <button id="kt_password_meter_example_show_score" type="button" class="btn btn-primary mt-5">Show Password Strength</button>

                   


                    {{-- <div class="fv-row fl" data-kt-password-meter="true">
                        <div class="mb-1">
                            <label class="required form-label fw-semibold fs-6 mb-2">
                                Confirm Password
                            </label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="" name="confirmpassword" id="confirmpassword" autocomplete="off" required
                                    data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'confirmpassword' . '&nbsp;']) }}"
                                    data-fv-string-length="true"
                                    data-fv-string-length___min="6"
                                    data-fv-string-length___max="20"                                   
                                    data-fv-string-length___message="The Confirm Password must be more than 6 and less than 20 characters long"
                                    />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></i>
                                    <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span></i>
                                </span>
                            </div>
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
                    </div>   --}}


                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                        Changes</button>
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
