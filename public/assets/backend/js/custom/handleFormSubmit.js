function handleFormSubmitFunc(formId) {
    const target = document.getElementById('status');
    const select = document.getElementById('status_select');
    const statusClasses = ['bg-success', 'bg-warning', 'bg-danger'];

    $(select).on('change', function(e) {
        const value = e.target.value;
        switch (value) {
            case "published": {
                target.classList.remove(...statusClasses);
                target.classList.add('bg-primary');
                hideDatepicker();
                break;
            }
            /*case "scheduled": {
            target.classList.remove(...statusClasses);
            target.classList.add('bg-warning');
            showDatepicker();
            break;
            }*/
            case "unpublished": {
                target.classList.remove(...statusClasses);
                target.classList.add('bg-danger');
                hideDatepicker();
                break;
            }
            default:
                break;
        }
    });
    // Define all elements for quill editor
    // Submit form handler
    let validator;
    let parentId;
    let icon;
    let keys;
    // Get elements
    const form = document.getElementById(formId);
    const submitButton = document.getElementById('btn-submit');
    // Init form validation rules. For more info check the FormValidation plugin's official
    documentation: https: //formvalidation.io/

        validator = FormValidation.formValidation(form, {
            plugins: {
                declarative: new FormValidation.plugins.Declarative({
                    html5Input: true,
                }),
                trigger: new FormValidation.plugins.Trigger(),
                tachyons: new FormValidation.plugins.Tachyons(),
                submitButton: new FormValidation.plugins.SubmitButton(),

                tachyons: new FormValidation.plugins.Tachyons({
                    rowInvalidClass: 'my-field-error',
                    // rowValidClass: 'my-field-success',
                }),

                icon: new FormValidation.plugins.Icon({
                    // valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh',
                }),
            }
        }).on('core.field.invalid', function(data) {
            parentId = $("#" + data).parents('.tab-pane').attr("id");
            icon = $('a[href="#' + parentId + '"][data-bs-toggle="tab"]').parent().find('i');
            icon.removeClass('fa-check').addClass('fa-times');
        }).on('core.field.valid', function(data) {

            parentId = $("#" + data).parents('.tab-pane').attr("id");
            icon = $('a[href="#' + parentId + '"][data-bs-toggle="tab"]').parent().find('i');
            icon.removeClass('fa-times').addClass('fa-check');
        });
    // Handle submit button
    submitButton.addEventListener('click', e => {
        e.preventDefault();        
        // Validate form before submit
        if (validator) {
            validator.validate().then(function(status) {
                //console.log('validated!');
                if (status == 'Valid') {
                   //https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/getting-and-setting-data.html
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    // Disable submit button whilst loading
                    submitButton.disabled = true;
                    setTimeout(function() {
                        submitButton.removeAttribute('data-kt-indicator');
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                        });
                        $.ajax({
                            type: "post",
                            enctype: "multipart/form-data",
                            url: $("#" + formId).data("route-url"),
                            data: new FormData($("#" + formId)[0]),
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function(response, textStatus, xhr) {
                                if (response["status"] == true) {
                                    Swal.fire({
                                        text: response["msg"],                            
                                        icon: 'success',                                       
                                        buttonsStyling: false,
                                        confirmButtonText: form.getAttribute("data-form-agree-label"),                                       
                                        customClass: {
                                            confirmButton: "btn btn-light-success",                                             
                                        }
                                        }).then(function(result) {
                                            window.location = window.location.href;
                                        });
                                }
                                else if (response["status"] == 'RequestValidation') {
                                    let msgError = "";
                                    $.each(response["msg"], function(key, value) {
                                        msgError += "<p>" + value + "</p>";
                                        parentId = $("#" + key).parents('.tab-pane').attr("id");
                                        icon = $('a[href="#' + parentId + '"][data-bs-toggle="tab"]').parent().find('i');
                                        icon.removeClass('fa-check').addClass('fa-times');
                                    });
                                    Swal.fire({
                                        html: msgError, // respose from controller
                                        icon: "warning",
                                        buttonsStyling: false,
                                        confirmButtonText: form.getAttribute("data-form-agree-label"),
                                        customClass: {
                                            confirmButton: "btn btn-light-warning"
                                        }
                                    })
                                }else if (response["status"] == false) {
                                    
                                    Swal.fire({
                                        html: response["msg"], // respose from controller
                                        icon: "info",
                                        buttonsStyling: false,
                                        confirmButtonText: form.getAttribute("data-form-agree-label"),
                                        customClass: {
                                            confirmButton: "btn btn-light-info"
                                        }
                                    })
                                }
                            },
                        });
                    }, 2000);
                } else {
                    Swal.fire({
                        text: form.getAttribute('data-form-submit-error-message'),
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: form.getAttribute("data-form-agree-label"),
                        customClass: {
                            confirmButton: "btn btn-light-danger"
                        }
                    });
                }
            });
        }
    })
}
function JSconfimDelete(confimDeleteMsg,destroyRoute) {
    Swal.fire({
        text: confimDeleteMsg + "؟",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        showLoaderOnConfirm: true,
        confirmButtonText: "{{ __('site.confirmButtonText') }}",
        cancelButtonText: "{{ __('site.cancelButtonText') }}",
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-active-light-primary"
        },
    }).then(function(result) {
       
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: destroyRoute,
            data: {
                '_method': 'delete',
            },
            success: function(response, textStatus, xhr) {
                if (result.value) {
                    Swal.fire({
                        text: "{{ __('site.deletingselecteditem') }}",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        Swal.fire({
                            text: response['msg'], // respose from controller
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function() {
                            // delete row data from server and re-draw datatable
                            dt.draw();
                        });

                        location.reload();
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "{{ __('site.notdeletedMessage') }}",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            }
        });
    });
}