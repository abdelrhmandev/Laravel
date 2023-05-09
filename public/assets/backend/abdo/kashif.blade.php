@extends('backend.layouts.app')
@section('content')
@section('title',trans($array['single'].'.add'))

<div class="row">
					<div class="col-lg-12">								
									@include('backend.partials.messages')
									<!--begin::Portlet-->
									<div class="kt-portlet">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">
									{{ trans($array['single'].'.add') }}
								</h3>
							</div>
						</div>

										<!--begin::Form-->

                     <form id="SubmitForm" method="post" class="form-horizontal" action="{{ route($array['resources'].'.store') }}" enctype="multipart/form-data">										
						@csrf
						<div class="kt-portlet__body">						
						@include('backend.includes.languages_tabs')												
						@include('backend.includes.modules_blocks.countries')
                        @include('backend.includes.modules_blocks.areas')
                        

                        <div class="tab-content">
						<?php $ii = 1; ?>											 
							@foreach(LaravelLocalization::getSupportedLocales() as $localeCode2 => $properties2)
							<?php $lang = substr($properties2['regional'],0,2);?>
							<div class="tab-pane {{{ LaravelLocalization::getCurrentLocaleName() == $properties2['name'] ? 'active':''}}}" id="{{ $properties2['name'] }}">

                                <div class="form-group row">
                                    <label class="col-lg-12 control-label" for="title_{{ $lang }}">{{ trans($array['single'].'.title') }} [{{ trans('admin.'.$lang) }}] <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                    @php $title_value = old('title_'.$lang); @endphp
                                    @php if(isset($object->id)) { $value = 'title_'.$lang; $title_value = $object->$value; } @endphp
                                    <input class="form-control" type="text" name="title_{{ $lang }}" value="{{ $title_value }}" id="title_{{ $lang }}">
                                    @error('title_'.$lang)<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    </div>

                                    
							</div>
						<?php $ii++;	?>
						@endforeach
						</div>
 						
						
						</div>				
						@include('backend.includes.modules_blocks.submit_button')										
						</form>

										<!--end::Form-->
									</div>
									<!--end::Portlet-->
								</div>
								
</div>

						 
@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js" integrity="sha256-PbFF1Mdg86urwOYXWNJPP4z5Ge9KLp6KXX1NURQY8Ho=" crossorigin="anonymous"></script>
<script type="text/javascript">



        //  End Ajax country and city 

$(document).ready(function() {
$('#SubmitForm')
        .bootstrapValidator({
            excluded: [':disabled'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                title_en: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('validation_custom.required')}}'
                        }
                    }
                },
				title_ar: {
                    validators: {
                        notEmpty: {
                            message: '{{ trans('validation_custom.required')}}'
                        }
                    }
                }
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

@stop
						 
@endsection