@extends('backend.base.base')
@section('title', __($trans . '.plural').' - '.__($trans .'.add'))
@section('breadcrumbs')
<h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
<span class="h-20px border-gray-200 border-start mx-3"></span>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
    <li class="breadcrumb-item text-muted"><a href="{{ route(config('custom.route_prefix').'.dashboard') }}" class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
    <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
    <li class="breadcrumb-item text-dark">{{ __($trans . '.add') }}</li>
</ul>
@stop
@section('style') 
<link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div id="kt_content_container" class="container-xxl">
        <form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}" class="form d-flex flex-column flex-lg-row"            
            data-form-submit-error-message="{{ __('site.form_submit_error')}}"
            data-form-agree-label="{{ __('site.agree') }}" 
            enctype="multipart/form-data">            
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">                    
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-5 mt-2">                                            
                          <x-backend.langs.ulTabs/>
                            <x-backend.langs.LangInputs :showDescription="0" :richTextArea="0" :showSlug="1" />
                            <x-backend.cms.countries :countries="$countries" :action="'create'"/>
                            <x-backend.cms.cities/>
                            <x-backend.cms.areas/>
                    </div>                        
                    </div>
                </div>
                <x-backend.btns.button />
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
<script>

    $('select[name="country_id"]').on('change', function() {
      var country_id = $(this).val();      
      if(country_id > 0){
	  var url_x = '{{ route(config('custom.route_prefix').".areas.getAjaxCities",":x")}}';
	$.ajax({
		url: url_x.replace(":x",country_id),
		method: 'GET',
		success: function(data) {
			$('select[name="city_id"]').empty();
			$.each(data, function(key, value){
				$('select[name="city_id"]').append('<option value="'+ key +'">' + value + '</option>');
			});						
		}
	});
    }else{
        $('select[name="city_id"]').append('<option value=""></option>');
    }
	});	
    
    ///////////////////////////////////////////////////////////////////////

    $('select[name="city_id"]').on('change', function() {
      var city_id = $(this).val();      
      if(city_id > 0){
	  var url_x = '{{ route(config('custom.route_prefix').".districts.getAjaxAreas",":x")}}';
	$.ajax({
		url: url_x.replace(":x",city_id),
		method: 'GET',
		success: function(data) {
			$('select[name="area_id"]').empty();
			$.each(data, function(key, value){
				$('select[name="area_id"]').append('<option value="'+ key +'">' + value + '</option>');
			});						
		}
	});
    }else{
        $('select[name="area_id"]').append('<option value=""></option>');
    }
	});	




 KTUtil.onDOMContentLoaded(function() {
   handleFormSubmitFunc('Add{{ $trans }}');
});
 </script>
@stop