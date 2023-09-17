@extends('backend.base.base')
@section('breadcrumbs')
    <li class="breadcrumb-item text-dark">{{ __($trans . '.plural') }}</li>
@stop
@section('style')
    @if (app()->getLocale() === 'ar')
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
            type="text/css" />
    @endif
    <link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <div class="container-xxl" id="kt_content_container">
        <div class="row">
            <div class="col-5">
                @include('backend.categories.create')
            </div>
            <div class="col-7">
                @include('backend.categories.listing')
            </div>
        </div>
    </div>
    @stop
    @section('scripts')
    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
    KTUtil.onDOMContentLoaded(function() {
       handleFormSubmitFunc('Add{{ $trans }}');
    });
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    tinymce.init({selector: ('.editor{{ substr($properties['regional'], 0, 2) }}'), height : "280"});
    @endforeach
    </script>
    <script src="{{ asset('assets/backend/js/custom/pdfMake/pdfmake.min.js')}}"></script> 
    <script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_load_fonts.js')}}"></script>
    <script src="{{ asset('assets/backend/js/custom/pdfMake/pdfhandle.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    @include('backend.datatables')

    <script>
    var dynamicColumns = [ //as an array start from 0
    { data: 'id', name: 'id',exportable:false}, 
    { data: 'image', name: 'image' ,orderable: false,searchable: false},
    { data: 'translate.title', name: 'translate.title',orderable: false}, // 2
    { data: 'parent_id', name: 'parent_id',orderable: false,searchable: false},
    { data: 'count', name: 'count',orderable: false,searchable: false}, 
    { data: 'status', name: 'status',orderable: false,searchable: true}, // 5
    { data: 'created_at',name :'created_at', type: 'num', render: { _: 'display', sort: 'timestamp', order: 'desc'}}, // 6
    { data: 'actions' , name : 'actions' ,exportable:false,orderable: false,searchable: false},    
    ];
    KTUtil.onDOMContentLoaded(function () {
      loadDatatable('{{ __($trans.".plural") }}','{{ $redirectRoute }}',dynamicColumns,'5','2','6');
    });
    </script>

    @stop