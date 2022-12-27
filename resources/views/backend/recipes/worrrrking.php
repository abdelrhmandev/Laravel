@extends('backend.base.base')
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
            <input type="text" data-kt-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="{{ __('site.search') }} ......" />
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
            <!--end::Svg Icon-->{{ __('site.filter') }}</button>
            <!--begin::Menu 1-->
           
            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
              <!--begin::Header-->
              <div class="px-7 py-5">
                <div class="fs-4 text-dark fw-bold">{{ __('site.filter_options') }}</div>
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
               @include('backend.partials.filter_optipns._category',['category'=>$categories])
               @include('backend.partials.filter_optipns._status',['status'=>['published','unpublished','scheduled']])
           
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="d-flex justify-content-end">
                  <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-table-filter="reset">{{ __('site.reset') }}</button>
                  <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-table-filter="filter">{{ __('site.apply') }}</button>
                </div>
                <!--end::Actions-->
              </div>
              
              <!--end::Content-->
            </div>

            


             <!--end::Menu 1-->
            <!--end::Filter-->
            <!--begin::Export-->
            
            @include('backend.partials.modals._exportlisting')
            <!--end::Export-->
            <!--begin::Add-->
            <a class="btn btn-primary" href="sdsadsa.php">{{ __('recipe.add') }}</a>
            <!--end::Add-->
          </div>
          <!--end::Toolbar-->
          <!--begin::Group actions-->
          <div class="d-flex justify-content-end align-items-center d-none" data-kt-table-toolbar="selected">
            <div class="fw-bold me-5">
            <span class="me-2" data-kt-table-select="selected_count"></span>{{ __('site.selected') }}</div>
            <button type="button" class="btn btn-danger" data-kt-table-select="delete_selected">{{ __('site.delete_selected') }}</button>
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
                  <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_datatable .form-check-input" value="1" />
                </div>
              </th>            
              <th>{{ __('site.title') }}</th>             
               <th>{{ __('site.category') }}</th> 
              {{-- <th>{{ __('site.tags') }}</th> --}}
              {{-- <th>{{ __('site.comments') }}</th> --}}
              <th>{{ __('site.status') }}</th>
              {{-- <th>{{ __('site.featured') }}</th> --}}
              <th>{{ __('site.created_at') }}</th>
              <th class="text-end min-w-70px noExport">{{ __('site.actions') }}</th>  
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
@include('backend.datatables')
 
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfmake.min.js')}}"></script> 
<script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>

 
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script>
function loadDatatable(){



        // Shared variables
        var table;
        var dt;
        var filterStatus;
            
            var lang = document.dir == 'rtl' ? 'ar' : 'en-GB';        
            dt = $("#kt_datatable").DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,                
                info: true, 
                bPaginate: true,    
                orientation: 'landscape',     
                exportOptions: {
                    orthogonal: "myExport",
                },    
                pagingType: "full_numbers",
                language: {
                url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/"+lang+".json",
                },
                fnDrawCallback: function() {
                    if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) < 1) {
                        $('.dataTables_paginate').css("display", "none"); $('.dataTables_length').css("display", "none"); $('.dataTables_info').css("display", "none");            
                    }else{
                        $('.dataTables_paginate').css("display", "block"); $('.dataTables_length').css("display", "block"); $('.dataTables_info').css("display", "block");            
                    }   
                   
                },         
                iDisplayLength: 10,
                bLengthChange: true,
                stateSave: false,
                lengthMenu: [[1, 10, 25, 50, -1], [1, 10, 25, 50, "AllXXX"]],
                order: [],
                select: {
                    style: 'os',
                    selector: 'td:first-child input[type="checkbox"]',
                    className: 'row-selected'
                },               
                ajax: {
                    url: "{{ route('recipes.index')}}",
                },
                columns: [
                    { data: 'id', name: 'id',exportable:false},
                    { data: 'title', name: 'title'},
                    { data: 'category_id', name: 'category_id'},
                    { data: 'status', name: 'status'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'actions' },
                ],               
                columnDefs: [
                    {
                        targets: 0,
                        exportable: false,
                        printable: false,
                        searchable: false,
                        orderable: false,
                            render: function (data) {
                                return `
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" class="sub_chk" data-id="${data}" value="${data}" type="checkbox" />
                                    </div>`;
                            }
                    },{
                        targets: -1,
                        data: null,
                        exportable: false,
                        printable: false,
                        searchable: false,                    
                        orderable: false,
                        className: 'text-end',                        
                    },
                ],
     
            });    
              
         
              exportButtonsXXXX();
          
          }


KTUtil.onDOMContentLoaded(function () {
  loadDatatable();
 
});
 
 

            
 
</script>


<!--end::Custom Javascript-->

@stop
