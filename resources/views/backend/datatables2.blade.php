<script>
$(document).ready(function() {

 

    var table = $("#example").DataTable({
        dom: "Bfrtip",
        buttons: [{
            extend: "pdfHtml5",
            orientation: 'landscape',
            pageSize: 'A4',
            exportOptions: {
                orthogonal: "myExport",
                columns: [0],
            },

            customize: function ( doc ) {
            processDoc(doc);
        }
       
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


function processDoc(doc) {
  
 pdfMake.fonts = {
        Vazir: {
                normal: 'https://kalouttravel.com/public/fonts/vazir/Vazir-Medium-FD.ttf',
                bold: 'https://kalouttravel.com/public/fonts/vazir/Vazir-FD.ttf',
                italics: 'https://kalouttravel.com/public/fonts/vazir/Vazir-FD.ttf',
                bolditalics: 'https://kalouttravel.com/public/fonts/vazir/Vazir-FD.ttf'
        }
};
 
        //
    // https://pdfmake.github.io/docs/fonts/custom-fonts-client-side/
    //
    // Update pdfmake's global font list, using the fonts available in
    // the customized vfs_fonts.js file (do NOT remove the Roboto default):
 
doc.defaultStyle.font = Vazir;
doc.defaultStyle.color = "green";
doc.styles.message.alignment = "right";
doc.styles.tableBodyEven.alignment = "center";
doc.styles.tableBodyOdd.alignment = "center";
doc.styles.tableFooter.alignment = "center";
doc.styles.tableHeader.alignment = "center";

 
    
  
 }


</script>
    