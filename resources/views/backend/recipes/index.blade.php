<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>أهلا وسهلا بكم</title>
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
  
  
  <script src="{{ asset('assets/backend/js/custom/pdfMake/vfs_fonts.js')}}"></script>
  
  

  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

</head>

<body>
 


<div style="margin: 20px;" dir="rtl">

  <table class="table" id="example" dir="rtl">
    <thead>
      <tr>
        <th>الأسم بالكامل</th>
        <th>المهنه</th>
        <th>الأجراء الكبير</th>
  </tr>        
    </thead>
    <tbody>
        <tr>
          <td>عبدالرحمن مجدي</td>
          <td>مهندس</td>
          <td>تعديل و حذف</td>
        </tr>
        <tr>
          <td>محمد سيد</td>
          <td>طبيب</td>
          <td>تعديل و حذف</td>
        </tr>

    </tbody>
</table>
{{-- https://gist.github.com/usmcamp0811/12861eb9a2ea84be488fb50e2f398597 --}}
</div>

<script type="text/javascript">
$(document).ready(function() {
     $('#example').DataTable({
         dom: 'Bfrtip',
         buttons: [{
             extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'A4',             
             exportOptions: {
                 orthogonal: "PDF",
                 columns: [0,1],

                                   
             },
             customize: function(doc) {
                 processDoc(doc);
             }
         }],
         columnDefs: [{
             targets: '_all',
             render: function(data, type, row) {
                 if (type === 'PDF') {
                     return data.split(' ').reverse().join(' ');
                 }
                 return data;
             }
         }],
         language: {
             "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json"
         }
     });
 });

 function processDoc(doc) {
     pdfMake.fonts = {
         DroidKufi: {
             normal: 'DroidKufi-Regular.ttf',
             bold: 'DroidKufi-Regular.ttf',
             italics: 'DroidKufi-Regular.ttf',
             bolditalics: 'DroidKufi-Regular.ttf'
         }
     };
     
     
     doc.defaultStyle.font = 'DroidKufi';
     doc.defaultStyle.color = "red";
     
     doc.styles.tableBodyEven.alignment = "center";
     doc.styles.tableBodyOdd.alignment = "center";
     doc.styles.tableFooter.alignment = "center";
     doc.styles.tableHeader.alignment = "center";
     


     doc.styles.message.alignment = "right";

     
       
 }
</script>

</body>
</html>