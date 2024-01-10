@extends('backend.base.base')
@section('title', __('site.profile') . ' - ' . __('site.edit') . ' ' . __('site.profile'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __('site.profile') }}</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route(config('custom.route_prefix') . '.dashboard') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
        <li class="breadcrumb-item text-dark">{{ __('site.edit') . ' ' . __('site.profile') }}</li>
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
                    <h3 class="fw-bold m-0">{{  __('site.edit') . ' ' . __('site.profile') }}</h3>
                </div>
            </div>
            <form id="EditPorfile" data-route-url="{{ $updateRoute }}" class="form"
                data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
                @method('PUT')
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





                                @if (isset(Auth::guard('admin')->user()->avatar))
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url({{ asset(Auth::guard('admin')->user()->avatar) }});
                                        }

                                        [data-theme="dark"] .image-input-placeholder {
                                            background-image: url({{ asset(Auth::guard('admin')->user()->avatar) }});
                                        }
                                    </style>
                                @endif
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
                                pattern="[a-zA-Z]" value="{{ Auth::guard('admin')->user()->name }}"
                                data-fv-regexp___message="{{ __('validation.alpha', ['attribute' => 'name' . '&nbsp;']) }}"
                                class="form-control form-control-lg form-control-solid" required
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'name' . '&nbsp;']) }}" />
                        </div>


                        <div class="fv-row fl">
                            <label class="required form-label" for="email">{{ __('site.email') }}</label>
                            <input type="email" class="form-control form-control-lg form-control-solid" id="email"
                                placeholder="{{ __('site.email') }}" name="email"
                                value="{{ Auth::guard('admin')->user()->email }}" required
                                data-fv-email-address___message="{{ __('validation.email', ['attribute' => 'email' . '&nbsp;']) }}"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'email' . '&nbsp;']) }}" />
                        </div>


                        <div class="fv-row fl">
                            <label class="required form-label" for="mobile">{{ __('site.mobile') }}</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" id="mobile"
                                placeholder="{{ __('site.mobile') }}" name="mobile" required data-fv-numeric="true" maxlength="20"
                                value="{{ Auth::guard('admin')->user()->mobile }}"
                                data-fv-numeric___message="{{ __('validation.numeric', ['attribute' => 'mobile' . '&nbsp;']) }}"
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'mobile' . '&nbsp;']) }}" />
                        </div>
                        <div class="fv-row fl">
                            <label class="form-label" for="roles">{{ __('role.plural') }}</label>
                            <h1>{{  Auth::guard('admin')->user()->getRoleNames() }}</h1>
                        </div>
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <i class="ki-outline ki-design-1 fs-2tx text-primary me-4"></i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-dark-700">{{ __('login.login_information') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row fl">
                            <label class="required form-label" for="username">{{ __('site.username') }}</label>
                            <input placeholder="{{ __('site.username') }}" type="text" id="username"
                                value="{{ Auth::guard('admin')->user()->username }}" name="username"
                                class="form-control form-control-lg form-control-solid" required
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'username' . '&nbsp;']) }}" />
                        </div>

                        <div class="fv-row fl" id="kt_password_meter_example" data-kt-password-meter="true">
                            <label class="form-label" for="password">{{ __('site.password') }}</label>
                            <div class="fw-semibold text-gray-600">************</div>
                            <a class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary"
                                href="{{ $editPasswordRoute }}"> Edit Password </a>
                        </div>
                        <div class="fv-row fl">
                            <label class="form-label" for="status">{{ __('site.status') }}</label>
                            <div class="form-check form-switch form-check-custom form-check-solid">

                                @if (Auth::guard('admin')->user()->status == 1)
                                    <span class="text-success">{{ __('site.active') }}</span>
                                @else
                                    <span class="text-danger">{{ __('site.deactivated') }}</span>
                                @endif

                            </div>
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
            handleFormSubmitFunc('EditPorfile');
        });
    </script>
@stop
