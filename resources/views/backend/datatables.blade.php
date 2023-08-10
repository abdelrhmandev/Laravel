<script>


    function loadDatatable(RouteListing,dynamicColumns,StatusColumn=null){
 
        // Shared variables
        var table;
        var dt;
        var filterStatus;      
            var lang = document.dir == 'rtl' ? 'ar' : 'en-GB';        
            dt = $("#kt_datatable").DataTable({
                
                "info": false,
            'order': [],
            'pageLength': 10,
                 processing: true,
                 serverSide: true,   
                

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
 

</script>