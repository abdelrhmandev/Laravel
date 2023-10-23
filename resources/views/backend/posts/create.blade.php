@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted"><a href="{{ $listingRoute }}" class="text-muted"> {{ __($trans . '.plural') }}</a>
    </li>
    <li class="breadcrumb-item text-dark">{{ __($trans . '.add') }}</li>
@stop

@section('style')




    <link href="{{ asset('assets/backend/plugins/custom/file-upload/uppy.bundle.css') }}" rel="stylesheet">

@stop
@section('content')

<div class="row mb-6">

    <div class="col-lg-6">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
						Quick Drag & Drop Upload
					</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="uppy" id="kt_uppy_3">
                    <div class="uppy-drag"></div>
                    <div class="uppy-informer"></div>
                    <div class="uppy-progress"></div>
                    <div class="uppy-thumbnails"></div>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    
</div>

 


@stop
@section('scripts')









    <script src="{{ asset('assets/backend/plugins/custom/file-upload/uppy.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/file-upload/uppy.js') }}"></script>
 




@stop
