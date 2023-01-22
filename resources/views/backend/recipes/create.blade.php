@extends('backend.base.base')
@section('style')

@if(app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endif

 
 




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

<form action="" class="" id="kt_careers_form">
    <!--begin::Input group-->
    <div class="row mb-5">
        <!--begin::Col-->
 
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 fv-row">
            <!--end::Label-->
            <label class="required fs-5 fw-semibold mb-2">first Name</label>
            <!--end::Label-->
            <!--end::Input-->
            <input type="text" style="border: solid 10px;" class="" 
            placeholder="" name="first_name" required data-fv-not-empty___message="The first_name HTML is required" />
            <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
 
    <!--end::Input group-->
    <!--begin::Input group-->
 
    <!--end::Input group-->
    <!--begin::Separator-->
    <div class="separator mb-8"></div>
    <!--end::Separator-->
    <!--begin::Submit-->
    <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
        <!--begin::Indicator label-->
        <span class="indicator-label">Apply Now</span>
        <!--end::Indicator label-->
        <!--begin::Indicator progress-->
        <span class="indicator-progress">Please wait...
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        <!--end::Indicator progress-->
    </button>
    <!--end::Submit-->
</form>
 

    
  </div>  
@stop



    

   


@section('scripts')
<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
 
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{ asset('assets/backend/abdo/apply.js')}}"></script>

 
 
<!--end::Custom Javascript-->
@stop
