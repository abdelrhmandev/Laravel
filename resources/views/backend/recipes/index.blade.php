<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Export to PDF</title>
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
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

  {{-- https://datatables.net/forums/discussion/70518/datatable-pdfmaker-export-pdf-changing-font-to-calibri --}}
  
  

  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

</head>

<body>


  https://github.com/bpampuch/pdfmake/issues/2391
https://datatables.net/forums/discussion/68334/export-pdf-with-different-font-not-finding-new-font

https://datatables.net/forums/discussion/51827/how-i-change-font-family-in-pdf-export

https://stackoverflow.com/questions/60548170/changing-font-in-datatables-pdfmaker-extension


<div style="margin: 20px;">

<table id="example" class="display nowrap dataTable cell-border" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Adélaïde Nixon</td>
                <td><font face="verdana">الفبای فارسی ۱۲۳۴</font></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Data</th>
            </tr>
        </tfoot>
    </table>

</div>

<script type="text/javascript">

  $(document).ready(function() {
    $('#example').DataTable({

      dom: 'Bfrtip',
      buttons: [{
        extend: 'pdf',
        customize: function ( doc ) {
          processDoc(doc);
        }
      }]
    });
  });

  function processDoc(doc) {

 
this.pdfMake = this.pdfMake || {}; this.pdfMake.vfs = {
  "arial.ttf": "http://innandgohotels.com/assets/fonts/arial/rial.ttf",
 
};

 
 
 
  }

</script>

</body>
</html>