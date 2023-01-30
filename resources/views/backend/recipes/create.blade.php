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
    {{-- <form id="defaultForm" method="post" class="form-horizontal" action="target.php"
    data-bv-message="This value is not valid"
    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
  <div class="form-group">
      <label class="col-lg-3 control-label">Full name</label>
      <div class="col-lg-4">
          <input type="text" class="form-control" name="firstName" placeholder="First name" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" />
      </div>
 
  </div>
  <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
          <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
  </div>
</form> --}}

 

<form action="m-0" class="form mb-15" method="post" id="kt_careers_form">

    
   
        <div class="fl w-100">
            <label class="required fs-5 fw-semibold mb-2">First Name</label>
            


                <input
                    type="text"
                    class="form-control form-control-solid  input-reset"
                    name="name"
                    data-fv-not-empty="true"
                    data-fv-not-empty___message="The Csutom is required"
                />
            
       
   
</div>


  



<button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
    <!--begin::Indicator label-->
    <span class="indicator-label">Apply Now</span>
    <!--end::Indicator label-->
    <!--begin::Indicator progress-->
    <span class="indicator-progress">Please wait...
    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    <!--end::Indicator progress-->
</button>
</form>

    
  </div>  
@stop



    

   


@section('scripts')
<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{ asset('assets/backend/abdo/apply.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('kt_careers_formXX');
    FormValidation.formValidation(form, {
        plugins: {
            declarative: new FormValidation.plugins.Declarative(),
            // Other plugins
            trigger: new FormValidation.plugins.Trigger(),
            tachyons: new FormValidation.plugins.Tachyons({
						rowInvalidClass: 'my-field-error',
						rowValidClass: 'my-field-success',
					}),
            submitButton: new FormValidation.plugins.SubmitButton(),
            icon: new FormValidation.plugins.Icon({
                valid: 'fa fa-check',
                invalid: 'invalid-feedback',
                validating: 'fa fa-refresh',
            }),
        },
    });
});
</script>
 
<!--end::Custom Javascript-->
@stop
