"use strict";

// Class definition
var KTCareersApply = function () {
	var submitButton;
	var validator;
	var form;

 

	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(form,{

		 
			fields: {
				'title_en': {
					validators: {
						notEmpty: {
							message: 'Category name is required'
						}
					}
				}
			},
		 
				plugins: {
      
				declarative: new FormValidation.plugins.Declarative(),
				// Other plugins
				trigger: new FormValidation.plugins.Trigger(),
				tachyons: new FormValidation.plugins.Tachyons({
				rowInvalidClass: 'my-field-error',
				rowValidClass: 'my-field-success',
				}),
				submitButton: new FormValidation.plugins.SubmitButton(),
				icon: new FormValidation.plugins.Icon({
				valid: 'fa fa-check',
				invalid: 'invalid-feedback',
				validating: 'fa fa-refresh',
				}),

	  
                    
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

 
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			form = document.querySelector('#kt_careers_form');
			submitButton = document.getElementById('kt_careers_submit_button');

		 
			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTCareersApply.init();
});