@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">Recipes</li>
    <li class="breadcrumb-item text-dark">Listings</li>
@stop

@section('style')

    @if (app()->getLocale() === 'ar')
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
            type="text/css" />
    @endif







@stop
@section('content')
<div class="container-xxl" id="kt_content_container">
							 
							<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo7/dist/apps/ecommerce/catalog/products.html">
							 
							
							 
								<div class="d-flex flex-column gap-7 gap-lg-10 w-lg-350px mb-7 me-lg-10">
									<!--begin:::Tabs-->
									<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
										<!--begin:::Tab item-->
										<li class="nav-item">
											<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
										</li>
										<!--end:::Tab item-->
										<!--begin:::Tab item-->
										<li class="nav-item">
											<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
										</li>
										<!--end:::Tab item-->
									</ul>
									<!--end:::Tabs-->
									<!--begin::Tab content-->
									<div class="tab-content">
										<!--begin::Tab pane-->
										<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
											<div class="d-flex flex-column gap-7 gap-lg-10">
												<!--begin::General options-->
												<div class="card card-flush py-4">
													<!--begin::Card header-->
													 
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-5">
														<!--begin::Input group-->
														<div class="mb-10 fv-row">
															<!--begin::Label-->
															<label class="required form-label">Product Name</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" name="product_name" class="form-control mb-2" placeholder="Product name" value="" />
															<!--end::Input-->
															<!--begin::Description-->
 															<!--end::Description-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="mb-10 fv-row">
															<!--begin::Label-->
															<label class="form-label">Description</label>
															<!--end::Label-->
															<!--begin::Editor-->
															<div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2"></div>
															<!--end::Editor-->
															<!--begin::Description-->
 															<!--end::Description-->
														</div>

                                                        
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="form-label">Parent Category</label>
                                                            <!--end::Label-->
                                                            <!--begin::Select2-->
                                                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="payment_method" id="kt_ecommerce_edit_order_payment">
                                                                <option></option>
                                                                <option value="cod">Cash on Delivery</option>
                                                                <option value="visa">Credit Card (Visa)</option>
                                                                <option value="mastercard">Credit Card (Mastercard)</option>
                                                                <option value="paypal">Paypal</option>
                                                            </select>
                                                            <!--end::Select2-->
                                                            <!--begin::Description-->
                                                             <!--end::Description-->
                                                        </div>

                                                        
														<div class="mb-10 fv-row">
															<!--begin::Label-->
															<label class="d-block fw-semibold fs-6 mb-5">
																<span>Image</span>
															</label>
															<!--end::Label-->
															<!--begin::Image input placeholder-->
															<style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
															<!--end::Image input placeholder-->
															<!--begin::Image input-->
															<div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
																<!--begin::Preview existing image-->
																<div class="image-input-wrapper w-125px h-125px"></div>
																<!--end::Preview existing image-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<!--begin::Inputs-->
																	<input type="file" name="image" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="image_remove" />
																	<!--end::Inputs-->
																</label>
																<!--end::Label-->
																<!--begin::Cancel-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<!--end::Cancel-->
																<!--begin::Remove-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<!--end::Remove-->
															</div>
															<!--end::Image input-->
															<!--begin::Hint-->
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
															<!--end::Hint-->
														</div>

													 
														<!--end::Input group-->
													</div>
													<!--end::Card header-->
												</div>
												<!--end::General options-->
												<!--begin::Media-->
											 
												<!--end::Pricing-->
											</div>
										</div>
										<!--end::Tab pane-->
										<!--begin::Tab pane-->
										<div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
											<div class="d-flex flex-column gap-7 gap-lg-10">
												<!--begin::Inventory-->
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
												<!--end::Inventory-->
												<!--begin::Variations-->
									 
												<!--end::Meta options-->
											</div>
										</div>
										<!--end::Tab pane-->
									</div>
									<!--end::Tab content-->
									<div class="d-flex justify-content-end">
										<!--begin::Button-->
										<a href="../../demo7/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
										<!--end::Button-->
										<!--begin::Button-->
										<button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
											<span class="indicator-label">Save Changes</span>
											<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										</button>
										<!--end::Button-->
									</div>
								</div>
							 
                                <div class="d-flex flex-column flex-row-fluid gap-7 w-lg-600px gap-lg-10">								 
									<div class="card card-flush py-4">
										<!--begin::Card header-->
										<div class="card-header">
											<div class="card-title">
												<h2>Categories</h2>
											</div>
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<div class="d-flex flex-column gap-10">
												<!--begin::Input group-->
												<div>
													<!--begin::Label-->
													 
													<!--end::Label-->
													<!--begin::Selected products-->
													 
													<!--begin::Selected products-->
													<!--begin::Total price-->
													<div class="fw-bold fs-4">Total Cost: $
													<span id="kt_ecommerce_edit_order_total_price">0.00</span></div>
													<!--end::Total price-->
												</div>
												<!--end::Input group-->
												<!--begin::Separator-->
												<div class="separator"></div>
												<!--end::Separator-->
												<!--begin::Search products-->
												<div class="d-flex align-items-center position-relative mb-n7">
													<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
													<span class="svg-icon svg-icon-1 position-absolute ms-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<input type="text" data-kt-ecommerce-edit-order-filter="search" class="form-control form-control-solid w-100 w-lg-50 ps-14" placeholder="Search Products" />
												</div>
												<!--end::Search products-->
												<!--begin::Table-->
												<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
													<!--begin::Table head-->
													<thead>
														<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
															<th class="w-25px pe-2"></th>
															<th class="min-w-200px">Product</th>
															<th class="min-w-100px text-end pe-5">Qty Remaining</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody class="fw-semibold text-gray-600">
														<!--begin::Table row-->
														<tr>
															<!--begin::Checkbox-->
															<td>
																<div class="form-check form-check-sm form-check-custom form-check-solid">
																	<input class="form-check-input" type="checkbox" value="1" />
																</div>
															</td>
															<!--end::Checkbox-->
															<!--begin::Product=-->
															<td>
																<div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
																	<!--begin::Thumbnail-->
																	<a href="../../demo7/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
																		<span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/1.gif);"></span>
																	</a>
																	<!--end::Thumbnail-->
																	<div class="ms-5">
																		<!--begin::Title-->
																		<a href="../../demo7/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Product 1</a>
																		<!--end::Title-->
																		<!--begin::Price-->
																		<div class="fw-semibold fs-7">Price: $
																		<span data-kt-ecommerce-edit-order-filter="price">277.00</span></div>
																		<!--end::Price-->
																		<!--begin::SKU-->
																		<div class="text-muted fs-7">SKU: 02232008</div>
																		<!--end::SKU-->
																	</div>
																</div>
															</td>
															<!--end::Product=-->
															<!--begin::Qty=-->
															<td class="text-end pe-5" data-order="25">
																<span class="fw-bold ms-3">25</span>
															</td>
															<!--end::Qty=-->
														</tr>
														<!--end::Table row-->
														<!--begin::Table row-->
														
														<!--end::Table row-->
														<!--begin::Table row-->
														 
														<!--end::Table row-->
													</tbody>
													<!--end::Table body-->
												</table>
												<!--end::Table-->
											</div>
										</div>
										<!--end::Card header-->
									</div>                                    			 
								</div>

							</form>
							 
						</div>
@stop








@section('scripts')
    <script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/backend/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/users-search.js') }}"></script>


    @include('backend.form')


    <!--end::Custom Javascript-->
@stop
