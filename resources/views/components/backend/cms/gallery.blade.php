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
 

    <div class="row g-2 g-xl-4 mb-xl-1">
        <!--begin::Col-->
        @if(isset($media) && count($media)>0)
        @foreach ($media as $gallery) 
        <div class="col-sm-3">
            <!--begin::Player card-->
            <div class="m-0">
                <!--begin::User pic-->
                <div class="card-rounded position-relative">
                    <!--begin::Img-->
                    <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-150px card-rounded" style="background-image:url('{{ asset($gallery->file) }}')"></div>
                    <!--end::Img-->
                    <!--begin::Play-->
                    <button class="btn btn-icon h-auto w-auto p-0 ms-4 mb-4 position-absolute bottom-0 right-0" data-kt-element="list-play-button">                              
                        <div class="form-check form-check-custom form-check-danger form-check-solid">
                            <input class="form-check-input" type="checkbox" name="delete_media[]" value="{{ $gallery->id}}" id="delete_gallery{{ $gallery->id}}" checked="checked">
                            <label class="form-check-label" for="same_as_billing">Delete</label>
                        </div>

                    </button>
                    <!--end::Play-->
                </div>
                <!--end::User pic-->
                <!--begin::Info-->
                
                <!--end::Info-->
            </div>
            <!--end::Player card-->
        </div>
        @endforeach
        @endif
        
        <!--end::Col-->
        <!--begin::Col-->
        
        <!--end::Col-->
        <!--begin::Col-->
        
        <!--end::Col-->
        <!--begin::Col-->
      
        <!--end::Col-->
    </div>



</div>

</div>
