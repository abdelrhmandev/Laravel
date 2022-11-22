@extends('backend.base.base')
@section('style')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
	<!--begin::Container-->
  <div class="container-xxl" id="kt_content_container">
    <!--begin::Products-->
    <div class="card card-flush">
      <!--begin::Card header-->
      <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
          <!--begin::Search-->
          <div class="d-flex align-items-center position-relative my-1">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-1 position-absolute ms-4">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
              </svg>
            </span>
            <!--end::Svg Icon-->
            <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Recipe" />
          </div>
          <!--end::Search-->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
          <!--begin::Flatpickr-->
          <div class="input-group w-250px">
            <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
            <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor" />
                  <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </button>
          </div>
          <!--end::Flatpickr-->
          <div class="w-100 mw-150px">
            <!--begin::Select2-->
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
              <option></option>
              <option value="all">All</option>
              <option value="Published">Published</option>
              <option value="Unpublished">Unpublished</option>
 
            </select>
            <!--end::Select2-->
          </div>

          <!--begin::Export-->
          <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_recipes_export_modal">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
            <span class="svg-icon svg-icon-2">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
                <path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
              </svg>
            </span>
            <!--end::Svg Icon-->Export</button>
            <!--end::Export-->


          <!--begin::Add product-->
          <a href="#" class="btn btn-primary">Add New Recipe</a>
          <!--end::Add product-->
        </div>
        <!--end::Card toolbar-->
      </div>
      <!--end::Card header-->
      <!--begin::Card body-->
      <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
          <!--begin::Table head-->
          <thead>
            <!--begin::Table row-->
            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
              <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                  <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" />
                </div>
              </th>
              <th class="min-w-100px">Order ID</th>
              <th class="min-w-175px">Customer</th>
              <th class="text-end min-w-70px">Status</th>
              <th class="text-end min-w-100px">Total</th>
              <th class="text-end min-w-100px">Date Added</th>
              <th class="text-end min-w-100px">Date Modified</th>
              <th class="text-end min-w-100px">Actions</th>
            </tr>
            <!--end::Table row-->
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
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13987</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">M</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Melody Macy</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$310.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-29">
                <span class="fw-bold">29/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-10-05">
                <span class="fw-bold">05/10/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13988</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-13.jpg')}}" alt="John Miller" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">John Miller</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$245.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-29">
                <span class="fw-bold">29/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-10-04">
                <span class="fw-bold">04/10/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13989</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-info text-info">A</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Robert Doe</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Refunded">
                <!--begin::Badges-->
                <div class="badge badge-light-info">Refunded</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$363.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-27">
                <span class="fw-bold">27/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-10-03">
                <span class="fw-bold">03/10/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13990</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-primary text-primary">N</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$157.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-26">
                <span class="fw-bold">26/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-10-02">
                <span class="fw-bold">02/10/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13991</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">M</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Melody Macy</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$134.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-28">
                <span class="fw-bold">28/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-10-01">
                <span class="fw-bold">01/10/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13992</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-primary text-primary">N</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Denied">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Denied</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$339.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-24">
                <span class="fw-bold">24/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-30">
                <span class="fw-bold">30/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13993</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-12.jpg')}}" alt="Ana Crown" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$107.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-25">
                <span class="fw-bold">25/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-29">
                <span class="fw-bold">29/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13994</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-21.jpg')}}" alt="Ethan Wilder" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ethan Wilder</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Expired">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Expired</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$297.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-25">
                <span class="fw-bold">25/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-28">
                <span class="fw-bold">28/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13995</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-9.jpg')}}" alt="Francis Mitcham" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Cancelled">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Cancelled</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$330.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-24">
                <span class="fw-bold">24/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-27">
                <span class="fw-bold">27/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13996</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-9.jpg')}}" alt="Francis Mitcham" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Failed">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Failed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$139.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-21">
                <span class="fw-bold">21/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-26">
                <span class="fw-bold">26/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13997</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-23.jpg')}}" alt="Dan Wilson" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Processing">
                <!--begin::Badges-->
                <div class="badge badge-light-primary">Processing</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$200.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-20">
                <span class="fw-bold">20/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-25">
                <span class="fw-bold">25/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13998</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-13.jpg')}}" alt="John Miller" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">John Miller</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Cancelled">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Cancelled</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$139.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-23">
                <span class="fw-bold">23/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-24">
                <span class="fw-bold">24/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">13999</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-1.jpg')}}" alt="Max Smith" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Max Smith</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Delivering">
                <!--begin::Badges-->
                <div class="badge badge-light-primary">Delivering</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$60.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-21">
                <span class="fw-bold">21/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-23">
                <span class="fw-bold">23/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14000</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">E</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Bold</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Processing">
                <!--begin::Badges-->
                <div class="badge badge-light-primary">Processing</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$88.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-17">
                <span class="fw-bold">17/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-22">
                <span class="fw-bold">22/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14001</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">M</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Melody Macy</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$178.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-14">
                <span class="fw-bold">14/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-21">
                <span class="fw-bold">21/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14002</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">O</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$92.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-16">
                <span class="fw-bold">16/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-20">
                <span class="fw-bold">20/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14003</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-13.jpg')}}" alt="John Miller" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">John Miller</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Cancelled">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Cancelled</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$386.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-15">
                <span class="fw-bold">15/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-19">
                <span class="fw-bold">19/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14004</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-primary text-primary">N</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Expired">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Expired</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$96.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-15">
                <span class="fw-bold">15/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-18">
                <span class="fw-bold">18/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14005</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-primary text-primary">N</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Pending">
                <!--begin::Badges-->
                <div class="badge badge-light-warning">Pending</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$398.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-11">
                <span class="fw-bold">11/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-17">
                <span class="fw-bold">17/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14006</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-9.jpg')}}" alt="Francis Mitcham" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Failed">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Failed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$215.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-11">
                <span class="fw-bold">11/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-16">
                <span class="fw-bold">16/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14007</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-9.jpg')}}" alt="Francis Mitcham" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$113.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-09">
                <span class="fw-bold">09/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-15">
                <span class="fw-bold">15/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14008</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-primary text-primary">N</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Expired">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Expired</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$480.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-10">
                <span class="fw-bold">10/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-14">
                <span class="fw-bold">14/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14009</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-1.jpg')}}" alt="Max Smith" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Max Smith</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$30.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-07">
                <span class="fw-bold">07/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-13">
                <span class="fw-bold">13/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14010</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-23.jpg')}}" alt="Dan Wilson" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$422.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-10">
                <span class="fw-bold">10/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-12">
                <span class="fw-bold">12/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14011</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-info text-info">A</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Robert Doe</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$98.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-05">
                <span class="fw-bold">05/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-11">
                <span class="fw-bold">11/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14012</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">O</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Denied">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Denied</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$394.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-06">
                <span class="fw-bold">06/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-10">
                <span class="fw-bold">10/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14013</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-23.jpg')}}" alt="Dan Wilson" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$390.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-08">
                <span class="fw-bold">08/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-09">
                <span class="fw-bold">09/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14014</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-9.jpg')}}" alt="Francis Mitcham" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$103.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-01">
                <span class="fw-bold">01/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-08">
                <span class="fw-bold">08/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14015</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-info text-info">A</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Robert Doe</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$226.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-02">
                <span class="fw-bold">02/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-07">
                <span class="fw-bold">07/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14016</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-21.jpg')}}" alt="Ethan Wilder" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ethan Wilder</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$111.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-02">
                <span class="fw-bold">02/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-06">
                <span class="fw-bold">06/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14017</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">E</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Bold</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$89.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-02">
                <span class="fw-bold">02/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-05">
                <span class="fw-bold">05/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14018</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-12.jpg')}}" alt="Ana Crown" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Expired">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Expired</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$490.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-03">
                <span class="fw-bold">03/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-04">
                <span class="fw-bold">04/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14019</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-23.jpg')}}" alt="Dan Wilson" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Delivering">
                <!--begin::Badges-->
                <div class="badge badge-light-primary">Delivering</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$420.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-09-01">
                <span class="fw-bold">01/09/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-03">
                <span class="fw-bold">03/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14020</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-5.jpg')}}" alt="Sean Bean" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Sean Bean</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$217.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-26">
                <span class="fw-bold">26/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-02">
                <span class="fw-bold">02/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14021</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-info text-info">A</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Robert Doe</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$350.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-25">
                <span class="fw-bold">25/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-09-01">
                <span class="fw-bold">01/09/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14022</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-12.jpg')}}" alt="Ana Crown" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Refunded">
                <!--begin::Badges-->
                <div class="badge badge-light-info">Refunded</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$444.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-30">
                <span class="fw-bold">30/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-31">
                <span class="fw-bold">31/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14023</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-12.jpg')}}" alt="Ana Crown" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Denied">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Denied</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$363.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-29">
                <span class="fw-bold">29/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-30">
                <span class="fw-bold">30/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14024</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">O</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$181.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-24">
                <span class="fw-bold">24/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-29">
                <span class="fw-bold">29/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14025</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-1.jpg')}}" alt="Max Smith" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Max Smith</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$223.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-26">
                <span class="fw-bold">26/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-28">
                <span class="fw-bold">28/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14026</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-25.jpg')}}" alt="Brian Cox" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Brian Cox</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Pending">
                <!--begin::Badges-->
                <div class="badge badge-light-warning">Pending</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$464.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-22">
                <span class="fw-bold">22/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-27">
                <span class="fw-bold">27/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14027</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-25.jpg')}}" alt="Brian Cox" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Brian Cox</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$144.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-24">
                <span class="fw-bold">24/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-26">
                <span class="fw-bold">26/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14028</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-info text-info">A</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Robert Doe</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Cancelled">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Cancelled</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$79.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-18">
                <span class="fw-bold">18/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-25">
                <span class="fw-bold">25/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14029</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-primary text-primary">N</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Delivering">
                <!--begin::Badges-->
                <div class="badge badge-light-primary">Delivering</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$358.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-19">
                <span class="fw-bold">19/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-24">
                <span class="fw-bold">24/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14030</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-warning text-warning">C</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Mikaela Collins</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$452.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-19">
                <span class="fw-bold">19/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-23">
                <span class="fw-bold">23/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14031</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-success text-success">L</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Lucy Kunic</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Cancelled">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Cancelled</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$218.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-21">
                <span class="fw-bold">21/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-22">
                <span class="fw-bold">22/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14032</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-1.jpg')}}" alt="Max Smith" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Max Smith</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$323.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-14">
                <span class="fw-bold">14/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-21">
                <span class="fw-bold">21/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14033</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-21.jpg')}}" alt="Ethan Wilder" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ethan Wilder</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$279.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-13">
                <span class="fw-bold">13/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-20">
                <span class="fw-bold">20/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14034</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label">
                        <img src="{{ asset('assets/backend/media/avatars/300-9.jpg')}}" alt="Francis Mitcham" class="w-100" />
                      </div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$404.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-16">
                <span class="fw-bold">16/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-19">
                <span class="fw-bold">19/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14035</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-danger text-danger">E</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Bold</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Completed">
                <!--begin::Badges-->
                <div class="badge badge-light-success">Completed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$193.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-14">
                <span class="fw-bold">14/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-18">
                <span class="fw-bold">18/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Order ID=-->
              <td data-kt-ecommerce-order-filter="order_id">
                <a href="#" class="text-gray-800 text-hover-primary fw-bold">14036</a>
              </td>
              <!--end::Order ID=-->
              <!--begin::Customer=-->
              <td>
                <div class="d-flex align-items-center">
                  <!--begin:: Avatar -->
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="#">
                      <div class="symbol-label fs-3 bg-light-info text-info">A</div>
                    </a>
                  </div>
                  <!--end::Avatar-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">Robert Doe</a>
                    <!--end::Title-->
                  </div>
                </div>
              </td>
              <!--end::Customer=-->
              <!--begin::Status=-->
              <td class="text-end pe-0" data-order="Failed">
                <!--begin::Badges-->
                <div class="badge badge-light-danger">Failed</div>
                <!--end::Badges-->
              </td>
              <!--end::Status=-->
              <!--begin::Total=-->
              <td class="text-end pe-0">
                <span class="fw-bold">$156.00</span>
              </td>
              <!--end::Total=-->
              <!--begin::Date Added=-->
              <td class="text-end" data-order="2022-08-14">
                <span class="fw-bold">14/08/2022</span>
              </td>
              <!--end::Date Added=-->
              <!--begin::Date Modified=-->
              <td class="text-end" data-order="2022-08-17">
                <span class="fw-bold">17/08/2022</span>
              </td>
              <!--end::Date Modified=-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">View</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo7/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
          </tbody>
          <!--end::Table body-->
        </table>
        <!--end::Table-->
      </div>
      <!--end::Card body-->
    </div>
    <!--end::Products-->

            <!--begin::Modals-->
        <!--begin::Modal - Adjust Balance-->
        <div class="modal fade" id="kt_recipes_export_modal" tabindex="-1" aria-hidden="true">
          <!--begin::Modal dialog-->
          <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Export Recipes</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div id="kt_recipes_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                  <span class="svg-icon svg-icon-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                      <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
              </div>
              <!--end::Modal header-->
              <!--begin::Modal body-->
              <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_recipes_export_form" class="form" action="#">
                  <!--begin::Input group-->
                  <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="fs-5 fw-semibold form-label mb-5">Select Export Format:</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
                      <option value="excell">Excel</option>
                      <option value="pdf">PDF</option>
                      <option value="cvs">CVS</option>
                      <option value="zip">ZIP</option>
                    </select>
                    <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  
                  <!--end::Input group-->
                  <!--begin::Row-->
                  <div class="row fv-row mb-15">
                    <!--begin::Label-->
                    <label class="fs-5 fw-semibold form-label mb-5">Categories Type:</label>
                    <!--end::Label-->
                    <!--begin::Radio group-->
                    <div class="d-flex flex-column">
                      <!--begin::Radio button-->
                      <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                        <input class="form-check-input" type="checkbox" value="1" checked="checked" name="categories" />
                        <span class="form-check-label text-gray-600 fw-semibold">All</span>
                      </label>
                      <!--end::Radio button-->
                      <!--begin::Radio button-->
                      <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                        <input class="form-check-input" type="checkbox" value="2" checked="checked" name="categories" />
                        <span class="form-check-label text-gray-600 fw-semibold">Beef</span>
                      </label>
                      <!--end::Radio button-->
                      <!--begin::Radio button-->
                      <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                        <input class="form-check-input" type="checkbox" value="3" name="categories" />
                        <span class="form-check-label text-gray-600 fw-semibold">Chicken</span>
                      </label>
                      <!--end::Radio button-->
              
                    </div>
                    <!--end::Input group-->
                  </div>
                  <!--end::Row-->
                  <!--begin::Actions-->
                  <div class="text-center">
                    <button type="reset" id="kt_recipes_export_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_recipes_export_submit" class="btn btn-primary">
                      <span class="indicator-label">Submit</span>
                      <span class="indicator-progress">Please wait...
                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                  </div>
                  <!--end::Actions-->
                </form>
                <!--end::Form-->
              </div>
              <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
          </div>
          <!--end::Modal dialog-->
        </div>
        <!--end::Modal - New Card-->
        <!--end::Modals-->

  </div>
  <!--end::Container-->
@stop


@section('scripts')
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/apps/recipes/list/export.js')}}"></script>
		<script src="{{ asset('assets/backend/js/custom/apps/ecommerce/sales/listing.js')}}"></script>
		<script src="{{ asset('assets/backend/js/widgets.bundle.js')}}"></script>
		<script src="{{ asset('assets/backend/js/custom/widgets.js')}}"></script>
		<script src="{{ asset('assets/backend/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{ asset('assets/backend/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
		<script src="{{ asset('assets/backend/js/custom/utilities/modals/create-app.js')}}"></script>
		<script src="{{ asset('assets/backend/js/custom/utilities/modals/users-search.js')}}"></script>
		<!--end::Custom Javascript-->
@stop
