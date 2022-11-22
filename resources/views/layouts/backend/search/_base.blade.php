		<!--begin::Search-->
        <div id="kt_header_search" class="header-search d-flex align-items-center w-100" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="false" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
            <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
            <form data-kt-search-element="form" class="w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                <!--begin::Hidden input(Added to disable form autocomplete)-->
                <input type="hidden" />
                <!--end::Hidden input-->
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-lg-3 svg-icon-gray-800 position-absolute top-50 translate-middle-y ms-5">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Input-->
                <input type="text" class="search-input form-control form-control-solid ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input" />
                <!--end::Input-->
                <!--begin::Spinner-->
                <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                    <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                </span>
                <!--end::Spinner-->
                <!--begin::Reset-->
                <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <!--end::Reset-->
            </form>
            <!--end::Form-->
            <!--begin::Menu-->
            <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown w-300px w-md-350px py-7 px-7 overflow-hidden">
                <!--begin::Wrapper-->
                <div data-kt-search-element="wrapper">
                    @include('layouts.backend.search.partials._main')
                    <!--begin::Empty-->
                    <div data-kt-search-element="empty" class="text-center d-none">
                        <!--begin::Icon-->
                        <div class="pt-10 pb-10">
                            <!--begin::Svg Icon | path: icons/duotune/files/fil024.svg-->
                            <span class="svg-icon svg-icon-4x opacity-50">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="currentColor" />
                                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                                    <rect x="13.6993" y="13.6656" width="4.42828" height="1.73089" rx="0.865447" transform="rotate(45 13.6993 13.6656)" fill="currentColor" />
                                    <path d="M15 12C15 14.2 13.2 16 11 16C8.8 16 7 14.2 7 12C7 9.8 8.8 8 11 8C13.2 8 15 9.8 15 12ZM11 9.6C9.68 9.6 8.6 10.68 8.6 12C8.6 13.32 9.68 14.4 11 14.4C12.32 14.4 13.4 13.32 13.4 12C13.4 10.68 12.32 9.6 11 9.6Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->
                        <!--begin::Message-->
                        <div class="pb-15 fw-semibold">
                            <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                            <div class="text-muted fs-7">Please try again with a different query</div>
                        </div>
                        <!--end::Message-->
                    </div>
                    <!--end::Empty-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Preferences-->
                <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
                    <!--begin::Heading-->
                    <h3 class="fw-semibold text-dark mb-7">Advanced Search</h3>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <input type="text" class="form-control form-control-sm form-control-solid" placeholder="Contains the word" name="query" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <!--begin::Radio group-->
                        <div class="nav-group nav-group-fluid">
                            <!--begin::Option-->
                            <label>
                                <input type="radio" class="btn-check" name="type" value="has" checked="checked" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">All</span>
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label>
                                <input type="radio" class="btn-check" name="type" value="users" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Users</span>
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label>
                                <input type="radio" class="btn-check" name="type" value="orders" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Orders</span>
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label>
                                <input type="radio" class="btn-check" name="type" value="projects" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Projects</span>
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Radio group-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <input type="text" name="assignedto" class="form-control form-control-sm form-control-solid" placeholder="Assigned to" value="" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <input type="text" name="collaborators" class="form-control form-control-sm form-control-solid" placeholder="Collaborators" value="" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <!--begin::Radio group-->
                        <div class="nav-group nav-group-fluid">
                            <!--begin::Option-->
                            <label>
                                <input type="radio" class="btn-check" name="attachment" value="has" checked="checked" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">Has attachment</span>
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label>
                                <input type="radio" class="btn-check" name="attachment" value="any" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Any</span>
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Radio group-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <select name="timezone" aria-label="Select a Timezone" data-control="select2" data-placeholder="date_period" class="form-select form-select-sm form-select-solid">
                            <option value="next">Within the next</option>
                            <option value="last">Within the last</option>
                            <option value="between">Between</option>
                            <option value="on">On</option>
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-6">
                            <input type="number" name="date_number" class="form-control form-control-sm form-control-solid" placeholder="Lenght" value="" />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-6">
                            <select name="date_typer" aria-label="Select a Timezone" data-control="select2" data-placeholder="Period" class="form-select form-select-sm form-select-solid">
                                <option value="days">Days</option>
                                <option value="weeks">Weeks</option>
                                <option value="months">Months</option>
                                <option value="years">Years</option>
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="advanced-options-form-cancel">Cancel</button>
                        <a href="../../demo7/dist/pages/search/horizontal.html" class="btn btn-sm fw-bold btn-primary" data-kt-search-element="advanced-options-form-search">Search</a>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Preferences-->
                <!--begin::Preferences-->
                <form data-kt-search-element="preferences" class="pt-1 d-none">
                    <!--begin::Heading-->
                    <h3 class="fw-semibold text-dark mb-7">Search Preferences</h3>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="pb-4 border-bottom">
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Projects</span>
                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="py-4 border-bottom">
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Targets</span>
                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="py-4 border-bottom">
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Affiliate Programs</span>
                            <input class="form-check-input" type="checkbox" value="1" />
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="py-4 border-bottom">
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Referrals</span>
                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="py-4 border-bottom">
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Users</span>
                            <input class="form-check-input" type="checkbox" value="1" />
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end pt-7">
                        <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="preferences-dismiss">Cancel</button>
                        <button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Preferences-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Search-->