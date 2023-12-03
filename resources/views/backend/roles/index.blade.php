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
<div id="kt_content_container" class="container-xxl">
   <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
      @foreach ( $rows as $row)
      <div class="col-md-4">
         <!--begin::Card-->
         <div class="card card-flush h-md-100">
            <!--begin::Card header-->
            <div class="card-header">
               <!--begin::Card title-->
               <div class="card-title">
                  <h2>
                     @foreach (json_decode($row->trans,true) as $role)
                        {{  isset($role[app()->getLocale()]) ? $role[app()->getLocale()] : ''; }}
                     @endforeach
                  </h2>
               </div>
               <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-1">
               <!--begin::Users-->
               @if($row->users_count)
               <div class="fw-bold text-success">{{ __('role.associated_users')}}            
                  <span class="badge badge-primary badge-circle badge-lg">{{ $row->users_count}}</span>          
               </div>
               @else
               <span class="fw-bold text-danger">{{ __('role.no_associated_users') }}</span>
               @endif
               <!--end::Users-->
               <!--begin::Permissions-->
               <div class="d-flex flex-column text-gray-600 scroll h-200px " data-kt-scroll="true">
                  <!-- Check Role Has Permissions -->
                  {!! $row->permissions_count ? "<span class=\"fw-bold text-info\">".__('permission.all')." <span class=\"badge badge-warning badge-circle badge-sm\">".$row->permissions_count."</span></span>" : '' !!} 
                  @forelse ($row->permissions as $permission)
                  <div class="d-flex align-items-center py-2">
                     <span class="bullet bg-danger me-3"></span> {{ json_decode($permission->trans)->{app()->getLocale()}; }}
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
               <a href="{{ route('admin.roles.edit',$row->id)}}" class="btn btn-light btn-active-primary my-1 me-2">{{ __('site.edit')}}</a>
            </div>
            <!--end::Card footer-->
         </div>
         <!--end::Card-->
      </div>
      @endforeach

      <div class="ol-md-4">
         <!--begin::Card-->
         <div class="card h-md-100">
            <!--begin::Card body-->
            <div class="card-body d-flex flex-center">
               <!--begin::Button-->
               <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                  <!--begin::Illustration-->
                  <img src="assets/media/illustrations/sketchy-1/4.png" alt="" class="mw-100 mh-150px mb-7" />
                  <!--end::Illustration-->
                  <!--begin::Label-->
                  <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                  <!--end::Label-->
               </button>
               <!--begin::Button-->
            </div>
            <!--begin::Card body-->
         </div>
         <!--begin::Card-->
      </div>
   </div>

</div>
@stop


@section('scripts')
@stop
