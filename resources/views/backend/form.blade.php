<script>
"use strict";

// Class definition
var KTFormApply = function () {
	var submitButton;
	var validator;
	var form;

 

	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(form,{
 
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

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click 
						submitButton.disabled = true;

						setTimeout(function() {
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;
							var form = '#kt_careers_form';
 

						$.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route("admin.roles.store") }}',
                        data: {
                            '_method': 'post',							                              
                        },  
						data: $('#kt_careers_form').serialize(),

                        success: function (response, textStatus, xhr) {
                   
                                        Swal.fire({
                                            text: response['msg'], // respose from controller
                                            icon: response['status'],
                                            buttonsStyling: false,
                                            confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }) 
                
                                        // Remove header checked box
                                  
                                  
                            }
                        });




							/*Swal.fire({
								text: "Form has been successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then(function (result) {
								if (result.isConfirmed) {
									//form.submit();
								}
							});*/

							//form.submit(); // Submit form
						}, 2000);   						
					} else {
						// Scroll top

						// Show error popuo. For more info check the plugin's official documentation: https://sweetalert2.github.io/
						Swal.fire({
							text: "Sorry, loodasdsadasme errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then(function (result) {
							KTUtil.scrollTop();
						});
					}
				});
			}
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
	KTFormApply.init();
});
</script>