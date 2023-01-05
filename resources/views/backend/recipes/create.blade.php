@extends('backend.base.base')
@section('style')

@if(app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endif

<link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css" />
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css" integrity="sha512-B9GRVQaYJ7aMZO3WC2UvS9xds1D+gWQoNiXiZYRlqIVszL073pHXi0pxWxVycBk0fnacKIE3UHuWfSeETDCe7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link href="{{ asset('assets/backend/abdo/abdovalidation.css')}}" rel="stylesheet" type="text/css" /> --}}


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


 

    <form action="{{ route('admin.recipes.create')}}" class="form mb-15" method="get" id="kt_careers_form"
    data-fvp-trigger="true"
    data-fvp-trigger___class="FormValidation.plugins.Trigger"
    data-fvp-submit-button="true"
    data-fvp-submit-button___class="FormValidation.plugins.SubmitButton"
    data-fvp-icon="true"
    data-fvp-icon___class="FormValidation.plugins.Icon"
    data-fvp-icon___valid="fa fa-check"
    data-fvp-icon___invalid="fa fa-times"
    data-fvp-icon___validating="fa fa-refresh"
    >
 
    <div class="row mb-5">
        <div class="col-md-6 fv-row">         
            <label class="required fs-5 fw-semibold mb-2">Srart Date</label> 
            <input type="text" class="form-control form-control-solid" style="border: solid 10px;" placeholder="" data-fv-not-empty___message="HTML required" name="start_date"/>            
        </div>        
    </div>
 
    <div class="separator mb-8"></div>
    <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
        <span class="indicator-label">Apply Now</span>
        <span class="indicator-progress">Please wait...
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
</form>
  </div>  
@stop



    

   


@section('scripts')
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
{{-- <script src="{{ asset('assets/backend/abdo/apply.js')}}"></script> --}}


<script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{ asset('assets/backend/js/scripts.bundle.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
 
 
<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>

 
<script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function (e) {
                FormValidation.formValidation(document.getElementById('kt_careers_form'), {
                    plugins: {
                        declarative: new FormValidation.plugins.Declarative({
                            html5Input: true,
                        }),
                        
                    
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                    },
                });
            });
</script>   
<!--end::Custom Javascript-->
@stop
