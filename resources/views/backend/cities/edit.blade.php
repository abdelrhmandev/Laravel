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

 
@stop
@section('content')

    <div class="container-xxl" id="kt_content_container">
        <form id="Edit{{ $trans }}" data-route-url="{{ $updateRoute }}" class="form d-flex flex-column flex-lg-row"            
            data-form-submit-error-message="{{ __('site.form_submit_error')}}"
            data-form-agree-label="{{ __('site.agree') }}" 
            enctype="multipart/form-data">            

            @method('PUT') 
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <!--begin::General options-->
                
                <div class="card card-flush py-0">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>{{ __($trans.'.edit')}}</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                          <div class="d-flex flex-column gap-5">
                            <div class="separator"></div>                        
                                <x-backend.langs.ulTabs/>
                                <x-backend.langs.LangInputs :showDescription="0" :richTextArea="0" :showSlug="0" :row="$row" :columnvalues="$TrsanslatedColumnValues" />                    
                            </div>                        
                    </div>
                </div>
                <x-backend.btns.button :destroyRoute="$destroyRoute" :redirectRoute="$redirect_after_destroy" :row="$row" :trans="$trans"/>
            </div>
            

     
            
            <div class="d-flex flex-column flex-row-fluid gap-0 w-lg-400px gap-lg-5">
                <x-backend.cms.image :image="$row->image"/>                    
                <x-backend.cms.featured :featured="$row->featured" :action="'edit'" />
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
<script src="{{ asset('assets/backend/plugins/custom/file-upload/image-uploader.min.js') }}"></script>
<script>


    $(document).ready(function(){
        
        function fetchmedia(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });     
        $.ajax({
            url: '{{ route('admin.AjaxLoadGallery',$row) }}',
            type:"GET",
            cache: false,
            dataType: "json",
            success:function(response){     
                
                // $("#galleryAjaxJsResponse").append(response.html);
                $('#galleryAjaxJsResponse').html(response.html);

                if(response.counter){
                    document.querySelector("#galleryCounter").innerHTML=response.counter;                    
                }else{
                    document.querySelector("#EmptygalleryMsg").innerHTML='{{ __('site.listbox.text_empty')}}'; 
                    document.querySelector("#galleryCounter").innerHTML=0;   
                }
            }            
        });
    }
    fetchmedia();
    });


//https://www.itsolutionstuff.com/post/laravel-ajax-delete-request-example-tutorialexample.html#google_vignette
//https://laracasts.com/discuss/channels/general-discussion/ajax-delete-function

///////////////////////////////////
    $(document).on('click', '.delete_media_btn', function (e) {
        e.preventDefault();
        var id = $(this).val();
        var url = '{{ route("admin.delete_media_image", ":id") }}';
        url = url.replace(':id', id); 
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id:id,
                post_id: '{{ $row->id }}',
            },
            dataType: "json",
            success: function(data) {
                $("#"+data['div']).fadeOut(300, function(){ $(this).remove();});                
                document.querySelector('#galleryCounter').innerHTML = data['counter']; 
                if(data['counter'] < 1){
                    $("#gallery").hide();  
                    document.querySelector("#EmptygalleryMsg").innerHTML='{{ __('site.listbox.text_empty')}}'; 
                } 
            },
            error: function() {
                alert('Error occured');
            }
        });
    });
////////////

 
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