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
        var lang = document.dir == 'rtl' ? 'ar' : 'en-GB';    
            
            dt = $("#kt_recipes_datatable").DataTable({
                buttons: [{
             extend: 'pdfHtml5',
              exportOptions: {
              orthogonal: "PDF",
              columns: [0,1],
              alignment:'right',
                                   
             },
      
         }],
    
                processing: true,
                serverSide: true,                
    
                exportOptions: {
                    orthogonal: "myExport",
                },    
             
                language: {
                url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/"+lang+".json",
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
                    { data: null },
                ],
                 
            });
    
            table = dt.$;
    
    
    
     
        }
    
        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
     
     
     
        
        
    
             // Handle Export 
             var exportButtons = function (){
            const documentTitle = 'بسم الله الرحمن الرحيم';
    
    
    
    
    
            var buttons = new $.fn.dataTable.Buttons(table, {
                buttons: [
                    
                    {
                        extend: 'pdfHtml5',                           
                        title: documentTitle,
                        exportOptions: {
                            columns: "thead th:not(.noExport)",
                        },
                        charset: 'utf-8',
                        bom: 'true', 
                        customize: function(doc) {                           
                            processDoc(doc);
                        },                            
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
    
    
                            
                            ///////////////////////////////
    
    
    
    
    
                    target.click();
                });
            });
        }
    
        // Public methods
        return {
            init: function () {
            initDatatable();
            table = document.querySelector('#kt_recipes_datatable');
            exportButtons();
    
            }
        }
    }();
    
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
    
 
    /////////////////
    function processDoc(doc) {
     
 
        var font =  arabicFont(doc);     
        doc.defaultStyle.font = 'Cairo';    
             
        
            
         
          
     
        
    }
    </script>