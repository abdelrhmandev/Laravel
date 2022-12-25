<script>
$(document).ready(function() {
     $('#kt_recipes_datatable').DataTable({
         dom: 'Bfrtip',

         ajax: {
                url: "{{ route('recipes.index')}}",
            },
            columns: [
                { data: 'id', name: 'id',exportable:false},
                { data: 'translate.title', name: 'translate.title'},
                { data: 'category_id', name: 'category_id'},
                // { data: 'tags', name: 'tags'},
                // { data: 'comments', name: 'comments'},
                { data: 'status', name: 'status'},
                // { data: 'featured', name: 'featured'},
                { data: 'created_at', name: 'created_at'},
                { data: null },
            ],
                     
         buttons: [{
             extend: 'pdfHtml5',
             exportOptions: {
                 orthogonal: "PDF",
                 columns: [0,1].reverse(),
                 alignment:'right',
                                   
             },
             customize: function(doc) {
                 processDoc(doc);
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
 }
</script>
    