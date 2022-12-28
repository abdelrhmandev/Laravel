<script>
 
    
            function exportButtonsXXXX(){
        // Shared variables
        var table;
        var dt;
        var filterStatus;
             alert('dasdsa');
          
                const documentTitle = 'بسم الله الرحمن الرحيم';
                 buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            title: documentTitle,
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            },
                            charset: 'utf-8',
                            bom: 'true',                                                                  
                        },{
                            extend: 'excelHtml5',
                            title: documentTitle,
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            },
                            charset: 'utf-8',
                            bom: 'true',                            
                        },{
                            extend: 'csvHtml5',
                            title: documentTitle,
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            },
                            charset: 'utf-8',
                            bom: 'true',   
    
                        },{
                            extend: 'pdfHtml5',                           
                            title: documentTitle,
                            exportOptions: {
                                columns: "thead th:not(.noExport)",
                            },
                            charset: 'utf-8',
                            bom: 'true', 
                                                     
                        }
                    ]
                }).container().appendTo($('#kt_datatable_buttons'));
    
                // Hook dropdown menu click event to datatable export buttons
                const exportButtons = document.querySelectorAll('#kt_datatable_export_menu [data-kt-export]');
                exportButtons.forEach(exportButton => {
                    exportButton.addEventListener('click', e => {
                        e.preventDefault();
                        // Get clicked export value
                        const exportValue = e.target.getAttribute('data-kt-export');
                        const target = document.querySelector('.dt-buttons .buttons-' + exportValue);
                        // Trigger click event on hidden datatable export buttons
                        // ABDO //////////////////
                         Swal.fire({
                                    text: "Customer list has been successfully exported!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                })                               
                                ///////////////////////////////
                        target.click();
                    });
                });
           
     
                table = document.querySelector('#kt_datatable');
                if ( !table ) {
                return;
                }
                exportButtonsXXXX();    
               
               
            
            }
    
 
        </script>