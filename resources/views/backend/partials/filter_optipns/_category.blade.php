<div class="mb-10">
  <label class="form-label fs-6 fw-semibold">{{ __('admin.category')}}: {{ $categories->count() }}  </label>
  <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-table-filter="category" id="category" name="category" data-hide-search="false">       
    <option value="all">{{ __('admin.all')}}</option>
    @foreach ($categories->latest()->get() as $value)      
    <option value="{{ $value->id }}">{{ $value->translate->title }} {{ $value->recipes->count() }}</option> 
    @endforeach
  </select>
</div> 