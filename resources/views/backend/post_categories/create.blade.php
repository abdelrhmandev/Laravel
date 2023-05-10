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


    <style>
        .my-field-error .fv-plugins-message-container,
        .my-field-error .fv-plugins-icon {
            font-size: 0.925rem;
            color: #f1416c;



        }

        .my-field-success .fv-plugins-message-container,
        .my-field-success .fv-plugins-icon {
            font-size: 0.925rem;
            font-weight: 400;
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




  
<form id="kt_ecommerce_add_category_form" method="POST">

     <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Age</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Name</button>
    </li>
 
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="cf mb2">
            <div class="fl w-100">
                <div class="fl w-25 pa2">Age</div>
                <div class="fl w-20">
                    <input
                        type="text"
                        class="input-reset ba b--black-20 pa2 mb2 db w-100"
                        name="age"
                        min="10"
                        data-fv-greater-than___inclusive="true"
                        data-fv-greater-than___message="The input must be greater than or equal to 10"
                        max="100"
                        data-fv-less-than___inclusive="false"
                        data-fv-less-than___message="The input must be less than 100"
                        required
                        data-fv-not-empty___message="The age is required"
                    />
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="cf mb2">
            <div class="fl w-100">
                <div class="fl w-25 pa2">name</div>
                <div class="fl w-20">
                    <input
                        type="text"
                        class="input-reset ba b--black-20 pa2 mb2 db w-100"
                        name="name"
                        required
                        data-fv-not-empty___message="The name is required"
                    />
                </div>
            </div>
        </div>


    </div>
 
  </div>

   

    <div class="cf mb2">
        <div class="fl w-100">
            <div class="fl w-25 pa2"></div>
            <div class="fl w-50">
                <button type="submit" id="kt_ecommerce_add_category_submit" class="ba b--black-20 bg-blue white ph3 pv2 br2">Submit</button>
            </div>
        </div>
    </div>
</form>

    </div>
@stop








@section('scripts')
  <script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
    <script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/backend/abdo/apply2.js') }}"></script> --}}

    <script>
 

 const form = document.getElementById('kt_ecommerce_add_category_form');
        const submitButton = document.getElementById('kt_ecommerce_add_category_submit');


    validator = FormValidation.formValidation(
            form,
            {
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
                    },
                });
                      // Handle submit button
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
           
                    } else {
                        var $tabPane = status.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id');
                alert(tabId);
                    }
                });
            }
        })
  
            

                

              
           
    </script>

    <!--end::Custom Javascript-->
@stop
