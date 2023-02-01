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
  @if($rows->count() > 0)
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
          <div class="fw-bold text-success">{{ __('role.associated_users')}}            
            <span class="badge badge-primary badge-circle badge-lg">{{ $row->users_count}}</span>          
          </div>
          <!--end::Users-->
          <!--begin::Permissions-->
          <div class="d-flex flex-column text-gray-600">
        
            <!-- Check Role Has Permissions -->
            {!! $row->permissions_count ? "<span class=\"fw-bold text-info\">".__('permission.all')."</span>" : '' !!} 

         

            @forelse ($row->permissions as $permission)
            <div class="d-flex align-items-center py-2">
              <span class="bullet bg-primary me-3"></span> {{ json_decode($permission->display)->{app()->getLocale()}; }}
            </div>
            @empty
            <span class="d-flex position-relative">
                <span class="d-inline-block mb-2 fs fw-bold text-danger">
                  {{ __('role.no_permissions_assigned')}} 
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
