<div id="galleryCounter" style="background: green;"></div>
<div id="EmptygalleryMsg"></div>
<div class="row mw-700px mb-5">
  <!--begin::Col-->
 
  <!--end::Col-->
  @foreach ($media as $gallery)
  <!--begin::Col-->
  <div class="col-3">
    <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{ asset($gallery->file) }}">
      <!--begin::Image-->
      <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
          style="background-image:url('{{ asset($gallery->file) }}')">
      </div>
      <!--end::Image-->
  
      <!--begin::Action-->
      <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
          <i class="bi bi-eye-fill text-white fs-3x"></i>
      </div>
      <!--end::Action-->
  </a>
  <button id="delete_item" data-back-list-text="Back to List" data-destroy-route="http://localhost/laravel/public/en/admin/posts/1" data-confirm-message="Are you sure you want to delete Post" data-confirm-button-text="Yes, delete!" data-cancel-button-text="No, cancel" data-confirm-button-textgotit="Ok, got it!" data-delete-selected-records-text="Delete Selecetd Post" data-redirect-url="http://localhost/laravel/public/en/admin/posts" data-deleting-selected-items="Deleting selected Post" data-not-deleted-message="Selected Post was not deleted." class="btn btn-danger font-weight-bold">
    <i class="fa fa-trash-alt"></i>
           
    </button>

  </div>
  @endforeach 
  <!--end::Col-->

  <!--begin::Col-->
 
  <!--end::Col-->
</div>
<!--end::Row-->
 
<script src="{{ asset('assets/backend/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
 