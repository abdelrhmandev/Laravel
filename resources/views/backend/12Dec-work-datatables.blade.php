<script>


    "use strict";
    
    // Class definition
    var KTDatatablesServerSide = function () {
        // Shared variables
        var table;
        var dt;
        var filterStatus;
    
        // Private functions
        var initDatatable = function () {
            dt = $("#kt_recipes_datatable").DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,                
                info: true, 
                bPaginate: true,             
                pagingType: "full_numbers",
                language: {
                url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/{{ app()->getLocale()}}.json"
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
                    { data: null ,exportable:false,printable:false,orderable:false,searchable:false},
                ],
                columnDefs: [
                    {
                        targets: 0,
                        orderable: false,
                        render: function (data) {
                            return `
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" name="item[]" type="checkbox" value="${data}" />
                                </div>`;
                        }
                    },
                    {
                        targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-end',
                        render: function (data, type, row) {
                            return `
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                    Actions
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="qqqqqqqqqqq" class="menu-link px-3" data-kt-recipes-table-filter="edit_row">
                                            Edit Recipe
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
    
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="2222222222222222222" class="menu-link px-3" data-kt-recipes-table-filter="delete_row">
                                            Delete Recipe
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            `;
                        },
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
    
     
        }
    
        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
     
     
     
            var handleSearchDatatable = function () {
                    const filterSearch = document.querySelector('[data-kt-recipes-table-filter="search"]');
                    filterSearch.addEventListener('keyup', function (e) {
                        dt.search(e.target.value).draw();
                    });
                }
    
            // Filter Datatable
            var handleFilterDatatable = function () {
                // Select filter options
                const filterForm = document.querySelector('[data-kt-recipes-table-filter="form"]');
    
                filterStatus = document.querySelectorAll('[data-kt-recipes-table-filter="status"][name="status"]');
    
                const filterCategory =  document.querySelectorAll('[data-kt-recipes-table-filter="category"][name="category"]');
    
                const filterButton = filterForm.querySelector('[data-kt-recipes-table-filter="filter"]');
    
          
    
    
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
            // Delete customer
            var handleDeleteRows = () => {
                // Select all delete buttons
                const deleteButtons = document.querySelectorAll('[data-kt-recipes-table-filter="delete_row"]');
        
                deleteButtons.forEach(d => {
                    // Delete button on click
                    d.addEventListener('click', function (e) {
                        e.preventDefault();
        
                        // Select parent row
                        const parent = e.target.closest('tr');
        
                        // Get customer name
                        const itemName = parent.querySelectorAll('td')[1].innerText;
        
                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Are you sure you want to deleteXXXX " + itemName + "?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
    
                                
                                // Simulate delete request -- for demo purpose only
                                Swal.fire({
                                    text: "Deleting " + itemName,
                                    icon: "info",
                                    buttonsStyling: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(function () {
                                    Swal.fire({
                                        text: "You have deleted " + itemName + "!.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function () {
                                        // delete row data from server and re-draw datatable
                                        dt.draw();
                                        // window.location='/posts' ABO Code
                                    });
                                });
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: itemName + " was not deleted.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
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
                const resetButton = document.querySelector('[data-kt-recipes-table-filter="reset"]');
        
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
     
            // Init toggle toolbar
            var initToggleToolbar = function () {
                // Toggle selected action toolbar
                // Select all checkboxes
                const container = document.querySelector('#kt_recipes_datatable');
                const checkboxes = container.querySelectorAll('[type="checkbox"]');
        
                // Select elements
                const deleteSelected = document.querySelector('[data-kt-recipes-table-select="delete_selected"]');
        
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
                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Are you sure you want to delete selected customers?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        showLoaderOnConfirm: true,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        },
                    }).then(function (result) {
                        if (result.value) {
                            // Simulate delete request -- for demo purpose only
                            Swal.fire({
                                text: "Deleting selected customers",
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function () {
                                Swal.fire({
                                    text: "You have deleted all selected customers!.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    // delete row data from server and re-draw datatable
                                    dt.draw();
                                });
        
                                // Remove header checked box
                                const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                                headerCheckbox.checked = false;
                            });
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "Selected customers was not deleted.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                });
            }
        
            // Toggle toolbars
            var toggleToolbars = function () {
                // Define variables
                const container = document.querySelector('#kt_recipes_datatable');
                const toolbarBase = document.querySelector('[data-kt-recipes-table-toolbar="base"]');
                const toolbarSelected = document.querySelector('[data-kt-recipes-table-toolbar="selected"]');
                const selectedCount = document.querySelector('[data-kt-recipes-table-select="selected_count"]');
        
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
                const documentTitle = 'Customer Orders Repo222222222rt';
                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'excelHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'csvHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'pdfHtml5',
                            title: documentTitle
                        }
                    ]
                }).container().appendTo($('#kt_recipes_datatable_buttons'));
    
                // Hook dropdown menu click event to datatable export buttons
                const exportButtons = document.querySelectorAll('#kt_recipes_datatable_export_menu [data-kt-export]');
                exportButtons.forEach(exportButton => {
                    exportButton.addEventListener('click', e => {
                        e.preventDefault();
    
                        // Get clicked export value
                        const exportValue = e.target.getAttribute('data-kt-export');
                        const target = document.querySelector('.dt-buttons .buttons-' + exportValue);
    
                        // Trigger click event on hidden datatable export buttons
                        target.click();
                    });
                });
            }
    
     
    
        // Public methods
        return {
            init: function () {
            initDatatable();
            handleSearchDatatable();
            initToggleToolbar();
            handleFilterDatatable();
            handleDeleteRows();
            handleResetForm();
            table = document.querySelector('#kt_recipes_datatable');
            if ( !table ) {
                return;
            }
            exportButtons();
    
            }
        }
    }();
    
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
    
    </script>
        