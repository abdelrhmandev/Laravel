@extends('backend.base.base')

@section('breadcrumbs')
<li class="breadcrumb-item text-muted">Recipes</li>
<li class="breadcrumb-item text-dark">Listings</li>
@stop

@section('style')

@if(app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endif

<link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css" />
 
<style>
    .my-field-error .fv-plugins-message-container,
    .my-field-error .fv-plugins-icon {
        font-size: 0.925rem; 
color: #f1416c;
 

 
    }
    .my-field-success .fv-plugins-message-container,
    .my-field-success .fv-plugins-icon {
        font-size: 0.925rem;font-weight: 400;
        color: #2780e3;
    }
</style>




@stop
@section('content')
 
  <div class="container-xxl" id="kt_content_container">
 
 
   <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo7/dist/apps/ecommerce/catalog/categories.html">
      <!--begin::Aside column-->
       
      <!--end::Aside column-->
      <!--begin::Main column-->
      <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
         <!--begin::General options-->
         <div class="card card-flush py-4">
            <!--begin::Card header-->
 
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
               <!--begin::Input group-->
               <div class="mb-10 fv-row">
                  <!--begin::Label-->
                  <label class="required form-label">Category Name</label>
                  <!--end::Label-->
                  <!--begin::Input-->
                  <input type="text" name="title_en" id="title_en" class="form-control mb-2" placeholder="Product name" value="" />
                  <!--end::Input-->
                  <!--begin::Description-->
                   <!--end::Description-->
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
 
               <!--end::Input group-->
            </div>
            <!--end::Card header-->
         </div>
         <!--end::General options-->
         <!--begin::Meta options-->
    
         <!--end::Meta options-->
         <!--begin::Automation-->
       
         <!--end::Automation-->
         <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="../../demo7/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
               <span class="indicator-label">Save Changes</span>
               <span class="indicator-progress">Please wait...
               <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
         </div>
      </div>
      <!--end::Main column-->
   </form>

    
  </div>  
@stop



    

   


@section('scripts')

<script src="{{ asset('assets/backend/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>


  

<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{ asset('assets/backend/abdo/apply2.js')}}"></script>



 
 
<!--end::Custom Javascript-->
@stop
