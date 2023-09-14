<div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
    <!--begin::Order details-->
  <div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
      <div class="card-title">
        <h2>Tags lisgting (56)</h2>
      </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
      <div class="d-flex flex-column gap-10">
        <!--begin::Input group-->
        <!--end::Input group-->
        <!--begin::Separator-->
        <div class="separator"></div>
        <!--end::Separator-->
        <!--begin::Search products-->
        <div class="d-flex align-items-center position-relative mb-n7">
          <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
          <span class="svg-icon svg-icon-1 position-absolute ms-4">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
              <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
            </svg>
          </span>
          <!--end::Svg Icon-->
          <input type="text" data-kt-ecommerce-edit-order-filter="search" class="form-control form-control-solid w-100 w-lg-50 ps-14" placeholder="Search Products" />
        </div>
        <!--end::Search products-->
        <!--begin::Table-->

        <table class="table align-middle table-row-bordered fs-6 gy-5" id="{{ __($trans.'.plural') }}">         
          <thead>
            <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
              <th class="w-10px pe-2 noExport">             
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                  <input class="form-check-input AA" type="checkbox" data-kt-check="true" data-kt-check-target="#{{ __($trans.".plural") }} .AA" value="1" />
                </div>
              </th>            
      
              <th>{{ __('site.title') }}</th>                                
              <th>{{ __('post.plural') }}</th> 
              <th ><span class="text-primary">{{ __('admin.created_at') }}</span></th>
              <th class="text-end min-w-50px noExport">{{ __('admin.actions') }}</th>  
            </tr>
          </thead>
          <tbody class="text-gray-600"> 
          @for($i=1;$i<=10;$i++)
            <tr>
            <td><input type="checkbox"></td>
             <td><a href="../../demo7/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Product 1</a></td>
             <td>15</td>
            <td>15/4/2021</td>
            <td>Edit / Delete</td>
          </tr>
          @endfor
          </tbody>
        </table>


        <!--end::Table-->
      </div>
    </div>
    <!--end::Card header-->
  </div>
  <!--end::Order details-->
  <!--begin::Order details-->
  
  <!--end::Order details-->

</div>