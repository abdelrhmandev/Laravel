@extends('backend.base.base')
@section('breadcrumbs')
<li class="breadcrumb-item text-dark">{{ __($trans.".plural") }}</li>
@stop
@section('style')
@if(app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endif
@stop
@section('content')
<div class="container-xxl" id="kt_content_container">

  {{-- @if(!empty($tag_id))
  <div class="card-body pt-2">
    <div class="notice d-flex bg-light-success rounded border-success border border-dashed mb-9 p-6">
        <span class="svg-icon svg-icon-2tx svg-icon-success me-4">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
        <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
        <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
        </svg>
        </span>          
      <div class="d-flex flex-stack flex-grow-1">
        <div class="fw-semibold">
          <h3 class="fw-bold m-0">{{ __('post.on') }}</h3>                   
          " <a href="{{ route(config('custom.route_prefix').'.posts.edit',$tag_id) }}" class="me-1"> {{ $tag->translate->title }}</a>"
           <a href="{{ route(config('custom.route_prefix').'.posts.edit',$tag_id) }}"> {{ __('tag.view')}}</a></div>         
          <a href="{{  route(config('custom.route_prefix').'.posts.index') }}">{{ __('site.all')}} {{ __('post.plural')}}</a>
      </div>
    </div>
  </div>
  @endif --}}


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
          <input type="text" name="search" id="search" data-kt-table-filter="search" class="form-control form-control-solid w-210px ps-15" placeholder="{{ __('admin.search') }} {{ __($trans.'.plural') }} ......" />
        </div>
      </div>
      <div class="card-toolbar">
        <div class="d-flex justify-content-end" data-kt-table-toolbar="base">   
          {{-- <div class="w-150px me-3">
            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="status" name="status" data-placeholder="{{ __('site.sort_by')}} {{ __('site.status')}}" data-kt-filter="status">
              <option></option>
              <option value="all">{{ __('site.all') }}  ({{ $allrecords }})</option>
              <option value="1">{{ __('site.published') }} ({{ $publishedCounter}})</option>
              <option value="0">{{ __('site.unpublished') }} ({{ $unpublishedCounter}})</option>
            </select>
          </div> --}}
          

          
          <div class="w-200px me-3">
              <select class="form-select form-select-solid" data-control="select2" name="category_id" id="category_id" data-placeholder="{{ __('site.filter_by')}} {{ __('category.singular')}} " data-allow-clear="true">
                <option></option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{ $category->translate->title }} ({{ $category->posts_count }})</option>             
                  @endforeach
              </select>
           </div>

          @include('backend.partials.modals._exportlisting')
          <a class="btn btn-primary" href="{{ $createRoute }}">
            <span class="svg-icon svg-icon-2 svg-icon-primary me-0 me-md-2">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z" fill="currentColor"></path>
                <rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)" fill="currentColor"></rect>
                <rect x="7" y="13" width="10" height="2" rx="1" fill="currentColor"></rect>
                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"></path>
              </svg>
            </span>
            {{ __($trans.'.add')}}</a>
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
            <th>{{ __('site.image') }}</th>  
            <th class="w-200px">{{ __('site.title') }}</th>                                
            <th>{{ __('category.plural') }}</th>
            <th>{{ __('tag.plural') }}</th>  
            <th>{{ __('site.author') }}</th>            
            <th class="text-primary w-100px">{{ __('admin.created_at') }}</th>
            <th class="text-end min-w-100px noExport">{{ __('admin.actions') }}</th>  
          </tr>
        </thead>
        <tbody class="text-gray-600"> 
        </tbody>
      </table>
    </div>
  </div>
</div>

@stop


@section('scripts')
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfmake.min.js')}}"></script> 
<script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_load_fonts.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/pdfMake/pdfhandle.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>


@include('backend.datatables.posts')
<script>
var dynamicColumns = [ //as an array start from 0
{ data: 'id', name: 'id',exportable:false}, 
{ data: 'image', name: 'image' ,orderable: false,searchable: false},
{ data: 'translate.title', name: 'translate.title',orderable: false}, // 2
{ data: 'categories', name: 'categories',orderable: false,searchable: false},
{ data: 'tags', name: 'tags',orderable: false,searchable: false},
{ data: 'user_id', name: 'user_id',orderable: false,searchable: false},
{ data: 'created_at',name :'created_at', type: 'num', render: { _: 'display', sort: 'timestamp', order: 'desc'}}, // 6
{ data: 'actions' , name : 'actions' ,exportable:false,orderable: false,searchable: false},    
];
KTUtil.onDOMContentLoaded(function () {
  loadDatatable('{{ __($trans.".plural") }}','{{ $redirectRoute }}',dynamicColumns,'','2','{{ $category_id }}');
});
</script>
<script src="{{ asset('assets/backend/js/custom/updateStatus.js')}}"></script>
@stop
