var handleDeleteRows = () => {
    // Select all delete buttons
    const deleteButtons = document.querySelectorAll('[data-kt-table-filter="delete_row"]');

   

    

    deleteButtons.forEach(d => {
    // Delete button on click
    d.addEventListener('click', function (e) {
        e.preventDefault();
        // Select parent row
        const parent = e.target.closest('tr');
        // Get customer name
        const itemName = parent.querySelectorAll('td')[1].innerText;

        ///////////////


    //////////////////////////////


        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
        Swal.fire({
            text: "{{ __('site.confirmDeleteMessage') }}" + itemName + "?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "{{ __('site.confirmButtonText') }}",
            cancelButtonText: "{{ __('site.cancelButtonText') }}",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then((result) => {
            $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           
            url: $(this).attr("data-destroy-route"),
            data: {
                '_method': 'delete'
            },
            success: function (response, textStatus, xhr) {
                if (result.value) {
                    // Simulate delete request -- for demo purpose only
                    Swal.fire({
                        text: "{{ __('site.deletingItemMessage') }}",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function () {

                        Swal.fire({
                        text: response['msg'], // respose from controller
                        icon: response['status'],
                        buttonsStyling: false,
                        confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                        }).then(function () {
                        // delete row data from server and re-draw datatable
                        dt.draw();
                        });
                        // Remove header checked box
                        const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                        headerCheckbox.checked = false;
                    });
                }else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "{{ __('site.notdeletedMessage') }}",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                        customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                } // end of cancel case
            }
            });

        });
    })
    });
}