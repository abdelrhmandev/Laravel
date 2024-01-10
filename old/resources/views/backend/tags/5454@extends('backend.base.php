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
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-10">
                                
                              <div class="card-header">
                                <div class="card-title">
                                  <h2>Tags</h2>
                                </div>
                              </div>

                              
                                <div class="fv-row">
                                    <label class="required form-label">Shipping Method</label>
                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select an option" name="shipping_method"
                                        id="kt_ecommerce_edit_order_shipping">
                                        <option></option>
                                        <option value="none">N/A - Virtual Product</option>
                                        <option value="standard">Standard Rate</option>
                                        <option value="express">Express Rate</option>
                                        <option value="speed">Speed Overnight Rate</option>
                                    </select>
                                    <div class="text-muted fs-7">Set the date of the order to process.</div>
                                </div>
                                <div class="fv-row">
                                    <label class="required form-label">Order Date</label>
                                    <input id="kt_ecommerce_edit_order_date" name="order_date" placeholder="Select a date"
                                        class="form-control mb-2" value="" />
                                    <div class="text-muted fs-7">Set the date of the order to process.</div>
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


@section('scripts')
    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/pdfMake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_load_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/pdfMake/pdfhandle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    @include('backend.datatables')
    <script>
        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Add{{ $trans }}');
        });

        var dynamicColumns = [ //as an array start from 0
            {
                data: 'id',
                name: 'id',
                exportable: false
            },
            {
                data: 'translate.title',
                name: 'translate.title',
                orderable: false
            }, // 1
            {
                data: 'count',
                name: 'count',
                orderable: false,
                searchable: false
            },
            {
                data: 'created_at',
                name: 'created_at',
                type: 'num',
                render: {
                    _: 'display',
                    sort: 'timestamp',
                    order: 'desc'
                }
            },
            {
                data: 'actions',
                name: 'actions',
                exportable: false,
                orderable: false,
                searchable: false
            },
        ];
        KTUtil.onDOMContentLoaded(function() {
            loadDatatable('{{ __($trans . '.plural') }}', '{{ $redirectRoute }}', dynamicColumns, '', '1', '');
        });
    </script>

@stop
