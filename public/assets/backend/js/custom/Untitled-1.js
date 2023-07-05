// Handle Destroy Anchor
const Destroy = document.getElementById('delete-id');
Destroy.addEventListener('click', e => {
    e.preventDefault();        

    // alert(DestroyAnchor.getAttribute("data-destroy-route"));

////////
Swal.fire({
        text: Destroy.getAttribute("data-confirm-message"),
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        showLoaderOnConfirm: true,
        confirmButtonText: Destroy.getAttribute("data-confirm-button-text"),
        cancelButtonText: Destroy.getAttribute("data-cancel-button-text"),
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
    url: Destroy.getAttribute("data-destroy-route"),
    data: {
        '_method': 'delete',
    },
    success: function(response, textStatus, xhr) {
        if (result.value) {
            Swal.fire({
                text: Destroy.getAttribute("data-deleting-selected-items"),
                icon: "info",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                Swal.fire({
                    text: response['msg'], // respose from controller
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: Destroy.getAttribute("data-back-list-text"),
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    }
                }).then(function() {
                    // delete row data from server and re-draw datatable
                    document.location.href = Destroy.getAttribute("data-redirect-url");
                    dt.draw();
                });

                
            });
        } else if (result.dismiss === 'cancel') {
            Swal.fire({
                text: Destroy.getAttribute("data-not-deleted-message"),
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: Destroy.getAttribute("data-confirm-button-textGotit"),
                customClass: {
                confirmButton: "btn fw-bold btn-primary",
                }
            });
        }
    }
});
});
}
)

