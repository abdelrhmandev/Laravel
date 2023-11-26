<div class="menu-item pt-5">
    <div class="menu-content">
        <span class="menu-heading fw-bold text-uppercase fs-7">{{ __('user.management') }}</span>
    </div>
</div>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                        fill="currentColor" />
                    <path opacity="0.3"
                        d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">{{ __('user.management') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('user.all') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('admin.users.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('user.all') }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link"
                        href="../../demo7/dist/apps/user-management/users/list.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('user.create') }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->

                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('role.all') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('admin.roles.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('role.all') }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('admin.roles.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('role.create') }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
        </div>




        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('permission.all') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('admin.permissions.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('permission.all') }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('admin.permissions.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('permission.create') }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->

        <!--end:Menu item-->
    </div>
</div>