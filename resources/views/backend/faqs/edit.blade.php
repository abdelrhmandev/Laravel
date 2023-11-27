@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted"><a href="{{ $redirect_after_destroy}}" class="text-muted"> {{ __($trans.".plural") }}</a></li>
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
        <form id="Edit{{ $trans }}" data-route-url="{{ $updateRoute }}" class="form d-flex flex-column flex-lg-row"            
            data-form-submit-error-message="{{ __('site.form_submit_error')}}"
            data-form-agree-label="{{ __('site.agree') }}" 
            enctype="multipart/form-data">            
            @method('PUT') 
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">               
                <div class="card card-flush py-0">                    
                    <div class="card-body pt-0">
                          <div class="d-flex flex-column gap-5">
                            <div class="separator"></div>                        
                                <x-backend.langs.ulTabs/>                               
                                <x-backend.langs.FAQLangInputs :showDescription="1" :richTextArea="0" :showSlug="1" :row="$row" :columnvalues="$TrsanslatedColumnValues" />                    
                            </div>                        
                    </div>
                </div>
                <x-backend.btns.button :destroyRoute="$destroyRoute" :redirectRoute="$redirect_after_destroy" :row="$row" :trans="$trans"/>
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
   handleFormSubmitFunc('Edit{{ $trans }}');
});
</script>
@stop