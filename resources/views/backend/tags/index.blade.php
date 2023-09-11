@extends('backend.base.base')
@section('breadcrumbs')
<li class="breadcrumb-item text-dark">{{ __($trans.".plural") }}</li>
@stop
@section('style')
@if(app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endif

    <link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet"
    type="text/css" />

@stop
@section('content')


<div id="kt_content_container" class="container-xxl">
  <!--begin::Form-->
  <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo6/dist/apps/ecommerce/sales/listing.html">
    <!--begin::Aside column-->
    <div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
      <!--begin::Order details-->
      <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
          <div class="card-title">
            <h2>Order Details</h2>
          </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
          <div class="d-flex flex-column gap-10">
            <!--begin::Input group-->
            <div class="fv-row">
              <!--begin::Label-->
              <label class="form-label">Order ID</label>
              <!--end::Label-->
              <!--begin::Auto-generated ID-->
              <div class="fw-bold fs-3">#13347</div>
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row">
              <!--begin::Label-->
              <label class="required form-label">Payment Method</label>
              <!--end::Label-->
              <!--begin::Select2-->
              <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="payment_method" id="kt_ecommerce_edit_order_payment">
                <option></option>
                <option value="cod">Cash on Delivery</option>
                <option value="visa">Credit Card (Visa)</option>
                <option value="mastercard">Credit Card (Mastercard)</option>
                <option value="paypal">Paypal</option>
              </select>
              <!--end::Select2-->
              <!--begin::Description-->
              <div class="text-muted fs-7">Set the date of the order to process.</div>
              <!--end::Description-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row">
              <!--begin::Label-->
              <label class="required form-label">Shipping Method</label>
              <!--end::Label-->
              <!--begin::Select2-->
              <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="shipping_method" id="kt_ecommerce_edit_order_shipping">
                <option></option>
                <option value="none">N/A - Virtual Product</option>
                <option value="standard">Standard Rate</option>
                <option value="express">Express Rate</option>
                <option value="speed">Speed Overnight Rate</option>
              </select>
              <!--end::Select2-->
              <!--begin::Description-->
              <div class="text-muted fs-7">Set the date of the order to process.</div>
              <!--end::Description-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row">
              <!--begin::Label-->
              <label class="required form-label">Order Date</label>
              <!--end::Label-->
              <!--begin::Editor-->
              <input id="kt_ecommerce_edit_order_date" name="order_date" placeholder="Select a date" class="form-control mb-2" value="" />
              <!--end::Editor-->
              <!--begin::Description-->
              <div class="text-muted fs-7">Set the date of the order to process.</div>
              <!--end::Description-->
            </div>
            <!--end::Input group-->
          </div>
        </div>
        <!--end::Card header-->
      </div>
      <!--end::Order details-->
    </div>
    <!--end::Aside column-->
    <!--begin::Main column-->
    @include('backend.tags.listing')
    <!--end::Main column-->
  </form>
  <!--end::Form-->
</div>

@stop


@section('scripts')
<script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfmake.min.js')}}"></script> 
<script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_load_fonts.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfhandle.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@include('backend.datatables')
<script>

// On document ready
KTUtil.onDOMContentLoaded(function() {
   handleFormSubmitFunc('Add{{ $trans }}');
});

var dynamicColumns = [ //as an array start from 0
{ data: 'id', name: 'id',exportable:false}, 
{ data: 'translate.title', name: 'translate.title',orderable: false}, // 1
{ data: 'count', name: 'count',orderable: false,searchable: false}, 
{ data: 'created_at',name :'created_at', type: 'num', render: { _: 'display', sort: 'timestamp', order: 'desc'}},
{ data: 'actions' , name : 'actions' ,exportable:false,orderable: false,searchable: false},    
];
KTUtil.onDOMContentLoaded(function () {
  loadDatatable('{{ __($trans.".plural") }}','{{ $redirectRoute }}',dynamicColumns,'','1','');
});
</script>

@stop
