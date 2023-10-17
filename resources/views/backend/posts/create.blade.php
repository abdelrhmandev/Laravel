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
    </style>
@stop




@section('content')

    <div class="container-xxl" id="kt_content_container">

        @foreach($tags as $tag)
        <p>{{  $tag->translate->title }}</p>
        @endforeach
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




 
 

 
 @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

 tinymce.init({selector: ('#description_{{ substr($properties['regional'], 0, 2) }}'), height : "280"});

 @endforeach


 
</script>


    {{-- @include('backend.form') --}}
@stop
