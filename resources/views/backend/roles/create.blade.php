@extends('backend.base.base')

@section('style')

@if(app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endif

<style>

.my-field-error .fv-plugins-message-container, .my-field-error .fv-plugins-icon {
        font-size: 0.925rem; 
        color: #f1416c; 
        font-weight: 400;
}
 

 

</style>




@stop
@section('content')

<form id="FormId" data-form-id="create_role" data-route-url="{{ route('admin.roles.store') }}" class="form mb-15" method="post">

    @csrf
    

 


            <div class="cf mb2">
                <div class="fl w-100">
                    <label class="required form-label">Title</label>
                    <div class="fl w-10">
                        <input
                            type="text"
                            class="form-control mb-2"
                            name="title"
                            {{-- required
                            data-fv-not-empty___message="The title is required"
                            pattern="^[a-zA-Z0-9]+$"
                            data-fv-regexp___message="The title can only consist of alphabetical, number" --}}
                        />
                    </div>
                </div>
            </div>


            <div class="cf mb2">
                <div class="fl w-100">
                    <label class="required form-label">Desc</label>
                    <div class="fl w-10">
                        <input
                            type="text"
                            class="form-control mb-2"
                            name="permission"
                            {{-- required
                            data-fv-not-empty___message="The permission is required"
                            pattern="^[a-zA-Z0-9]+$"
                            data-fv-regexp___message="The permission can only consist of alphabetical, number" --}}
                        />
                    </div>
                </div>
            </div>

 

            <div class="cf mb2">
    
                <button type="submit" class="btn btn-primary" id="kt_submit_button">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Submit </span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
                <button type="reset" class="btn btn-warning">Reset</button>

            </div>
        </form>
        @stop
        @section('scripts')
         <script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
        <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>


        @include('backend.form')

         
        @stop
      