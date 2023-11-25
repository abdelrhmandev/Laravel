"use strict";
var DeleteRow = function() {
    var deleteFunction = () => {
        const destroy = document.getElementById('delete_item');
        var itemName = '<strong><u>' + document.getElementById('title_' + document.documentElement.lang).value + '</u></strong>';
        destroy.addEventListener('click', function(e) {
            e.preventDefault();            
            Swal.fire({
                html: destroy.getAttribute("data-confirm-message") + ' ' + itemName + '  ?',
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
                if (result.value) { // Yes Delete
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
                            Swal.fire({
                                html: destroy.getAttribute("data-deleting-selected-items") + ' ' + itemName + '',
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                if (response["status"] == true) {
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
                                    });
                                } else if (response["status"] == false) {
                                    Swal.fire({
                                        html: response["msg"], // respose from controller
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: destroy.getAttribute("data-back-list-text"),
                                        customClass: {
                                            confirmButton: "btn btn-light-danger"
                                        }
                                    }).then(function() {
                                        document.location.href = destroy.getAttribute("data-redirect-url");
                                    });
                                }
                            });
                        }
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
            });
        })
    }
    return {
        init: function() {
            deleteFunction();
        }
    };
}();
KTUtil.onDOMContentLoaded(function() {
    DeleteRow.init();
});