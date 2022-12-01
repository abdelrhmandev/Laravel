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
    <div class="px-7 py-5" data-kt-recipes-table-filter="form">
      <!--begin::Input group-->
     
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="mb-10">
        <label class="form-label fs-6 fw-semibold">{{ __('site.status')}}:</label>
        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-recipes-table-filter="status" name="status" id="status" data-hide-search="true">       
          <option value="all">{{ __('site.all')}}</option>
          <option value="published">{{ __('site.published')}}</option>
          <option value="unpublished">{{ __('site.unpublished')}}</option> 
          <option value="scheduled">{{ __('site.scheduled')}}</option> 
        </select>
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
   
      <!--end::Input group-->
      <!--begin::Input group-->
 
      <!--end::Input group-->
      <!--begin::Actions-->
      <div class="d-flex justify-content-end">
        <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-recipes-table-filter="reset">Reset</button>
        <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-recipes-table-filter="filter">Apply</button>
      </div>
      <!--end::Actions-->
    </div>
    <!--end::Content-->
  </div>
