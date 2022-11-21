<!--begin::Aside-->
<div id="kt_aside" class="aside aside-extended bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
	<!--begin::Primary-->
	<div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
		<!--begin::Logo-->
		<div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
			<a href="../../demo7/dist/index.html">
				<img alt="Logo" src="{{ asset('assets/backend/media/logos/logo-demo7.svg')}}" class="h-35px" />
			</a>
		</div>
		<!--end::Logo-->
		<!--begin::Nav-->
		<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
			<!--begin::Wrapper-->
			@include('layouts.backend.aside.__tabs') 
			<!--end::Nav-->
		</div>
		<!--end::Nav-->
		<!--begin::Footer-->
		<div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
<!--begin::Quick links-->
 
<!--end::Quick links-->
			<!--begin::Notifications-->
		 
			<!--end::User-->
		</div>
		<!--end::Footer-->

	</div>
	<!--end::Primary-->
	<!--begin::Secondary-->
 
	<!--end::Secondary-->
	<!--begin::Aside Toggle-->
 
	<!--end::Aside Toggle-->
</div>
<!--end::Aside-->