@extends('backend.base.base')
@section('title', __($trans . '.plural').' - '.__($trans .'.edit'))
@section('breadcrumbs')
<h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
<span class="h-20px border-gray-200 border-start mx-3"></span>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
    <li class="breadcrumb-item text-muted"><a href="{{ route(config('custom.route_prefix').'.dashboard') }}" class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
    <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
    <li class="breadcrumb-item text-dark">{{ __($trans . '.edit') }}</li>
</ul>
@stop
@section('style') 
<link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div id="kt_content_container" class="container-xxl">    
        <form id="Edit{{ $trans }}" action="{{ $updateRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data"
            method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="old_status" value="{{ $row->status }}"/> 
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <!--begin::General options-->
                <div class="card card-flush py-0">
                    <div class="card-header">
                        <div class="card-title">                        
                            <h3>{{ __('site.applicant') }}</h3>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-5">
                            <div class="separator"></div>
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <!--begin: Pic-->
                                 
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $row->name }}</a>
                                            </div>
                                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">

                                                <a href="#" class="d-flex align-items-center text-primary text-hover-primary me-5 mb-2">
                                            
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <circle fill="currentColor" cx="12" cy="12" r="8"/>
                                        </svg></span>
                                            <!--end::Svg Icon-->{{ $row->vacancy->title }}</a>


                                            <a href="{{ asset($row->file) }}" class="d-flex align-items-center text-primary-400 text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="currentColor"/>
                                                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor"/>
                                                    <path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="currentColor"/>
                                                    </svg>
                                                    </span>
                                                <!--end::Svg Icon-->DownLoad CV</a>


                                            <a href="#" class="d-flex align-items-center text-primary-400 text-hover-primary me-5 mb-2">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 21C6 21.6 6.4 22 7 22H17C17.6 22 18 21.6 18 21V20H6V21Z" fill="currentColor"/>
                                                <path opacity="0.3" d="M17 2H7C6.4 2 6 2.4 6 3V20H18V3C18 2.4 17.6 2 17 2Z" fill="currentColor"/>
                                                <path d="M12 4C11.4 4 11 3.6 11 3V2H13V3C13 3.6 12.6 4 12 4Z" fill="currentColor"/>
                                                </svg>
                                                </span>
                                            <!--end::Svg Icon-->{{ $row->mobile }}</a>

                                                <a href="mailto:{{ $row->email }}"
                                                    class="d-flex align-items-center text-primary-400 text-hover-primary mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"/>
                                                        <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"/>
                                                        </svg>
                                                        </span>
                                                    <!--end::Svg Icon-->{{ $row->email }}</a>     
                                                    
                                                    
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
 

                <div class="d-flex justify">                     
                    {{-- // SHOW CONFIRM BOX WITH TITLE --}}
                    <input type="hidden" id="title_{{ app()->getLocale() }}" value="{{ $row->name}}"/>
                    <x-backend.btns.button :destroyRoute="$destroyRoute" :redirectRoute="$redirect_after_destroy" :trans="$trans"/>                     
                </div>
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-0 w-lg-400px gap-lg-5">
                <div class="card card-flush">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __('site.applied_on') }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <span class="text-success-400 fw-bold">
                            {{  (Carbon\Carbon::parse($row->created_at)->format('j F, Y') )  }}
                        </span>
                        <p>

                            {{  (Carbon\Carbon::parse($row->created_at)->format('D h:i a') )  }}
                        </p>
                    </div>
                </div>
                <div class="card card-flush">
                    <div class="card-header">
                        <div class="card-title">
                            <span class="m-1"> {{ __('site.status') }} :</span> <h2>{{ __('site.'.$row->status) }}</h2>
                            <input type="hidden" name="old_status" value="{{ $row->status }}"/> 
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                            <span class="d-flex align-items-center">
                                    <span class="symbol symbol-50px me-4">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Home/Timer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z" fill="#000000"/>
                                                <path d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z" fill="#000000"/>
                                                <path d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </span>
                                <span class="d-flex flex-column">
                                    <span class="fw-bold fs-6">{{ __('site.pending') }}</span>
                                </span>
                            </span>
                            <span class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" name="status" value="pending" />
                            </span>
                        </label>
                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                            <span class="d-flex align-items-center">
                                <span class="symbol symbol-50px me-4">
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                fill="currentColor" />
                                            <path
                                                d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="d-flex flex-column">
                                    <span class="fw-bold fs-6">{{ __('site.accepted') }}</span>
                                </span>
                            </span>
                            <span class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" name="status" value="accepted" />
                            </span>
                        </label>
                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                            <span class="d-flex align-items-center">
                                <span class="symbol symbol-50px me-4">
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M10.5857864,12 L9.17157288,10.5857864 C8.78104858,10.1952621 8.78104858,9.56209717 9.17157288,9.17157288 C9.56209717,8.78104858 10.1952621,8.78104858 10.5857864,9.17157288 L12,10.5857864 L13.4142136,9.17157288 C13.8047379,8.78104858 14.4379028,8.78104858 14.8284271,9.17157288 C15.2189514,9.56209717 15.2189514,10.1952621 14.8284271,10.5857864 L13.4142136,12 L14.8284271,13.4142136 C15.2189514,13.8047379 15.2189514,14.4379028 14.8284271,14.8284271 C14.4379028,15.2189514 13.8047379,15.2189514 13.4142136,14.8284271 L12,13.4142136 L10.5857864,14.8284271 C10.1952621,15.2189514 9.56209717,15.2189514 9.17157288,14.8284271 C8.78104858,14.4379028 8.78104858,13.8047379 9.17157288,13.4142136 L10.5857864,12 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="d-flex flex-column">
                                    <span class="fw-bold fs-6">{{ __('site.reject') }}</span>
                                </span>
                            </span>
                            <span class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" name="status" value="rejected" />
                            </span>
                        </label>
                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                            <span class="d-flex align-items-center">
                                <span class="symbol symbol-50px me-4">
                                    <span class="svg-icon svg-icon-1">                                        
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="currentColor"/>
                                            </svg>
                                    </span>
                                </span>
                                <span class="d-flex flex-column">
                                    <span class="fw-bold fs-6">{{ __('site.holded') }}</span>
                                </span>
                            </span>
                            <span class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" name="status" value="holded" />
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
@stop
@section('scripts')
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/deleteConfirmSwal.js') }}"></script>
<script>


 

 
 
 
</script>
@stop
