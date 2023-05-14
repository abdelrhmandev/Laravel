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
 
 

    <form id="kt_ecommerce_add_category_form" method="post" class="form-horizontal" action="" enctype="multipart/form-data">										


    @csrf
   <div class="kt-portlet__body">	

        <ul class="nav nav-tabs" role="tablist">
     											 
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
 
        <li class="nav-item">
            <a data-toggle="tab" hreflang="{{$localeCode}}" href="#{{ substr($properties['regional'],0,2) }}" 
            class="nav-link {{{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'active':''}}}">
             
                <i class="fa"></i>{{ $properties['native'] }}</a></li>
        
        @endforeach
       </ul>
       <div class="tab-content">



       										 
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode2 => $properties2)
        <?php $lang = substr($properties2['regional'],0,2);?>
        <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties2['name'] ? 'show active':''}}" id="{{ substr($properties2['regional'],0,2) }}" role="tabpanel">


            
            <div class="form-group row">
                <div class="fl w-100">
                    <div class="fl w-25 pa2">UN{{ $lang }}</div>
                    <div class="fl w-40">
                        <input
                            type="text"
                            class="input-reset ba b--black-20 pa2 mb2 db w-100"
                            name="username_{{ $lang }}"
                            id="username_{{ $lang }}"
                            required
                            data-fv-not-empty___message="The username is required"
                            pattern="^[a-zA-Z0-9]+$"
                            data-fv-regexp___message="The username can only consist of alphabetical, number"
                        />
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-lg-12 control-label" for="title_{{ $lang }}">  [{{ $lang }}] <span class="text-danger">*</span></label>
                <div class="col-lg-12">
                
                 

                    <input type="text"
                    id="title_{{ $lang }}" name="title_{{ $lang }}"
                    type="text"
                    class="input-reset ba b--black-20 pa2 mb2 db w-100"
                    required
                    data-fv-not-empty___message="title {{ $lang }} is required"
                    />

                    
                </div>
                </div>
                

                
        </div>
 
    @endforeach
        <br/>
     <br/>
     <div class="kt-form__actions">
        <button type="submit" class="btn btn-brand" id="kt_ecommerce_add_category_submit">SEND</button>
        <button type="reset" class="btn btn-secondary">{{ trans('crud.cancel') }}</button>
        </div>
        </div>

       </div>        
    
    </div>

 </form>

    
  </div>  
@stop



    

   


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js" integrity="sha256-PbFF1Mdg86urwOYXWNJPP4z5Ge9KLp6KXX1NURQY8Ho=" crossorigin="anonymous"></script>
<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
 
 
<script type="text/javascript">



    //  End Ajax country and city 
 
var validator;

var form = document.getElementById('kt_ecommerce_add_category_form');
const submitButton = document.getElementById('kt_ecommerce_add_category_submit');



////
document.addEventListener('DOMContentLoaded', function (e) {
                FormValidation.formValidation(document.getElementById('kt_ecommerce_add_category_form'), {
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
                })    .on('status.field.bv', function(e, data) {
        var $form     = $(e.target),
            validator = data.bv,
            $tabPane  = data.element.parents('.tab-pane'),
            tabId     = $tabPane.attr('id');
        
        if (tabId) {
            var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');

            // Add custom class to tab containing the field
            if (data.status == validator.STATUS_INVALID) {
                $icon.removeClass('fa-check').addClass('fa-times');
            } else if (data.status == validator.STATUS_VALID) {
                var isValidTab = validator.isValidContainer($tabPane);
                $icon.removeClass('fa-check fa-times')
                     .addClass(isValidTab ? 'fa-check' : 'fa-times');
            }
        }
    });
;
            });
////

    $(document).ready(function() {
$('#kt_ecommerce_add_category_formX').bootstrapValidator({
       
 
    framework: 'bootstrap',
            excluded: [':disabled'],

                
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
                }

    })
    .on('status.field.bv', function(e, data) {
        var $form     = $(e.target),
            validator = data.bv,
            $tabPane  = data.element.parents('.tab-pane'),
            tabId     = $tabPane.attr('id');
        
        if (tabId) {
            var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');

            // Add custom class to tab containing the field
            if (data.status == validator.STATUS_INVALID) {
                $icon.removeClass('fa-check').addClass('fa-times');
            } else if (data.status == validator.STATUS_VALID) {
                var isValidTab = validator.isValidContainer($tabPane);
                $icon.removeClass('fa-check fa-times')
                     .addClass(isValidTab ? 'fa-check' : 'fa-times');
            }
        }
    });
});
 
</script>
<!--end::Custom Javascript-->
@stop
