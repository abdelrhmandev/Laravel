@extends('backend.base.base')
@section('title', __($trans . '.plural'))
@section('breadcrumbs')
<h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
<span class="h-20px border-gray-200 border-start mx-3"></span>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
    <li class="breadcrumb-item text-muted"><a href="{{ route(config('custom.route_prefix').'.dashboard') }}" class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
    <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
    <li class="breadcrumb-item text-dark">{{ __($trans . '.plural') }}</li>
</ul>
@stop
@section('content')
<div class="container-xxl" id="kt_content_container">
  <div class="card">
    <div class="card-header border-0 pt-6">
      <div class="card-title">
        <div class="d-flex align-items-center position-relative my-1">
          <span class="svg-icon svg-icon-1 position-absolute ms-6">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
              <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
            </svg>
          </span>
          <input type="text" name="search" id="search" data-kt-table-filter="search" class="form-control form-control-solid w-210px ps-15" placeholder="{{ __('site.search') }} {{ __($trans.'.plural') }} ......" />
        </div>
      </div>
      <div class="card-toolbar">
        <div class="d-flex justify-content-end" data-kt-table-toolbar="base">    
          @include('backend.partials.modals._exportlisting')
          <a class="btn btn-primary" href="{{ $createRoute }}">
            <span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z" fill="currentColor"></path>
                <rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)" fill="currentColor"></rect>
                <rect x="7" y="13" width="10" height="2" rx="1" fill="currentColor"></rect>
                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"></path>
              </svg>
            </span>
            {{ __($trans.'.add')}}</a>
        </div>
        <div class="d-flex justify-content-end align-items-center d-none" data-kt-table-toolbar="selected">
          <div class="fw-bold me-5">
          <span class="me-2" data-kt-table-select="selected_count"></span>{{ __('site.selected') }}</div>          
          <button type="button" class="btn btn-danger" id="destroyMultipleroute"              
          data-destroyMultiple-route = "{{ $destroyMultipleRoute }}"
          data-kt-table-select="delete_selected"             
          data-back-list-text="{{ __('site.back_to_list') }}"        
          data-confirm-message = "{{ __($trans.'.delete_selected') }}"
          data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
          data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
          data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
          data-delete-selected-records-text = "{{ __($trans.'.delete_selected') }}"
          data-not-deleted-message = "{{ __($trans.'.not_delete_selected') }}"
          ><i class="fa fa-trash-alt"></i>{{ __('site.delete_selected') }}</button>
        </div>
      </div>
    </div>
    <div class="card-body pt-0">
      <table class="table align-middle table-row-bordered fs-6 gy-5" id="{{ __($trans.'.plural') }}">         
        <thead>
          <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2 noExport">             
              <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input AA" type="checkbox" data-kt-check="true" data-kt-check-target="#{{ __($trans.".plural") }} .AA" value="1" />
              </div>
            </th>            
            <th>{{ __('user.singular') }}</th>  
            <th>{{ __('site.mobile') }}</th>  
            <th>{{ __('role.singular') }}</th>
            <th>{{ __('site.status') }}</th>                                
            <th class="text-primary w-100px">{{ __('site.created_at') }}</th>
            <th class="text-end min-w-100px noExport">{{ __('site.actions') }}</th>  
          </tr>
        </thead>
        <tbody class="text-gray-600"> 
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
@section('scripts')
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@include('backend.Classicdatatables')
<script>
var dynamicColumns = [ //as an array start from 0
{ data: 'id', name: 'id',exportable:false}, 
{ data: 'name', name: 'name',orderable: false}, 
{ data: 'mobile', name: 'mobile',orderable: false}, 
{ data: 'role', name: 'role',orderable: false,searchable: false},
{ data: 'status', name: 'status',orderable: false,searchable: false},
{ data: 'created_at',name :'created_at', type: 'num', render: { _: 'display', sort: 'timestamp', order: 'desc'}}, // 6
{ data: 'actions' , name : 'actions' ,exportable:false,orderable: false,searchable: false},    
];
KTUtil.onDOMContentLoaded(function () {
  loadDatatable('{{ __($trans.".plural") }}','{{ $listingRoute }}',dynamicColumns,'','1');
});
</script>
<script src="{{ asset('assets/backend/js/custom/updateStatus.js')}}"></script> 
@stop
