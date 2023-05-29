"use strict";

// Class definition
var KTAppHandleSubmitForm = function() {

    // Private functions

    // Init quill editor
    const initQuill = () => {
        // $("#description_en").val(
        // $("#description_Div_en").html()
        // );

        // Define all elements for quill editor
        const elements = [
            '#description_div_en',
            '#description_div_ar',
            '#meta_tag_description_div_en',
            '#meta_tag_description_div_ar'
        ];

        // Loop all elements
        elements.forEach(element => {
            // Get quill element
            let quill = document.querySelector(element);

            // Break if element not found
            if (!quill) {
                return;
            }

            // Init quill --- more info: https://quilljs.com/docs/quickstart/
            quill = new Quill(element, {
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['image', 'code-block']
                    ]
                },
                placeholder: 'Type your text here...',
                theme: 'snow' // or 'bubble'
            });
        });

    }

  
    // Init tagify
    const initTagify = () => {
        // Define all elements for tagify
        const elements = [
            '#kt_ecommerce_add_category_meta_keywords'
        ];

        // Loop all elements
        elements.forEach(element => {
            // Get tagify element
            const tagify = document.querySelector(element);

            // Break if element not found
            if (!tagify) {
                return;
            }

            // Init tagify --- more info: https://yaireo.github.io/tagify/
            new Tagify(tagify);
        });
    }
 
 
 

 

    // Category status handler
    const handleStatus = () => {
        const target = document.getElementById('status');
        const select = document.getElementById('status_select');
        const statusClasses = ['bg-success', 'bg-warning', 'bg-danger'];

        $(select).on('change', function (e) {
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
    }
 
    // Condition type handler

    // Submit form handler
    const handleSubmit = () => {
        // Define variables
        let validator;
        let parentId;        
        let icon;

        // Get elements
        const form = document.getElementById('kt_ecommerce_add_category_form');
        const submitButton = document.getElementById('kt_ecommerce_add_category_submit');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

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
                    rowValidClass: 'my-field-success',
                }),
                
                icon: new FormValidation.plugins.Icon({
                    valid: 'fa fa-check',
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
                    console.log('validated!');

                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable submit button whilst loading
                        submitButton.disabled = true;

                        setTimeout(function() {
                            submitButton.removeAttribute('data-kt-indicator');

                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function(result) {
                                if (result.isConfirmed) {
                                    // Enable submit button after loading
                                    submitButton.disabled = false;

                                    // Redirect to customers list page
                                    window.location = form.getAttribute("data-kt-redirect");
                                }
                            });
                        }, 2000);
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        })
    }

    // Public methods
    return {
        init: function() {
            // Init forms
            initQuill();
            initTagify();
            handleStatus();
            handleSubmit();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAppHandleSubmitForm.init();
});