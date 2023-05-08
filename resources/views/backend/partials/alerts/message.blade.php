@if (Session::has('success'))
  
        {{-- <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}          
        </div> --}}


        <!--begin::Alert-->
<div class="alert alert-dismissible bg-light-primary border border-primary d-flex flex-column flex-sm-row p-5 mb-10">
    <!--begin::Icon-->
    <i class="ki-duotone ki-search-list fs-2hx text-success me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <!--begin::Title-->
        <h5 class="mb-1">This is an alert</h5>
        <!--end::Title-->

        <!--begin::Content-->
        <span>The alert component can be used to highlight certain parts of your page for higher content visibility.</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Close-->
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>
    </button>
    <!--end::Close-->
</div>
<!--end::Alert-->



     
@elseif(Session::has('error'))
    <div class="container-xxl" id="kt_content_container">
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    </div>
@elseif(Session::has('warning'))
    <div class="container-xxl" id="kt_content_container">
        <div class="alert alert-warning" role="alert">
            {{ Session::get('warning') }}
        </div>
    </div>
@elseif(Session::has('info'))
    <div class="container-xxl" id="kt_content_container">
        <div class="alert alert-info" role="alert">
            {{ Session::get('info') }}
        </div>
    </div>
@endif
