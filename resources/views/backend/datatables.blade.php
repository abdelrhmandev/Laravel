<script>
 

// Class definition
var KTDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;
   

    // Private functions
    var initDatatable = function () {
        dt = $("#kt_datatable_example_1").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[5, 'desc']],
            stateSave: true,
 
            ajax: {
                url: "{{ route('recipes.index') }}",
            },
            columns: [
                { data: 'id' },
 
            ],
     
        });

        table = dt.$;


    }

 

 

    // Toggle toolbars
 

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