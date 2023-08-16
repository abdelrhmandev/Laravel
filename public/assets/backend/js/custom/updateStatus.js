    function UpdateStatus(id,DTable,Dbtable,UpdateStatusRoute){
     var dir = document.dir == 'rtl' ? 'left' : 'right';    
      var status = 0;
      if( $('#Status'+id).is(':checked') ){
            status = 1;    
      }
      $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },           
            url: UpdateStatusRoute,
            data: {
                '_method'   : 'post',          
                'status'    : status,
                'table'     : Dbtable,
                'id'        : id 
            },
              success: function(response){
                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-"+dir,
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
              };
               if(response['status'] == true){ 
                     toastr.success(response['msg']);
               }else{ 
                    toastr.error(response['msg']);      
               }
              $('#'+DTable).DataTable().ajax.reload();
            }         
      });      
}