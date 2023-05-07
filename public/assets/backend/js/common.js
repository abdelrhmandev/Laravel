"use strict";

// Class definition
var KTAppEcommerceSaveProduct = function () {

 

    // Category status handler
    const handleStatus = () => {
        const target = document.getElementById('status');
        const select = document.getElementById('status_select');
        const statusClasses = ['bg-primary','bg-success', 'bg-warning', 'bg-danger'];

        $(select).on('change', function (e) {
            const value = e.target.value;

            switch (value) {
                case "published": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-primary');
                    hideDatepicker();
                    break;
                }
                // case "scheduled": {
                //     target.classList.remove(...statusClasses);
                //     target.classList.add('bg-warning');
                //     showDatepicker();
                //     break;
                // }
                case "unpublished": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-danger');
                    hideDatepicker();
                    break;
                }
                // case "draft": {
                //     target.classList.remove(...statusClasses);
                //     target.classList.add('bg-primary');
                //     hideDatepicker();
                //     break;
                // }
                default:
                    break;
            }
        });


        // Handle datepicker
        const datepicker = document.getElementById('kt_ecommerce_add_product_status_datepicker');

        // Init flatpickr --- more info: https://flatpickr.js.org/
        $('#kt_ecommerce_add_product_status_datepicker').flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        const showDatepicker = () => {
            datepicker.parentNode.classList.remove('d-none');
        }

        const hideDatepicker = () => {
            datepicker.parentNode.classList.add('d-none');
        }
    }

 

 

    // Public methods
    return {
        init: function () {
 
            handleStatus();
 
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveProduct.init();
});
