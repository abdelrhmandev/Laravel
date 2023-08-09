<div class="w-150px me-3">
  <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="status" name="status" data-placeholder="Status" data-kt-filter="status">
    <option></option>
    <option value="all">{{ __('site.all') }}</option>
    @foreach ($status as $key=>$value)
      <option value="{{ $value}}">{{ __('site.'.$key) }}</option>
    @endforeach
  </select>
</div>