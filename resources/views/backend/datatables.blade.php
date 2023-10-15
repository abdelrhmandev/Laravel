<script>
//table.ajax.json().recordsTotal
/*
var table = $('#example').DataTable();
 
var data = table.rows().data();
 
alert( 'The table has '+data.length+' records' );
*/
function loadDatatable(tableId,RouteListing,dynamicColumns,StatusColumn=null,TitleColumnOrder=null){
        var table;
        var dt;
        var filterStatus;      
        var lang = document.dir == 'rtl' ? 'ar' : 'en-GB';  
        var sorting = '';

        var CREATED_at = $('#'+tableId+' thead th').length-2;
         if(CREATED_at) { 
            sorting = [[CREATED_at , 'desc']];
         }

         
         
            dt = $("#"+tableId).DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,                  
                info: true, 
                oLanguage: {
                    "zeroRecords" : '@include("backend.partials.no_matched_records")',
                    "sEmptyTable": '@include("backend.partials.empty")',
                },
                bPaginate: true,    
                orientation: 'landscape',     
                exportOptions: {
                    orthogonal: "myExport",
                },    
                pagingType: "full",
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
                lengthMenu: [[1, 10, 25, 50, -1], [1, 10, 25, 50, "{{ __('site.all')}}"]],
                order: [],
                select: {
                    style: 'os',
                    selector: 'td:first-child input[type="checkbox"]',
                    className: 'row-selected'
                },
                ajax: {                   
                    url: RouteListing,
                },
                order: sorting,
                columns: dynamicColumns,  
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
                                        <input class="form-check-input AA" name="ids" class="sub_chk" value="${data}" type="checkbox" />
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
            table = dt.$;    
            // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
            dt.on('draw', function () {
                initToggleToolbar();
                toggleToolbars();
                handleDeleteRows();
                KTMenu.createInstances();
            }); 
             // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            // Filter Datatable
            var handleSearchDatatable = function () {
                    const filterSearch = document.querySelector('[data-kt-table-filter="search"]');
                    filterSearch.addEventListener('keyup', function (e) {
                        dt.search(e.target.value).draw();
                    });
            }
            var handleStatusFilter = () => {
                const filterStatus = document.querySelector('[data-kt-filter="status"]');
                $(filterStatus).on('change', e => {
                    let value = e.target.value;
                    if (value === 'all') {
                        value = '';
                    }
                    dt.column(StatusColumn).search(value).draw();                    
                });
            }
            // Delete one records
            var handleDeleteRows = () => {
                const deleteButtons = document.querySelectorAll('[data-kt-table-filter="delete_row"]');
                const destroy = document.getElementById('delete_item');
                deleteButtons.forEach(d => {
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    const parent = e.target.closest('tr');
                    const itemName = '<strong><u>'+parent.querySelectorAll('td')[TitleColumnOrder].innerText+'</u></strong>';                   
                Swal.fire({
                html: destroy.getAttribute("data-confirm-message") + ' ' + itemName + '?',
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                confirmButtonText: destroy.getAttribute("data-confirm-button-text"),
                cancelButtonText: destroy.getAttribute("data-cancel-button-text"),
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-secondary"
                },
            }).then(function(result) {
                if (result.value) { // Yes Delete
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: destroy.getAttribute("data-destroy-route"),
                        data: {
                            '_method': 'delete',
                        },
                        success: function(response, textStatus, xhr) {
                            Swal.fire({
                                html: destroy.getAttribute("data-deleting-selected-items") + ' ' + itemName + '',
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                if (response["status"] == true) {
                                    Swal.fire({
                                        text: response['msg'], // respose from controller
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: destroy.getAttribute("data-back-list-text"),
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function() {
                                        // delete row data from server and re-draw datatable
                                       dt.draw();
                                    });
                                } else if (response["status"] == false) {
                                    Swal.fire({
                                        html: response["msg"], // respose from controller
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: destroy.getAttribute("data-back-list-text"),
                                        customClass: {
                                            confirmButton: "btn btn-light-danger"
                                        }
                                    }).then(function() {
                                        document.location.href = destroy.getAttribute("data-redirect-url");
                                    });
                                }
                            });
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: destroy.getAttribute("data-not-deleted-message"),
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: destroy.getAttribute("data-confirm-button-textGotit"),
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            }); 
                })
                });
            }     
            // Reset Filter
            /////////////////////////// Init toggle toolbar "Delete Selected , MULT SELECTED ITEMS" //////////////////////////
            var initToggleToolbar = function () {
                const container = document.querySelector('#'+tableId);
                const checkboxes = container.querySelectorAll('[type="checkbox"]');
                const deleteSelected = document.querySelector('[data-kt-table-select="delete_selected"]');
                const destroyMultipleRouteId = document.getElementById('destroyMultipleroute');
                const destroyMultipleRoute = destroyMultipleRouteId.getAttribute('data-destroyMultiple-route');
                checkboxes.forEach(c => {
                    c.addEventListener('click', function () {
                        setTimeout(function () {
                            toggleToolbars();
                        }, 50); 
                                          
                    });   
                });
                 // Deleted selected rows
                    deleteSelected.addEventListener('click', function () {
                    var checkedrows = [];
                    var Itemsnames = [];
                    $("#"+tableId+" input:checkbox[name=ids]:checked").each(function() {
                        checkedrows.push($(this).val()); 
                        var c = document.querySelector('[data-kt-item-filter'+$(this).val()+'="item"]');                    
                        Itemsnames.push('<strong><u>'+c.innerText+'</strong></u>');
                    });                    
                    var join_selected_values = checkedrows.join(","); 
                    ////////////// body ///
                Swal.fire({
                html: destroyMultipleRouteId.getAttribute("data-confirm-message")+' '+Itemsnames+' ?',
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                confirmButtonText: destroyMultipleRouteId.getAttribute("data-confirm-button-text"),
                cancelButtonText: destroyMultipleRouteId.getAttribute("data-cancel-button-text"),
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-secondary"
                },
            }).then(function(result) {
                if (result.value) { // Yes Delete
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: destroyMultipleRoute,
                        data: {
                            '_method': 'delete',
                            'ids': join_selected_values,
                        }, 
                        success: function(response, textStatus, xhr) {
                            Swal.fire({
                                html: destroyMultipleRouteId.getAttribute("data-delete-selected-records-text")+' '+Itemsnames+' ',
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                if (response["status"] == true) {
                                    Swal.fire({
                                        text: response['msg'], // respose from controller
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: destroyMultipleRouteId.getAttribute("data-back-list-text"),
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function() {
                                        // delete row data from server and re-draw datatable
                                        dt.draw();
                                    });
                                    const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                                    headerCheckbox.checked = false;

                                } else if (response["status"] == false) {
                                    Swal.fire({
                                        html: response["msg"]+' '+Itemsnames+' ', // respose from controller
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: destroyMultipleRouteId.getAttribute("data-back-list-text"),
                                        customClass: {
                                            confirmButton: "btn btn-light-danger"
                                        }
                                    }).then(function() {
                                        document.location.href = destroyMultipleRouteId.getAttribute("data-redirect-url");
                                    });
                                }
                            });
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: destroyMultipleRouteId.getAttribute("data-not-deleted-message"),
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: destroyMultipleRouteId.getAttribute("data-confirm-button-textGotit"),
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
                })
            } // End Of multi Delete selected
        
            var toggleToolbars = function () {
                const container = document.querySelector('#'+tableId);
                const toolbarBase = document.querySelector('[data-kt-table-toolbar="base"]');
                const toolbarSelected = document.querySelector('[data-kt-table-toolbar="selected"]');
                const selectedCount = document.querySelector('[data-kt-table-select="selected_count"]');
                const allCheckboxes = container.querySelectorAll('tbody [class="form-check-input AA"][type="checkbox"]');
                let checkedState = false;
                let count = 0;
                allCheckboxes.forEach(c => {
                    if (c.checked) {
                        checkedState = true;
                        count++;
                    }
                });
                if (checkedState) {
                    selectedCount.innerHTML = count;
                    toolbarBase.classList.add('d-none');
                    toolbarSelected.classList.remove('d-none');
                } else {
                    toolbarBase.classList.remove('d-none');
                    toolbarSelected.classList.add('d-none');
                }
            }
            // Handle Export 
            var exportButtons = function (){            
            var now = new Date();
            var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
            const ExporteddocumentTitle = document.getElementById(tableId+'_export_menu').getAttribute("data-export-file-title")+' '+jsDate.toString();
            const ExporteddocumentAlertMessage = document.getElementById(tableId+'_export_menu').getAttribute("data-export-file-alert-msg");

                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            title: ExporteddocumentTitle,
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            },
                            charset: 'utf-8',
                            bom: 'true',                                                                  
                        },{
                            extend: 'excelHtml5',
                            title: ExporteddocumentTitle,
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            },
                            charset: 'utf-8',
                            bom: 'true',                            
                        },{
                            extend: 'csvHtml5',
                            title: ExporteddocumentTitle,
                            exportOptions: {
                                columns: "thead th:not(.noExport)"
                            },
                            charset: 'utf-8',
                            bom: 'true',   
    
                        },{
                            extend: 'pdfHtml5',                           
                            title: ExporteddocumentTitle,
                            exportOptions: {
                                columns: "thead th:not(.noExport)",
                                orthogonal: "display",
                            },
                            charset: 'utf-8',
                            bom: 'true', 
                            customize: function(doc) {                    
                              proccessdoc(doc)
                            },                            
                        }
                    ]
                }).container().appendTo($('#'+tableId+'_buttons'));
                    // Hook dropdown menu click event to datatable export buttons                    
                const exportButtons = document.querySelectorAll('#'+tableId+'_export_menu [data-kt-export]');
                exportButtons.forEach(exportButton => {
                exportButton.addEventListener('click', e => {
                e.preventDefault();
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);
                         Swal.fire({
                                    text: ExporteddocumentAlertMessage,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                })                               
                        target.click();
                    });
                });
            }
                handleStatusFilter();
                handleSearchDatatable();
                initToggleToolbar();
                handleDeleteRows();
                table = document.querySelector('#'+tableId);
                if ( !table ) {
                return;
                }                
                exportButtons();    
    }    
    // On document ready
</script>
