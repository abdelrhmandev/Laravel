<script>
    function loadDatatable(RouteListing,dynamicColumns,StatusColumn=null){
 
        // Shared variables
        var table;
        var dt;
        var filterStatus;
    

        
        var lang = document.dir == 'rtl' ? 'ar' : 'en-GB';        
        dt = $("#kt_datatable").DataTable({
        ordering: true,
        bServerSide: true,
        serverSide: true,
        processing: true,
        searchable: true
        ajax: {                   
        url: RouteListing,
        },
        columns: dynamicColumns,  
        });    
            table = dt.$;    

            
       
        
                table = document.querySelector('#kt_datatable');
                if ( !table ) {
                return;
                }
                
    }
    
    // On document ready
///////////////////////////////////////////////////////////////////////////////

</script>