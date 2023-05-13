@extends('backend.base.base')
@section('content')
@section('title','')

<div class="row">
					<div class="col-lg-12">								
									 
									<!--begin::Portlet-->
									<div class="kt-portlet">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">
									 
								</h3>
							</div>
						</div>

										<!--begin::Form-->

                     <form id="SubmitForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data">										
						@csrf
						<div class="kt-portlet__body">						
					
                            
                            <ul class="nav nav-tabs" role="tablist">
                                 										 
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                           
                                <li class="nav-item">
                                <a data-toggle="tab" hreflang="{{$localeCode}}" href="#{{ $properties['name'] }}" 
                                class="nav-link {{{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'active':''}}}">
                                 
                                    <i class="fa"></i>{{ $properties['native'] }}</a></li>
                               
                                @endforeach
                                </ul>

                                
                        

                        <div class="tab-content">
						 										 
							@foreach(LaravelLocalization::getSupportedLocales() as $localeCode2 => $properties2)
							<?php $lang = substr($properties2['regional'],0,2);?>
							<div class="tab-pane {{{ LaravelLocalization::getCurrentLocaleName() == $properties2['name'] ? 'active':''}}}" id="{{ $properties2['name'] }}">

                                <div class="form-group row">
                                    <label class="col-lg-12 control-label" for="title_{{ $lang }}">  [{{ $lang }}] <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                    
                                     
                                    <input class="form-control" type="text" name="title_{{ $lang }}" 
                                    id="title_{{ $lang }}">
                                    
                                    </div>
                                    </div>

                                    
							</div>
						 
						@endforeach
						</div>
 						
						
						</div>				
					
                        
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                            <button type="submit" class="btn btn-brand">SEND</button>
                            <button type="reset" class="btn btn-secondary">{{ trans('crud.cancel') }}</button>
                            </div>
                            </div>


						</form>

										<!--end::Form-->
									</div>
									<!--end::Portlet-->
								</div>
								
</div>

						 
@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js" integrity="sha256-PbFF1Mdg86urwOYXWNJPP4z5Ge9KLp6KXX1NURQY8Ho=" crossorigin="anonymous"></script>
<script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script type="text/javascript">



        //  End Ajax country and city 

        var handleForm = function() {
        validator = FormValidation.formValidation(form,{
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
			}).on('status.field.bv', function(e, data) {
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

@stop
						 
@endsection