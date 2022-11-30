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
            ajax: {
                url: "{{ route('recipes.index')}}",
            },
            columns: [
                { data: 'id' },          
            ],
             
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
 
            KTMenu.createInstances();
        });
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
    