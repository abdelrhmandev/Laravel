<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Test PDF أهلا وسهلا بكم</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://datatables.net/media/css/site-examples.css">

  <!-- buttons -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 
  <script src="{{ asset('assets/backend/js/custom/pdfMake/processExportedPDFDoc.js')}}"></script>  


  <script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_fonts2.js')}}"></script>  

   
 
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

</head>

<body>
 


<div style="margin: 20px;" dir="ltr">

    @if(app()->getLocale() === 'en')
    <table class="table" id="example">
    <thead>
      <tr>
        <th>Name</th>    
        <th>Job</th> 
   </tr>        
    </thead>
    <tbody>
        @for ($i=0;$i<=0;$i++)            
        <tr>
          <td> Abdo</td>
          <td> Web Developer</td>
          </tr>
          @endfor
    </tbody>
</table>
@elseif(app()->getLocale() === 'ar')
<table class="table" id="example" dir="rtl">
    <thead>
      <tr>
        
    
        <th>الأسم  بالكامل</th>

        <th>المهنه</th>
        <th>الأسم  بالكامل</th>

        <th>المهنه</th>
        <th>الأسم  بالكامل</th>

        <th>المهنه</th>

   </tr>        
    </thead>
    <tbody>
        @for ($i=0;$i<=0;$i++)            
        <tr>
          <td> عبدالرحمن  مجدي</td>
          <td> مبرمج</td>          <td> عبدالرحمن  مجدي</td>
          <td> مبرمج</td>          <td> عبدالرحمن  مجدي</td>
          <td> مبرمج</td>
 
          </tr>
          @endfor

         

    </tbody>
</table>

@endif

<?php 
$path = 'http://kashif-sa.com/logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
{{-- https://gist.github.com/usmcamp0811/12861eb9a2ea84be488fb50e2f398597 --}}
</div>

<script type="text/javascript">




$(document).ready(function() {
     $('#example').DataTable({
         dom: 'Bfrtip',
         buttons: [{
             extend: 'pdfHtml5',
             pagesize: 'A5',
             className: 'btn btn-table-pdf',
             orientation: 'landscape',
    

             
             exportOptions: {
                 orthogonal: "PDF",
                 columns: ':visible',
                 alignment: "right",
                 modifier: {order: 'index', page: 'current'}
                                   
             },
             customize: function(doc) {
                 processExportedPDFDoc(doc,'{{ app()->getLocale() }}');
             }
         }],
         columnDefs: [{
             targets: '_all',
             render: function(data, type, row) {                
                 return data;
             }
         }],
         language: {
             "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json"
         }
     });
 });


 
</script>



</body>
</html>