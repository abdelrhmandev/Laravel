<script>
 $(document).ready(function() {
    var table = $("#kt_recipes_datatable").DataTable({
        dom: "Bfrtip",
        "buttons": [{
            searchDelay: 500,
            processing: true,
            serverSide: true,                
            info: true, 
            bPaginate: true,               
            extend: "pdfHtml5",
            orientation: 'landscape',
            pageSize: 'A4',
            exportOptions: {
                orthogonal: "myExport",
                columns: [4, 3, 2, 1, 0],
            },
            language: {
              //cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json
              //cdn.datatables.net/plug-ins/1.12.1/i18n/en-GB.json   
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json",
            },
            ajax: {
                url: "{{ route('recipes.index')}}",
            },
            columns: [
                { data: 'translate.title', name: 'translate.title'}, 
            ],            
            customize: function(doc) {
                doc.defaultStyle = {
                    font: 'Cairo',
                };
                doc.styles.tableBodyEven.alignment = "center";
                doc.styles.tableBodyOdd.alignment = "center";
            },
        }, {
            extend: 'excelHtml5',
            exportOptions: {
                columns: ':visible'
            }
        }, ],
        columnDefs: [{
            // targets: '_all',
            targets: "hiddenCols",
            visible: false,
            render: function(data, type, row) {
                if (type = 'myExport') {
                    return data.split(' ').reverse().join(' ');
                }
                return data;
            }
        }]
    });
});
//////////
function processDoc(doc) {
 
doc.defaultStyle.color = "green";
doc.defaultStyle.Arial = "trado";
doc.styles.message.alignment = "right";
doc.styles.tableBodyEven.alignment = "center";
doc.styles.tableBodyOdd.alignment = "center";
doc.styles.tableFooter.alignment = "center";
doc.styles.tableHeader.alignment = "center";
 

 
}
</script>
    