<div class="w-200px me-3">
  <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="status" name="status" data-placeholder="{{ __('site.sort_by')}} {{ __('site.status')}}" data-kt-filter="status">
    <option></option>
    <option value="all">{{ __('site.all') }}  ({{ $allrecords }})</option>
    <option value="1">{{ __('site.published') }} ({{ $publishedCounter}})</option>
    <option value="0">{{ __('site.unpublished') }} ({{ $unpublishedCounter}})</option>
  </select>
</div>  