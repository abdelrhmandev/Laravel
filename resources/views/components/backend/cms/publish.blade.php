<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2> Status</h2>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="rounded-circle bg-primary w-15px h-15px" id="status"></div>
        </div>
        <!--begin::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Select2-->
        <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true" data-kt-filter="status" data-placeholder="Select an option" id="status_select">
            <option></option>
            <option value="published" selected="selected">Published</option>
            <option value="unpublished">UnPublished</option>
 
        </select>
        <!--end::Select2-->
        <!--begin::Description-->
        {{-- <div class="text-muted fs-7">Set the product status.</div> --}}
        @error('status')
        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
        @enderror
        <!--end::Description-->
        <!--begin::Datepicker-->
        <div class="d-none mt-10">
            <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>
            <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date & time" />
        </div>
        <!--end::Datepicker-->
    </div>
    <!--end::Card body-->
</div>