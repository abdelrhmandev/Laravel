<!--begin::Aside menu-->
<div class="aside-menu flex-column-fluid" id="kt_aside_menu">
<!--begin::Aside Menu-->
<div class="hover-scroll-y my-2 my-lg-5 scroll-ms" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold" id="#kt_aside_menu" data-kt-menu="true">
        <!--begin:Menu item-->
        <div class="menu-item here show py-2">
            <!--begin:Menu link-->
            <span class="menu-link menu-center">
                <span class="menu-icon me-0">
                    <i class="ki-outline ki-home-2 fs-2x"></i>
                </span>
                <span class="menu-title"><a href="dsdsad">Home</a></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->         
            <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->


        @include('layouts.backend.aside.__tab-contents.includes.user')
        @include('layouts.backend.aside.__tab-contents.includes.cms')
        @include('layouts.backend.aside.__tab-contents.includes.pages')
        @include('layouts.backend.aside.__tab-contents.includes.city-area-district')
 

        

    </div>
    <!--end::Menu-->
</div>
<!--end::Aside Menu-->
</div>
<!--end::Aside menu-->
