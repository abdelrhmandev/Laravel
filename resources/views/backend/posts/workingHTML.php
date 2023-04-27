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
							<!--begin::Form-->
							<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo7/dist/apps/ecommerce/catalog/products.html">
								<!--begin::Aside column-->
								<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
									<!--begin::Thumbnail settings-->
									<div class="card card-flush py-4">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Card title-->
											<div class="card-title">
												<h2>Thumbnail</h2>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body text-center pt-0">
											<!--begin::Image input-->
											<!--begin::Image input placeholder-->
											<style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
											<!--end::Image input placeholder-->
											<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-150px h-150px"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
													<i class="bi bi-pencil-fill fs-7"></i>
													<!--begin::Inputs-->
													<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
													<input type="hidden" name="avatar_remove" />
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
												<!--end::Remove-->
											</div>
											<!--end::Image input-->
											<!--begin::Description-->
											<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
											<!--end::Description-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Thumbnail settings-->
									<!--begin::Status-->
									 
									<!--end::Status-->
									<!--begin::Category & tags-->
									 
									<!--end::Category & tags-->
									<!--begin::Weekly sales-->
									 
									<!--end::Weekly sales-->
									<!--begin::Template settings-->
									 
									<!--end::Template settings-->
								</div>
								<!--end::Aside column-->
								<!--begin::Main column-->
								<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
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
													<div class="card-header">
														<div class="card-title">
															<h2>General</h2>
														</div>
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-0">
														<!--begin::Input group-->
														<div class="mb-10 fv-row">
															<!--begin::Label-->
															<label class="required form-label">Product Name</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" name="product_name" class="form-control mb-2" placeholder="Product name" value="" />
															<!--end::Input-->
															<!--begin::Description-->
															<div class="text-muted fs-7">A product name is required and recommended to be unique.</div>
															<!--end::Description-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div>
															<!--begin::Label-->
															<label class="form-label">Description</label>
															<!--end::Label-->
															<!--begin::Editor-->
															<div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2"></div>
															<!--end::Editor-->
															<!--begin::Description-->
															<div class="text-muted fs-7">Set a description to the product for better visibility.</div>
															<!--end::Description-->
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
								<!--end::Main column-->
							</form>
							<!--end::Form-->
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
