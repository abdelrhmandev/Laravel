<div class="mb-10">
  <label class="form-label fs-6 fw-semibold">{{ __('site.category')}}: {{ $categories->count() }}  </label>
  <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-table-filter="category" id="category" name="category" data-hide-search="false">       
    <option value="all">{{ __('site.all')}}</option>
    @foreach ($categories->latest()->get() as $value)      
    sssssssss
    @endforeach
  </select>
</div> 