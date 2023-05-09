"use strict";

// Class definition
var KTAppEcommerceSaveCategory = function () {
 

 

    // Submit form handler
    const handleSubmit = () => {
        // Define variables
        let validator;

        // Get elements
        const form = document.getElementById('kt_ecommerce_add_category_form');
        const submitButton = document.getElementById('kt_ecommerce_add_category_submit');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                excluded: [':disabled'],
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },

                fields: {
                    'title_en': {
                        validators: {
                            notEmpty: {
                                message: 'Title En js is required'
                            }
                        }
                    },
                    'title_ar': {
                        validators: {
                            notEmpty: {
                                message: 'Title Ar js is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        ),validator.on('core.form.invalid', function(e,data) {
      
            // https://old.formvalidation.io/examples/using-data-returned-validator/

            // var tabPane   = event.formValidation.form.title_en.value;
 
            var formab     = data.result();
            // var validator = data.bv;
            // var tabPane  = data.element.parents('.tab-pane');
            // var tabId     = tabPane.attr('id');
           
            alert('dsaasasdas');
        });  
        
        
        // Called when a field is invalid
 

        // Handle submit button
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

 
                });
            }
        })
    }

    // Public methods
    return {
        init: function () {
            // Init forms
       
            handleSubmit();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveCategory.init();
});
