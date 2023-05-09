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
        .my-field-error .fv-plugins-message-container,
        .my-field-error .fv-plugins-icon {
            font-size: 0.925rem;
            color: #f1416c;



        }

        .my-field-success .fv-plugins-message-container,
        .my-field-success .fv-plugins-icon {
            font-size: 0.925rem;
            font-weight: 400;
            color: #2780e3;
        }
    </style>




@stop
@section('content')

    <div class="container-xxl" id="kt_content_container">
        {{-- <form id="defaultForm" method="post" class="form-horizontal" action="target.php"
    data-bv-message="This value is not valid"
    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
  <div class="form-group">
      <label class="col-lg-3 control-label">Full name</label>
      <div class="col-lg-4">
          <input type="text" class="form-control" name="firstName" placeholder="First name" data-bv-trigger="keyup" required data-bv-notempty-message="The first name is required and cannot be empty" />
      </div>
 
  </div>
  <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
          <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
  </div>
</form> --}}


        <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="../../demo7/dist/apps/ecommerce/catalog/categories.html">
            <!--begin::Aside column-->

            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>General</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->



                            <ul id="uiID" class="nav nav-tabs" role="tablist">
                                <?php $i = 1; ?>											 
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if($properties['name'] == 'English')
                                @php $flag = '012-uk.svg'; @endphp
                                @else
                                @php $flag = '021-egypt.svg';@endphp
                                @endif
                                <li class="nav-item">
                                <a data-toggle="tab" hreflang="{{$localeCode}}" href="#{{ $properties['name'] }}" class="nav-link {{{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'active':''}}}"><span class="kt-header__topbar-icon"><img width="20" height="15" src="{{ asset('backend/assets/media/flags/'.$flag)}}" alt=""></span> <i class="fa"></i>{{ $properties['native'] }}</a></li>
                                <?php $i++;	?>
                                @endforeach
                                </ul>


                                <div class="tab-content">
                                    <?php $ii = 1; ?>											 
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode2 => $properties2)
                                        <?php $lang = substr($properties2['regional'],0,2);?>
                                        <div class="tab-pane {{{ LaravelLocalization::getCurrentLocaleName() == $properties2['name'] ? 'active':''}}}" id="{{ $properties2['name'] }}">
            
                                            <div class="form-group row">
                                                <label class="col-lg-12 control-label" for="title_{{ $lang }}">  [{{ trans('admin.'.$lang) }}] <span class="text-danger">*</span></label>
                                                <div class="col-lg-12">
                                                @php $title_value = old('title_'.$lang); @endphp
                                                @php if(isset($object->id)) { $value = 'title_'.$lang; $title_value = $object->$value; } @endphp
                                                <input class="form-control" type="text" name="title_{{ $lang }}" value="{{ $title_value }}" id="title_{{ $lang }}">
                                                @error('title_'.$lang)<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                                </div>
            
                                                
                                        </div>
                                    <?php $ii++;	?>
                                    @endforeach
                                    </div>

                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->

                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::General options-->
                <!--begin::Meta options-->

                <!--end::Automation-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="../../demo7/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel"
                        class="btn btn-light me-5">Cancel</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                        <span class="indicator-label">Save Changes</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Main column-->
        </form>

    </div>
@stop








@section('scripts')
    <script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
    <script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/abdo/apply2.js') }}"></script>

    <script>
        let elements = document.querySelectorAll('.editor')
        for (let element of elements) {
            ClassicEditor.create(element, {})
                .then(editor => {
                    element.ckEditor = editor;
                })
                .catch(err => {
                    console.error(err.stack);
                });
        }
    </script>

    <!--end::Custom Javascript-->
@stop
