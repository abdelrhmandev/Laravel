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
    .multiselect-container .input-group {
  margin: 5px; }

.multiselect-container > li {
  padding: 0;
  font-size: 14px; }

.multiselect-container > li > a.multiselect-all label {
  font-weight: 700;
  color: gray; }

.multiselect-container > li.multiselect-group label {
  margin: 0;
  padding: 3px 20px 3px 20px;
  height: 100%;
  font-weight: 700; }

.multiselect-container > li.multiselect-group-clickable label {
  cursor: pointer; }

.multiselect-container > li > a {
  padding: 5px 0;
  color: #000;
  display: block; }

.multiselect-container > li > a > label {
  display: block;
  position: relative;
  padding-left: 20px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  font-weight: 500;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }
  .multiselect-container > li > a > label:before {
    content: "";
    display: inline-block;
    position: relative;
    height: 20px;
    width: 20px;
    border: 2px solid rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    background-color: transparent;
    margin-right: 15px;
    vertical-align: middle; }

.multiselect-container > li.active > a > label:before {
  font-family: 'fontAwesome';
  content: "\f00c";
  color: #fff;
  background-color: #52de97;
  border: 0;
  display: inline-block;
  padding: 0;
  line-height: 1.2;
  padding-left: 2px; }

.multiselect-container > li > a > label.radio, .multiselect-container > li > a > label.checkbox {
  margin: 0; }

.multiselect-container > li > a > label > input[type=checkbox] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0; }

.btn-group > .btn-group:nth-child(2) > .multiselect.btn {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px; }

.form-inline .multiselect-container label.checkbox, .form-inline .multiselect-container label.radio {
  padding: 3px 20px 3px 40px; }

.form-inline .multiselect-container li a label.checkbox input[type=checkbox],
.form-inline .multiselect-container li a label.radio input[type=radio] {
  margin-left: -20px;
  margin-right: 0; }
    </style>

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



        <form id="AddCategoryForm" data-route-url="{{ $storeUrl }}" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="{{ $redirectUrl }}" data-kt-add-new-item-label="{{ __('category.add') }}"
            data-kt-all-label="{{ __('category.plural') }}"
            data-form-submit-error-message="{{ __('site.form_submit_error')}}"
            data-form-agree-label="{{ __('site.agree') }}" 
            enctype="multipart/form-data">
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 mb-7 me-lg-10">
                <!--begin:::Tabs-->
                <x-backend.langs.ulTabs/>
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <x-backend.langs.LangInputs :description="1" :richTextArea="0" :slug="1" />

                <!--end::Tab content-->
                <x-backend.btns.create />
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-7 w-lg-400px gap-lg-10">
                <!--begin::Thumbnail settings-->
                  <x-backend.cms.image />

                    <x-backend.cms.select-single-option :categories="$categories" :level="0" />




                <x-backend.cms.publish />
                
                <!--end::Thumbnail settings-->
                <!--begin::Status-->         
            </div>
        </form>
    </div>
@stop








@section('scripts')

    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>



    <script>
// On document ready
KTUtil.onDOMContentLoaded(function() {
   handleFormSubmitFunc('AddCategoryForm');
});
   
@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
tinymce.init({selector: ('#description_{{ substr($properties['regional'], 0, 2) }}'), height : "280"});
@endforeach
</script>


    {{-- @include('backend.form') --}}
@stop
