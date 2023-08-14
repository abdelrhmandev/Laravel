@extends('backend.base.base')
@section('breadcrumbs')
<li class="breadcrumb-item text-dark">Categories</li>
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
            <input type="text" data-kt-table-filter="search" class="form-control form-control-solid w-200px ps-15" placeholder="{{ __('admin.search') }} ......" />
          </div>
        </div>
        <div class="card-toolbar">
          <div class="d-flex justify-content-end" data-kt-table-toolbar="base">
           
            <div class="w-150px me-3">
              <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="status" name="status" data-placeholder="Status" data-kt-filter="status">
                <option></option>
                <option value="all">{{ __('site.all') }}  ({{ $allrecords }})</option>
                <option value="1">{{ __('site.published') }} ({{ $publishedCounter}})</option>
                <option value="0">{{ __('site.unpublished') }} ({{ $publishedCounter}})</option>
              </select>
            </div>
            
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
            <span class="me-2" data-kt-table-select="selected_count"></span>{{ __('admin.selected') }}</div>
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
             ><i class="fa fa-trash-alt"></i>{{ __('admin.delete_selected') }}</button>
          </div>

        </div>
      </div>
      <div class="card-body pt-0">
        <!--begin::Table-->

 
         <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable">         
          {{-- <p>
            Published Counter 
          <input type="text" id="published_counter">
          </p> --}}

          {{-- <p>
            UnPublished Counter 
          <input type="text" id="published_counter">
          </p> --}}

          
          <!--begin::Table head-->
          <thead>
            <!--begin::Table row-->
            <tr class="text-start text-bold-400 fw-bold fs-7 text-uppercase gs-0">
              <th class="w-10px pe-2 noExport">             
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                  <input class="form-check-input AA" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_datatable .AA" value="1" />
                </div>
              </th>            
              <th>{{ __('site.image') }}</th>  
              <th>{{ __('site.title') }}</th>                                
              <th>{{ __('site.parent_id') }}</th> 
              <th>{{ __('post.plural') }}</th> 
              <th>{{ __('site.status') }}</th> 
              <th>{{ __('admin.created_at') }}</th>
              <th class="text-end min-w-50px noExport">{{ __('admin.actions') }}</th>  
            </tr>
          </thead>
          <tbody class="fw-semibold text-gray-600"> 
          </tbody>
        </table>
      </div>
    </div>
@stop


@section('scripts')
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfmake.min.js')}}"></script> 
<script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_load_fonts.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfhandle.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@include('backend.datatables')
<script>

var dynamicColumns = [ //as an array start from 0
{ data: 'id', name: 'id',exportable:false}, 
{ data: 'image', name: 'image' ,orderable: false,searchable: false},
{ data: 'translate.title', name: 'translate.title',orderable: false}, // 2
{ data: 'parent_id', name: 'parent_id',orderable: false,searchable: false},
{ data: 'count', name: 'count',orderable: false,searchable: false}, 
{ data: 'status', name: 'status',orderable: false,searchable: true}, // 5
{ data: 'created_at',name :'created_at', type: 'num', render: { _: 'display', sort: 'timestamp'}},
{ data: 'actions' , name : 'actions' ,exportable:false,orderable: false,searchable: false},    
];
KTUtil.onDOMContentLoaded(function () {
  loadDatatable('{{ $redirectRoute }}',dynamicColumns,'5','2');
});
</script>


<script>
 $('#kt_datatable').on('click','.changestatus',function(e){
    var id = $(this).attr('data-id');
      var table = $(this).attr('data-table');
      var transItem = $(this).attr('data-trans-item');
      var status = 0;
      if($(this).is(":checked")){
            status = 1;    
      }
      $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },           
            url: '{{ route('admin.UpdatePublished')}}',
            data: {
                '_method'   : 'post',          
                'status'    : status,
                'table'     : table,
                'transItem' : transItem,
                'id'        : id 
            },
              success: function(response){
                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-left",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
              };
              if(response['status'] == true){ 
              toastr.success(response['msg']);
              }else{ 
              toastr.error(response['msg']);      
              }
              $('#kt_datatable').DataTable().ajax.reload();
            }         
      });
});
</script>
@stop
