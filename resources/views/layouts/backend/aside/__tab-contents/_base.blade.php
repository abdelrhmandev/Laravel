<div class="aside-menu flex-column-fluid" id="kt_aside_menu">
<div class="hover-scroll-y my-2 my-lg-5 scroll-ms" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
    <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold" id="#kt_aside_menu" data-kt-menu="true">
        <div class="menu-item here show py-2">
            <span class="menu-link menu-center">
                <span class="menu-icon me-0">
                    <i class="ki-outline ki-home-2 fs-2x"></i>
                </span>
                <span class="menu-title"><a href="{{ route('admin.dashboard')}}">Home</a></span>
            </span>
        </div>
        @include('layouts.backend.aside.__tab-contents.includes.user')
        @include('layouts.backend.aside.__tab-contents.includes.cms')
        @include('layouts.backend.aside.__tab-contents.includes.pages')
        @include('layouts.backend.aside.__tab-contents.includes.faq')
        @include('layouts.backend.aside.__tab-contents.includes.client')
        @include('layouts.backend.aside.__tab-contents.includes.slider')
        @include('layouts.backend.aside.__tab-contents.includes.career')
        @include('layouts.backend.aside.__tab-contents.includes.city-area-district')
        @include('layouts.backend.aside.__tab-contents.includes.contacts')
        {{-- @include('layouts.backend.aside.__tab-contents.includes.settings') --}}
    </div>
</div>
</div>
