<div class="d-flex justify-content">
    <!--begin::Button-->
   
    <!--end::Button-->
    <!--begin::Button-->
    <button type="submit" id="btn-submit" class="btn btn-primary me-5">
        <span class="indicator-label">{{ __('site.save') }}</span>
        <span class="indicator-progress">{{ __('site.please_wait')}}...
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>


    <button type="reset" id="cancel" class="btn btn-secondary me-5">{{ __('site.cancel') }}</button>
    @isset($destroyRoute)
    <a href="javascript:JSconfimDelete('{{ $destroyRoute }}','sssss')" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8"><i class="la la-trash-o"></i>Delete</a>
    @endisset
    <!--end::Button-->
</div>