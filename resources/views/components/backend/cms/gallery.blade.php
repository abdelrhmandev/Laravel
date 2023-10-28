<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('site.gallery') }}</h2>
            <small class="p-2">You can only upload 5 files <b>'.jpg', '.jpeg', '.png', '.gif', '.svg' </b> <i>Max File Size 200 KB</i></small>
        </div>
    </div>

    <div class="card-body pt-0">
        <div class="input-field">
            <div class="gallery" style="padding-top: .5rem;"></div>
            <div class="uppy uppy-Informer" id="galleryMessageJsResponse"></div>            
        </div>
    </div>
///////////



<div class="py-5">
    <!--begin::Wrapper-->
    <div class="rounded border p-10 p-lg-20">
        <!--begin::Row-->
        <div class="row">
            <!--begin::Col-->
            
            <!--end::Col-->

            <!--begin::Col-->
            
            
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-lg-4">
                <!--begin::Overlay-->
                <a class="d-block overlay" data-fslightbox="lightbox-basic" href="https://fastly.picsum.photos/id/272/500/500.jpg?hmac=n179Emd03KzUox2ubo8LY3cEdvAdYtu5zLpR9bW9QqA">       
                    <!--begin::Image-->
                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('https://fastly.picsum.photos/id/272/500/500.jpg?hmac=n179Emd03KzUox2ubo8LY3cEdvAdYtu5zLpR9bW9QqA')">                       
                    </div>
                    <!--end::Image-->

                    <!--begin::Action-->
                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                        <i class="bi bi-eye-fill text-white fs-3x"></i>     
                    </div>  
                    <!--end::Action-->      
                </a>  
                <!--end::Overlay--> 
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->            
    </div>
    <!--end::Wrapper-->
</div>

/////////////
    
    {{-- @if(isset($media) && count($media)>0)
    @foreach ($media as $gallery) 
    <p>
        {{  $gallery->id }}
    <input type="checkbox" name="delete_gallery_image[]" value="{{  $gallery->id }}">
    <img width="60" src="{{ asset($gallery->file) }}">
    </p>
    @endforeach
    @endif --}}
    


</div>
