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
							 
							
							 
								<div class="d-flex flex-column gap-7 gap-lg-10 w-100 mb-7 me-lg-10">
									<!--begin:::Tabs-->
									
                                    <x-backend.langs.ulTabs />
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

														<!--begin::Input group-->
														 
														<!--end::Input group-->
														<!--begin::Input group-->
														 
														<!--end::Input group-->
													</div>
													<!--end::Card header-->
												</div>
												<!--end::General options-->
												<!--begin::Media-->
												 
												<!--end::Media-->
												<!--begin::Pricing-->
												 
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
														 
														<!--end::Input group-->
														<!--begin::Input group-->
														 
														<!--end::Input group-->
														<!--begin::Input group-->
														 
														<!--end::Input group-->
													</div>
													<!--end::Card header-->
												</div>
												<!--end::Inventory-->
												<!--begin::Variations-->
											 
												<!--end::Shipping-->
												<!--begin::Meta options-->
												 
												<!--end::Meta options-->
											</div>
										</div>
										<!--end::Tab pane-->
									</div>
									<!--end::Tab content-->
									<x-backend.btns.create />
								</div>
							 
								<div class="d-flex flex-column flex-row-fluid gap-7 w-lg-400px gap-lg-10">
									<!--begin::Thumbnail settings-->
									

									<x-backend.cms.image />

									 

									<!--end::Thumbnail settings-->
									<!--begin::Status-->
									<x-backend.cms.status />

									<!--end::Status-->
									<!--begin::Category & tags-->
									<x-backend.cms.category />
									<!--end::Category & tags-->
									<!--begin::Weekly sales-->
								 
									<x-backend.cms.tags />
									<!--end::Weekly sales-->
									<!--begin::Template settings-->
									 
									<!--end::Template settings-->
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
