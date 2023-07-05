"use strict";

// Class definition
var DeleteRow = function () {

    // Init login session button
    var deleteFunction = () => {
        const button = document.getElementById('delete_item');
        const destroy = document.getElementById('delete_item');

        button.addEventListener('click', e => {
            e.preventDefault();
            Swal.fire({
                text: destroy.getAttribute("data-confirm-message"),
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                confirmButtonText: destroy.getAttribute("data-confirm-button-text"),
                cancelButtonText: destroy.getAttribute("data-cancel-button-text"),
                customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-secondary"
        },
        }).then(function(result) {
        
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: destroy.getAttribute("data-destroy-route"),
            data: {
                '_method': 'delete',
            },
            success: function(response, textStatus, xhr) {
                if (result.value) {
                    Swal.fire({
                        text: destroy.getAttribute("data-deleting-selected-items"),
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        Swal.fire({
                            text: response['msg'], // respose from controller
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: destroy.getAttribute("data-back-list-text"),
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function() {
                            // delete row data from server and re-draw datatable
                            document.location.href = destroy.getAttribute("data-redirect-url");
                            dt.draw();
                        });
        
                        
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: destroy.getAttribute("data-not-deleted-message"),
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: destroy.getAttribute("data-confirm-button-textGotit"),
                        customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            }
        });
        });
        });
    }

 
 
 

    return {
        // Public functions
        init: function () {
            deleteFunction();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    DeleteRow.init();
});