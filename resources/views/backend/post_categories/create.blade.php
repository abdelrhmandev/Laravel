@extends('backend.base.base')
@section('breadcrumbs')
<li class="breadcrumb-item text-muted">Recipes</li>
<li class="breadcrumb-item text-dark">Listings</li>
@stop
@section('style')
@if (app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endif
@stop
@section('content')
<div class="container-xxl" id="kt_content_container">
   <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo7/dist/apps/ecommerce/catalog/products.html">
      <div class="d-flex flex-column gap-7 gap-lg-10 w-100 mb-7 me-lg-10">
         <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="nav-item">
               <a class="nav-link text-active-primary pb-5 {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'active':''}}" data-bs-toggle="tab" href="#{{ $properties['native'] }}">
                  <img width="24" height="24" class="rounded-1" src="{{ asset('assets/backend/media/flags/'.strtolower($localeCode.".svg"))}}" alt="" />						
                  {{ $properties['native'] }}
               </a>
            </li>
            @endforeach
         </ul>
         <div class="tab-content">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'show active':''}}" id="{{ $properties['native'] }}" role="tabpanel">
               <div class="d-flex flex-column gap-7 gap-lg-10">
                  <div class="card card-flush py-4">
                     <div class="card-body pt-2">
                        <x-backend.cms.title :lang="$properties['name']" />
                        <x-backend.cms.description :lang="$properties['name']" />
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>        
         <x-backend.btns.create :label="'Add'" />
      </div>
      <div class="d-flex flex-column flex-row-fluid gap-7 w-lg-400px gap-lg-10">
         <x-backend.cms.image :lable="'Image'" />
      </div>
   </form>
</div>
@stop
@section('scripts')

<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>








<!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->





<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets/backend/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script>
<script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/utilities/modals/users-search.js') }}"></script>


<script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

@include('backend.form')
<!--end::Custom Javascript-->
<script>
var KTCkeditor = function () {
    var demos = function () {
        ClassicEditor
            .create( document.querySelector('textarea') )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    }
    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();
jQuery(document).ready(function() {
    KTCkeditor.init();
});
</script>
   
@stop
