<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>ssssssssssss</h2>     
        </div>

{{-- 
    required
data-fv-not-empty___message="{{  __('validation.required',['attribute'=>'image']) }}"
fl 
form-control
 --}}
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body text-center pt-0">
        <!--begin::Image input-->
        <!--begin::Image input placeholder-->
        <style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
        <!--end::Image input placeholder-->
        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
            <!--begin::Preview existing image-->
            <div class="image-input-wrapper w-150px h-150px"></div>
            <!--end::Preview existing image-->
            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                <i class="bi bi-pencil-fill fs-7"></i>
                <!--begin::Inputs-->
                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="image_remove" />
                <!--end::Inputs-->
            </label>
            <!--end::Label-->
            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
                <i class="bi bi-x fs-2"></i>
            </span>
            <!--end::Cancel-->
            <!--begin::Remove-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
                <i class="bi bi-x fs-2"></i>
            </span>
            <!--end::Remove-->
        </div>
        <!--end::Image input-->
        <!--begin::Description-->
        <div class="text-muted fs-7">Only *.png, *.jpg and *.jpeg image files are accepted</div>

        @error('image')
        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
        @enderror
        <!--end::Description-->
    </div>
   
    <!--end::Card body-->
</div>
<!--end::Thumbnail settings-->
<!--begin::Status-->
 
<!--end::Status-->

<!--begin::Weekly sales-->
 
<!--end::Weekly sales-->
<!--begin::Template settings-->
