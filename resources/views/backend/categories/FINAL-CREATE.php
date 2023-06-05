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

 
<style>

 

    .my-field-error .fv-plugins-message-container,
    .my-field-error .fv-plugins-icon {
        font-size: 1.025rem; 
        top: 30px; 
color: #f1416c;
line-height:40px;
 
}
 
 
 
    .my-field-success .fv-plugins-message-container,
    .my-field-success .fv-plugins-icon {
        font-size: 1.025rem; 
        font-weight: bold;
color: #19a974;
line-height:40px;
top: 30px; 
 
 
    }

  

</style>




@stop
@section('content')
 
  <div class="container-xxl" id="kt_content_container">
  
 
 
<form id="kt_ecommerce_add_category_form" action="get" class="form d-flex flex-column flex-lg-row" data-kt-redirect="#">
    <!--begin::Aside column-->
 
    <!--end::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

        <div class="card card-flush py-4">
            <div class="card-body pt-0">              
             
                
                <div class="mb-10 fl row">
                    <!--begin::Label-->
                    <label class="required form-label">Product Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    
                    
                    <input
                                class="form-control mb-2 ba b--black-20 pa2 mb2 db w-100"
                                name="website"
                                type="text"
                               
                                required
                                data-fv-not-empty___message="The website is required"
                            />

                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>
                    <!--end::Description-->
                </div>

                
            
            </div>
        </div>
        <div class="d-flex justify-content-end">
       
            <a href="../../demo7/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
  
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
<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
<script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
  "use strict";

// Class definition
var KTAppEcommerceSaveCategory = function () {

     

    // Submit form handler
    const handleSubmit = () => {
        // Define variables
        let validator;

        // Get elements
        const form = document.getElementById('kt_ecommerce_add_category_form');
        const submitButton = document.getElementById('kt_ecommerce_add_category_submit');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
 
                plugins: {
                    declarative: new FormValidation.plugins.Declarative({
                            html5Input: true,
                        }),
                        trigger: new FormValidation.plugins.Trigger(),
                        tachyons: new FormValidation.plugins.Tachyons({
                        rowInvalidClass: 'my-field-error',
                        rowValidClass: 'my-field-success',
                        }),
                         
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                    },
              
                 
            }
        );

        // Handle submit button
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable submit button whilst loading
                        submitButton.disabled = true;

                        setTimeout(function () {
                            submitButton.removeAttribute('data-kt-indicator');

                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    // Enable submit button after loading
                                    submitButton.disabled = false;

                                    // Redirect to customers list page
                                    window.location = form.getAttribute("data-kt-redirect");
                                }
                            });
                        }, 2000);
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        })
    }

    // Public methods
    return {
        init: function () {
            // Init forms
 
            handleSubmit();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveCategory.init();
});

</script>

 
 
<!--end::Custom Javascript-->
@stop
