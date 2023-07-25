<div class="mb-10">
  <label class="form-label fs-6 fw-semibold">{{ __('admin.status')}}:</label>
  <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-table-filter="status" id="status" name="status" data-hide-search="false">       
    <option value="all">{{ __('admin.all')}}</option>
    {{-- @foreach ($status as $key=>$value)       --}}
    {{-- <option value="{{ $key }}">{{ $key}} => {{ $value }}</option>  --}}
    <option value="1">Published </option> 
    <option value="0">UnPublished</option>
    {{-- @endforeach --}}
  </select>
</div>