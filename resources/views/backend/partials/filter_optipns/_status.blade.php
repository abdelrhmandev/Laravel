<div class="mb-10">
  <label class="form-label fs-6 fw-semibold">{{ __('site.status')}}:</label>
  <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-recipes-table-filter="status" id="status" name="status" data-hide-search="false">       
    <option value="all">{{ __('site.all')}}</option>
    @foreach ($status as $value)      
    <option value="{{ $value }}">{{ __('site.'.$value)}}</option> 
    @endforeach
  </select>
</div>