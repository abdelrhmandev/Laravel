@extends('backend.base.guest')
@section('title', __('login.forget'))
@section('style')
    <style>
        body {
            background-image: url('{{ asset('assets/backend/media/auth/bg10.jpeg') }}');
        }
        [data-theme="dark"] body {
            background-image: url('{{ asset('assets/backend/media/auth/bg10-dark.jpeg') }}');
        }
    </style>
@stop
@section('content')
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-lg-row-fluid">
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                    src="{{ asset('assets/backend/media/auth/agency.png') }}" alt="" />
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                    src="{{ asset('assets/backend/media/auth/agency-dark.png') }}" alt="" />
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>
                <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post,
                    <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve
                    interviewed
                    <br />and provides some background information about
                    <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their
                    <br />work following this is a transcript of the interview.
                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                <div class="w-md-400px">
                    <form id="emailpasswordform" method="POST" action="{{ route('admin.auth.password.email') }} " class="form w-100"
                        data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                        data-form-agree-label="{{ __('site.agree') }}">
                        @csrf
                        <div class="text-center mb-11">
                            <h1 class="text-dark fw-bolder mb-3">{{ __('login.forget') }}</h1>
                            <div class="text-gray-500 fw-semibold fs-6">{{ __('passwords.enterEmail')}}</div>
                        </div>
                        @if (session('status'))
                        <div class="w-md-400px">
                            <div class="alert alert-dismissible bg-success me-3 text-white d-flex flex-column flex-sm-row p-5 mb-10">
                                <span class="svg-icon svg-icon-1 svg-icon-success text-white">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                        <path
                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <div class="me-3">&nbsp; {{ session('status') }}</div>
                            </div>
                        </div>
                        @endif
                        <div class="fv-row mb-3 fl">
                            <label class="required form-label" for="email">{{ __('site.email') }}</label>
                            <input type="email" id="email" value="{{ old('email') }}" name="email"
                                class="form-control bg-transparent" />
                            @error('email')
                                <span
                                    class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                         
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" id="btn-submit" class="btn btn-primary me-4">
                                <span class="indicator-label">{{ __('passwords.SendPasswordResetLink') }}</span>
                                <span class="indicator-progress">{{ __('site.wait') }}...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <a href="{{ route('admin.auth.login')}}" class="btn btn-light">{{ __('site.cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
@stop
