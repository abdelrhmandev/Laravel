@extends('layouts.app')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div id="kt_content_container" class="container-xxl">
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Layout-->
            <!--begin::Sidebar-->
            @include('partials.backoffice.sidebar-project')
            <!--end::Sidebar-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <form class="form" action="{{ url('observer/hand-offer-tour')}}" novalidate="novalidate" method="post">
                    @csrf
                    <div class="col-xl-12">
                        <div class="card card-xl-stretch mb-xl-8">
                            <div class="card-header">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">صور للجولة الإستكشافية</span>
                                </h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="kt_table_widget_7_tab_1">
                                        <div class="table-responsive">
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_tour_img">
                                                    @foreach($project_tour_files->where('file_type', 'img') as $project_tour_file)
                                                    <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                        <div class="dz-image">
                                                            <img data-dz-thumbnail="" alt="{{ asset('storage/'.$project_tour_file->file) }}" src="{{ asset('storage/'.$project_tour_file->file) }}" width="120px" height="120px">
                                                        </div>
                                                        <div class="dz-progress">
                                                            <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span>
                                                        </div>
                                                        <div class="dz-error-message"><span data-dz-errormessage=""></span>
                                                        </div>
                                                        <div class="dz-success-mark">
                                                            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>Check</title>
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dz-error-mark">
                                                            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>Error</title>
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                                        <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <a class="dz-remove" href="javascript:deleteToutrFile({{$project_tour_file->id}})" data-dz-remove="">Remove file</a>
                                                        
                                                    </div>
                                                    @endforeach
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->

                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">يمكنك رفع صور الجولة الإستكشافية هنا</h3>
                                                            <span class="fs-7 fw-semibold text-gray-400">عدد الملفات المسموح به 10 ملفات</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card card-xl-stretch mb-xl-8">
                            <div class="card-header">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">فيديوهات الجولة الإستكشافية</span>
                                </h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="kt_table_widget_7_tab_1">
                                        <div class="table-responsive">
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_tour_video">
                                                    @foreach($project_tour_files->where('file_type', 'video') as $project_tour_file)
                                                    <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                        <div class="dz-image">
                                                            <img data-dz-thumbnail="" alt="1" src="{{ asset('assets/media/svg/files/'.\File::extension(asset('storage/' . $project_tour_file->file)).'.svg') }}" width="120px" height="120px">
                                                        </div>
                                                        <div class="dz-progress">
                                                            <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span>
                                                        </div>
                                                        <div class="dz-error-message"><span data-dz-errormessage=""></span>
                                                        </div>
                                                        <div class="dz-success-mark">
                                                            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>Check</title>
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dz-error-mark">
                                                            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>Error</title>
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                                        <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <a class="dz-remove" href="javascript:deleteToutrFile({{$project_tour_file->id}})" data-dz-remove="">Remove file</a>
                                                    </div>
                                                    @endforeach
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->

                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">يمكنك رفع مقاطع الفيديو للجولة الإستكشافية هنا</h3>
                                                            <span class="fs-7 fw-semibold text-gray-400">عدد الملفات المسموح به 10 ملفات</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card card-xl-stretch mb-xl-8">
                            <div class="card-header">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">خطابات/وثائق الجولة الإستكشافية</span>
                                </h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="kt_table_widget_7_tab_1">
                                        <div class="table-responsive">
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone" id="kt_tour_file">
                                                    @foreach($project_tour_files->where('file_type', 'file') as $project_tour_file)
                                                    <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                        <div class="dz-image">
                                                            <img data-dz-thumbnail="" alt="1" src="{{ asset('assets/media/svg/files/'.\File::extension(asset('storage/' . $project_tour_file->file)).'.svg') }}" width="120px" height="120px">
                                                        </div>
                                                        <div class="dz-progress">
                                                            <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span>
                                                        </div>
                                                        <div class="dz-error-message"><span data-dz-errormessage=""></span>
                                                        </div>
                                                        <div class="dz-success-mark">
                                                            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>Check</title>
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="dz-error-mark">
                                                            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>Error</title>
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                                        <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remove file</a>
                                                    </div>
                                                    @endforeach
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->

                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">يمكنك رفع ملفات الجولة الإستكشافية هنا</h3>
                                                            <span class="fs-7 fw-semibold text-gray-400">عدد الملفات المسموح به 10 ملفات</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="project_id" id="project_id" value="{{ $row->id }}" />
                    <input type="hidden" name="tour_id" id="tour_id" value="{{ $project_explore_tour->id }}" />
                    <div class="text-center mt-8">
                        <button type="reset" id="kt_edit_project_cancel" class="btn btn-secondary me-3">{{ __('site.cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{ __('site.submit')}}</button>
                    </div>
                </form>
            </div>
            <!--end::Content-->
            <!--end::Layout-->
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    let APP_URL = "{{ env('APP_URL')}}";
</script>
<script>
    var urlTo =  "{{ url('observer/upload-tour-files') }}";
    var urlRemove = "{{ url('observer/remove-tour-file') }}";

    new Dropzone("#kt_tour_img", {

        
        url: urlTo, // Set the url for your upload script location
        method: "post",
        maxFiles: 10,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        init: function() {
            this.on("sending", function(file, xhr, formData) {
                formData.append("fileType", "img");
                formData.append("tour_id", $('#tour_id').val());
            });
        },
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });

    new Dropzone("#kt_tour_video", {
        url: urlTo, // Set the url for your upload script location
        method: "post",
        maxFiles: 10,
        maxFilesize: 500, // MB
        addRemoveLinks: true,
        acceptedFiles: "video/*",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        init: function() {
            this.on("sending", function(file, xhr, formData) {
                formData.append("fileType", "video");
                formData.append("tour_id", $('#tour_id').val());
            });
        },
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });

    new Dropzone("#kt_tour_file", {
        url: urlTo, // Set the url for your upload script location
        method: "post",
        maxFiles: 10,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        acceptedFiles: "application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        init: function() {
            this.on("sending", function(file, xhr, formData) {
                formData.append("fileType", "file");
                formData.append("tour_id", $('#tour_id').val());
            });
            this.on("removedfile", function(file) {
                console.log(file)
                console.log('file')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: urlRemove,
                    dataType: "json",
                    data: {
                        'id': $('#file_id').val()
                    },
                });
            });
        },
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });

