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
 
 

    <form id="kt_ecommerce_add_category_form" method="get" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo7/dist/apps/ecommerce/catalog/categories.html">
      
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <!--begin::General options-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>General</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" id="tabs">
                        <!--begin::Label-->
                      
                        <!--end::Label-->
                        <!--begin::Input-->


                        <ul id="apptabs" class="nav nav-tabsXXXxxx" role="tablist">
     											 
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                     
                            <li class="nav-item">
                                <a id="tabs-{{ substr($properties['regional'],0,2) }}" 
                                data-toggle="tab" hreflang="{{$localeCode}}" 
                                href="#{{ substr($properties['regional'],0,2) }}" 
                                class="nav-link {{{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'active':''}}}">
                                 
                                    <i class="fa" id="icon_{{ substr($properties['regional'],0,2) }}"></i>{{ $properties['native'] }}</a></li>
                            
                            @endforeach
                           </ul>

                        <div class="tab-contentXXXXXxx">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode2 => $properties2)
                        <?php $lang = substr($properties2['regional'],0,2);?>
                        <div 
                        class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties2['name'] ? 'show active':''}}" 
                        id="{{ substr($properties2['regional'],0,2) }}" role="tabpanel">
                
                      
                            
                            <div class="form-group row">
                                <label class="col-lg-12 control-label" for="title_{{ $lang }}">  [{{ $lang }}] <span class="text-danger">*</span></label>
                                <div class="fl w-40">
                                
                                 
                                <input class="form-control" type="text" name="title_{{ $lang }}" 
                                id="title_{{ $lang }}"
                                required
                                data-fv-not-empty___message="The assssssssge is required"
                                
                                >
                                
                                </div>
                                </div>
                                
                
                                
                        </div>
                 
                    @endforeach
                        </div>
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
             
            <!--end::Automation-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
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


<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
<script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
 
{{-- <script src="{{ asset('assets/backend/abdo/apply2.js')}}"></script> --}}
 
<script type="text/javascript">

"use strict";

// Class definition
var KTAppEcommerceSaveCategory = function () {

    
 

 
    // Submit form handler
    const handleSubmit = () => {
        // Define variables
        let validator;
        var parentId,tabIndex;
        var icon_msg;


        // Get elements
        var form = document.getElementById('kt_ecommerce_add_category_form');
        var submitButton = document.getElementById('kt_ecommerce_add_category_submit');

// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
validator = FormValidation.formValidation(form,{

plugins: {
    declarative: new FormValidation.plugins.Declarative({
            html5Input: true,
        }),
        trigger: new FormValidation.plugins.Trigger(),
        tachyons: new FormValidation.plugins.Tachyons(),
        submitButton: new FormValidation.plugins.SubmitButton(),
        icon: new FormValidation.plugins.Icon({
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh',
        }),
////////////////////////////////

///////////////////////////////////

}
}).on('core.field.invalid', function(data) {

parentId = $("#"+data).parents('.tab-pane').attr("id");
var $icon = $('a[href="#' + parentId + '"][data-toggle="tab"]').parent().find('i');
$icon.removeClass('fa-check').addClass('fa-times');
}).on('core.field.valid', function(data) {

parentId = $("#"+data).parents('.tab-pane').attr("id");
var $icon = $('a[href="#' + parentId + '"][data-toggle="tab"]').parent().find('i');
$icon.removeClass('fa-times').addClass('fa-check');
});

        // Handle submit button
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
