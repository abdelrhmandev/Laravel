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
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Account Details</h3>
                </div>
            </div>
            <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form"
                data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
                <div class="card-body border-top p-6">

                    <div class="d-flex flex-column gap-5">


                        <div class="fv-row fl">
                            <label class="form-label" for="avatar">{{ __('site.avatar') }}</label>


                            <div class="pt-1 mt-1 fl">
                                <style>
                                    .image-input-placeholder {
                                        background-image: url({{ asset('assets/backend/media/svg/files/blank-image.svg') }});
                                    }

                                    [data-theme="dark"] .image-input-placeholder {
                                        background-image: url({{ asset('assets/backend/media/svg/files/blank-image.svg') }});
                                    }
                                </style>
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-100px h-100px"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="{{ __('site.change_image') }}">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input class="my-image-selector" type="file" name="avatar" id="avatar"
                                            accept=".png, .jpg, .jpeg" data-fv-file="true"
                                            data-fv-file___extension="jpeg,jpg,png"
                                            data-fv-file___type="image/jpeg,image/jpg,image/png"
                                            data-fv-file___message="{{ __('validation.mimetypes', ['attribute' => 'image', 'values' => '*.png, *.jpg and *.jpeg']) }}" />
                                        <input type="hidden" name="image_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        id="cancel_image" data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="{{ __('site.cancel') }}">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        id="remove_image" data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="{{ __('remove.cancel') }}">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="text-muted fs-7">{{ __('site.uploadOnlyImages') }}</div>

                            </div>

                        </div>



                        <div class="fv-row fl">
                            <label class="required form-label" for="name">{{ __('site.name') }}</label>
                            <input placeholder="{{ __('site.name') }}" type="text" id="name" name="name"
                                pattern="^[a-zA-Z]*$"
                                data-fv-regexp___message="{{ __('validation.alpha', ['attribute' => 'name' . '&nbsp;']) }}"
                                class="form-control form-control-lg form-control-solid" required
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'name' . '&nbsp;']) }}" />
                        </div>


                        <div class="fv-row fl">
                            <label class="required form-label" for="email">{{ __('site.email') }}</label>
                            <input type="email" class="form-control form-control-lg form-control-solid" id="email"
                                placeholder="Email Address" name="email" required
                                data-fv-email-address___message="{{ __('validation.email', ['attribute' => 'email' . '&nbsp;']) }}"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'email' . '&nbsp;']) }}" />
                        </div>


                        <div class="fv-row fl">
                            <label class="required form-label" for="mobile">{{ __('site.mobile') }}</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" id="mobile"
                                placeholder="mobile" name="mobile" required data-fv-numeric="true" maxlength="20"
                                data-fv-numeric___message="{{ __('validation.numeric', ['attribute' => 'mobile' . '&nbsp;']) }}"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'mobile' . '&nbsp;']) }}" />
                        </div>
                        <div class="fv-row fl">
                            <label class="required form-label" for="roles">{{ __('role.plural') }}</label>
                            @foreach ($roles as $role)
                                <label class="form-check form-check-custom form-check-solid align-items-start">
                                    <input class="form-check-input me-3" type="checkbox" id="roles" name="roles[]"
                                        value="{{ $role->id }}"
                                        required
                                        data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'roles' . '&nbsp;']) }}"
                                        />
                                    <span class="form-check-label text-dark d-flex flex-column align-items-start">
                                        <span class="fw-bold fs-5 mb-0">{{ $role->name }}</span>
                                    </span>
                                </label>
                                <div class="separator separator-dashed my-6"></div>
                            @endforeach

                        </div>

                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <i class="ki-outline ki-design-1 fs-2tx text-primary me-4"></i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-dark-700">Login Information</div>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row fl">
                            <label class="required form-label" for="username">{{ __('site.username') }}</label>
                            <input placeholder="{{ __('site.username') }}" type="text" id="username"
                                name="username" class="form-control form-control-lg form-control-solid" required
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'username' . '&nbsp;']) }}" />
                        </div>
                        <div class="fv-row fl" id="kt_password_meter_example" data-kt-password-meter="true">
                            <label class="required form-label" for="password">{{ __('site.password') }}</label>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="{{ __('site.password') }}" name="password" id="password"
                                autocomplete="off" required maxlength="20"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'password' . '&nbsp;']) }}"
                                data-fv-string-length="true" data-fv-string-length___min="6"
                                data-fv-string-length___max="20" value="12345678"
                                data-fv-string-length___message="{{ __('passwords.password', ['attribute' => 'password' . '&nbsp;']) }}" />
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
                                class="btn btn-light-success">Show Password Strength</button>
                        </div>
                        <div class="fv-row fl">
                            <label class="required form-label"
                                for="password-confirm">{{ __('site.password_confirmation') }}</label>
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                placeholder="{{ __('site.password_confirmation') }}" name="password_confirmation"
                                id="password-confirm" autocomplete="off" required maxlength="20"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'password confirmation']) }}"
                                data-fv-string-length="true" data-fv-string-length___min="6"
                                data-fv-string-length___max="20"
                                data-fv-string-length___message="{{ __('passwords.password_confirmation', ['attribute' => 'password_confirmation' . '&nbsp;']) }}" />
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
            handleFormSubmitFunc('Add{{ $trans }}');
        });

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
                    });
                })();
            },
        };
        KTUtil.onDOMContentLoaded(function() {
            KTGeneralPasswordMeterDemos.init();
        });
    </script>
@stop
