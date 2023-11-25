<!--begin::Header-->
<div id="kt_header" style="" class="header align-items-stretch">
<!--begin::Container-->
<div class="container-fluid d-flex align-items-stretch justify-content-between">
	<!--begin::Aside mobile toggle-->
	<div class="d-flex align-items-center d-lg-none ms-n1 me-2" title="Show aside menu">
		<div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
			<i class="ki-outline ki-abstract-14 fs-1"></i>
		</div>
	</div>
	<!--end::Aside mobile toggle-->
	<!--begin::Mobile logo-->
	<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
		<a href="index.html" class="d-lg-none">
			<img alt="Logo" src="{{ asset('assets/backend/media/logos/demo6.svg')}}" class="h-25px" />
		</a>
	</div>
	<!--end::Mobile logo-->
	<!--begin::Wrapper-->
	<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
		<!--begin::Navbar-->
		<div class="d-flex align-items-stretch" id="kt_header_nav">
			<!--begin::Menu wrapper-->
			<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
				<!--begin::Menu-->
				<div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-700 menu-arrow-gray-500 fw-semibold my-5 my-lg-0 px-2 px-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
					<!--begin:Menu item-->
					<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
						<!--begin:Menu link-->
						<span class="menu-link py-3">
							<span class="menu-title">DashBoard Demo 2</span>
							<span class="menu-arrow d-lg-none"></span>
						</span>						
						
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-850px">
							<!--begin:Dashboards menu-->
							<div class="menu-state-bg menu-extended overflow-hidden overflow-lg-visible" data-kt-menu-dismiss="true">
								<!--begin:Row-->
								<div class="row">
									<!--begin:Col-->
									<div class="col-lg-8 mb-3 mb-lg-0 py-3 px-3 py-lg-6 px-lg-6">
										<!--begin:Row-->
										<div class="row">
											<!--begin:Col-->
											<div class="col-lg-6 mb-3">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="index.html" class="menu-link active">
														<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
															<i class="ki-outline ki-element-11 text-primary fs-1"></i>
														</span>
														<span class="d-flex flex-column">
															<span class="fs-6 fw-bold text-gray-800">Default</span>
															<span class="fs-7 fw-semibold text-muted">Reports & statistics</span>
														</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-6 mb-3">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="dashboards/ecommerce.html" class="menu-link">
														<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
															<i class="ki-outline ki-basket text-danger fs-1"></i>
														</span>
														<span class="d-flex flex-column">
															<span class="fs-6 fw-bold text-gray-800">eCommerce</span>
															<span class="fs-7 fw-semibold text-muted">Sales reports</span>
														</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-6 mb-3">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="dashboards/projects.html" class="menu-link">
														<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
															<i class="ki-outline ki-abstract-44 text-info fs-1"></i>
														</span>
														<span class="d-flex flex-column">
															<span class="fs-6 fw-bold text-gray-800">Projects</span>
															<span class="fs-7 fw-semibold text-muted">Tasts, graphs & charts</span>
														</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-6 mb-3">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="dashboards/online-courses.html" class="menu-link">
														<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
															<i class="ki-outline ki-color-swatch text-success fs-1"></i>
														</span>
														<span class="d-flex flex-column">
															<span class="fs-6 fw-bold text-gray-800">Online Courses</span>
															<span class="fs-7 fw-semibold text-muted">Student progress</span>
														</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-6 mb-3">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="dashboards/marketing.html" class="menu-link">
														<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
															<i class="ki-outline ki-chart-simple text-gray-900 fs-1"></i>
														</span>
														<span class="d-flex flex-column">
															<span class="fs-6 fw-bold text-gray-800">Marketing</span>
															<span class="fs-7 fw-semibold text-muted">Campaings & conversions</span>
														</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-6 mb-3">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="dashboards/bidding.html" class="menu-link">
														<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
															<i class="ki-outline ki-switch text-warning fs-1"></i>
														</span>
														<span class="d-flex flex-column">
															<span class="fs-6 fw-bold text-gray-800">Bidding</span>
															<span class="fs-7 fw-semibold text-muted">Campaings & conversions</span>
														</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-6 mb-3">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="dashboards/pos.html" class="menu-link">
														<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
															<i class="ki-outline ki-abstract-42 text-danger fs-1"></i>
														</span>
														<span class="d-flex flex-column">
															<span class="fs-6 fw-bold text-gray-800">POS System</span>
															<span class="fs-7 fw-semibold text-muted">Campaings & conversions</span>
														</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-6 mb-3">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="dashboards/call-center.html" class="menu-link">
														<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
															<i class="ki-outline ki-call text-primary fs-1"></i>
														</span>
														<span class="d-flex flex-column">
															<span class="fs-6 fw-bold text-gray-800">Call Center</span>
															<span class="fs-7 fw-semibold text-muted">Campaings & conversions</span>
														</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
										</div>
										<!--end:Row-->
										<div class="separator separator-dashed mx-5 my-5"></div>
										<!--begin:Landing-->
										<div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-2 mx-5">
											<div class="d-flex flex-column me-5">
												<div class="fs-6 fw-bold text-gray-800">Landing Page Template</div>
												<div class="fs-7 fw-semibold text-muted">Onpe page landing template with pricing & others</div>
											</div>
											<a href="landing.html" class="btn btn-sm btn-primary fw-bold">Explore</a>
										</div>
										<!--end:Landing-->
									</div>
									<!--end:Col-->
									<!--begin:Col-->
									<div class="menu-more bg-light col-lg-4 py-3 px-3 py-lg-6 px-lg-6 rounded-end">
										<!--begin:Heading-->
										<h4 class="fs-6 fs-lg-4 text-gray-800 fw-bold mt-3 mb-3 ms-4">More Dashboards</h4>
										<!--end:Heading-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/logistics.html" class="menu-link py-2">
												<span class="menu-title">Logistics</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/website-analytics.html" class="menu-link py-2">
												<span class="menu-title">Website Analytics</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/finance-performance.html" class="menu-link py-2">
												<span class="menu-title">Finance Performance</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/store-analytics.html" class="menu-link py-2">
												<span class="menu-title">Store Analytics</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/social.html" class="menu-link py-2">
												<span class="menu-title">Social</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/delivery.html" class="menu-link py-2">
												<span class="menu-title">Delivery</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/crypto.html" class="menu-link py-2">
												<span class="menu-title">Crypto</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/school.html" class="menu-link py-2">
												<span class="menu-title">School</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item p-0 m-0">
											<!--begin:Menu link-->
											<a href="dashboards/podcast.html" class="menu-link py-2">
												<span class="menu-title">Podcast</span>
											</a>
											<!--end:Menu link-->
										</div>
										<!--end:Menu item-->
									</div>
									<!--end:Col-->
								</div>
								<!--end:Row-->
							</div>
							<!--end:Dashboards menu-->
						</div>
						<!--end:Menu sub-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
						<!--begin:Menu link-->
						<span class="menu-link py-3">
							<span class="menu-title">Pages Demo 2</span>
							<span class="menu-arrow d-lg-none"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0">
							<!--begin:Pages menu-->
							<div class="menu-active-bg px-4 px-lg-0">
								<!--begin:Tabs nav-->
								<div class="d-flex w-100 overflow-auto">
									<ul class="nav nav-stretch nav-line-tabs fw-bold fs-6 p-0 p-lg-10 flex-nowrap flex-grow-1">
										<!--begin:Nav item-->
										<li class="nav-item mx-lg-1">
											<a class="nav-link py-3 py-lg-6 active text-active-primary" href="#" data-bs-toggle="tab" data-bs-target="#kt_app_header_menu_pages_pages">General</a>
										</li>
										<!--end:Nav item-->
										<!--begin:Nav item-->
										<li class="nav-item mx-lg-1">
											<a class="nav-link py-3 py-lg-6 text-active-primary" href="#" data-bs-toggle="tab" data-bs-target="#kt_app_header_menu_pages_account">Account</a>
										</li>
										<!--end:Nav item-->
										<!--begin:Nav item-->
										<li class="nav-item mx-lg-1">
											<a class="nav-link py-3 py-lg-6 text-active-primary" href="#" data-bs-toggle="tab" data-bs-target="#kt_app_header_menu_pages_authentication">Authentication</a>
										</li>
										<!--end:Nav item-->
										<!--begin:Nav item-->
										<li class="nav-item mx-lg-1">
											<a class="nav-link py-3 py-lg-6 text-active-primary" href="#" data-bs-toggle="tab" data-bs-target="#kt_app_header_menu_pages_utilities">Utilities</a>
										</li>
										<!--end:Nav item-->
										<!--begin:Nav item-->
										<li class="nav-item mx-lg-1">
											<a class="nav-link py-3 py-lg-6 text-active-primary" href="#" data-bs-toggle="tab" data-bs-target="#kt_app_header_menu_pages_widgets">Widgets</a>
										</li>
										<!--end:Nav item-->
									</ul>
								</div>
								<!--end:Tabs nav-->
								<!--begin:Tab content-->
								<div class="tab-content py-4 py-lg-8 px-lg-7">
									<!--begin:Tab pane-->
									<div class="tab-pane active w-lg-1000px" id="kt_app_header_menu_pages_pages">
										<!--begin:Row-->
										<div class="row">
											<!--begin:Col-->
											<div class="col-lg-8">
												<!--begin:Row-->
												<div class="row">
													<!--begin:Col-->
													<div class="col-lg-3 mb-6 mb-lg-0">
														<!--begin:Menu heading-->
														<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">User Profile</h4>
														<!--end:Menu heading-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="pages/user-profile/overview.html" class="menu-link">
																<span class="menu-title">Overview</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="pages/user-profile/projects.html" class="menu-link">
																<span class="menu-title">Projects</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="pages/user-profile/campaigns.html" class="menu-link">
																<span class="menu-title">Campaigns</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="pages/user-profile/documents.html" class="menu-link">
																<span class="menu-title">Documents</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="pages/user-profile/followers.html" class="menu-link">
																<span class="menu-title">Followers</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="pages/user-profile/activity.html" class="menu-link">
																<span class="menu-title">Activity</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
													</div>
													<!--end:Col-->
													<!--begin:Col-->
													<div class="col-lg-3 mb-6 mb-lg-0">
														<!--begin:Menu section-->
														<div class="mb-6">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Corporate</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/about.html" class="menu-link">
																	<span class="menu-title">About</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/team.html" class="menu-link">
																	<span class="menu-title">Our Team</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/contact.html" class="menu-link">
																	<span class="menu-title">Contact Us</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/licenses.html" class="menu-link">
																	<span class="menu-title">Licenses</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/sitemap.html" class="menu-link">
																	<span class="menu-title">Sitemap</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
														<!--begin:Menu section-->
														<div class="mb-0">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Careers</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/careers/list.html" class="menu-link">
																	<span class="menu-title">Careers List</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/careers/apply.html" class="menu-link">
																	<span class="menu-title">Careers Apply</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
													</div>
													<!--end:Col-->
													<!--begin:Col-->
													<div class="col-lg-3 mb-6 mb-lg-0">
														<!--begin:Menu section-->
														<div class="mb-6">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">FAQ</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/faq/classic.html" class="menu-link">
																	<span class="menu-title">FAQ Classic</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/faq/extended.html" class="menu-link">
																	<span class="menu-title">FAQ Extended</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
														<!--begin:Menu section-->
														<div class="mb-6">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Blog</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/blog/home.html" class="menu-link">
																	<span class="menu-title">Blog Home</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/blog/post.html" class="menu-link">
																	<span class="menu-title">Blog Post</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
														<!--begin:Menu section-->
														<div class="mb-0">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Pricing</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/pricing.html" class="menu-link">
																	<span class="menu-title">Column Pricing</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/pricing/table.html" class="menu-link">
																	<span class="menu-title">Table Pricing</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
													</div>
													<!--end:Col-->
													<!--begin:Col-->
													<div class="col-lg-3 mb-6 mb-lg-0">
														<!--begin:Menu section-->
														<div class="mb-0">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Social</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/social/feeds.html" class="menu-link">
																	<span class="menu-title">Feeds</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/social/activity.html" class="menu-link">
																	<span class="menu-title">Activty</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/social/followers.html" class="menu-link">
																	<span class="menu-title">Followers</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="pages/social/settings.html" class="menu-link">
																	<span class="menu-title">Settings</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
													</div>
													<!--end:Col-->
												</div>
												<!--end:Row-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-4">
												<img src="assets/media/stock/600x600/img-82.jpg" class="rounded mw-100" alt="" />
											</div>
											<!--end:Col-->
										</div>
										<!--end:Row-->
									</div>
									<!--end:Tab pane-->
									<!--begin:Tab pane-->
									<div class="tab-pane w-lg-600px" id="kt_app_header_menu_pages_account">
										<!--begin:Row-->
										<div class="row">
											<!--begin:Col-->
											<div class="col-lg-5 mb-6 mb-lg-0">
												<!--begin:Row-->
												<div class="row">
													<!--begin:Col-->
													<div class="col-lg-6">
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/overview.html" class="menu-link">
																<span class="menu-title">Overview</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/settings.html" class="menu-link">
																<span class="menu-title">Settings</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/security.html" class="menu-link">
																<span class="menu-title">Security</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/activity.html" class="menu-link">
																<span class="menu-title">Activity</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/billing.html" class="menu-link">
																<span class="menu-title">Billing</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
													</div>
													<!--end:Col-->
													<!--begin:Col-->
													<div class="col-lg-6">
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/statements.html" class="menu-link">
																<span class="menu-title">Statements</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/referrals.html" class="menu-link">
																<span class="menu-title">Referrals</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/api-keys.html" class="menu-link">
																<span class="menu-title">API Keys</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
														<!--begin:Menu item-->
														<div class="menu-item p-0 m-0">
															<!--begin:Menu link-->
															<a href="account/logs.html" class="menu-link">
																<span class="menu-title">Logs</span>
															</a>
															<!--end:Menu link-->
														</div>
														<!--end:Menu item-->
													</div>
													<!--end:Col-->
												</div>
												<!--end:Row-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-7">
												<img src="assets/media/stock/900x600/46.jpg" class="rounded mw-100" alt="" />
											</div>
											<!--end:Col-->
										</div>
										<!--end:Row-->
									</div>
									<!--end:Tab pane-->
									<!--begin:Tab pane-->
									<div class="tab-pane w-lg-1000px" id="kt_app_header_menu_pages_authentication">
										<!--begin:Row-->
										<div class="row">
											<!--begin:Col-->
											<div class="col-lg-3 mb-6 mb-lg-0">
												<!--begin:Menu section-->
												<div class="mb-6">
													<!--begin:Menu heading-->
													<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Corporate Layout</h4>
													<!--end:Menu heading-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/corporate/sign-in.html" class="menu-link">
															<span class="menu-title">Sign-In</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/corporate/sign-up.html" class="menu-link">
															<span class="menu-title">Sign-Up</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/corporate/two-factor.html" class="menu-link">
															<span class="menu-title">Two-Factor</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/corporate/reset-password.html" class="menu-link">
															<span class="menu-title">Reset Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/corporate/new-password.html" class="menu-link">
															<span class="menu-title">New Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
												</div>
												<!--end:Menu section-->
												<!--begin:Menu section-->
												<div class="mb-0">
													<!--begin:Menu heading-->
													<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Overlay Layout</h4>
													<!--end:Menu heading-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/overlay/sign-in.html" class="menu-link">
															<span class="menu-title">Sign-In</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/overlay/sign-up.html" class="menu-link">
															<span class="menu-title">Sign-Up</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/overlay/two-factor.html" class="menu-link">
															<span class="menu-title">Two-Factor</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/overlay/reset-password.html" class="menu-link">
															<span class="menu-title">Reset Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/overlay/new-password.html" class="menu-link">
															<span class="menu-title">New Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
												</div>
												<!--end:Menu section-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-3 mb-6 mb-lg-0">
												<!--begin:Menu section-->
												<div class="mb-6">
													<!--begin:Menu heading-->
													<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Creative Layout</h4>
													<!--end:Menu heading-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/creative/sign-in.html" class="menu-link">
															<span class="menu-title">Sign-in</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/creative/sign-up.html" class="menu-link">
															<span class="menu-title">Sign-up</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/creative/two-factor.html" class="menu-link">
															<span class="menu-title">Two-Factor</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/creative/reset-password.html" class="menu-link">
															<span class="menu-title">Reset Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/creative/new-password.html" class="menu-link">
															<span class="menu-title">New Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
												</div>
												<!--end:Menu section-->
												<!--begin:Menu section-->
												<div class="mb-6">
													<!--begin:Menu heading-->
													<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Fancy Layout</h4>
													<!--end:Menu heading-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/fancy/sign-in.html" class="menu-link">
															<span class="menu-title">Sign-In</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/fancy/sign-up.html" class="menu-link">
															<span class="menu-title">Sign-Up</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/fancy/two-factor.html" class="menu-link">
															<span class="menu-title">Two-Factor</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/fancy/reset-password.html" class="menu-link">
															<span class="menu-title">Reset Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/layouts/fancy/new-password.html" class="menu-link">
															<span class="menu-title">New Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
												</div>
												<!--end:Menu section-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-3 mb-6 mb-lg-0">
												<!--begin:Menu section-->
												<div class="mb-0">
													<!--begin:Menu heading-->
													<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">General</h4>
													<!--end:Menu heading-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/extended/multi-steps-sign-up.html" class="menu-link">
															<span class="menu-title">Multi-Steps Sign-Up</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/general/welcome.html" class="menu-link">
															<span class="menu-title">Welcome Message</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/general/verify-email.html" class="menu-link">
															<span class="menu-title">Verify Email</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/general/coming-soon.html" class="menu-link">
															<span class="menu-title">Coming Soon</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/general/password-confirmation.html" class="menu-link">
															<span class="menu-title">Password Confirmation</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/general/account-deactivated.html" class="menu-link">
															<span class="menu-title">Account Deactivation</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/general/error-404.html" class="menu-link">
															<span class="menu-title">Error 404</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/general/error-500.html" class="menu-link">
															<span class="menu-title">Error 500</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
												</div>
												<!--end:Menu section-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-3 mb-6 mb-lg-0">
												<!--begin:Menu section-->
												<div class="mb-0">
													<!--begin:Menu heading-->
													<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Email Templates</h4>
													<!--end:Menu heading-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/email/welcome-message.html" class="menu-link">
															<span class="menu-title">Welcome Message</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/email/reset-password.html" class="menu-link">
															<span class="menu-title">Reset Password</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/email/subscription-confirmed.html" class="menu-link">
															<span class="menu-title">Subscription Confirmed</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/email/card-declined.html" class="menu-link">
															<span class="menu-title">Credit Card Declined</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/email/promo-1.html" class="menu-link">
															<span class="menu-title">Promo 1</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/email/promo-2.html" class="menu-link">
															<span class="menu-title">Promo 2</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
													<!--begin:Menu item-->
													<div class="menu-item p-0 m-0">
														<!--begin:Menu link-->
														<a href="authentication/email/promo-3.html" class="menu-link">
															<span class="menu-title">Promo 3</span>
														</a>
														<!--end:Menu link-->
													</div>
													<!--end:Menu item-->
												</div>
												<!--end:Menu section-->
											</div>
											<!--end:Col-->
										</div>
										<!--end:Row-->
									</div>
									<!--end:Tab pane-->
									<!--begin:Tab pane-->
									<div class="tab-pane w-lg-1000px" id="kt_app_header_menu_pages_utilities">
										<!--begin:Row-->
										<div class="row">
											<!--begin:Col-->
											<div class="col-lg-7">
												<!--begin:Row-->
												<div class="row">
													<!--begin:Col-->
													<div class="col-lg-4 mb-6 mb-lg-0">
														<!--begin:Menu section-->
														<div class="mb-0">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">General Modals</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/general/invite-friends.html" class="menu-link">
																	<span class="menu-title">Invite Friends</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/general/view-users.html" class="menu-link">
																	<span class="menu-title">View Users</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/general/select-users.html" class="menu-link">
																	<span class="menu-title">Select Users</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/general/upgrade-plan.html" class="menu-link">
																	<span class="menu-title">Upgrade Plan</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/general/share-earn.html" class="menu-link">
																	<span class="menu-title">Share & Earn</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/forms/new-target.html" class="menu-link">
																	<span class="menu-title">New Target</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/forms/new-card.html" class="menu-link">
																	<span class="menu-title">New Card</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/forms/new-address.html" class="menu-link">
																	<span class="menu-title">New Address</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/forms/create-api-key.html" class="menu-link">
																	<span class="menu-title">Create API Key</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/forms/bidding.html" class="menu-link">
																	<span class="menu-title">Bidding</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
													</div>
													<!--end:Col-->
													<!--begin:Col-->
													<div class="col-lg-4 mb-6 mb-lg-0">
														<!--begin:Menu section-->
														<div class="mb-6">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Advanced Modals</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/wizards/create-app.html" class="menu-link">
																	<span class="menu-title">Create App</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/wizards/create-campaign.html" class="menu-link">
																	<span class="menu-title">Create Campaign</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/wizards/create-account.html" class="menu-link">
																	<span class="menu-title">Create Business Acc</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/wizards/create-project.html" class="menu-link">
																	<span class="menu-title">Create Project</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/wizards/top-up-wallet.html" class="menu-link">
																	<span class="menu-title">Top Up Wallet</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/wizards/offer-a-deal.html" class="menu-link">
																	<span class="menu-title">Offer a Deal</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/wizards/two-factor-authentication.html" class="menu-link">
																	<span class="menu-title">Two Factor Auth</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
														<!--begin:Menu section-->
														<div class="mb-0">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Search</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/search/horizontal.html" class="menu-link">
																	<span class="menu-title">Horizontal</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/search/vertical.html" class="menu-link">
																	<span class="menu-title">Vertical</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/search/users.html" class="menu-link">
																	<span class="menu-title">Users</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/search/select-location.html" class="menu-link">
																	<span class="menu-title">Select Location</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
													</div>
													<!--end:Col-->
													<!--begin:Col-->
													<div class="col-lg-4 mb-6 mb-lg-0">
														<!--begin:Menu section-->
														<div class="mb-0">
															<!--begin:Menu heading-->
															<h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Wizards</h4>
															<!--end:Menu heading-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/wizards/horizontal.html" class="menu-link">
																	<span class="menu-title">Horizontal</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/wizards/vertical.html" class="menu-link">
																	<span class="menu-title">Vertical</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/wizards/two-factor-authentication.html" class="menu-link">
																	<span class="menu-title">Two Factor Auth</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/wizards/create-app.html" class="menu-link">
																	<span class="menu-title">Create App</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/wizards/create-campaign.html" class="menu-link">
																	<span class="menu-title">Create Campaign</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/wizards/create-account.html" class="menu-link">
																	<span class="menu-title">Create Account</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/wizards/create-project.html" class="menu-link">
																	<span class="menu-title">Create Project</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/modals/wizards/top-up-wallet.html" class="menu-link">
																	<span class="menu-title">Top Up Wallet</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
															<!--begin:Menu item-->
															<div class="menu-item p-0 m-0">
																<!--begin:Menu link-->
																<a href="utilities/wizards/offer-a-deal.html" class="menu-link">
																	<span class="menu-title">Offer a Deal</span>
																</a>
																<!--end:Menu link-->
															</div>
															<!--end:Menu item-->
														</div>
														<!--end:Menu section-->
													</div>
													<!--end:Col-->
												</div>
												<!--end:Row-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-5 pe-lg-5">
												<img src="assets/media/stock/600x600/img-84.jpg" class="rounded mw-100" alt="" />
											</div>
											<!--end:Col-->
										</div>
										<!--end:Row-->
									</div>
									<!--end:Tab pane-->
									<!--begin:Tab pane-->
									<div class="tab-pane w-lg-500px" id="kt_app_header_menu_pages_widgets">
										<!--begin:Row-->
										<div class="row">
											<!--begin:Col-->
											<div class="col-lg-4 mb-6 mb-lg-0">
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="widgets/lists.html" class="menu-link">
														<span class="menu-title">Lists</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="widgets/statistics.html" class="menu-link">
														<span class="menu-title">Statistics</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="widgets/charts.html" class="menu-link">
														<span class="menu-title">Charts</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="widgets/mixed.html" class="menu-link">
														<span class="menu-title">Mixed</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="widgets/tables.html" class="menu-link">
														<span class="menu-title">Tables</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
												<!--begin:Menu item-->
												<div class="menu-item p-0 m-0">
													<!--begin:Menu link-->
													<a href="widgets/feeds.html" class="menu-link">
														<span class="menu-title">Feeds</span>
													</a>
													<!--end:Menu link-->
												</div>
												<!--end:Menu item-->
											</div>
											<!--end:Col-->
											<!--begin:Col-->
											<div class="col-lg-8">
												<img src="assets/media/stock/900x600/44.jpg" class="rounded mw-100" alt="" />
											</div>
											<!--end:Col-->
										</div>
										<!--end:Row-->
									</div>
									<!--end:Tab pane-->
								</div>
								<!--end:Tab content-->
							</div>
							<!--end:Pages menu-->
						</div>
						<!--end:Menu sub-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
						<!--begin:Menu link-->
						<span class="menu-link py-3">
							<span class="menu-title">Apps</span>
							<span class="menu-arrow d-lg-none"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px">
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-rocket fs-2"></i>
									</span>
									<span class="menu-title">Projects</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/projects/list.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">My Projects</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/projects/project.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">View Project</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/projects/targets.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Targets</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/projects/budget.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Budget</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/projects/users.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Users</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/projects/files.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Files</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/projects/activity.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Activity</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/projects/settings.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Settings</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-handcart fs-2"></i>
									</span>
									<span class="menu-title">eCommerce</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Catalog</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/catalog/products.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Products</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/catalog/categories.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Categories</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/catalog/add-product.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Add Product</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/catalog/edit-product.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Edit Product</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/catalog/add-category.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Add Category</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/catalog/edit-category.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Edit Category</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion menu-sub-indention">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Sales</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/sales/listing.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Orders Listing</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/sales/details.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Order Details</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/sales/add-order.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Add Order</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/sales/edit-order.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Edit Order</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion menu-sub-indention">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Customers</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/customers/listing.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Customers Listing</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/customers/details.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Customers Details</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion menu-sub-indention">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Reports</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/reports/view.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Products Viewed</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/reports/sales.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Sales</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/reports/returns.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Returns</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/reports/customer-orders.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Customer Orders</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/ecommerce/reports/shipping.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Shipping</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/ecommerce/settings.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Settings</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-chart fs-2"></i>
									</span>
									<span class="menu-title">Support Center</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/support-center/overview.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Overview</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Tickets</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/support-center/tickets/list.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Ticket List</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/support-center/tickets/view.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Ticket View</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Tutorials</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/support-center/tutorials/list.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Tutorials List</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/support-center/tutorials/post.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Tutorials Post</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/support-center/faq.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">FAQ</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/support-center/licenses.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Licenses</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/support-center/contact.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Contact Us</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-shield-tick fs-2"></i>
									</span>
									<span class="menu-title">User Management</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Users</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/user-management/users/list.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Users List</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/user-management/users/view.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">View User</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Roles</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/user-management/roles/list.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Roles List</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/user-management/roles/view.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">View Roles</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/user-management/permissions.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Permissions</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-phone fs-2"></i>
									</span>
									<span class="menu-title">Contacts</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/contacts/getting-started.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Getting Started</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/contacts/add-contact.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Add Contact</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/contacts/edit-contact.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Edit Contact</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/contacts/view-contact.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">View Contact</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-basket fs-2"></i>
									</span>
									<span class="menu-title">Subscriptions</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/subscriptions/getting-started.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Getting Started</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/subscriptions/list.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Subscription List</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/subscriptions/add.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Add Subscription</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/subscriptions/view.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">View Subscription</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-briefcase fs-2"></i>
									</span>
									<span class="menu-title">Customers</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/customers/getting-started.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Getting Started</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/customers/list.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Customer Listing</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/customers/view.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Customer Details</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-credit-cart fs-2"></i>
									</span>
									<span class="menu-title">Invoice Management</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
										<!--begin:Menu link-->
										<span class="menu-link py-3">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Profile</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/invoices/view/invoice-1.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Invoice 1</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/invoices/view/invoice-2.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Invoice 2</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link py-3" href="apps/invoices/view/invoice-3.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Invoice 3</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/invoices/create.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Create Invoice</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-file-added fs-2"></i>
									</span>
									<span class="menu-title">File Manager</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/file-manager/folders.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Folders</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/file-manager/files.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Files</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/file-manager/blank.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Blank Directory</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/file-manager/settings.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Settings</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-sms fs-2"></i>
									</span>
									<span class="menu-title">Inbox</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/inbox/listing.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Messages</span>
											<span class="menu-badge">
												<span class="badge badge-light-success">3</span>
											</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/inbox/compose.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Compose</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/inbox/reply.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">View & Reply</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'ar') ? 'left':'right' }}-start" class="menu-item menu-lg-down-accordion">
								<!--begin:Menu link-->
								<span class="menu-link py-3">
									<span class="menu-icon">
										<i class="ki-outline ki-message-text-2 fs-2"></i>
									</span>
									<span class="menu-title">Chat</span>
									<span class="menu-arrow"></span>
								</span>
								<!--end:Menu link-->
								<!--begin:Menu sub-->
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/chat/private.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Private Chat</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/chat/group.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Group Chat</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link py-3" href="apps/chat/drawer.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Drawer Chat</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
								<!--end:Menu sub-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link py-3" href="apps/calendar.html">
									<span class="menu-icon">
										<i class="ki-outline ki-calendar-8 fs-2"></i>
									</span>
									<span class="menu-title">Calendar</span>
								</a>
								<!--end:Menu link-->
							</div>
							<!--end:Menu item-->
						</div>
						<!--end:Menu sub-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
						<!--begin:Menu link-->
						<span class="menu-link py-3">
							<span class="menu-title">Help</span>
							<span class="menu-arrow d-lg-none"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link py-3" href="https://preview.keenthemes.com/html/metronic/docs/base/utilities" target="_blank" title="Check out over 200 in-house components, plugins and ready for use solutions" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon">
										<i class="ki-outline ki-rocket fs-2"></i>
									</span>
									<span class="menu-title">Components</span>
								</a>
								<!--end:Menu link-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link py-3" href="https://preview.keenthemes.com/html/metronic/docs" target="_blank" title="Check out the complete documentation" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon">
										<i class="ki-outline ki-abstract-26 fs-2"></i>
									</span>
									<span class="menu-title">Documentation</span>
								</a>
								<!--end:Menu link-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link py-3" href="https://preview.keenthemes.com/metronic8/demo6/layout-builder.html" title="Build your layout and export HTML for server side integration" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon">
										<i class="ki-outline ki-switch fs-2"></i>
									</span>
									<span class="menu-title">Layout Builder</span>
								</a>
								<!--end:Menu link-->
							</div>
							<!--end:Menu item-->
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link py-3" href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog" target="_blank">
									<span class="menu-icon">
										<i class="ki-outline ki-code fs-2"></i>
									</span>
									<span class="menu-title">Changelog v8.2.1</span>
								</a>
								<!--end:Menu link-->
							</div>
							<!--end:Menu item-->
						</div>
						<!--end:Menu sub-->
					</div>
					<!--end:Menu item-->
				</div>
				<!--end::Menu-->
			</div>
			<!--end::Menu wrapper-->
		</div>
		<!--end::Navbar-->
		<!--begin::Toolbar wrapper-->
		<div class="d-flex align-items-stretch flex-shrink-0">
			<!--begin::Search-->
			<div class="d-flex align-items-stretch ms-1 ms-lg-3">
				<!--begin::Search-->
				@include('layouts.backend.search._base')
				<!--end::Search-->
			</div>
			<!--end::Search-->
			<!--begin::Activities-->
			<div class="d-flex align-items-center ms-1 ms-lg-3">
				<!--begin::Drawer toggle-->
				<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_activities_toggle">
					<i class="ki-outline ki-notification-bing fs-1"></i>
				</div>
				<!--end::Drawer toggle-->
			</div>
			<!--end::Activities-->
			<!--begin::Quick links-->
			<div class="d-flex align-items-center ms-1 ms-lg-3">
				<!--begin::Menu wrapper-->
				<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
					<i class="ki-outline ki-tablet-ok fs-1"></i>
				</div>
				<!--begin::Menu-->
				@include('layouts.backend.aside.__tab-contents.__tasks')
				<!--end::Menu-->
				<!--end::Menu wrapper-->
			</div>
			<!--end::Quick links-->
			<!--begin::Chat-->
			<div class="d-flex align-items-center ms-1 ms-lg-3">
				<!--begin::Menu wrapper-->
				<div class="btn btn-icon btn-active-light-primary position-relative btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px pulse pulse-success" id="kt_drawer_chat_toggle">
					<i class="ki-outline ki-notification-2 fs-1"></i>
					<span class="pulse-ring w-45px h-45px"></span>
				</div>
				<!--end::Menu wrapper-->
			</div>
			<!--end::Chat-->
			<!--begin::Notifications-->
			@include('layouts.backend.aside.__tab-contents.__notifications')
			<!--end::Notifications-->
			<!--begin::Theme mode-->
			<div class="d-flex align-items-center ms-1 ms-lg-3">
				<!--begin::Menu toggle-->
				<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
					<i class="ki-outline ki-night-day theme-light-show fs-1"></i>
					<i class="ki-outline ki-moon theme-dark-show fs-1"></i>
				</a>
				<!--begin::Menu toggle-->
				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-outline ki-night-day fs-2"></i>
							</span>
							<span class="menu-title">Light</span>
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-outline ki-moon fs-2"></i>
							</span>
							<span class="menu-title">Dark</span>
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-outline ki-screen fs-2"></i>
							</span>
							<span class="menu-title">System</span>
						</a>
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::Menu-->
			</div>
			<!--end::Theme mode-->
			<!--begin::User menu-->
			<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
				<!--begin::Menu wrapper-->
				<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
					<img src="assets/media/avatars/300-1.jpg" alt="image" />
				</div>
				<!--begin::User account menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
					<!--begin::Menu item-->
					<div class="menu-item px-3">
						<div class="menu-content d-flex align-items-center px-3">
							<!--begin::Avatar-->
							<div class="symbol symbol-50px me-5">
								<img alt="Logo" src="assets/media/avatars/300-1.jpg" />
							</div>
							<!--end::Avatar-->
							<!--begin::Username-->
							<div class="d-flex flex-column">
								<div class="fw-bold d-flex align-items-center fs-5">Max Smith 
								<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
								<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
							</div>
							<!--end::Username-->
						</div>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu separator-->
					<div class="separator my-2"></div>
					<!--end::Menu separator-->
					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="account/overview.html" class="menu-link px-5">My Profile</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="apps/projects/list.html" class="menu-link px-5">
							<span class="menu-text">My Projects</span>
							<span class="menu-badge">
								<span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
							</span>
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'en') ? 'left':'right' }}-start" data-kt-menu-offset="-15px, 0">
						<a href="#" class="menu-link px-5">
							<span class="menu-title">My Subscription</span>
							<span class="menu-arrow"></span>
						</a>
						<!--begin::Menu sub-->
						<div class="menu-sub menu-sub-dropdown w-175px py-4">
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="account/referrals.html" class="menu-link px-5">Referrals</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="account/billing.html" class="menu-link px-5">Billing</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="account/statements.html" class="menu-link px-5">Payments</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="account/statements.html" class="menu-link d-flex flex-stack px-5">Statements 
								<span class="ms-2 lh-0" data-bs-toggle="tooltip" title="View your statements">
									<i class="ki-outline ki-information-5 fs-5"></i>
								</span></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu separator-->
							<div class="separator my-2"></div>
							<!--end::Menu separator-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<div class="menu-content px-3">
									<label class="form-check form-switch form-check-custom form-check-solid">
										<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
										<span class="form-check-label text-muted fs-7">Notifications</span>
									</label>
								</div>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu sub-->
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="account/statements.html" class="menu-link px-5">My Statements</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu separator-->
					<div class="separator my-2"></div>
					<!--end::Menu separator-->
					<!--begin::Menu item-->
					<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="{{ (app()->getLocale() === 'en') ? 'left':'right' }}-start" data-kt-menu-offset="-15px, 0">
						<a href="#" class="menu-link px-5">
							<span class="menu-title position-relative">{{ __('admin.language')}} 
							<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ LaravelLocalization::getCurrentLocaleName() }} 
							<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('assets/backend/media/flags/'.strtolower(LaravelLocalization::getCurrentLocale().".svg"))}}" alt="" /></span></span>
						</a>
						<!--begin::Menu sub-->
						<div class="menu-sub menu-sub-dropdown w-175px py-4">
							<!--begin::Menu item-->
							@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
							<div class="menu-item px-3">
								<a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="menu-link d-flex px-5 active">
								<span class="symbol symbol-20px me-4">
									<img class="rounded-1" src="{{ asset('assets/backend/media/flags/'.strtolower($localeCode.".svg"))}}" alt="" />
								</span>{{ $properties['native'] }}</a>
							</div>
							@endforeach
							<!--end::Menu item-->
						</div>
						<!--end::Menu sub-->
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-5 my-1">
						<a href="{{ route('admin.profile') }}" class="menu-link px-5">{{ __('admin.profile')}}</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-5">
						<a href="{{ route('admin.logout') }}" class="menu-link px-5">{{ __('admin.logout')}}</a>
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::User account menu-->
				<!--end::Menu wrapper-->
			</div>
			<!--end::User menu-->
			<!--begin::Heaeder menu toggle-->
			<div class="d-flex align-items-center d-lg-none ms-2 me-n2" title="Show header menu">
				<div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
					<i class="ki-outline ki-burger-menu-2 fs-1"></i>
				</div>
			</div>
			<!--end::Heaeder menu toggle-->
		</div>
		<!--end::Toolbar wrapper-->
	</div>
	<!--end::Wrapper-->
</div>
<!--end::Container-->
</div>
<!--end::Header-->
					

