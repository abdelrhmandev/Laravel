<div class="card">
  <div class="card-header border-0 pt-6">
    <div class="card-title">
      <div class="d-flex align-items-center position-relative my-1">
        <span class="svg-icon svg-icon-1 position-absolute ms-6">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
          </svg>
        </span>
        <input type="text" data-kt-table-filter="search" class="form-control form-control-solid w-210px ps-15" placeholder="{{ __('admin.search') }} {{ __($trans.'.plural') }} ......" />
      </div>
    </div>
    <div class="card-toolbar">
      <div class="d-flex justify-content-end" data-kt-table-toolbar="base">   
        @include('backend.partials.modals._exportlisting') 
      </div>
      <div class="d-flex justify-content-end align-items-center d-none" data-kt-table-toolbar="selected">
        <div class="fw-bold me-5">
        <span class="me-2" data-kt-table-select="selected_count"></span>{{ __('admin.selected') }}</div>          
        <button type="button" class="btn btn-danger" id="destroyMultipleroute"              
        data-destroyMultiple-route = "{{ $destroyMultipleRoute }}"
        data-kt-table-select="delete_selected"             
        data-back-list-text="{{ __('site.back_to_list') }}"        
        data-confirm-message = "{{ __($trans.'.delete_selected') }}"
        data-confirm-button-text = "{{ __('site.confirmButtonText') }}"
        data-cancel-button-text = "{{ __('site.cancelButtonText') }}"
        data-confirm-button-textGotit = "{{ __('site.confirmButtonTextGotit') }}"
        data-delete-selected-records-text = "{{ __($trans.'.delete_selected') }}"
        data-not-deleted-message = "{{ __($trans.'.not_delete_selected') }}"
        ><i class="fa fa-trash-alt"></i>{{ __('admin.delete_selected') }}</button>
      </div>
    </div>
  </div>
  <div class="card-body pt-0">
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
      </tbody>
    </table>
  </div>
</div>