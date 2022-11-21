@extends('backend.base.base')
@section('style')
<link href="{{ asset('assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
@stop


@section('content')
<!--begin::Container-->
<div class="container" id="kt_content_container">
	<!--begin::Row-->
	<div class="row gy-5 g-xl-8">
		<!--begin::Col-->
		<div class="col-xxl-4">
			<!--begin::Mixed Widget 12-->
			<div class="card card-xl-stretch mb-xl-8">
				<!--begin::Header-->
				<div class="card-header border-0 bg-primary py-5">
					<h3 class="card-title fw-bolder text-white">Sales Progress</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
							<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--begin::Menu 3-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
							<!--begin::Heading-->
							<div class="menu-item px-3">
								<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
							</div>
							<!--end::Heading-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Create Invoice</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link flex-stack px-3">Create Payment
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Generate Bill</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
								<a href="#" class="menu-link px-3">
									<span class="menu-title">Subscription</span>
									<span class="menu-arrow"></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Plans</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Billing</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content px-3">
											<!--begin::Switch-->
											<label class="form-check form-switch form-check-custom form-check-solid">
												<!--begin::Input-->
												<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
												<!--end::Input-->
												<!--end::Label-->
												<span class="form-check-label text-muted fs-6">Recuring</span>
												<!--end::Label-->
											</label>
											<!--end::Switch-->
										</div>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-1">
								<a href="#" class="menu-link px-3">Settings</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 3-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body p-0">
					<!--begin::Chart-->
					<div class="mixed-widget-12-chart card-rounded-bottom bg-primary" data-kt-color="primary" style="height: 250px"></div>
					<!--end::Chart-->
					<!--begin::Stats-->
					<div class="card-rounded bg-body mt-n10 position-relative card-px py-15">
						<!--begin::Row-->
						<div class="row g-0 mb-7">
							<!--begin::Col-->
							<div class="col mx-5">
								<div class="fs-6 text-gray-400">Avarage Sale</div>
								<div class="fs-2 fw-bolder text-gray-800">$650</div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col mx-5">
								<div class="fs-6 text-gray-400">Comissions</div>
								<div class="fs-2 fw-bolder text-gray-800">$29,500</div>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
						<!--begin::Row-->
						<div class="row g-0">
							<!--begin::Col-->
							<div class="col mx-5">
								<div class="fs-6 text-gray-400">Revenue</div>
								<div class="fs-2 fw-bolder text-gray-800">$55,000</div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col mx-5">
								<div class="fs-6 text-gray-400">Expenses</div>
								<div class="fs-2 fw-bolder text-gray-800">$1,130,600</div>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
					</div>
					<!--end::Stats-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 12-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xxl-8">
			<!--begin::Tables Widget 9-->
			<div class="card card-xxl-stretch mb-5 mb-xl-8">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
						<span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
					</h3>
					<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
						<a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
						<!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
						<span class="svg-icon svg-icon-3">
							<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</svg>
						</span>
						<!--end::Svg Icon-->New Member</a>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body py-3">
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
							<!--begin::Table head-->
							<thead>
								<tr class="fw-bolder text-muted">
									<th class="w-25px">
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
										</div>
									</th>
									<th class="min-w-150px">Authors</th>
									<th class="min-w-140px">Company</th>
									<th class="min-w-120px">Progress</th>
									<th class="min-w-100px text-end">Actions</th>
								</tr>
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-11.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Ana Simmons</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">Intertico</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">50%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-3.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Jessie Clarcson</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">C#, ASP.NET, MS SQL</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">Agoda</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Houses &amp; Hotels</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">70%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-4.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Lebron Wayde</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">PHP, Laravel, VueJS</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">RoadGee</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Transportation</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">60%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-5.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Natali Goodwin</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">Python, PostgreSQL, ReactJS</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">The Hill</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Insurance</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">50%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-6.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Kevin Leonard</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">RoadGee</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Art Director</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">90%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Table container-->
				</div>
				<!--begin::Body-->
			</div>
			<!--end::Tables Widget 9-->
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row gy-5 g-xl-8">
		<!--begin::Col-->
		<div class="col-xxl-4">
			<!--begin::Statistics Widget 4-->
			<div class="card card-xxl-stretch-50 mb-5 mb-xl-8">
				<!--begin::Body-->
				<div class="card-body p-0">
					<div class="d-flex flex-stack card-p flex-grow-1">
						<span class="symbol symbol-circle symbol-50px me-2">
							<span class="symbol-label bg-light-danger">
								<!--begin::Svg Icon | path: icons/duotone/Interface/Grid.svg-->
								<span class="svg-icon svg-icon-2x svg-icon-danger">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.25" d="M13.1721 15.4724C13.3364 14.2725 14.2725 13.3364 15.4724 13.1721C16.1606 13.0778 16.9082 13 17.5 13C18.0918 13 18.8394 13.0778 19.5276 13.1721C20.7275 13.3364 21.6636 14.2725 21.8279 15.4724C21.9222 16.1606 22 16.9082 22 17.5C22 18.0918 21.9222 18.8394 21.8279 19.5276C21.6636 20.7275 20.7275 21.6636 19.5276 21.8279C18.8394 21.9222 18.0918 22 17.5 22C16.9082 22 16.1606 21.9222 15.4724 21.8279C14.2725 21.6636 13.3364 20.7275 13.1721 19.5276C13.0778 18.8394 13 18.0918 13 17.5C13 16.9082 13.0778 16.1606 13.1721 15.4724Z" fill="#12131A" />
										<path opacity="0.25" d="M2.17209 15.4724C2.33642 14.2725 3.27253 13.3364 4.47244 13.1721C5.16065 13.0778 5.90816 13 6.5 13C7.09184 13 7.83935 13.0778 8.52756 13.1721C9.72747 13.3364 10.6636 14.2725 10.8279 15.4724C10.9222 16.1606 11 16.9082 11 17.5C11 18.0918 10.9222 18.8394 10.8279 19.5276C10.6636 20.7275 9.72747 21.6636 8.52756 21.8279C7.83935 21.9222 7.09184 22 6.5 22C5.90816 22 5.16065 21.9222 4.47244 21.8279C3.27253 21.6636 2.33642 20.7275 2.17209 19.5276C2.07784 18.8394 2 18.0918 2 17.5C2 16.9082 2.07784 16.1606 2.17209 15.4724Z" fill="#12131A" />
										<path opacity="0.25" d="M13.1721 4.47244C13.3364 3.27253 14.2725 2.33642 15.4724 2.17209C16.1606 2.07784 16.9082 2 17.5 2C18.0918 2 18.8394 2.07784 19.5276 2.17209C20.7275 2.33642 21.6636 3.27253 21.8279 4.47244C21.9222 5.16065 22 5.90816 22 6.5C22 7.09184 21.9222 7.83935 21.8279 8.52756C21.6636 9.72747 20.7275 10.6636 19.5276 10.8279C18.8394 10.9222 18.0918 11 17.5 11C16.9082 11 16.1606 10.9222 15.4724 10.8279C14.2725 10.6636 13.3364 9.72747 13.1721 8.52756C13.0778 7.83935 13 7.09184 13 6.5C13 5.90816 13.0778 5.16065 13.1721 4.47244Z" fill="#12131A" />
										<path d="M2.17209 4.47244C2.33642 3.27253 3.27253 2.33642 4.47244 2.17209C5.16065 2.07784 5.90816 2 6.5 2C7.09184 2 7.83935 2.07784 8.52756 2.17209C9.72747 2.33642 10.6636 3.27253 10.8279 4.47244C10.9222 5.16065 11 5.90816 11 6.5C11 7.09184 10.9222 7.83935 10.8279 8.52756C10.6636 9.72747 9.72747 10.6636 8.52756 10.8279C7.83935 10.9222 7.09184 11 6.5 11C5.90816 11 5.16065 10.9222 4.47244 10.8279C3.27253 10.6636 2.33642 9.72747 2.17209 8.52756C2.07784 7.83935 2 7.09184 2 6.5C2 5.90816 2.07784 5.16065 2.17209 4.47244Z" fill="#12131A" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</span>
						</span>
						<div class="d-flex flex-column text-end">
							<span class="text-dark fw-bolder fs-2">750$</span>
							<span class="text-muted fw-bold mt-1">Weekly Income</span>
						</div>
					</div>
					<div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="danger" style="height: 150px"></div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Statistics Widget 4-->
			<!--begin::Statistics Widget 4-->
			<div class="card card-xxl-stretch-50 mb-xl-8">
				<!--begin::Body-->
				<div class="card-body p-0">
					<div class="d-flex flex-stack card-p flex-grow-1">
						<span class="symbol symbol-circle symbol-50px me-2">
							<span class="symbol-label bg-light-success">
								<!--begin::Svg Icon | path: icons/duotone/Shopping/Cart3.svg-->
								<span class="svg-icon svg-icon-2x svg-icon-success">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
										</g>
									</svg>
								</span>
								<!--end::Svg Icon-->
							</span>
						</span>
						<div class="d-flex flex-column text-end">
							<span class="text-dark fw-bolder fs-2">+259</span>
							<span class="text-muted fw-bold mt-1">Sales Change</span>
						</div>
					</div>
					<div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="success" style="height: 150px"></div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Statistics Widget 4-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xxl-4">
			<!--begin::List Widget 9-->
			<div class="card card-xxl-stretch mb-xl-8">
				<!--begin::Header-->
				<div class="card-header align-items-center border-0 mt-3">
					<h3 class="card-title align-items-start flex-column">
						<span class="fw-bolder text-dark fs-3">My Competitors</span>
						<span class="text-gray-400 mt-2 fw-bold fs-6">More than 400+ new members</span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
							<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
							<span class="svg-icon svg-icon-3 svg-icon-primary">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--begin::Menu 2-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu separator-->
							<div class="separator mb-3 opacity-75"></div>
							<!--end::Menu separator-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">New Ticket</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">New Customer</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start" data-kt-menu-flip="bottom, top">
								<!--begin::Menu item-->
								<a href="#" class="menu-link px-3">
									<span class="menu-title">New Group</span>
									<span class="menu-arrow"></span>
								</a>
								<!--end::Menu item-->
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Admin Group</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Staff Group</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Member Group</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">New Contact</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu separator-->
							<div class="separator mt-3 opacity-75"></div>
							<!--end::Menu separator-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<div class="menu-content px-3 py-3">
									<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
								</div>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 2-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-5">
					<!--begin::Item-->
					<div class="d-flex mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
							<img src="{{ asset('assets/backend/media/stock/600x400/img-3.jpg')}}" class="mw-100" alt="" />
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
							<!--begin::Title-->
							<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
								<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Cup &amp; Green</a>
								<span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
								<span class="text-gray-400 fw-bold fs-7">By:
								<a href="#" class="text-primary fw-bold">CoreAd</a></span>
							</div>
							<!--end::Title-->
							<!--begin::Info-->
							<div class="text-end py-lg-0 py-2">
								<span class="text-gray-800 fw-boldest fs-3">24,900</span>
								<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
							</div>
							<!--end::Info-->
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
							<img src="{{ asset('assets/backend/media/stock/600x400/img-4.jpg')}}" class="mw-100" alt="" />
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
							<!--begin::Title-->
							<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
								<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Yellow Hearts</a>
								<span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
								<span class="text-gray-400 fw-bold fs-7">By:
								<a href="#" class="text-primary fw-bold">KeenThemes</a></span>
							</div>
							<!--end::Title-->
							<!--begin::Info-->
							<div class="text-end py-lg-0 py-2">
								<span class="text-gray-800 fw-boldest fs-3">70,380</span>
								<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
							</div>
							<!--end::Info-->
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
							<img src="{{ asset('assets/backend/media/stock/600x400/img-5.jpg')}}" class="mw-100" alt="" />
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
							<!--begin::Title-->
							<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
								<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Nike &amp; Blue</a>
								<span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
								<span class="text-gray-400 fw-bold fs-7">By:
								<a href="#" class="text-primary fw-bold">Invision Inc.</a></span>
							</div>
							<!--end::Title-->
							<!--begin::Info-->
							<div class="text-end py-lg-0 py-2">
								<span class="text-gray-800 fw-boldest fs-3">7,200</span>
								<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
							</div>
							<!--end::Info-->
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
							<img src="{{ asset('assets/backend/media/stock/600x400/img-6.jpg')}}" class="mw-100" alt="" />
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
							<!--begin::Title-->
							<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
								<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Red Boots</a>
								<span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
								<span class="text-gray-400 fw-bold fs-7">By:
								<a href="#" class="text-primary fw-bold">Figma Studio</a></span>
							</div>
							<!--end::Title-->
							<!--begin::Info-->
							<div class="text-end py-lg-0 py-2">
								<span class="text-gray-800 fw-boldest fs-3">36,450</span>
								<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
							</div>
							<!--end::Info-->
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex">
						<!--begin::Symbol-->
						<div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
							<img src="{{ asset('assets/backend/media/stock/600x400/img-7.jpg')}}" class="mw-100" alt="" />
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
							<!--begin::Title-->
							<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
								<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Desserts platter</a>
								<span class="text-gray-400 fw-bold fs-7 my-1">Food trends &amp; reviews</span>
								<span class="text-gray-400 fw-bold fs-7">By:
								<a href="#" class="text-primary fw-bold">Figma Studio</a></span>
							</div>
							<!--end::Title-->
							<!--begin::Info-->
							<div class="text-end py-lg-0 py-2">
								<span class="text-gray-800 fw-boldest fs-3">64,753</span>
								<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
							</div>
							<!--end::Info-->
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::List Widget 9-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xxl-4">
			<!--begin::List Widget 4-->
			<div class="card card-xxl-stretch mb-5 mb-xl-8">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bolder text-dark">Trends</span>
						<span class="text-muted mt-1 fw-bold fs-7">Latest tech trends</span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
							<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--begin::Menu 3-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
							<!--begin::Heading-->
							<div class="menu-item px-3">
								<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
							</div>
							<!--end::Heading-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Create Invoice</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link flex-stack px-3">Create Payment
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Generate Bill</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
								<a href="#" class="menu-link px-3">
									<span class="menu-title">Subscription</span>
									<span class="menu-arrow"></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Plans</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Billing</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content px-3">
											<!--begin::Switch-->
											<label class="form-check form-switch form-check-custom form-check-solid">
												<!--begin::Input-->
												<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
												<!--end::Input-->
												<!--end::Label-->
												<span class="form-check-label text-muted fs-6">Recuring</span>
												<!--end::Label-->
											</label>
											<!--end::Switch-->
										</div>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-1">
								<a href="#" class="menu-link px-3">Settings</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 3-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-5">
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/plurk.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Top Authors</a>
								<span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+82$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/telegram.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Popular Authors</a>
								<span class="text-muted fw-bold d-block fs-7">Randy, Steve, Mike</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+280$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/vimeo.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">New Users</a>
								<span class="text-muted fw-bold d-block fs-7">John, Pat, Jimmy</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+4500$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/bebo.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Active Customers</a>
								<span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+686$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/kickstarter.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Bestseller Theme</a>
								<span class="text-muted fw-bold d-block fs-7">Disco, Retro, Sports</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+726$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/fox-hub.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Fox Broker App</a>
								<span class="text-muted fw-bold d-block fs-7">Finance, Corporate, Apps</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+145$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::List Widget 4-->
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row gy-5 g-xl-8">
		<!--begin::Col-->
		<div class="col-xxl-4">
			<!--begin::List Widget 3-->
			<div class="card card-xxl-stretch mb-xl-3">
				<!--begin::Header-->
				<div class="card-header border-0">
					<h3 class="card-title fw-bolder text-dark">Todo</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
							<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--begin::Menu 3-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
							<!--begin::Heading-->
							<div class="menu-item px-3">
								<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
							</div>
							<!--end::Heading-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Create Invoice</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link flex-stack px-3">Create Payment
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Generate Bill</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
								<a href="#" class="menu-link px-3">
									<span class="menu-title">Subscription</span>
									<span class="menu-arrow"></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Plans</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Billing</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content px-3">
											<!--begin::Switch-->
											<label class="form-check form-switch form-check-custom form-check-solid">
												<!--begin::Input-->
												<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
												<!--end::Input-->
												<!--end::Label-->
												<span class="form-check-label text-muted fs-6">Recuring</span>
												<!--end::Label-->
											</label>
											<!--end::Switch-->
										</div>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-1">
								<a href="#" class="menu-link px-3">Settings</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 3-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-2">
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-8">
						<!--begin::Bullet-->
						<span class="bullet bullet-vertical h-40px bg-success"></span>
						<!--end::Bullet-->
						<!--begin::Checkbox-->
						<div class="form-check form-check-custom form-check-solid mx-5">
							<input class="form-check-input" type="checkbox" value="" />
						</div>
						<!--end::Checkbox-->
						<!--begin::Description-->
						<div class="flex-grow-1">
							<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Create FireStone Logo</a>
							<span class="text-muted fw-bold d-block">Due in 2 Days</span>
						</div>
						<!--end::Description-->
						<span class="badge badge-light-success fs-8 fw-bolder">New</span>
					</div>
					<!--end:Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-8">
						<!--begin::Bullet-->
						<span class="bullet bullet-vertical h-40px bg-primary"></span>
						<!--end::Bullet-->
						<!--begin::Checkbox-->
						<div class="form-check form-check-custom form-check-solid mx-5">
							<input class="form-check-input" type="checkbox" value="" />
						</div>
						<!--end::Checkbox-->
						<!--begin::Description-->
						<div class="flex-grow-1">
							<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Stakeholder Meeting</a>
							<span class="text-muted fw-bold d-block">Due in 3 Days</span>
						</div>
						<!--end::Description-->
						<span class="badge badge-light-primary fs-8 fw-bolder">New</span>
					</div>
					<!--end:Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-8">
						<!--begin::Bullet-->
						<span class="bullet bullet-vertical h-40px bg-warning"></span>
						<!--end::Bullet-->
						<!--begin::Checkbox-->
						<div class="form-check form-check-custom form-check-solid mx-5">
							<input class="form-check-input" type="checkbox" value="" />
						</div>
						<!--end::Checkbox-->
						<!--begin::Description-->
						<div class="flex-grow-1">
							<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Scoping &amp; Estimations</a>
							<span class="text-muted fw-bold d-block">Due in 5 Days</span>
						</div>
						<!--end::Description-->
						<span class="badge badge-light-warning fs-8 fw-bolder">New</span>
					</div>
					<!--end:Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-8">
						<!--begin::Bullet-->
						<span class="bullet bullet-vertical h-40px bg-primary"></span>
						<!--end::Bullet-->
						<!--begin::Checkbox-->
						<div class="form-check form-check-custom form-check-solid mx-5">
							<input class="form-check-input" type="checkbox" value="" />
						</div>
						<!--end::Checkbox-->
						<!--begin::Description-->
						<div class="flex-grow-1">
							<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">KPI App Showcase</a>
							<span class="text-muted fw-bold d-block">Due in 2 Days</span>
						</div>
						<!--end::Description-->
						<span class="badge badge-light-primary fs-8 fw-bolder">New</span>
					</div>
					<!--end:Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-8">
						<!--begin::Bullet-->
						<span class="bullet bullet-vertical h-40px bg-danger"></span>
						<!--end::Bullet-->
						<!--begin::Checkbox-->
						<div class="form-check form-check-custom form-check-solid mx-5">
							<input class="form-check-input" type="checkbox" value="" />
						</div>
						<!--end::Checkbox-->
						<!--begin::Description-->
						<div class="flex-grow-1">
							<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Project Meeting</a>
							<span class="text-muted fw-bold d-block">Due in 12 Days</span>
						</div>
						<!--end::Description-->
						<span class="badge badge-light-danger fs-8 fw-bolder">New</span>
					</div>
					<!--end:Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center">
						<!--begin::Bullet-->
						<span class="bullet bullet-vertical h-40px bg-success"></span>
						<!--end::Bullet-->
						<!--begin::Checkbox-->
						<div class="form-check form-check-custom form-check-solid mx-5">
							<input class="form-check-input" type="checkbox" value="" />
						</div>
						<!--end::Checkbox-->
						<!--begin::Description-->
						<div class="flex-grow-1">
							<a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Customers Update</a>
							<span class="text-muted fw-bold d-block">Due in 1 week</span>
						</div>
						<!--end::Description-->
						<span class="badge badge-light-success fs-8 fw-bolder">New</span>
					</div>
					<!--end:Item-->
				</div>
				<!--end::Body-->
			</div>
			<!--end:List Widget 3-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xxl-8">
			<!--begin::Tables Widget 9-->
			<div class="card card-xxl-stretch mb-5 mb-xl-8">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
						<span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
					</h3>
					<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
						<a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
						<!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
						<span class="svg-icon svg-icon-3">
							<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</svg>
						</span>
						<!--end::Svg Icon-->New Member</a>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body py-3">
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
							<!--begin::Table head-->
							<thead>
								<tr class="fw-bolder text-muted">
									<th class="w-25px">
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
										</div>
									</th>
									<th class="min-w-150px">Authors</th>
									<th class="min-w-140px">Company</th>
									<th class="min-w-120px">Progress</th>
									<th class="min-w-100px text-end">Actions</th>
								</tr>
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-11.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Ana Simmons</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">Intertico</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">50%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-3.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Jessie Clarcson</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">C#, ASP.NET, MS SQL</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">Agoda</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Houses &amp; Hotels</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">70%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-4.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Lebron Wayde</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">PHP, Laravel, VueJS</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">RoadGee</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Transportation</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">60%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-5.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Natali Goodwin</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">Python, PostgreSQL, ReactJS</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">The Hill</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Insurance</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">50%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input widget-9-check" type="checkbox" value="1" />
										</div>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('assets/backend/media/avatars/150-6.jpg')}}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Kevin Leonard</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
											</div>
										</div>
									</td>
									<td>
										<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">RoadGee</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">Art Director</span>
									</td>
									<td class="text-end">
										<div class="d-flex flex-column w-100 me-2">
											<div class="d-flex flex-stack mb-2">
												<span class="text-muted me-2 fs-7 fw-bold">90%</span>
											</div>
											<div class="progress h-6px w-100">
												<div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</td>
									<td>
										<div class="d-flex justify-content-end flex-shrink-0">
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
															<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
												<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
											<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
												<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
															<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Table container-->
				</div>
				<!--begin::Body-->
			</div>
			<!--end::Tables Widget 9-->
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row gy-5 g-xl-8">
		<!--begin::Col-->
		<div class="col-xl-4">
			<!--begin::List Widget 2-->
			<div class="card card-xl-stretch mb-xl-8">
				<!--begin::Header-->
				<div class="card-header border-0">
					<h3 class="card-title fw-bolder text-dark">Authors</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
							<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--begin::Menu 2-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu separator-->
							<div class="separator mb-3 opacity-75"></div>
							<!--end::Menu separator-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">New Ticket</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">New Customer</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start" data-kt-menu-flip="bottom, top">
								<!--begin::Menu item-->
								<a href="#" class="menu-link px-3">
									<span class="menu-title">New Group</span>
									<span class="menu-arrow"></span>
								</a>
								<!--end::Menu item-->
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Admin Group</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Staff Group</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Member Group</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">New Contact</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu separator-->
							<div class="separator mt-3 opacity-75"></div>
							<!--end::Menu separator-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<div class="menu-content px-3 py-3">
									<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
								</div>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 2-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-2">
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-7">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px me-5">
							<img src="{{ asset('assets/backend/media/avatars/150-1.jpg')}}" class="" alt="" />
						</div>
						<!--end::Avatar-->
						<!--begin::Text-->
						<div class="flex-grow-1">
							<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Emma Smith</a>
							<span class="text-muted d-block fw-bold">Project Manager</span>
						</div>
						<!--end::Text-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-7">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px me-5">
							<img src="{{ asset('assets/backend/media/avatars/150-4.jpg')}}" class="" alt="" />
						</div>
						<!--end::Avatar-->
						<!--begin::Text-->
						<div class="flex-grow-1">
							<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Sean Bean</a>
							<span class="text-muted d-block fw-bold">PHP, SQLite, Artisan CLI</span>
						</div>
						<!--end::Text-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-7">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px me-5">
							<img src="{{ asset('assets/backend/media/avatars/150-12.jpg')}}" class="" alt="" />
						</div>
						<!--end::Avatar-->
						<!--begin::Text-->
						<div class="flex-grow-1">
							<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Brian Cox</a>
							<span class="text-muted d-block fw-bold">PHP, SQLite, Artisan CLI</span>
						</div>
						<!--end::Text-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-7">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px me-5">
							<img src="{{ asset('assets/backend/media/avatars/150-8.jpg')}}" class="" alt="" />
						</div>
						<!--end::Avatar-->
						<!--begin::Text-->
						<div class="flex-grow-1">
							<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Francis Mitcham</a>
							<span class="text-muted d-block fw-bold">PHP, SQLite, Artisan CLI</span>
						</div>
						<!--end::Text-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center">
						<!--begin::Avatar-->
						<div class="symbol symbol-50px me-5">
							<img src="{{ asset('assets/backend/media/avatars/150-6.jpg')}}" class="" alt="" />
						</div>
						<!--end::Avatar-->
						<!--begin::Text-->
						<div class="flex-grow-1">
							<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Dan Wilson</a>
							<span class="text-muted d-block fw-bold">PHP, SQLite, Artisan CLI</span>
						</div>
						<!--end::Text-->
					</div>
					<!--end::Item-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::List Widget 2-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">
			<!--begin::List Widget 6-->
			<div class="card card-xl-stretch mb-xl-8">
				<!--begin::Header-->
				<div class="card-header border-0">
					<h3 class="card-title fw-bolder text-dark">Notifications</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
							<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--begin::Menu 3-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
							<!--begin::Heading-->
							<div class="menu-item px-3">
								<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
							</div>
							<!--end::Heading-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Create Invoice</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link flex-stack px-3">Create Payment
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Generate Bill</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
								<a href="#" class="menu-link px-3">
									<span class="menu-title">Subscription</span>
									<span class="menu-arrow"></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Plans</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Billing</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content px-3">
											<!--begin::Switch-->
											<label class="form-check form-switch form-check-custom form-check-solid">
												<!--begin::Input-->
												<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
												<!--end::Input-->
												<!--end::Label-->
												<span class="form-check-label text-muted fs-6">Recuring</span>
												<!--end::Label-->
											</label>
											<!--end::Switch-->
										</div>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-1">
								<a href="#" class="menu-link px-3">Settings</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 3-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-0">
					<!--begin::Item-->
					<div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
						<!--begin::Icon-->
						<span class="svg-icon svg-icon-warning me-5">
							<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
										<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<!--end::Icon-->
						<!--begin::Title-->
						<div class="flex-grow-1 me-2">
							<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Group lunch celebration</a>
							<span class="text-muted fw-bold d-block">Due in 2 Days</span>
						</div>
						<!--end::Title-->
						<!--begin::Lable-->
						<span class="fw-bolder text-warning py-1">+28%</span>
						<!--end::Lable-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
						<!--begin::Icon-->
						<span class="svg-icon svg-icon-success me-5">
							<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
										<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<!--end::Icon-->
						<!--begin::Title-->
						<div class="flex-grow-1 me-2">
							<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Navigation optimization</a>
							<span class="text-muted fw-bold d-block">Due in 2 Days</span>
						</div>
						<!--end::Title-->
						<!--begin::Lable-->
						<span class="fw-bolder text-success py-1">+50%</span>
						<!--end::Lable-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
						<!--begin::Icon-->
						<span class="svg-icon svg-icon-danger me-5">
							<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
										<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<!--end::Icon-->
						<!--begin::Title-->
						<div class="flex-grow-1 me-2">
							<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Rebrand strategy planning</a>
							<span class="text-muted fw-bold d-block">Due in 5 Days</span>
						</div>
						<!--end::Title-->
						<!--begin::Lable-->
						<span class="fw-bolder text-danger py-1">-27%</span>
						<!--end::Lable-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-center bg-light-info rounded p-5">
						<!--begin::Icon-->
						<span class="svg-icon svg-icon-info me-5">
							<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
										<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<!--end::Icon-->
						<!--begin::Title-->
						<div class="flex-grow-1 me-2">
							<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Product goals strategy</a>
							<span class="text-muted fw-bold d-block">Due in 7 Days</span>
						</div>
						<!--end::Title-->
						<!--begin::Lable-->
						<span class="fw-bolder text-info py-1">+8%</span>
						<!--end::Lable-->
					</div>
					<!--end::Item-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::List Widget 6-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">
			<!--begin::List Widget 4-->
			<div class="card card-xl-stretch mb-5 mb-xl-8">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bolder text-dark">Trends</span>
						<span class="text-muted mt-1 fw-bold fs-7">Latest tech trends</span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
							<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--begin::Menu 3-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
							<!--begin::Heading-->
							<div class="menu-item px-3">
								<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
							</div>
							<!--end::Heading-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Create Invoice</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link flex-stack px-3">Create Payment
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Generate Bill</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
								<a href="#" class="menu-link px-3">
									<span class="menu-title">Subscription</span>
									<span class="menu-arrow"></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Plans</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Billing</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content px-3">
											<!--begin::Switch-->
											<label class="form-check form-switch form-check-custom form-check-solid">
												<!--begin::Input-->
												<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
												<!--end::Input-->
												<!--end::Label-->
												<span class="form-check-label text-muted fs-6">Recuring</span>
												<!--end::Label-->
											</label>
											<!--end::Switch-->
										</div>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-1">
								<a href="#" class="menu-link px-3">Settings</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 3-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-5">
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/plurk.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Top Authors</a>
								<span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+82$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/telegram.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Popular Authors</a>
								<span class="text-muted fw-bold d-block fs-7">Randy, Steve, Mike</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+280$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/vimeo.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">New Users</a>
								<span class="text-muted fw-bold d-block fs-7">John, Pat, Jimmy</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+4500$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/bebo.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Active Customers</a>
								<span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+686$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{ asset('assets/backend/media/svg/brand-logos/kickstarter.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Bestseller Theme</a>
								<span class="text-muted fw-bold d-block fs-7">Disco, Retro, Sports</span>
							</div>
							<span class="badge badge-light fw-bolder my-2">+726$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::List Widget 4-->
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row g-5 gx-xxl-8">
		<!--begin::Col-->
		<div class="col-xxl-4">
			<!--begin::Mixed Widget 5-->
			<div class="card card-xxl-stretch mb-xl-3">
				<!--begin::Beader-->
				<div class="card-header border-0 py-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bolder fs-3 mb-1">Trends</span>
						<span class="text-muted fw-bold fs-7">Latest trends</span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
							<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
										<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
										<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--begin::Menu 3-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
							<!--begin::Heading-->
							<div class="menu-item px-3">
								<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
							</div>
							<!--end::Heading-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Create Invoice</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link flex-stack px-3">Create Payment
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Generate Bill</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
								<a href="#" class="menu-link px-3">
									<span class="menu-title">Subscription</span>
									<span class="menu-arrow"></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Plans</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Billing</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content px-3">
											<!--begin::Switch-->
											<label class="form-check form-switch form-check-custom form-check-solid">
												<!--begin::Input-->
												<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
												<!--end::Input-->
												<!--end::Label-->
												<span class="form-check-label text-muted fs-6">Recuring</span>
												<!--end::Label-->
											</label>
											<!--end::Switch-->
										</div>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-1">
								<a href="#" class="menu-link px-3">Settings</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 3-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body d-flex flex-column">
					<!--begin::Chart-->
					<div class="mixed-widget-5-chart card-rounded-top" data-kt-chart-color="success" style="height: 150px"></div>
					<!--end::Chart-->
					<!--begin::Items-->
					<div class="mt-5">
						<!--begin::Item-->
						<div class="d-flex flex-stack mb-5">
							<!--begin::Section-->
							<div class="d-flex align-items-center me-2">
								<!--begin::Symbol-->
								<div class="symbol symbol-50px me-3">
									<div class="symbol-label bg-light">
										<img src="{{ asset('assets/backend/media/svg/brand-logos/plurk.svg')}}" class="h-50" alt="" />
									</div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div>
									<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top Authors</a>
									<div class="fs-7 text-muted fw-bold mt-1">Ricky Hunt, Sandra Trepp</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<div class="badge badge-light fw-bold py-4 px-3">+82$</div>
							<!--end::Label-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex flex-stack mb-5">
							<!--begin::Section-->
							<div class="d-flex align-items-center me-2">
								<!--begin::Symbol-->
								<div class="symbol symbol-50px me-3">
									<div class="symbol-label bg-light">
										<img src="{{ asset('assets/backend/media/svg/brand-logos/figma-1.svg')}}" class="h-50" alt="" />
									</div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div>
									<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top Sales</a>
									<div class="fs-7 text-muted fw-bold mt-1">PitStop Emails</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<div class="badge badge-light fw-bold py-4 px-3">+82$</div>
							<!--end::Label-->
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex flex-stack">
							<!--begin::Section-->
							<div class="d-flex align-items-center me-2">
								<!--begin::Symbol-->
								<div class="symbol symbol-50px me-3">
									<div class="symbol-label bg-light">
										<img src="{{ asset('assets/backend/media/svg/brand-logos/vimeo.svg')}}" class="h-50" alt="" />
									</div>
								</div>
								<!--end::Symbol-->
								<!--begin::Title-->
								<div class="py-1">
									<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top Engagement</a>
									<div class="fs-7 text-muted fw-bold mt-1">KT.com</div>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Section-->
							<!--begin::Label-->
							<div class="badge badge-light fw-bold py-4 px-3">+82$</div>
							<!--end::Label-->
						</div>
						<!--end::Item-->
					</div>
					<!--end::Items-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 5-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xxl-8">
			<!--begin::Tables Widget 5-->
			<div class="card card-xxl-stretch mb-5 mb-xxl-8">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bolder fs-3 mb-1">Latest Products</span>
						<span class="text-muted mt-1 fw-bold fs-7">More than 400 new products</span>
					</h3>
					<div class="card-toolbar">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">Month</a>
							</li>
							<li class="nav-item">
								<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">Week</a>
							</li>
							<li class="nav-item">
								<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">Day</a>
							</li>
						</ul>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body py-3">
					<div class="tab-content">
						<!--begin::Tap pane-->
						<div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
							<!--begin::Table container-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
									<!--begin::Table head-->
									<thead>
										<tr class="border-0">
											<th class="p-0 w-50px"></th>
											<th class="p-0 min-w-150px"></th>
											<th class="p-0 min-w-140px"></th>
											<th class="p-0 min-w-110px"></th>
											<th class="p-0 min-w-50px"></th>
										</tr>
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/plurk.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad Simmons</a>
												<span class="text-muted fw-bold d-block">Movie Creator</span>
											</td>
											<td class="text-end text-muted fw-bold">React, HTML</td>
											<td class="text-end">
												<span class="badge badge-light-success">Approved</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/telegram.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular Authors</a>
												<span class="text-muted fw-bold d-block">Most Successful</span>
											</td>
											<td class="text-end text-muted fw-bold">Python, MySQL</td>
											<td class="text-end">
												<span class="badge badge-light-warning">In Progress</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/vimeo.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">New Users</a>
												<span class="text-muted fw-bold d-block">Awesome Users</span>
											</td>
											<td class="text-end text-muted fw-bold">Laravel,Metronic</td>
											<td class="text-end">
												<span class="badge badge-light-primary">Success</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/bebo.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active Customers</a>
												<span class="text-muted fw-bold d-block">Movie Creator</span>
											</td>
											<td class="text-end text-muted fw-bold">AngularJS, C#</td>
											<td class="text-end">
												<span class="badge badge-light-danger">Rejected</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/kickstarter.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Bestseller Theme</a>
												<span class="text-muted fw-bold d-block">Best Customers</span>
											</td>
											<td class="text-end text-muted fw-bold">ReactJS, Ruby</td>
											<td class="text-end">
												<span class="badge badge-light-warning">In Progress</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
									</tbody>
									<!--end::Table body-->
								</table>
							</div>
							<!--end::Table-->
						</div>
						<!--end::Tap pane-->
						<!--begin::Tap pane-->
						<div class="tab-pane fade" id="kt_table_widget_5_tab_2">
							<!--begin::Table container-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
									<!--begin::Table head-->
									<thead>
										<tr class="border-0">
											<th class="p-0 w-50px"></th>
											<th class="p-0 min-w-150px"></th>
											<th class="p-0 min-w-140px"></th>
											<th class="p-0 min-w-110px"></th>
											<th class="p-0 min-w-50px"></th>
										</tr>
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/plurk.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad Simmons</a>
												<span class="text-muted fw-bold d-block">Movie Creator</span>
											</td>
											<td class="text-end text-muted fw-bold">React, HTML</td>
											<td class="text-end">
												<span class="badge badge-light-success">Approved</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/telegram.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular Authors</a>
												<span class="text-muted fw-bold d-block">Most Successful</span>
											</td>
											<td class="text-end text-muted fw-bold">Python, MySQL</td>
											<td class="text-end">
												<span class="badge badge-light-warning">In Progress</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/bebo.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active Customers</a>
												<span class="text-muted fw-bold d-block">Movie Creator</span>
											</td>
											<td class="text-end text-muted fw-bold">AngularJS, C#</td>
											<td class="text-end">
												<span class="badge badge-light-danger">Rejected</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
									</tbody>
									<!--end::Table body-->
								</table>
							</div>
							<!--end::Table-->
						</div>
						<!--end::Tap pane-->
						<!--begin::Tap pane-->
						<div class="tab-pane fade" id="kt_table_widget_5_tab_3">
							<!--begin::Table container-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
									<!--begin::Table head-->
									<thead>
										<tr class="border-0">
											<th class="p-0 w-50px"></th>
											<th class="p-0 min-w-150px"></th>
											<th class="p-0 min-w-140px"></th>
											<th class="p-0 min-w-110px"></th>
											<th class="p-0 min-w-50px"></th>
										</tr>
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/kickstarter.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Bestseller Theme</a>
												<span class="text-muted fw-bold d-block">Best Customers</span>
											</td>
											<td class="text-end text-muted fw-bold">ReactJS, Ruby</td>
											<td class="text-end">
												<span class="badge badge-light-warning">In Progress</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/bebo.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active Customers</a>
												<span class="text-muted fw-bold d-block">Movie Creator</span>
											</td>
											<td class="text-end text-muted fw-bold">AngularJS, C#</td>
											<td class="text-end">
												<span class="badge badge-light-danger">Rejected</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/vimeo.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">New Users</a>
												<span class="text-muted fw-bold d-block">Awesome Users</span>
											</td>
											<td class="text-end text-muted fw-bold">Laravel,Metronic</td>
											<td class="text-end">
												<span class="badge badge-light-primary">Success</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<div class="symbol symbol-45px me-2">
													<span class="symbol-label">
														<img src="{{ asset('assets/backend/media/svg/brand-logos/telegram.svg')}}" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td>
												<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular Authors</a>
												<span class="text-muted fw-bold d-block">Most Successful</span>
											</td>
											<td class="text-end text-muted fw-bold">Python, MySQL</td>
											<td class="text-end">
												<span class="badge badge-light-warning">In Progress</span>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
											</td>
										</tr>
									</tbody>
									<!--end::Table body-->
								</table>
							</div>
							<!--end::Table-->
						</div>
						<!--end::Tap pane-->
					</div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Tables Widget 5-->
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
</div>
<!--end::Container-->
@stop


@section('script')
<script src="{{ asset('assets/backend/js/custom/widgets.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/modals/create-app.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/modals/upgrade-plan.js')}}"></script>
@stop
