<div class="card card-flush">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('site.image')}}</h2>
        </div>
    </div>
    <div class="card-body text-center pt-1 mt-1 fl">
        <style>.image-input-placeholder { 
            background-image: url({{ asset('assets/backend/media/svg/files/blank-image.svg')}}); 
            } [data-theme="dark"] .image-input-placeholder { 
                background-image: url({{ asset('assets/backend/media/svg/files/blank-image.svg')}}); 
            }
            </style>
        @if(isset($image))
        <style>.image-input-placeholder {             
            background-image: url({{ asset($image)}}); 
            } [data-theme="dark"] .image-input-placeholder { 
                background-image: url({{ asset($image)}}); 
            }
            </style>
        @endif
        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
            <div class="image-input-wrapper w-150px h-150px"></div>
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ __('site.change_image')}}">
                <i class="bi bi-pencil-fill fs-7"></i>
                <input class="my-image-selector" type="file" name="image" id="image"
                accept=".png, .jpg, .jpeg"
                data-fv-file="true" 
                data-fv-file___extension="jpeg,jpg,png" 
                data-fv-file___type="image/jpeg,image/jpg,image/png" 
                data-fv-file___message="{{  __('validation.mimetypes',['attribute'=>'image','values'=>'*.png, *.jpg and *.jpeg']) }}"
                />
                <input type="hidden" name="image_remove" />
            </label>            
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" id="cancel_image" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ __('site.cancel') }}">
                <i class="bi bi-x fs-2"></i>
            </span>
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" id="remove_image" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{ __('remove.cancel') }}">
                <i class="bi bi-x fs-2"></i>
            </span>
        </div>
        <div class="text-muted fs-7">{{ __('site.uploadOnlyImages')}}</div>
        @if(isset($image))
        <div class="mt-2 form-check form-check-custom form-check-danger form-check-solid">
            <input class="form-check-input" type="checkbox" name="drop_image_checkBox" value="1" />
            <label class="form-check-label text-danger" for="">
               <i>{{ __('site.remove_image')}}</i>
            </label>
        </div>
        @endif
        @error('image')
        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>