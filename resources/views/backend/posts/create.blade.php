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







@stop
@section('content')


    <div class="container-xxl" id="kt_content_container">
        <!--begin::Form-->
        <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="../../demo7/dist/apps/ecommerce/catalog/products.html">

            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

                <div class="card card-flush py-4">

                    <div class="card-header">

                        <div class="card-title">
                            <h2>Thumbnail</h2>
                        </div>

                    </div>

                </div>




            </div>

            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">

                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_general">General</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_advanced">Advanced</a>
                    </li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <div class="card card-flush py-4">

                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General</h2>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <!--end::Tab pane-->
                </div>
                <!--end::Tab content-->

            </div>
            <!--end::Main column-->
        </form>
        <!--end::Form-->
    </div>


@stop








@section('scripts')
    <script src="https://www.chineseshaolins.com/js/formvalidation/plugins/Tachyons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/backend/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/utilities/modals/users-search.js') }}"></script>


    @include('backend.form')


    <!--end::Custom Javascript-->
@stop
