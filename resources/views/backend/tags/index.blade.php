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
    <div id="kt_content_container" class="container-xxl">
        <div class="form d-flex flex-column flex-lg-row">
            <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}"
                class="gap-7 gap-lg-10 w-40 mb-7 me-lg-10"
                data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 mb-7 me-lg-10">
             
                  <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                      <div class="card-title">
                        <h2>Create Tag jasksak</h2>
                      </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                      <div class="d-flex flex-column gap-10">
                        <div class="separator"></div>

                        <ul class="nav nav-pills nav-pills-custom row position-relative mx-0 mb-9">
                          <!--begin::Item-->
                          <li class="nav-item col-4 mx-0 p-0">
                            <!--begin::Link-->
                            <a class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_10_tab_1">
                              <!--begin::Subtitle-->
                              <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">Notable</span>
                              <!--end::Subtitle-->
                              <!--begin::Bullet-->
                              <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                              <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                          </li>
                          <!--end::Item-->
                          <!--begin::Item-->
                          <li class="nav-item col-4 mx-0 px-0">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_10_tab_2">
                              <!--begin::Subtitle-->
                              <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">Delivered</span>
                              <!--end::Subtitle-->
                              <!--begin::Bullet-->
                              <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                              <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                          </li>
                          <!--end::Item-->
                          <!--begin::Item-->
                          <li class="nav-item col-4 mx-0 px-0">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_10_tab_3">
                              <!--begin::Subtitle-->
                              <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">Shipping</span>
                              <!--end::Subtitle-->
                              <!--begin::Bullet-->
                              <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                              <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                          </li>
                          <!--end::Item-->
                          <!--begin::Bullet-->
                          <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
                          <!--end::Bullet-->
                        </ul>
                        <!--end::Nav-->
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                          <!--begin::Tap pane-->
                          <div class="tab-pane fade show active" id="kt_list_widget_10_tab_1">
                            <!--begin::Item-->
                            sssssssss
                          
                          </div>
                
                        </div>
                        

  

                      </div>
                    </div>
                  </div>
                   

                </div>
            </form>


            <div class="d-flex flex-column flex-row-fluid gap-7 w-lg-400px gap-lg-10">
                @include('backend.tags.listing')
            </div>
        </div>
    </div>

@stop


