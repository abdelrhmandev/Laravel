<script>
   "use strict";
// Class definition
var KTFormApply = function () {
   var submitButton;
   var validator;
   var form;
 

   var handleForm = function () {
      validator = FormValidation.formValidation(form, {
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
      });
      submitButton.addEventListener('click', function (e) {
         e.preventDefault();
         if (validator) {
            validator.validate().then(function (status) {
               console.log('validated!');
               if (status == 'Valid') {
                  submitButton.setAttribute('data-kt-indicator', 'on');
                  submitButton.disabled = true;
                  setTimeout(function () {
                     submitButton.removeAttribute('data-kt-indicator');
                     // Enable button
                     submitButton.disabled = false;
                     $.ajaxSetup({
                        headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });
                     $.ajax({
                        type: 'POST',
                        url: $('#FormId').data("route-url"),
                        data: $('#FormId').serialize(),
                        cache: true,
                        dataType: "json",
                        success: function (response, textStatus, xhr) {
                           if (response['status'] == true) {
                              $('#FormId')[0].reset();
                              Swal.fire({
                                 text: response['msg'], // respose from controller
                                 icon: 'success',
                                 buttonsStyling: false,
                                 confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                                 customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                 }
                              })
                           } else if (response['status'] == false) {
                              let msgError = '';
                              $.each(response['msg'], function (key, value) {
                                 msgError+= '<p>' + value + '</p>';
                              });
                            
                              // manage response jquery 
                              Swal.fire({
                                 html: msgError, // respose from controller
                                 icon: 'error',
                                 buttonsStyling: false,
                                 confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                                 customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                 }
                              })
                           }
                        },
                        error: function (response, textStatus, xhr) {
                           $.each(errors, function (fieldName, errorBag) {
                              let errorMessages = '';
                              // put each error message in a div
                              $.each(errorBag, function (i, message) {
                                 errorMessages += '<div>' + message + '</div>';
                              });

                           });
                          Swal.fire({
                              text: errorMessages, // respose from controller
                              icon: 'error',
                              buttonsStyling: false,
                              confirmButtonText: "{{ __('site.confirmButtonTextGotit') }}",
                              customClass: {
                                 confirmButton: "btn fw-bold btn-primary",
                              }
                           })
                        },                        
                         
                     });
                  }, 2000);
               } else {
                  // Show error popuo. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                  Swal.fire({
                     text: "{{ __('site.errors_detected') }}",
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
         form = document.querySelector('#FormId');
         submitButton = document.getElementById('kt_submit_button');
         handleForm();
      }
   };
}();
// On document ready
KTUtil.onDOMContentLoaded(function () {
   KTFormApply.init();
}); 
</script>