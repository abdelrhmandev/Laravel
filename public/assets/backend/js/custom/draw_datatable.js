function loadDatatable(route,dynamic_columns){
 

 

    alert(dynamic_columns);
    // Shared variables
    var table;
    var dt;
    var filterStatus;
        
        var lang = document.dir == 'rtl' ? 'ar' : 'en-GB';        
        dt = $("#kt_datatable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,                
            info: true, 
            bPaginate: true,    
            orientation: 'landscape',     
            exportOptions: {
                orthogonal: "myExport",
            },    
            pagingType: "full_numbers",
            language: {
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/"+lang+".json",
            },
            fnDrawCallback: function() {
                if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) < 1) {
                    $('.dataTables_paginate').css("display", "none"); $('.dataTables_length').css("display", "none"); $('.dataTables_info').css("display", "none");            
                }else{
                    $('.dataTables_paginate').css("display", "block"); $('.dataTables_length').css("display", "block"); $('.dataTables_info').css("display", "block");            
                }   
               
            },         
            iDisplayLength: 10,
            bLengthChange: true,
            stateSave: false,
            lengthMenu: [[1, 10, 25, 50, -1], [1, 10, 25, 50, "AllXXX"]],
            order: [],
            select: {
                style: 'os',
                selector: 'td:first-child input[type="checkbox"]',
                className: 'row-selected'
            },               
            ajax: {
                url: route,
            },
     
            columns: [
              { 
                columns
              },
            ],            
            columnDefs: [
                {
                    targets: 0,
                    exportable: false,
                    printable: false,
                    searchable: false,
                    orderable: false,
                        render: function (data) {
                            return `
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" class="sub_chk" data-id="${data}" value="${data}" type="checkbox" />
                                </div>`;
                        }
                },{
                    targets: -1,
                    data: null,
                    exportable: false,
                    printable: false,
                    searchable: false,                    
                    orderable: false,
                    className: 'text-end',                        
                },
            ],
 
        });    
          
                  // Handle Export 
                  var exportButtons = function (){
            const documentTitle = 'بسم الله الرحمن الرحيم';
            var buttons = new $.fn.dataTable.Buttons(table, {
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
                        customize: function(doc) {                           
                            proccessdoc(doc);
                        },                            
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
        }
      
          table = document.querySelector('#kt_datatable');
          if ( !table ) {
          return;
          }
          exportButtons();  
 
    }