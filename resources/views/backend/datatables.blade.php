<script>
    "use strict";

var KTrecipesList = function () {
    // Define shared variables
    var table;
    var datatable;
 

    // Private functions
    var initDatatable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

 

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            "pageLength": 10,
            "lengthChange": false,
 
                   
 
                // Add data-filter attribute
     
            
        });

        createdRow: function (row, data, dataIndex) {
                $(row).find('td:eq(2)').attr('data-filter', data.published);
            }
    }

 

    // Filter Datatable
    var handleFilter = function () {
        // Select filter options
        const filterForm = document.querySelector('[data-kt-recipes-table-filter="form"]');
        const filterButton = filterForm.querySelector('[data-kt-recipes-table-filter="filter"]');
        const resetButton = filterForm.querySelector('[data-kt-recipes-table-filter="reset"]');
        const selectOptions = filterForm.querySelectorAll('select');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            var filterString = '';

            // Get filter values
            selectOptions.forEach((item, index) => {
                if (item.value && item.value !== '') {
                    if (index !== 0) {
                        filterString += ' ';
                    }

                    // Build filter value options
                    filterString += item.value;
                }
            });
       
            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search(filterString).draw();
        });
 
    }

 
 
 

    return {
        // Public functions  
        init: function () {
            table = document.getElementById('kt_recipes_table');

            if (!table) {
                return;
            }

            initDatatable();
 
            handleFilter();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTrecipesList.init();
});
</script>