<form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo7/dist/apps/ecommerce/sales/listing.html">

<div class="card card-flush py-4">

    <div class="card-header">
        <div class="card-title">
            <h2>Order Details</h2>
        </div>
    </div>

    <div class="card-body pt-0">
        <div class="d-flex flex-column gap-10">

            <div class="fv-row">

                <label class="form-label">Order ID</label>


                <div class="fw-bold fs-3">#14223</div>

            </div>

            <div class="fv-row">

                <label class="required form-label">Payment Method</label>

                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                    data-placeholder="Select an option" name="payment_method" id="kt_ecommerce_edit_order_payment">
                    <option></option>
                    <option value="cod">Cash on Delivery</option>
                    <option value="visa">Credit Card (Visa)</option>
                    <option value="mastercard">Credit Card (Mastercard)</option>
                    <option value="paypal">Paypal</option>
                </select>


                <div class="text-muted fs-7">Set the date of the order to process.</div>

            </div>

            <div class="fv-row">

                <label class="required form-label">Shipping Method</label>

                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                    data-placeholder="Select an option" name="shipping_method" id="kt_ecommerce_edit_order_shipping">
                    <option></option>
                    <option value="none">N/A - Virtual Product</option>
                    <option value="standard">Standard Rate</option>
                    <option value="express">Express Rate</option>
                    <option value="speed">Speed Overnight Rate</option>
                </select>

                <div class="text-muted fs-7">Set the date of the order to process.</div>

            </div>


            <div class="fv-row">

                <label class="required form-label">Order Date</label>

                <input id="kt_ecommerce_edit_order_date" name="order_date" placeholder="Select a date"
                    class="form-control mb-2" value="" />

                <div class="text-muted fs-7">Set the date of the order to process.</div>

            </div>

        </div>
    </div>

</div>
</form>