@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">Recipes</li>
    <li class="breadcrumb-item text-dark">Listings</li>
@stop

@section('style')
    @if (app()->getLocale() === 'ar')
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
            type="text/css" />
    @endif



    <style>
        .ribbon.ribbon-right .ribbon-target {
            border-top-left-radius: 0.42rem;
            border-bottom-left-radius: 0.42rem;
        }

        .ribbon .ribbon-target {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 5px 10px;
            position: absolute;
            z-index: 1;
        }

        .my-field-error .fv-plugins-message-container,
        .my-field-error .fv-plugins-icon {
            font-size: 0.925rem;
            color: #f1416c;

        }

        .fv-plugins-tachyons .fv-plugins-icon {
            top: 30px;
        }

        .my-field-success .fv-plugins-message-container,
        .my-field-success .fv-plugins-icon {
            font-size: 0.925rem;
            color: #28a745;
        }

        /* //////////////////////////////// */

        .tree, .tree ul {

margin:0;

padding:0;

list-style:none

}

.tree ul {

margin-left:1em;

position:relative

}

.tree ul ul {

margin-left:.5em

}

.tree ul:before {

content:"";

display:block;

width:0;

position:absolute;

top:0;

bottom:0;

left:0;

border-left:1px solid

}

.tree li {

margin:0;

padding:0 1em;

line-height:2em;

color:#369;

font-weight:700;

position:relative

}

.tree ul li:before {

content:"";

display:block;

width:10px;

height:0;

border-top:1px solid;

margin-top:-1px;

position:absolute;

top:1em;

left:0

}

.tree ul li:last-child:before {

background:#fff;

height:auto;

top:1em;

bottom:0

}

.indicator {

margin-right:5px;

}

.tree li a {

text-decoration: none;

color:#369;

}

.tree li button, .tree li button:active, .tree li button:focus {

text-decoration: none;

color:#369;

border:none;

background:transparent;

margin:0px 0px 0px 0px;

padding:0px 0px 0px 0px;

outline: 0;

}


    </style>
@stop



@section('content')

    <div class="container-xxl" id="kt_content_container">



        <form id="PostCategoryForm" data-route-url="{{ $storeUrl }}" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="{{ $redirectUrl }}"
            data-form-submit-error="{{ __('site.form_submit_error')}}"
            enctype="multipart/form-data">
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 mb-7 me-lg-10">
                <!--begin:::Tabs-->
                {{-- <x-backend.langs.ulTabs /> --}}
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                {{-- <x-backend.langs.LangInputsClassic /> --}}

              


                {{-- <select>
                    {!! $dumpTree !!}
                </select> --}}
        

                <ul>
                    @if(count($categories) > 0)
                        @foreach ($categories as $category)
                            <li>{{ $category->id }}</li>
                            <ul>
                               
                                    @foreach ($category->childCategories as $subCategories)
                                        @include('backend.sub_category', ['sub_categories' => $subCategories])
                                    @endforeach
                               
                            </ul>
                        @endforeach
                    @endif
                </ul>


                {{-- <x-backend.cms.single-select-category :categories="$categories" :dashes="''"/> --}}




                <!--end::Tab content-->
                {{-- <x-backend.btns.create /> --}}
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-7 w-lg-400px gap-lg-10">
                <!--begin::Thumbnail settings-->
                {{-- <x-backend.cms.image /> --}}
                {{-- <x-backend.cms.publish /> --}}
                
                <!--end::Thumbnail settings-->
                <!--begin::Status-->         
            </div>
        </form>
    </div>
@stop








@section('scripts')

    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
    {{-- <script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script> --}}




    <script src="{{ asset('assets/backend/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>


  



    <script>


// On document ready
KTUtil.onDOMContentLoaded(function() {
   handleFormSubmitFunc('PostCategoryForm');
});


 

   


        
    </script>


<script type="text/javascript">




 
 

 


 
</script>


    {{-- @include('backend.form') --}}
@stop
