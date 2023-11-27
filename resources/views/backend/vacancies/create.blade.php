@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted"><a href="sdas" class="text-muted"> {{ __($trans.".plural") }}</a></li>
    <li class="breadcrumb-item text-dark">{{ __($trans.".edit") }}</li>
@stop

@section('style')

@if (app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
    type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
@endif

<link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet"
type="text/css" />
    


 
@stop
@section('content')

    <div class="container-xxl" id="kt_content_container">
        <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"            
            data-form-submit-error-message="{{ __('site.form_submit_error')}}"
            data-form-agree-label="{{ __('site.agree') }}" 
            enctype="multipart/form-data">   
            
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <!--begin::General options-->
                
                <div class="card card-flush py-0">
                    <div class="card-body pt-5">                        
                        <div class="d-flex flex-column gap-5">
                            <div class="fv-row fl">
                                <label class="required form-label"
                                    for="title-">{{ __('site.title') }}</label>
                                <input placeholder="{{ __('site.title') }}" type="text" id="title_"
                                    name="title" class="form-control mb-2" required
                                    data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'title' . '&nbsp;']) }}"
                                    />
                            </div>
                                <div class="d-flex flex-column">
                                    <label class="form-label"
                                        for="description-">{{ __('site.description') }}</label>
                                    <textarea placeholder="{{ __('site.description') }}" class="form-control form-control-solid" rows="4"
                                        id="description"
                                        name="description" placeholder="{{ __('site.description') }}"></textarea>
                                </div>
                        </div>
                    </div>
                </div>
                <x-backend.btns.button />
            </div>            
            <div class="d-flex flex-column flex-row-fluid gap-0 w-lg-400px gap-lg-5">                                 
                <x-backend.cms.status :published="1" :action="'create'"/>  
            </div>
        </form>
    </div>
@stop
@section('scripts')
<script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/deleteConfirmSwal.js') }}"></script>
<script>
KTUtil.onDOMContentLoaded(function() {
   handleFormSubmitFunc('Add{{ $trans }}');
});
</script>
@stop