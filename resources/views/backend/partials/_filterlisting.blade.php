<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
    <!--begin::Header-->
    <div class="px-7 py-5">
      <div class="fs-4 text-dark fw-bold">{{ __('site.filter_options') }}</div>
    </div>
    <!--end::Header-->
    <!--begin::Separator-->
    <div class="separator border-gray-200"></div>
    <!--end::Separator-->
    <!--begin::Content-->
    <div class="px-7 py-5">
      <!--begin::Input group-->
      <div class="mb-10">
        <!--begin::Label-->
        <label class="form-label fs-5 fw-semibold mb-3">Month:</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
          <option></option>
          <option value="aug">August</option>
          <option value="sep">September</option>
          <option value="oct">October</option>
          <option value="nov">November</option>
          <option value="dec">December</option>
        </select>
        <!--end::Input-->
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-10">
        <!--begin::Label-->
        <label class="form-label fs-5 fw-semibold mb-3">{{ __('site.status') }}:</label>
        <!--end::Label-->
        <!--begin::Options-->
        <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="status">
          <!--begin::Option-->
          <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
            <input class="form-check-input" type="radio" name="status" value="all" checked="checked" />
            <span class="form-check-label text-gray-600">{{ __('site.all') }}</span>
          </label>
          <!--end::Option-->
          <!--begin::Option-->
          <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
            <input class="form-check-input" type="radio" name="status" value="published" />
            <span class="form-check-label text-gray-600">published</span>
          </label>
          <!--end::Option-->
          <!--begin::Option-->
          <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
            <input class="form-check-input" type="radio" name="status" value="unpublished" />
            <span class="form-check-label text-gray-600">Unpublished</span>
          </label>  
          <!--end::Option-->
          <!--begin::Option-->  
          {{-- <label class="form-check form-check-sm form-check-custom form-check-solid">
            <input class="form-check-input" type="radio" name="status" value="scheduled" />
            <span class="form-check-label text-gray-600">scheduled</span>
          </label> --}}

          <!--end::Option-->
        </div>
        <!--end::Options-->
      </div>
      <!--end::Input group-->
      <!--begin::Actions-->
      <div class="d-flex justify-content-end">
        <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">{{ __('site.reset') }}</button>
        <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">{{ __('site.apply') }}</button>
      </div>
      <!--end::Actions-->
    </div>
    <!--end::Content-->
  </div>
