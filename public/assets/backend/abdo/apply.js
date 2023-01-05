"use strict";
// Class definition
var KTCareersApply = function () {
	var submitButton;
	var validator;
	var form;
	// Init form inputs
	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
 
					'start_date': {
						validators: {
							notEmpty: {
								message: 'JS is required'
							}
						}
					},
				},
				plugins: {
					declarative: new FormValidation.plugins.Declarative({
						html5Input: true,
					}),				
					tachyons: new FormValidation.plugins.Tachyons(),	
					/*trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})*/ 
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			 
				validator.validate() ;

	 
			 
			 
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