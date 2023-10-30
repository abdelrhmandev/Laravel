@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted"><a href="{{ $redirect_after_destroy}}" class="text-muted"> {{ __($trans.".plural") }}</a></li>
    <li class="breadcrumb-item text-dark">{{ __($trans.".edit") }}</li>
@stop

@section('style')

@if (app()->getLocale() === 'ar')
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
    type="text/css" />
@else
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
@endif

<link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet"
type="text/css" />
    
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/custom/file-upload/image-uploader.min.css') }}">

</style>
@stop
@section('content')

    <div class="container-xxl" id="kt_content_container">
        <form id="Edit{{ $trans }}" data-route-url="{{ $updateRoute }}" class="form d-flex flex-column flex-lg-row"            
            data-form-submit-error-message="{{ __('site.form_submit_error')}}"
            data-form-agree-label="{{ __('site.agree') }}" 
            enctype="multipart/form-data">            

            
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <!--begin::General options-->
                
                <div class="card card-flush py-0">
                    <div class="card-header">
                        <div class="card-title">
                            {{-- <h3>{{ __($trans.'.edit')}}</h3> --}}
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                          <div class="d-flex flex-column gap-5">
                            <div class="separator"></div>                        
                            {{-- <x-backend.langs.ulTabs/> --}}
                            {{-- <x-backend.langs.LangInputs :showDescription="1" :richTextArea="0" :showSlug="1" :row="$row" :columnvalues="$TrsanslatedColumnValues" /> --}}
                        
                            <div id="galleryAjaxJsResponse" style="background: red;"></div>
                    
                    </div>
 
                        
                        
                    </div>
                </div>
                {{-- <x-backend.cms.tags :tags="$tags"/> --}}
                {{-- <x-backend.cms.gallery :media="$row->media"/> --}}
                {{-- <x-backend.btns.button :destroyRoute="$destroyRoute" :redirectRoute="$redirect_after_destroy" :row="$row" :trans="$trans"/> --}}
            </div>
            
            
            <div class="d-flex flex-column flex-row-fluid gap-0 w-lg-400px gap-lg-5">

                 

                {{-- <x-backend.cms.image :image="$row->image"/>
                <x-backend.cms.categories-multi-select :categories="$categories" :level="0" />
                <x-backend.cms.authors :authors="$authors"/>
                <x-backend.cms.status :status="$row->status" :action="'edit'" />
                <x-backend.cms.featured :featured="$row->featured" :action="'edit'" />
                <x-backend.cms.allowComments :allowcomments="$row->allow_comments" :action="'edit'" />             --}}
            </div>


            
        </form>
    </div>
@stop
@section('scripts')
<script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/deleteConfirmSwal.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>




<script src="{{ asset('assets/backend/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/custom/file-upload/image-uploader.min.js') }}"></script>
<script>


    $(document).ready(function()
    {
        fetchcategory();

        function fetchcategory(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });     
        $.ajax
        ({
            url: '{{ route('admin.AjaxLoadGallery',$row) }}',
            type:"GET",
            dataType: "json",
            success:function(response){     
                $("#galleryAjaxJsResponse").append(response.html);

                alert(response.counter);
                if(response.counter){
                    document.getElementById("galleryCounter").innerHTML=response.counter;                    
                }else{
                    document.getElementById("EmptygalleryMsg").innerHTML='No Gallery foundsds';   
                }

            }            
        });
    }


    });
//https://www.itsolutionstuff.com/post/laravel-ajax-delete-request-example-tutorialexample.html#google_vignette
function delete_gallery_image(id){ 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });            
        var url = '{{ route("admin.delete_gallery_image", ":id") }}';
        url = url.replace(':id', id); 
        $.ajax
        ({
            url: url,
            type:"DELETE",
            dataType: "json",
            success:function(result){                
                // alert(result.msg);                
                // $("#"+result['tr']).remove();  
                fetchcategory();           
            }            
        });
}
 
$('.gallery').imageUploader({
    label: 'Drag & Drop files here or click to browse',
    imagesInputName: 'gallery',
    extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
    mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
    maxSize: 1 * 1024 * 1024, // 1 Mega
    maxFiles: 5
});

KTUtil.onDOMContentLoaded(function() {
   handleFormSubmitFunc('Edit{{ $trans }}');
});
@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
tinymce.init({selector: ('.editor{{ substr($properties['regional'], 0, 2) }}'), height : "280"});
@endforeach
</script>
@stop