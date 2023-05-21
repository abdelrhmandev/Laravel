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

    .fv-plugins-tachyons .fv-plugins-icon {
  height: 36px;
  line-height: 36px;
  width: 36px;
}

 l.fv-sr-only {
 display:none
}
.fv-plugins-framework input::-ms-clear,
.fv-plugins-framework textarea::-ms-clear {
 display:none;
 height:0;
 width:0
}
.fv-plugins-icon-container {
 position:relative
}
.fv-plugins-icon {
 position:absolute;
 right:0;
 text-align:center;
 top:0
}
.fv-plugins-tooltip {
 max-width:256px;
 position:absolute;
 text-align:center;
 z-index:10000
}
.fv-plugins-tooltip .fv-plugins-tooltip__content {
 background:#000;
 border-radius:3px;
 color:#eee;
 padding:8px;
 position:relative
}
.fv-plugins-tooltip .fv-plugins-tooltip__content:before {
 border:8px solid rgba(0,0,0,0);
 content:"";
 position:absolute
}
.fv-plugins-tooltip--hide {
 display:none
}
.fv-plugins-tooltip--top-left {
 transform:translateY(-8px)
}
.fv-plugins-tooltip--top-left .fv-plugins-tooltip__content:before {
 border-top-color:#000;
 left:8px;
 top:100%
}
.fv-plugins-tooltip--top {
 transform:translateY(-8px)
}
.fv-plugins-tooltip--top .fv-plugins-tooltip__content:before {
 border-top-color:#000;
 left:50%;
 margin-left:-8px;
 top:100%
}
.fv-plugins-tooltip--top-right {
 transform:translateY(-8px)
}
.fv-plugins-tooltip--top-right .fv-plugins-tooltip__content:before {
 border-top-color:#000;
 right:8px;
 top:100%
}
.fv-plugins-tooltip--right {
 transform:translateX(8px)
}
.fv-plugins-tooltip--right .fv-plugins-tooltip__content:before {
 border-right-color:#000;
 margin-top:-8px;
 right:100%;
 top:50%
}
.fv-plugins-tooltip--bottom-right {
 transform:translateY(8px)
}
.fv-plugins-tooltip--bottom-right .fv-plugins-tooltip__content:before {
 border-bottom-color:#000;
 bottom:100%;
 right:8px
}
.fv-plugins-tooltip--bottom {
 transform:translateY(8px)
}
.fv-plugins-tooltip--bottom .fv-plugins-tooltip__content:before {
 border-bottom-color:#000;
 bottom:100%;
 left:50%;
 margin-left:-8px
}
.fv-plugins-tooltip--bottom-left {
 transform:translateY(8px)
}
.fv-plugins-tooltip--bottom-left .fv-plugins-tooltip__content:before {
 border-bottom-color:#000;
 bottom:100%;
 left:8px
}
.fv-plugins-tooltip--left {
 transform:translateX(-8px)
}
.fv-plugins-tooltip--left .fv-plugins-tooltip__content:before {
 border-left-color:#000;
 left:100%;
 margin-top:-8px;
 top:50%
}
.fv-plugins-tooltip-icon {
 cursor:pointer;
 pointer-events:inherit
}
.fv-plugins-bootstrap .fv-help-block {
 color:#dc3545;
 font-size:80%;
 margin-top:.25rem
}
.fv-plugins-bootstrap .is-invalid~.form-check-label,
.fv-plugins-bootstrap .is-valid~.form-check-label {
 color:inherit
}
.fv-plugins-bootstrap .has-danger .fv-plugins-icon {
 color:#dc3545
}
.fv-plugins-bootstrap .has-success .fv-plugins-icon {
 color:#28a745
}
.fv-plugins-bootstrap .fv-plugins-icon {
 height:38px;
 line-height:38px;
 width:38px
}
.fv-plugins-bootstrap .input-group~.fv-plugins-icon {
 z-index:3
}
.fv-plugins-bootstrap .form-group.row .fv-plugins-icon {
 right:15px
}
.fv-plugins-bootstrap .form-group.row .fv-plugins-icon-check {
 top:-7px
}
.fv-plugins-bootstrap:not(.form-inline) label~.fv-plugins-icon {
 top:32px
}
.fv-plugins-bootstrap:not(.form-inline) label~.fv-plugins-icon-check {
 top:25px
}
.fv-plugins-bootstrap:not(.form-inline) label.sr-only~.fv-plugins-icon-check {
 top:-7px
}
.fv-plugins-bootstrap.form-inline .form-group {
 align-items:flex-start;
 flex-direction:column;
 margin-bottom:auto
}
.fv-plugins-bootstrap .form-control.is-valid,
.fv-plugins-bootstrap .form-control.is-invalid {
 background-image:none
}
.fv-plugins-bootstrap3 .help-block {
 margin-bottom:0
}
.fv-plugins-bootstrap3 .input-group~.form-control-feedback {
 z-index:4
}
.fv-plugins-bootstrap3.form-inline .form-group {
 vertical-align:top
}
.fv-plugins-bootstrap5 .fv-plugins-bootstrap5-row-invalid .fv-plugins-icon {
 color:#dc3545
}
.fv-plugins-bootstrap5 .fv-plugins-bootstrap5-row-valid .fv-plugins-icon {
 color:#198754
}
.fv-plugins-bootstrap5 .fv-plugins-icon {
 align-items:center;
 display:flex;
 justify-content:center;
 height:38px;
 width:38px
}
.fv-plugins-bootstrap5 .input-group~.fv-plugins-icon {
 z-index:3
}
.fv-plugins-bootstrap5 .fv-plugins-icon-input-group {
 right:-38px
}
.fv-plugins-bootstrap5 .form-floating .fv-plugins-icon {
 height:58px
}
.fv-plugins-bootstrap5 .row .fv-plugins-icon {
 right:12px
}
.fv-plugins-bootstrap5 .row .fv-plugins-icon-check {
 top:-7px
}
.fv-plugins-bootstrap5:not(.fv-plugins-bootstrap5-form-inline) label~.fv-plugins-icon {
 top:32px
}
.fv-plugins-bootstrap5:not(.fv-plugins-bootstrap5-form-inline) label~.fv-plugins-icon-check {
 top:25px
}
.fv-plugins-bootstrap5:not(.fv-plugins-bootstrap5-form-inline) label.sr-only~.fv-plugins-icon-check {
 top:-7px
}
.fv-plugins-bootstrap5.fv-plugins-bootstrap5-form-inline .fv-plugins-icon {
 right:calc(var(--bs-gutter-x, 1.5rem)/2)
}
.fv-plugins-bootstrap5 .form-select.fv-plugins-icon-input.is-valid,
.fv-plugins-bootstrap5 .form-select.fv-plugins-icon-input.is-invalid,
.fv-plugins-bootstrap5 .form-control.fv-plugins-icon-input.is-valid,
.fv-plugins-bootstrap5 .form-control.fv-plugins-icon-input.is-invalid {
 background-image:none
}
.fv-plugins-bulma .field.has-addons {
 flex-wrap:wrap
}
.fv-plugins-bulma .field.has-addons::after {
 content:"";
 width:100%
}
.fv-plugins-bulma .field.has-addons .fv-plugins-message-container {
 order:1
}
.fv-plugins-bulma .icon.fv-plugins-icon-check {
 top:-4px
}
.fv-plugins-bulma .fv-has-error .select select,
.fv-plugins-bulma .fv-has-error .input,
.fv-plugins-bulma .fv-has-error .textarea {
 border:1px solid #ff3860
}
.fv-plugins-bulma .fv-has-success .select select,
.fv-plugins-bulma .fv-has-success .input,
.fv-plugins-bulma .fv-has-success .textarea {
 border:1px solid #23d160
}
.fv-plugins-foundation .fv-plugins-icon {
 height:39px;
 line-height:39px;
 right:0;
 width:39px
}
.fv-plugins-foundation .grid-padding-x .fv-plugins-icon {
 right:15px
}
.fv-plugins-foundation .fv-plugins-icon-container .cell {
 position:relative
}
.fv-plugins-foundation [type=checkbox]~.fv-plugins-icon,
.fv-plugins-foundation [type=checkbox]~.fv-plugins-icon {
 top:-7px
}
.fv-plugins-foundation.fv-stacked-form .fv-plugins-message-container {
 width:100%
}
.fv-plugins-foundation.fv-stacked-form label .fv-plugins-icon,
.fv-plugins-foundation.fv-stacked-form fieldset [type=checkbox]~.fv-plugins-icon,
.fv-plugins-foundation.fv-stacked-form fieldset [type=radio]~.fv-plugins-icon {
 top:25px
}
.fv-plugins-foundation .form-error {
 display:block
}
.fv-plugins-foundation .fv-row__success .fv-plugins-icon {
 color:#3adb76
}
.fv-plugins-foundation .fv-row__error label,
.fv-plugins-foundation .fv-row__error fieldset legend,
.fv-plugins-foundation .fv-row__error .fv-plugins-icon {
 color:#cc4b37
}
.fv-plugins-materialize .fv-plugins-icon {
 height:42px;
 line-height:42px;
 width:42px
}
.fv-plugins-materialize .fv-plugins-icon-check {
 top:-10px
}
.fv-plugins-materialize .fv-invalid-row .helper-text,
.fv-plugins-materialize .fv-invalid-row .fv-plugins-icon {
 color:#f44336
}
.fv-plugins-materialize .fv-valid-row .helper-text,
.fv-plugins-materialize .fv-valid-row .fv-plugins-icon {
 color:#4caf50
}
.fv-plugins-milligram .fv-plugins-icon {
 height:38px;
 line-height:38px;
 width:38px
}
.fv-plugins-milligram .column {
 position:relative
}
.fv-plugins-milligram .column .fv-plugins-icon {
 right:10px
}
.fv-plugins-milligram .fv-plugins-icon-check {
 top:-6px
}
.fv-plugins-milligram .fv-plugins-message-container {
 margin-bottom:15px
}
.fv-plugins-milligram.fv-stacked-form .fv-plugins-icon {
 top:30px
}
.fv-plugins-milligram.fv-stacked-form .fv-plugins-icon-check {
 top:24px
}
.fv-plugins-milligram .fv-invalid-row .fv-help-block,
.fv-plugins-milligram .fv-invalid-row .fv-plugins-icon {
 color:red
}
.fv-plugins-milligram .fv-valid-row .fv-help-block,
.fv-plugins-milligram .fv-valid-row .fv-plugins-icon {
 color:green
}
.fv-plugins-mini .fv-plugins-icon {
 height:42px;
 line-height:42px;
 width:42px;
 top:4px
}
.fv-plugins-mini .fv-plugins-icon-check {
 top:-8px
}
.fv-plugins-mini.fv-stacked-form .fv-plugins-icon {
 top:28px
}
.fv-plugins-mini.fv-stacked-form .fv-plugins-icon-check {
 top:20px
}
.fv-plugins-mini .fv-plugins-message-container {
 margin:calc(var(--universal-margin)/2)
}
.fv-plugins-mini .fv-invalid-row .fv-help-block,
.fv-plugins-mini .fv-invalid-row .fv-plugins-icon {
 color:var(--input-invalid-color)
}
.fv-plugins-mini .fv-valid-row .fv-help-block,
.fv-plugins-mini .fv-valid-row .fv-plugins-icon {
 color:#308732
}
.fv-plugins-mui .fv-plugins-icon {
 height:32px;
 line-height:32px;
 width:32px;
 top:15px;
 right:4px
}
.fv-plugins-mui .fv-plugins-icon-check {
 top:-6px;
 right:-10px
}
.fv-plugins-mui .fv-plugins-message-container {
 margin:8px 0
}
.fv-plugins-mui .fv-invalid-row .fv-help-block,
.fv-plugins-mui .fv-invalid-row .fv-plugins-icon {
 color:#f44336
}
.fv-plugins-mui .fv-valid-row .fv-help-block,
.fv-plugins-mui .fv-valid-row .fv-plugins-icon {
 color:#4caf50
}
.fv-plugins-pure .fv-plugins-icon {
 height:36px;
 line-height:36px;
 width:36px
}
.fv-plugins-pure .fv-has-error label,
.fv-plugins-pure .fv-has-error .fv-help-block,
.fv-plugins-pure .fv-has-error .fv-plugins-icon {
 color:#ca3c3c
}
.fv-plugins-pure .fv-has-success label,
.fv-plugins-pure .fv-has-success .fv-help-block,
.fv-plugins-pure .fv-has-success .fv-plugins-icon {
 color:#1cb841
}
.fv-plugins-pure.pure-form-aligned .fv-help-block {
 margin-top:5px;
 margin-left:180px
}
.fv-plugins-pure.pure-form-aligned .fv-plugins-icon-check {
 top:-9px
}
.fv-plugins-pure.pure-form-stacked .pure-control-group {
 margin-bottom:8px
}
.fv-plugins-pure.pure-form-stacked .fv-plugins-icon {
 top:22px
}
.fv-plugins-pure.pure-form-stacked .fv-plugins-icon-check {
 top:13px
}
.fv-plugins-pure.pure-form-stacked .fv-sr-only~.fv-plugins-icon {
 top:-9px
}
.fv-plugins-semantic.ui.form .fields.error label,
.fv-plugins-semantic .error .fv-plugins-icon {
 color:#9f3a38
}
.fv-plugins-semantic .fv-plugins-icon-check {
 right:7px
}
.fv-plugins-shoelace .input-group {
 margin-bottom:0
}
.fv-plugins-shoelace .fv-plugins-icon {
 height:32px;
 line-height:32px;
 width:32px;
 top:28px
}
.fv-plugins-shoelace .row .fv-plugins-icon {
 right:16px;
 top:0
}
.fv-plugins-shoelace .fv-plugins-icon-check {
 top:24px
}
.fv-plugins-shoelace .fv-sr-only~.fv-plugins-icon,
.fv-plugins-shoelace .fv-sr-only~div .fv-plugins-icon {
 top:-4px
}
.fv-plugins-shoelace .input-valid .fv-help-block,
.fv-plugins-shoelace .input-valid .fv-plugins-icon {
 color:#2ecc40
}
.fv-plugins-shoelace .input-invalid .fv-help-block,
.fv-plugins-shoelace .input-invalid .fv-plugins-icon {
 color:#ff4136
}
.fv-plugins-spectre .input-group .fv-plugins-icon {
 z-index:2
}
.fv-plugins-spectre .form-group .fv-plugins-icon-check {
 right:6px;
 top:10px
}
.fv-plugins-spectre:not(.form-horizontal) .form-group .fv-plugins-icon-check {
 right:6px;
 top:45px
}
.fv-plugins-tachyons .fv-plugins-icon {
 height:36px;
 line-height:36px;
 width:36px
}
.fv-plugins-tachyons .fv-plugins-icon-check {
 top:-7px
}
.fv-plugins-tachyons.fv-stacked-form .fv-plugins-icon {
 top:34px
}
.fv-plugins-tachyons.fv-stacked-form .fv-plugins-icon-check {
 top:24px
}
.fv-plugins-turret .fv-plugins-icon {
 height:40px;
 line-height:40px;
 width:40px
}
.fv-plugins-turret.fv-stacked-form .fv-plugins-icon {
 top:29px
}
.fv-plugins-turret.fv-stacked-form .fv-plugins-icon-check {
 top:17px
}
.fv-plugins-turret .fv-invalid-row .form-message,
.fv-plugins-turret .fv-invalid-row .fv-plugins-icon {
 color:#c00
}
.fv-plugins-turret .fv-valid-row .form-message,
.fv-plugins-turret .fv-valid-row .fv-plugins-icon {
 color:#00b300
}
.fv-plugins-uikit .fv-plugins-icon {
 height:40px;
 line-height:40px;
 top:25px;
 width:40px
}
.fv-plugins-uikit.uk-form-horizontal .fv-plugins-icon {
 top:0
}
.fv-plugins-uikit.uk-form-horizontal .fv-plugins-icon-check {
 top:-11px
}
.fv-plugins-uikit.uk-form-stacked .fv-plugins-icon-check {
 top:15px
}
.fv-plugins-uikit.uk-form-stacked .fv-no-label .fv-plugins-icon {
 top:0
}
.fv-plugins-uikit.uk-form-stacked .fv-no-label .fv-plugins-icon-check {
 top:-11px
}
.fv-plugins-wizard--step {
 display:none
}
.fv-plugins-wizard--active {
 display:block
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
                <div class="mb-10 fv-row fl w-40">                   
                    <label class="required form-label">Category Name</label>          
                    <input type="text" name="title_en" id="title_en" class="form-control mb-2
                    
                    input-reset ba b--black-20 pa2 mb2 db w-100"
                    " required
                    data-fv-not-empty___message="The assssssssge is required"
                    />                 
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
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    }),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                        
              
                }
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
