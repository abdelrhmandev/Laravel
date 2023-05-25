@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">Recipes</li>
    <li class="breadcrumb-item text-dark">Listings</li>
@stop

@section('style')
@if (app()->getLocale() === 'ar')
	<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
		type="text/css" />
@else
	<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
		type="text/css" />
@endif
@stop

 
	<style>


.ribbon.ribbon-right .ribbon-target {
  border-top-left-radius: 0.42rem;
  border-bottom-left-radius: 0.42rem;
}
.ribbon .ribbon-target {
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-pack: center;
-ms-flex-pack: center;
justify-content: center;
-webkit-box-align: center;
-ms-flex-align: center;
align-items: center;
padding: 5px 10px;
position: absolute;
z-index: 1;
 
}
</style>

@section('content')

<div class="container-xxl" id="kt_content_container">



	





		<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo7/dist/apps/ecommerce/catalog/products.html">							 
			<div class="d-flex flex-column gap-7 gap-lg-10 w-100 mb-7 me-lg-10">
				<!--begin:::Tabs-->									
				<x-backend.langs.ulTabs />
				<!--end:::Tabs-->
				<!--begin::Tab content-->
				<x-backend.langs.LangInputs />
				<!--end::Tab content-->
				<x-backend.btns.create />
			</div>							 
			<div class="d-flex flex-column flex-row-fluid gap-7 w-lg-400px gap-lg-10">
				<!--begin::Thumbnail settings-->
				<x-backend.cms.image />
				<!--end::Thumbnail settings-->
				<!--begin::Status-->
				<x-backend.cms.status />
				<!--end::Status-->
				<!--begin::Category & tags-->
				<x-backend.cms.category />
				<!--end::Category & tags-->
				<!--begin::Weekly sales-->								 
				<x-backend.cms.tags />
				<!--end::Weekly sales-->
				<!--begin::Template settings-->									 
				<!--end::Template settings-->
			</div>
		</form>							 
</div>
@stop








@section('scripts')
    <script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{ asset('assets/backend/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script> --}}
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/users-search.js') }}"></script>
	<script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>


    {{-- @include('backend.form') --}}
	<script>
	////////////
	"use strict";

// Class definition
var KTAppEcommerceSaveCategory = function () {

    // Private functions

		// $("#description_en").val(
		// $("#description_Div_en").html()
		// );

    // Init quill editor
    const initQuill = () => {
        // Define all elements for quill editor
        const elements = [
            '#description_div_en',
			'#description_div_ar'
        ];

        // Loop all elements
        elements.forEach(element => {
            // Get quill element
            let quill = document.querySelector(element);

            // Break if element not found
            if (!quill) {
                return;
            }

            // Init quill --- more info: https://quilljs.com/docs/quickstart/
            quill = new Quill(element, {
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['image', 'code-block']
                    ]
                },
                placeholder: 'Type your texasdast here...',
                theme: 'snow' // or 'bubble'
            });
        });

    }

    

    // Public methods
    return {
        init: function () {
            // Init forms
            initQuill();
 
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveCategory.init();
});

	/////////////
 
	</script>
   
    <!--end::Custom Javascript-->
@stop