function deleteToutrFile(id){

    ///////////////////
    Swal.fire({
    text: "{{ __('site.confirmMultiDeleteMessage') }}" + "؟",
    icon: "warning",
    showCancelButton: true,
    buttonsStyling: false,
    showLoaderOnConfirm: true,
    confirmButtonText: "{{ __('site.confirmButtonText') }}",
    cancelButtonText: "{{ __('site.cancelButtonText') }}",
    customClass: {
        confirmButton: "btn fw-bold btn-danger",
        cancelButton: "btn fw-bold btn-active-light-primary"
    },
}).then(function(result) {
    const destroyRoute =  "{{ url('observer/remove-tour-file') }}";

    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: destroyRoute,
        data: {
            '_method': 'delete',
            'id': id,
        },
        success: function(response, textStatus, xhr) {
            if (result.value) {
                Swal.fire({
                    text: "{{ __('site.deletingselecteditem') }}",
                    icon: "info",
                    buttonsStyling: false,
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    Swal.fire({
                        text: response['msg'], // respose from controller
                        icon: response['status'],
                        buttonsStyling: false,
                        confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    }).then(function() {
                        // delete row data from server and re-draw datatable
                        dt.draw();
                    });

                    // Remove header checked box
 
                });
            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "{{ __('site.notdeletedMessage') }}",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",

                    }
                });
            } // end of cancel case
        }
    });
});


/////////////////

}
</script>
@stop