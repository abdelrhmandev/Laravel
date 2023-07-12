<script>
    function loadDatatable(RouteListing,dynamicColumns){
 
        // Shared variables
        var table;
        var dt;
        var filterStatus;
    
  
            var lang = document.dir == 'rtl' ? 'ar' : 'en-GB';        
            dt = $("#kt_datatable").DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,                
                info: false, 
                oLanguage: {
                    "zeroRecords" : '@include("backend.partials.no_matched_records")',
                    "sEmptyTable": '@include("backend.partials.empty")',
                },
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
                                        <input class="form-check-input" name="ids" class="sub_chk" value="${data}" type="checkbox" />
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
                // Add data-filter attribute
                     // Add data-filter attribute
                     createdRow: function (row, data, dataIndex) {
                        // $(row).find('td:eq(2)').attr('data-filter', data.category_id);
                        // $(row).find('td:eq(3)').attr('data-filter', data.status);
                        // $(row).find('td:eq(4)').attr('data-filter', data.created_at);
                    }
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
 
        ///////abdo
             // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
 
            // Filter Datatable
            var handleSearchDatatable = function () {
                    const filterSearch = document.querySelector('[data-kt-table-filter="search"]');
                    filterSearch.addEventListener('keyup', function (e) {
                        dt.search(e.target.value).draw();
                    });
            }
    
            // Filter Datatable
            var handleFilterDatatable = function () {
                // Select filter options
                const filterForm = document.querySelector('[data-kt-table-filter="form"]');
                filterStatus = document.querySelectorAll('[data-kt-table-filter="status"][name="status"]');
                const filterCategory =  document.querySelectorAll('[data-kt-table-filter="category"][name="category"]');
                const filterButton = filterForm.querySelector('[data-kt-table-filter="filter"]');
                //const selectOptions = filterForm.querySelectorAll('select');
                // Filter datatable on submit
                filterButton.addEventListener('click', function () {
                    let  StatusValue = '';
                    let  CategoryValue =  '';
                    // Get filter Status Values
                    filterStatus.forEach(r => {
                        r.value === 'all' ? StatusValue = '' : StatusValue = r.value;                
                    });
                    //Get filter Categories Values
                    filterCategory.forEach(c => {
                        c.value === 'all' ? CategoryValue = '' : CategoryValue = c.value;                
                    });            
                    // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()            
                    const filterString = StatusValue + ' ' + CategoryValue;
                    //dt.search(filterString).draw(); // Original Code
                        var searchStatus = StatusValue.toLowerCase(),regexStatus = '\\b' + searchStatus + '\\b';                    
                        dt.column(3).search(regexStatus, true, false).column(2).search(CategoryValue).draw();                
                    });    
            }
            // Delete 
            var handleDeleteRows = () => {
                // Select all delete buttons
                const deleteButtons = document.querySelectorAll('[data-kt-table-filter="delete_row"]');
                const destroy = document.getElementById('delete_item');

                deleteButtons.forEach(d => {
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    const parent = e.target.closest('tr');
                    const itemName = '<strong><u>'+parent.querySelectorAll('td')[1].innerText+'</u></strong>';

                    
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
            var handleResetForm = () => {
                // Select reset button
                const resetButton = document.querySelector('[data-kt-table-filter="reset"]');
        
                // Reset datatable
                resetButton.addEventListener('click', function () {
                // Reset month
                // filterMonth.val(null).trigger('change');
              
                // Reset payment type
                $("#status").val("all").change();
                $("#category").val("all").change();
    
                // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                dt.column(3).search('').column(2).search('').draw();  
            });
            }
     



            // Init toggle toolbar "Delete Selected , MULT SELECTED ITEMS" 
            var initToggleToolbar = function () {
                // Toggle selected action toolbar
                // Select all checkboxes
                const container = document.querySelector('#kt_datatable');
                const checkboxes = container.querySelectorAll('[type="checkbox"]');
                //https://www.itsolutionstuff.com/post/how-to-delete-multiple-records-using-checkbox-in-laravel-5-example.html
                // Select elements
                const deleteSelected = document.querySelector('[data-kt-table-select="delete_selected"]');
                const destroyMultipleRouteId = document.getElementById('destroyMultipleroute');
                const destroyMultipleRoute = destroyMultipleRouteId.getAttribute('data-destroyMultiple-route');
             

                // Toggle delete selected toolbar
                checkboxes.forEach(c => {
                    // Checkbox on click event
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
                    $("#kt_datatable input:checkbox[name=ids]:checked").each(function() {
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
                    // end of body


                })
            } // End Of multi Delete selected
        
            // Toggle toolbars
            var toggleToolbars = function () {
                // Define variables
                const container = document.querySelector('#kt_datatable');
                const toolbarBase = document.querySelector('[data-kt-table-toolbar="base"]');
                const toolbarSelected = document.querySelector('[data-kt-table-toolbar="selected"]');
                const selectedCount = document.querySelector('[data-kt-table-select="selected_count"]');
        
                // Select refreshed checkbox DOM elements
                const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');
        
                // Detect checkboxes state & count
                let checkedState = false;
                let count = 0;
        
                // Count checked boxes
                allCheckboxes.forEach(c => {
                    if (c.checked) {
                        checkedState = true;
                        count++;
                    }
                });
        
                // Toggle toolbars
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
        //// abdo
      
        
         
                handleSearchDatatable();
                initToggleToolbar();
                handleFilterDatatable();
                handleDeleteRows();
                handleResetForm();
                table = document.querySelector('#kt_datatable');
                if ( !table ) {
                return;
                }
                exportButtons();    
    }
    
    // On document ready
///////////////////////////////////////////////////////////////////////////////

</script>