<!DOCTYPE html>

<html>

<head>

    <title>ABDO server side</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>

    
</head>

<body>

    

<div class="container">

    <h1>ABDO Laravel Datatables Server Side Data Processing Example </h1>

    <table class="table table-bordered data-table">

        <thead>

            <tr>
				<th></th>
                <th>#</th>
                <th>Image</th>
                <th>title</th>
                <th>Slug</th>
                <th>Tags</th>
                <th>description</th>
                <th>created_at</th>
                <th>updated_at</th>
				{{-- <th>Tags</th> --}}
                <th width="100px">Action</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>

</div>

   

</body>

   
{{-- https://laracasts.com/discuss/channels/laravel/yajra-datatable-issue-with-eloquent --}}
<script type="text/javascript">

  $(function () {    
    var table = $('.data-table').DataTable({
        dom: "<'row'<'col-md-4 col-sm-12'<'pull-left'f>><'col-md-8 col-sm-12'<'table-group-actions pull-right'B>>r><'table-container't><'row'<'col-md-12 col-sm-12'pli>>", // datatable layout


        processing: true,
        serverSide: true,
        responsive: true,
        lengthMenu: [[1, 10, 25, 50, -1], [1, 10, 25, 50, "AllXXX"]],
        pageLength: 10,
        // dom: 'Bfrtip',
 
        ajax: "{{ route('recipes.index') }}",
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       //
       columns: [
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},                  
			{data: 'translate.title', name: 'translate.title'},
            {data: 'translate.slug', name: 'translate.slug'},
            {data: 'tags', name: 'tags'},
            {data: 'translate.description', name: 'translate.description'},            
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        //

        // https://blog.quickadminpanel.com/how-to-customize-datatables-6-most-requested-tips/
        language: {
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/{{ app()->getLocale()}}.json",
            "processing": '<img src="/template/images/loader.gif"> Loading results...'
        },
        // 
        pagingType: "full_numbers",
        //
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
     
        



    });

    

  });


</script>
{{-- //   <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> --}}
{{-- // ->editColumn('tags', function($row) {
    //     $tags = '';
    //     foreach($row->tags as $tag){
    //         $tags.= $tag->translate->title.',';
    //     }    
    //     return $tags;
    // }) --}}

</html>