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
	<!--begin::Container-->
  <div class="container-xxl" id="kt_content_container">
    <!--begin::Card-->
    <div class="card">
      <!--begin::Card header-->
 
    
      <div class="card-header border-0 pt-6">
        <!--begin::Card title-->

    

        <div class="card-title">
          <!--begin::Search-->
          <div class="d-flex align-items-center position-relative my-1">            
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
              </svg>
            </span>
            <!--end::Svg Icon-->
            <input type="text" data-kt-table-filter="search" class="form-control form-control-solid w-200px ps-15" placeholder="{{ __('admin.search') }} ......" />
          </div>
          <!--end::Search-->
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
          <!--begin::Toolbar-->
          <div class="d-flex justify-content-end" data-kt-table-toolbar="base">
            <!--begin::Filter-->
            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
            <span class="svg-icon svg-icon-2">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
              </svg>
            </span>
            <!--end::Svg Icon-->{{ __('admin.filter') }}</button>
            <!--begin::Menu 1-->
           
            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
              <!--begin::Header-->
              <div class="px-7 py-5">
                <div class="fs-4 text-dark fw-bold">{{ __('admin.filter_options') }}</div>
              </div>
              <!--end::Header-->
              <!--begin::Separator-->
              <div class="separator border-gray-200"></div>
              <!--end::Separator-->
              <!--begin::Content-->
              <div class="px-7 py-5" data-kt-table-filter="form">
                <!--begin::Input group-->
               
                <!--end::Input group-->
                <!--begin::Input group-->
               {{-- @include('backend.partials.filter_optipns._category',['category'=>$categories->latest()->get(),'counter'=>$categories->count()]) --}}
               {{-- @include('backend.partials.filter_optipns._status',['status'=>['published'=>$published_counter,'unpublished'=>$unpublished_counter,'scheduled'=>$scheduled_counter]]) --}}
           
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="d-flex justify-content-end">
                  <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-table-filter="reset">{{ __('admin.reset') }}</button>
                  <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-table-filter="filter">{{ __('admin.apply') }}</button>
                </div>
                <!--end::Actions-->
              </div>
              
              <!--end::Content-->
            </div>

            


             <!--end::Menu 1-->
            <!--end::Filter-->
            <!--begin::Export-->
            
            {{-- @include('backend.partials.modals._exportlisting') --}}
            <!--end::Export-->
            <!--begin::Add-->
            
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
            <!--end::Add-->
          </div>
          <!--end::Toolbar-->
          <!--begin::Group actions-->
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
          <!--end::Group actions-->
        </div>
        <!--end::Card toolbar-->
      </div>
      <!--end::Card header-->
      <!--begin::Card body-->




      <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable">
          <!--begin::Table head-->
          <thead>
            <!--begin::Table row-->
            <tr class="text-start text-bold-400 fw-bold fs-7 text-uppercase gs-0">
              <th class="w-10px pe-2 noExport">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                  <input class="form-check-input all" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_datatable .form-check-input .all" value="1" />
                </div>
              </th>            
              <th>{{ __('site.image') }}</th>  
              <th>{{ __('site.title') }}</th>                                
              <th>{{ __('site.parent_id') }}</th> 
              <th>{{ __('post.plural') }}</th> 
              <th>{{ __('site.published') }}</th> 
              <th>{{ __('admin.created_at') }}</th>
              <th class="text-end min-w-70px noExport">{{ __('admin.actions') }}</th>  
            </tr>

          
            <!--end::Table row-->
          </thead>
          <!--end::Table head-->
          <!--begin::Table body-->
          <tbody class="fw-semibold text-gray-600"> 
          </tbody>
          <!--end::Table body-->
        </table>
         
        <!--end::Table-->
      </div>
      <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Modals-->
    <!--begin::Modal - Adjust Balance-->
    
    <!--end::Modal - New Card-->
    <!--end::Modals-->
  </div>  <!--end::Container-->
@stop


@section('scripts')
<!--begin::Vendors Javascript(used for this page only)-->
{{-- @include('backend.datatables2') --}}


<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfmake.min.js')}}"></script> 
<script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_load_fonts.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfhandle.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@include('backend.datatables')
 
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->

<script>

var dynamicColumns = [
{ data: 'id', name: 'id',exportable:false},
{ data: 'image', name: 'image'},
{ data: 'title', name: 'title'},
{ data: 'parent', name: 'parent'},
{ data: 'count', name: 'count'},
{ data: 'published', name: 'published'},
{ data: 'created_at', name: 'created_at'},
{ data: 'actions' , name : 'actions' },    
];
KTUtil.onDOMContentLoaded(function () {
  loadDatatable('{{ route('admin.categories.index') }}',dynamicColumns);
});
</script>

{{-- https://preview.keenthemes.com/metronic/demo3/features/miscellaneous/toastr.html --}}
<script>
   
  $('#kt_datatable').on('click','.changeuserstatus',function(e){
      var id = $(this).attr('data-id');
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
          '_method': 'post',          
          'status': status,
          'table' :'categories',
          'id'    : id
      }, 
      success: function(response){
        console.log(response);
      }
      });
});
 
</script>
@stop
