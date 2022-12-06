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
            pagingType: "full_numbers",
            pageLength: 10,
            lengthChange: true,
            stateSave: false,
            pageLength: 10,
            lengthMenu: [[1, 10, 25, 50, -1], [1, 10, 25, 50, "AllXXX"]],
            order: [],
            select: {
                style: 'multi',
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
                    { data: 'status', name: 'status'},
                    { data: 'created_at', name: 'created_at'},
                    { data: null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    render: function (data) {
                        return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${data}" />
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
                                    <a href="#" class="menu-link px-3" data-kt-recipes-table-filter="edit_row">
                                        Edit
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-recipes-table-filter="delete_row">
                                        Delete
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
                    $(row).find('td:eq(2)').attr('data-filter', data.category_id);
                    $(row).find('td:eq(3)').attr('data-filter', data.status);
                    $(row).find('td:eq(4)').attr('data-filter', data.created_at);
                }
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
 

    // Filter Datatable
       // Filter Datatable
       var handleFilterDatatable = function () {
        // Select filter options
        const filterForm = document.querySelector('[data-kt-recipes-table-filter="form"]');

        const filterStatus = document.querySelectorAll('[data-kt-recipes-table-filter="status"][name="status"]');

        const filterCategory =  document.querySelectorAll('[data-kt-recipes-table-filter="category"][name="category"]');

        const filterButton = filterForm.querySelector('[data-kt-recipes-table-filter="filter"]');

        const resetButton = filterForm.querySelector('[data-kt-recipes-table-filter="reset"]');


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
                var searchStatus = StatusValue.toLowerCase(),
                regexStatus = '\\b' + searchStatus + '\\b';
                dt.column(2).search(regexStatus, true, false).column(1).search(CategoryValue).draw();
            
        });

 
    }

 

 

 

 

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleFilterDatatable();
 
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});

</script>
    