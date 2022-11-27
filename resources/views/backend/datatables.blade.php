<script>
"use strict";

// Class definition
var KTDatatablesServerSide = function () {

    // Shared variables
    var table;
    var dt;
 

    // Private functions
    var initDatatable = function () {
        dt = $("#kt_recipes_datatable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[5, 'desc']],
            stateSave: true, 
 
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                className: 'row-selected'
            },
            ajax: {
                url: "{{ route('recipes.index')}}",
            },
            columns: [
                { data: 'id' , name: 'id' }
  
            ],
             columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    render: function (data) {
                        return 'dasd';
                    }
                },
            ],
            

            // Add data-filter attribute
            /*createdRow: function (row, data, dataIndex) {
                $(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
            }*/
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
 
    }

 
 

 



    // Public methods
    return {
        init: function () {
            initDatatable();
 
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
</script>
