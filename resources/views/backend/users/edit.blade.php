@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted"><a href="{{ $redirect_after_destroy }}" class="text-muted">
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
    <div class="container-xxl" id="kt_content_container">
        <form id="Edit{{ $trans }}" data-route-url="{{ $updateRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $row->id }}" />
            @method('PUT')
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
                                                    data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'title' . '&nbsp;' . substr($properties['regional'], 0, 2)]) }}"
                                                    value="@foreach (json_decode($row->trans, true) as $per){{ isset($per[substr($properties['regional'], 0, 2)]) ? $per[substr($properties['regional'], 0, 2)] : '' }} @endforeach" />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="fv-row fl">
                                <label class="required form-label" for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control mb-2" required
                                    data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'name' . '&nbsp;']) }}"
                                    value="{{ $row->name }}" />
                                <small class="fs-7 fw-semibold text-danger">English Only No Spaces</small>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('role.associated_users') }} [{{ $row->users->count() }}]</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row row-cols-1 row-cols-md-0 row-cols-lg-1 row-cols-xl-5 g-2" data-kt-buttons="true"
                                data-kt-buttons-target="[data-kt-button='true']">
                                @if ($row->users->count())
                                    <div class="symbol-group symbol-hover">
                                        @foreach ($row->users as $user)
                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                title="{{ $user->name }}">
                                                <img alt="{{ $user->name }}"
                                                    src="{{ !empty($user->avatar) ? asset($user->avatar) : asset('assets/backend/media/avatars/blank.png') }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-danger">{{ __('role.no_associated_users') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('permission.plural') }} [{{ $row->permissions->count() }}]</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row row-cols-1 row-cols-md-0 row-cols-lg-1 row-cols-xl-5 g-2" data-kt-buttons="true"
                                data-kt-buttons-target="[data-kt-button='true']">
                                @foreach ($permissions as $permission)
                                    <div class="form-check form-check-custom form-check-solid mb-2">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            value="{{ $permission->id }}"
                                            @if (in_array($permission->id, $row->permissions->pluck('id')->toArray())) checked @endif />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            @foreach (json_decode($permission->trans, true) as $per)
                                                {{ isset($per[app()->getLocale()]) ? $per[app()->getLocale()] : '' }}
                                            @endforeach
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <x-backend.btns.button :destroyRoute="$destroyRoute" :redirectRoute="$redirect_after_destroy" :row="$row" :trans="$trans" />
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
    <script src="{{ asset('assets/backend/js/custom/deleteConfirmSwal.js') }}"></script>
    <script>
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Edit{{ $trans }}');
        });
    </script>
@stop
