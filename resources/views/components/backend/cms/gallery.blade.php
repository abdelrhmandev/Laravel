<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('site.gallery') }}</h2>
            <small class="p-2">You can only upload 5 files Max File Size 200 KB</small>
        </div>
    </div>

    <div class="card-body pt-0">
        <div class="input-field">
            <div class="gallery" style="padding-top: .5rem;"></div>
            <div class="uppy uppy-Informer" id="galleryMessageJsResponse"></div>            
        </div>

        @error('gallery.*')
        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
        @enderror

    </div>
</div>
