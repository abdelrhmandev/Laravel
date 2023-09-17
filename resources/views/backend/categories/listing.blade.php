<div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-7">
    <!--begin::Order details-->
  <div class="card card-flush py-0">
    <!--begin::Card header-->
    <div class="card-header">
      <div class="card-title">
        <h2>Categoriess asdasdsas lisgting (56)</h2>         
      </div>
    </div>    
    <div class="card-body pt-0">
      <div class="d-flex flex-column gap-10">
        <div class="separator"></div>
        <div class="d-flex align-items-center position-relative mb-n7">
          <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
          <span class="svg-icon svg-icon-1 position-absolute ms-4">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
              <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
            </svg>
          </span>
          <!--end::Svg Icon-->
          <input type="text" data-kt-table-filter="search" class="form-control form-control-solid w-210px ps-15" placeholder="{{ __('admin.search') }} {{ __($trans.'.plural') }} ......" />
        
          <div class="d-flex justify-content-end" data-kt-table-toolbar="base">
          <div class="w-150px me-3">
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="status" name="status" data-placeholder="{{ __('site.sort_by')}} {{ __('site.status')}}" data-kt-filter="status">
              <option></option>
              <option value="all">{{ __('site.all') }}  ({{ $allrecords }})</option>
              <option value="1">{{ __('site.published') }} ({{ $publishedCounter}})</option>
              <option value="0">{{ __('site.unpublished') }} ({{ $unpublishedCounter}})</option>
            </select>
          </div>
          </div>

        </div>



 <table class="table align-middle table-row-bordered fs-6 gy-5" id="{{ __($trans.'.plural') }}">         
  <thead>
    <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
      <th class="w-10px pe-2 noExport">             
        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
          <input class="form-check-input AA" type="checkbox" data-kt-check="true" data-kt-check-target="#{{ __($trans.".plural") }} .AA" value="1" />
        </div>
      </th>            
      <th>{{ __('site.image') }}</th>  
      <th>{{ __('site.title') }}</th>                                
      <th>{{ __('site.parent_id') }}</th> 
      <th>{{ __('post.plural') }}</th> 
      <th>{{ __('site.status') }}</th> 
      <th>{{ __('admin.created_at') }}</th>
      <th class="text-end min-w-50px noExport">{{ __('admin.actions') }}</th>  
    </tr>
  </thead>
  <tbody class="text-gray-600"> 
  </tbody>
</table>
 ////////////       

 


        <!--end::Table-->
      </div>
    </div>
    <!--end::Card header-->
  </div>
 
</div>