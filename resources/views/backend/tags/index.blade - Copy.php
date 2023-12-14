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


<div class="container-xxl" id="kt_content_container">
  <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"            
      data-form-submit-error-message="{{ __('site.form_submit_error')}}"
      data-form-agree-label="{{ __('site.agree') }}" 
      enctype="multipart/form-data">
      <div class="d-flex flex-column gap-6 gap-lg-7 w-lg-400px p-1 mb-7 me-lg-5">
          <x-backend.langs.ulTabs/>
          <x-backend.langs.LangInputs :showDescription="0" :richTextArea="0" :showSlug="1" />
          <x-backend.btns.button />
      </div>
      <div class="d-flex flex-column flex-row-fluid gap-7 w-lg-350px gap-lg-10">
           @include('backend.tags.listing')
      </div>
  </form>
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
  loadDatatable('{{ __($trans.".plural") }}','{{ $listingRoute }}',dynamicColumns,'','1','3');
});
</script>

@stop
