@extends('backend.base.base')
@section('style')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@stop


@section('content')


<!--begin::Wrapper-->
<div class="d-flex flex-stack mb-5">
    <!--begin::Search-->
    <div class="d-flex align-items-center position-relative my-1">
        <span class="svg-icon svg-icon-2">...</span>
        <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers"/>
    </div>
    <!--end::Search-->

    <!--begin::Toolbar-->
    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
        <!--begin::Filter-->
        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="tooltip" title="Coming Soon">
            <span class="svg-icon svg-icon-2">...</span>
            Filter
        </button>
        <!--end::Filter-->

        <!--begin::Add customer-->
        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="Coming Soon">
            <span class="svg-icon svg-icon-2">...</span>
            Add Customer
        </button>
        <!--end::Add customer-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Group actions-->
    <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
        <div class="fw-bold me-5">
            <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
        </div>

        <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="Coming Soon">
            Selection Action
        </button>
    </div>
    <!--end::Group actions-->
</div>
<!--end::Wrapper-->

<!--begin::Datatable-->
<table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
        <th class="w-10px pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_datatable_example_1 .form-check-input" value="1"/>
            </div>
        </th>
        <th>id</th>
        <th class="text-end min-w-100px">Actions</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
    </tbody>
</table>
<!--end::Datatable-->


@stop


@section('script')
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script type="text/javascript">

 

 

// Class definition
var KTDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;
    var filterPayment;

    // Private functions
    var initDatatable = function () {
        dt = $("#kt_datatable_example_1").DataTable({
           
            processing: true,
            serverSide: true,
            responsive: true,
            lengthMenu: [[1, 10, 25, 50, -1], [1, 10, 25, 50, "AllXXX"]],
            pagingType: "full_numbers",
            pageLength: 3,
          
 
            ajax: {
                ajax: "{{ route('recipes.index') }}",
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },

            columns: [
                {data: 'id', name: 'id'},
            ],
            language: {
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/{{ app()->getLocale()}}.json",
            "processing": '<img src="/template/images/loader.gif"> Loading results...'
        },
          
        });

        table = dt.$;

 
    }

 
    
 

 
 

    // Public methods
    return {
        init: function () {
            initDatatable();
 
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});


  
  </script>

{{-- @include('backend.datatables');  --}}
@stop
