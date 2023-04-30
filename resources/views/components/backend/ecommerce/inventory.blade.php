<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Inventory</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <div class="mb-10 fv-row">
            <!--begin::Label-->
            <label class="required form-label">SKU</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="sku" class="form-control mb-2" placeholder="SKU Number" value="" />
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Enter the product SKU.</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-10 fv-row">
            <!--begin::Label-->
            <label class="required form-label">Barcode</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="sku" class="form-control mb-2" placeholder="Barcode Number" value="" />
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Enter the product barcode number.</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-10 fv-row">
            <!--begin::Label-->
            <label class="required form-label">Quantity</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="d-flex gap-3">
                <input type="number" name="shelf" class="form-control mb-2" placeholder="On shelf" value="" />
                <input type="number" name="warehouse" class="form-control mb-2" placeholder="In warehouse" />
            </div>
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Enter the product quantity.</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row">
            <!--begin::Label-->
            <label class="form-label">Allow Backorders</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="form-check form-check-custom form-check-solid mb-2">
                <input class="form-check-input" type="checkbox" value="" />
                <label class="form-check-label">Yes</label>
            </div>
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Allow customers to purchase products that are out of stock.</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Card header-->
</div>