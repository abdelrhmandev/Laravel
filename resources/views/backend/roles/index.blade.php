@extends('backend.base.base')

@section('breadcrumbs')
<li class="breadcrumb-item text-muted">{{ __($trans_file.'.all')}}</li>
<li class="breadcrumb-item text-dark">Listings</li>
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
  <!--begin::Row-->
  @if($rows->count())

  <div class="d-flex flex-wrap flex-stack mb-6">
    <!--begin::Heading-->
    <h3 class="fw-bold my-2">{{ __($trans_file.'.all')}}

      <span class="badge badge-primary badge-circle badge-lg">{{ $rows->total() }}</span>

    <span class="fs-6 text-gray-400 fw-semibold ms-1">Active</span></h3>
    <!--end::Heading-->
    <!--begin::Actions-->
    <div class="d-flex flex-wrap my-2">
      <div class="me-4">
        <!--begin::Select-->
        <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body w-125px">
          <option value="Active" selected="selected">Active</option>
        
        </select>
        <!--end::Select-->
      </div>
      
      <div class="text-center mb-1">
        <!--begin::Link-->
        <a class="btn btn-sm btn-primary me-2">{{ __('site.filter')}}</a>
        <!--end::Link-->
        <!--begin::Link-->
         <!--end::Link-->    
           <a href="#" class="btn btn-success btn-sm">{{ __($trans_file.'.create')}}</a>

      </div>


    </div>
    <!--end::Actions-->
  </div>

  
  <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">

    
    <!--begin::Col-->
    @foreach ( $rows as $row)
 
    
    <div class="col-md-4">
      <!--begin::Card-->
      <div class="card card-flush h-md-100">
        <!--begin::Card header-->
        <div class="card-header">
          <!--begin::Card title-->
          <div class="card-title">
            <h2>{{ json_decode($row->display)->{app()->getLocale()}; }}</h2>
          </div>
          <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-1">
          <!--begin::Users-->
          @if($row->users_count)
          <div class="fw-bold text-success">{{ __($trans_file.'.associated_users')}}            
            <span class="badge badge-primary badge-circle badge-lg">{{ $row->users_count}}</span>          
          </div>
          @else
          <span class="fw-bold text-danger">{{ __($trans_file.'.no_associated_users') }}</span>
          @endif
          <!--end::Users-->
          <!--begin::Permissions-->
          <div class="d-flex flex-column text-gray-600 scroll h-200px " data-kt-scroll="true">
        
            <!-- Check Role Has Permissions -->
            {!! $row->permissions_count ? "<span class=\"fw-bold text-info\">".__('permission.all')." <span class=\"badge badge-warning badge-circle badge-sm\">".$row->permissions_count."</span></span>" : '' !!} 

         

            @forelse ($row->permissions as $permission)
            <div class="d-flex align-items-center py-2">
              <span class="bullet bg-danger me-3"></span> {{ json_decode($permission->display)->{app()->getLocale()}; }}
            </div>
            @empty
            <span class="d-flex position-relative">
                <span class="d-inline-block mb-2 fs fw-bold text-danger">
                  {{ __($trans_file.'.no_permissions_assigned')}} 
                </span> 
            </span>
            @endforelse
             <!--end::Check Role Has Permissions-->


            
          </div>
          <!--end::Permissions-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer flex-wrap pt-0">
          <a href="{{ route('admin.'.$resource.'.edit',$row->id)}}" class="btn btn-light btn-active-primary my-1 me-2">{{ __('site.edit')}}</a>
        </div>
        <!--end::Card footer-->
      </div>
      <!--end::Card-->
    </div>
    

    @endforeach
 
    <div class="d-flex flex-stack flex-wrap pt-10">
      {!! $rows->links() !!}
  </div>

 
    <!--end::Col-->
    <!--begin::Add new card-->
  
    <!--begin::Add new card-->
  </div>
 
  @else
  <div class="col-md-12">
    <div class="row row-cols-12">
      <div class="card">
        <!--begin::Card body-->
        <div class="card-body">
          <!--begin::Heading-->
          <div class="card-px text-center pt-15 pb-15">
            <!--begin::Title-->
            <h3 class="fs-2x fw-bold mb-0 text-danger">{{ __('site.empty_records')}}</h3>
            <!--end::Title-->
            <!--begin::Description-->
            
            <br /> 
            <!--end::Description-->
            <!--begin::Action-->
            <a href="{{ route('admin.'.$resource.'.create')}}" class="btn btn-primary er fs-6 px-8 py-4">{{ __($trans_file.'.create')}}</a>
            <!--end::Action-->
          </div>
          <!--end::Heading-->
          <!--begin::Illustration-->
          <div class="text-center pb-15 px-5">
            <img src="{{ asset('assets/backend/media/illustrations/unitedpalms-1/4.png')}}" alt="" class="mw-100 h-200px h-sm-325px" />
          </div>
          <!--end::Illustration-->
        </div>
        <!--end::Card body-->
      </div>
      <!--end::Card body-->
    </div>
  </div>

  @endif


</div>
@stop



    

   


@section('scripts')
 

 
 
<!--end::Custom Javascript-->
@stop
