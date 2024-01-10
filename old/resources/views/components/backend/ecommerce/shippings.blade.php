<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Shipping</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <div class="fv-row">
            <!--begin::Input-->
            <div class="form-check form-check-custom form-check-solid mb-2">
                <input class="form-check-input" type="checkbox" id="kt_ecommerce_add_product_shipping_checkbox" value="1" />
                <label class="form-check-label">This is a physical product</label>
            </div>
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Set if the product is a physical or digital item. Physical products may require shipping.</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
        <!--begin::Shipping form-->
        <div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="form-label">Weight</label>
                <!--end::Label-->
                <!--begin::Editor-->
                <input type="text" name="weight" class="form-control mb-2" placeholder="Product weight" value="" />
                <!--end::Editor-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set a product weight in kilograms (kg).</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row">
                <!--begin::Label-->
                <label class="form-label">Dimension</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                    <input type="number" name="width" class="form-control mb-2" placeholder="Width (w)" value="" />
                    <input type="number" name="height" class="form-control mb-2" placeholder="Height (h)" value="" />
                    <input type="number" name="length" class="form-control mb-2" placeholder="Lengtn (l)" value="" />
                </div>
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Enter the product dimensions in centimeters (cm).</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Shipping form-->
    </div>
    <!--end::Card header-->
</div>