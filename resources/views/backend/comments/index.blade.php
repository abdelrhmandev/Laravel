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
          <input type="text" name="search" id="search" data-kt-table-filter="search" class="form-control form-control-solid w-210px ps-15" placeholder="{{ __('admin.search') }} {{ __($trans.'.plural') }} ......" />
        </div>
      </div>
      <div class="card-toolbar">
        <div class="d-flex justify-content-end" data-kt-table-toolbar="base">   
          {{-- <div class="w-150px me-3">
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="status" name="status" data-placeholder="{{ __('site.sort_by')}} {{ __('site.status')}}" data-kt-filter="status">
              <option></option>
              <option value="all">{{ __('site.all') }}  ({{ $allrecords }})</option>
              <option value="1">{{ __('site.published') }} ({{ $publishedCounter}})</option>
              <option value="0">{{ __('site.unpublished') }} ({{ $unpublishedCounter}})</option>
            </select>
          </div> --}}
          
          <div class="w-200px me-3">
              <select class="form-select form-select-solid" data-control="select2" name="status" id="status" data-placeholder="{{ __('site.filter_by')}} {{ __('category.singular')}} " data-allow-clear="true">
                <option value="all">{{ __('site.all') }}  ({{ $allrecords }})</option>
                <option value="pending">{{ __('site.pending') }}  ({{ $allrecords }})</option>
                <option value="approved">{{ __('site.approved') }}  ({{ $allrecords }})</option>
                <option value="rejected">{{ __('site.rejected') }}  ({{ $allrecords }})</option>
              </select>
           </div>


          
        </div>
        <div class="d-flex justify-content-end align-items-center d-none" data-kt-table-toolbar="selected">
          <div class="fw-bold me-5">
          <span class="me-2" data-kt-table-select="selected_count"></span>{{ __('admin.selected') }}</div>          
          
          <button type="button" class="btn btn-danger" id="destroyMultipleroute"              
          data-destroyMultiple-route = "dsadsadasd"
          data-kt-table-select="delete_selected"             
          data-back-list-text="{{ __('site.back_to_list') }}"        
          data-confirm-message = "{{ __($trans.'.delete_selected') }}"
          data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
          data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
          data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
          data-delete-selected-records-text = "{{ __($trans.'.delete_selected') }}"
          data-not-deleted-message = "{{ __($trans.'.not_delete_selected') }}"
          ><i class="fa fa-trash-alt"></i>{{ __('admin.delete_selected') }}</button>


<button type="button" class="btn btn-primary" id="destroyMultipleroute"              
          data-destroyMultiple-route = "dsadsadasd"
          data-kt-table-select="delete_selected"             
          data-back-list-text="{{ __('site.back_to_list') }}"        
          data-confirm-message = "{{ __($trans.'.delete_selected') }}"
          data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
          data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
          data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
          data-delete-selected-records-text = "{{ __($trans.'.delete_selected') }}"
          data-not-deleted-message = "{{ __($trans.'.not_approve_selected') }}"
          ><i class="bi bi-patch-check"></i> {{ __('admin.approve_selected') }}</button>


          <button type="button" class="btn btn-secondary" id="destroyMultipleroute"              
          data-destroyMultiple-route = "dsadsadasd"
          data-kt-table-select="delete_selected"             
          data-back-list-text="{{ __('site.back_to_list') }}"        
          data-confirm-message = "{{ __($trans.'.delete_selected') }}"
          data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
          data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
          data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
          data-delete-selected-records-text = "{{ __($trans.'.delete_selected') }}"
          data-not-deleted-message = "{{ __($trans.'.not_approve_selected') }}"
          ><i class="bi bi-exclamation-octagon"></i>{{ __('admin.spam_selected') }}</button>



          <button type="button" class="btn btn-warning" id="destroyMultipleroute"              
          data-destroyMultiple-route = "dsadsadasd"
          data-kt-table-select="reject_selected"             
          data-back-list-text="{{ __('site.back_to_list') }}"        
          data-confirm-message = "{{ __($trans.'.reject_selected') }}"
          data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
          data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
          data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
          data-reject-selected-records-text = "{{ __($trans.'.reject_selected') }}"
          data-not-rejectd-message = "{{ __($trans.'.reject_selected') }}"
          ><i class="bi bi-x-circle-fill"></i>{{ __('admin.reject_selected') }}</button>




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
            <th>{{ __('site.author') }}</th>
            <th>{{ __('comment.singular') }}</th>                                              
            <th>{{ __('post.singular') }}</th>
            {{-- <th>{{ __('site.status') }}</th>             --}}
            <th class="text-primary">{{ __('admin.created_at') }}</th>
            <th class="text-end min-w-50px noExport">{{ __('admin.actions') }}</th>  
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
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfmake.min.js')}}"></script> 
<script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_load_fonts.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfhandle.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@include('backend.datatables.comments')
<script>
var dynamicColumns = [ //as an array start from 0
{ data: 'id', name: 'id',exportable:false}, 
{ data: 'author', name: 'author',orderable: false},
{ data: 'comment', name: 'comment',orderable: false},
{ data: 'post', name: 'post',orderable: false},
// { data: 'status', name: 'status',orderable: false},
{ data: 'created_at',name :'created_at', type: 'num', render: { _: 'display', sort: 'timestamp', order: 'desc'}}, // 6
{ data: 'actions' , name : 'actions' ,exportable:false,orderable: false,searchable: false},    
];
KTUtil.onDOMContentLoaded(function () {
  loadDatatable('{{ __($trans.".plural") }}','{{ $redirectRoute }}',dynamicColumns,'','2');
});
</script>
 
@stop
