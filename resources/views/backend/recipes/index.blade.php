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
        <th>المهنه الشاغرة</th>
        <th>الأجراء الكبير</th>
  </tr>        
    </thead>
    <tbody>
        <tr>
          <td>عبدالرحمن مجدي</td>
          <td>مهندس مدني</td>
          <td>تعديل و حذف</td>
        </tr>
        <tr>
          <td>أحمد مجدي</td>
          <td>طبيب عيون</td>
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
             pagesize: 'A3',
             orientation: 'landscape',

             
             exportOptions: {
                 orthogonal: "PDF",
                 columns: [0,1],
                 alignment:'right',
                 modifier: {order: 'index', page: 'current'}
                                   
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
       
        doc.content[1].table.widths = [ '40%',  '25%', '17.5%', '17.5%'];
        /* شغاله بس اسامي الاعمده مش منظمه
        for(var i=0;i<doc.content[1].table.body.length;i++){                                       
                doc.content[1].table.body[i]=doc.content[1].table.body[i].reverse(); // reverse columns headers
            for(var j=0;j<doc.content[1].table.body[i].length;j++){
                // doc.content[1].table.body[i][j]['text']=doc.content[1].table.body[i][j]['text'].split(' ').reverse().join(' '); // table headers is ok
            }
        }
       */
                        
       for(var i=0;i<doc.content[1].table.body.length;i++){                                       
                doc.content[1].table.body[i]=doc.content[1].table.body[i].reverse(); // reverse columns headers
            for(var j=0;j<doc.content[1].table.body[i].length;j++){
             }
        }     


        doc.content.splice(0,1);
        var now = new Date();
        var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
        doc.pageMargins = [20,60,20,30];
        doc.styles.tableHeader.fontSize = 20;
        

        doc.defaultStyle.font = 'DroidKufi';
        doc.content[0].alignment = 'right';        
        doc.defaultStyle.color = "green";
        doc.defaultStyle.fontSize = 10;     
        doc.styles.tableHeader.color = 'red';
        doc.styles.tableHeader.alignment = 'center';
 


        doc.styles.tableBodyEven.alignment = 'center';
        doc.styles.tableBodyEven.noWrap = true;
        doc.styles.tableBodyOdd.alignment = 'center';
        doc.styles.tableBodyOdd.noWrap = true;

         
       


 }
</script>

</body>
</html>