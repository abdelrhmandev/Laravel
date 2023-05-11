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

 
<form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" method="post" enctype="multipart/form-data" action="{{ route('admin.post-category.store')}}">
   @csrf
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 mb-7 me-lg-10">

       <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <li class="nav-item">
             <a class="nav-link text-active-primary pb-5 {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'active':''}}" data-bs-toggle="tab" href="#{{ substr($properties['regional'],0,2) }}">
                 					
                <i class="fa"></i> {{ $properties['native'] }}
             </a>
          </li>
          @endforeach
       </ul>
       <div class="tab-content">



       @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'show active':''}}" id="{{ substr($properties['regional'],0,2) }}" role="tabpanel">
             <div class="d-flex flex-column gap-7 gap-lg-10">
                <div class="card card-flush py-4">
                   <div class="card-body pt-5">

                    <div class="mb-10 fl w-100">
                        <!--begin::Label-->
                        <label class="required form-label">ss [{{ substr($properties['regional'],0,2) }}] </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    
                        <input type="text"
                            id="title_{{ substr($properties['regional'],0,2) }}" name="title_{{ substr($properties['regional'],0,2) }}"
                            required
                            data-fv-not-empty___message="The title {{ substr($properties['regional'],0,2)}} is required"
                            />
                    
                        </div>

                        
                    </div>
                </div>
             </div>
          </div>
          @endforeach
       </div>        


       <div class="cf mb2">
        <div class="fl w-100">
            <div class="fl w-25 pa2">Email address</div>
            <div class="fl w-40">
                <input
                    class="input-reset ba b--black-20 pa2 mb2 db w-100"
                    name="email"
                    required
                    data-fv-not-empty___message="The email is required"
                />
            </div>
        </div>
    </div>


       <div class="d-flex justify-content">
        <button type="submit" class="btn btn-primary" id="kt_ecommerce_add_category_submit">
            <!--begin::Indicator label-->
            <span class="indicator-label">Apply NXXXow</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
    </div>
    
    
    </div>
 
 </form>

    
  </div>  
@stop



    

   


@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js" integrity="sha256-PbFF1Mdg86urwOYXWNJPP4z5Ge9KLp6KXX1NURQY8Ho=" crossorigin="anonymous"></script> --}}

<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
<script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <script>

 

// Get elements
 
let validator;

// Get elements
const form = document.getElementById('kt_ecommerce_add_category_form');
const submitButton = document.getElementById('kt_ecommerce_add_category_submit');


validator = FormValidation.formValidation(
            form,
            {
                    
                    plugins: {
                        declarative: new FormValidation.plugins.Declarative(),
				// Other plugins
				trigger: new FormValidation.plugins.Trigger(),
				tachyons: new FormValidation.plugins.Tachyons({
			 
				}),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                    },
                }) 
                    // Handle submit button
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                 
                });
            }
        })
        </script>
 

 
 
<!--end::Custom Javascript-->
@stop
