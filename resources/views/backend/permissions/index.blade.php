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
   <div class="d-flex flex-wrap flex-stack mb-6">
      <!--begin::Heading-->
      <h3 class="fw-bold my-2">{{ __($trans_file.'.all')}}
         <span class="badge badge-primary badge-circle badge-lg">{{ $rows->count() }}</span>
      </h3>
      <!--end::Heading-->
      <!--begin::Actions-->
      <div class="d-flex flex-wrap my-2">
         <div class="text-center mb-1">
            <!--begin::Link-->
            <!--end::Link-->
            <!--begin::Link-->
            <!--end::Link-->    
            <a href="{{ route('admin.'.$resource.'.create')}}" class="btn btn-success btn-sm">{{ __($trans_file.'.create')}}</a>
         </div>
      </div>
      <!--end::Actions-->
   </div>
   <div class="card">
      <!--begin::Card body-->
      <div class="card-body">
         <!--begin::Heading-->
         @if($rows->count())
         <div class="mb-15">
            <!--begin::List-->
            <div class="mh-375px scroll-y me-n7 pe-7">
               <!--begin::User-->
               <!--end::User-->
               <!--begin::User-->
               <!--end::User-->
               <!--begin::User-->
               @foreach ( $rows as $row)
               <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                  <!--begin::Details-->
                  <div class="d-flex align-items-center">
                     <!--begin::Avatar-->
                     <!--end::Avatar-->
                     <!--begin::Details-->
                     <div class="ms-6">
                        <!--begin::Name-->
                        <a href="{{ route('admin.'.$resource.'.edit',$row->id)}}" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">


                           @foreach (json_decode($row->trans,true) as $permi)
                           {{  isset($permi[app()->getLocale()]) ? $permi[app()->getLocale()] : ''; }}
                        @endforeach

                           @foreach ($row->roles as $role)
                           <span class="badge badge-light fs-8 fw-semibold ms-2">
                              
                              @foreach (json_decode($role->trans,true) as $ro)
                              {{  isset($ro[app()->getLocale()]) ? $ro[app()->getLocale()] : ''; }}
                           @endforeach
                              
                           </span>
                           <div class="separator separator-dashed my-4"></div>
                           @endforeach
                        </a>
                        <!--end::Name-->
                        <!--begin::Email-->
                        <!--end::Email-->
                     </div>
                     <!--end::Details-->
                  </div>
                  <!--end::Details-->
                  <!--begin::Stats-->
                  <div class="d-flex">
                     <!--begin::Sales-->
                     <div class="text-end">
                        <div class="fs-5 fw-bold text-dark">
                           <a href="{{ route('admin.'.$resource.'.edit',$row->id)}}">{{ __('site.edit')}}</a>
                        </div>
                     </div>
                     <!--end::Sales-->
                  </div>
                  <!--end::Stats-->
               </div>
               @endforeach
               <!--end::User-->
            </div>
            <!--end::List-->
         </div>
         @else
         <div class="card-body">
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
            <div class="text-center pb-15 px-5">
               <img src="{{ asset('assets/backend/media/illustrations/unitedpalms-1/4.png')}}" alt="" class="mw-100 h-200px h-sm-325px" />
            </div>
         </div>
         @endif
      </div>
   </div>
   <div class="d-flex flex-stack flex-wrap pt-10">
      {!! $rows->count() > 0 ? $rows->links() : '' !!}
   </div>
</div>
@stop
@section('scripts')
<!--end::Custom Javascript-->
@stop
