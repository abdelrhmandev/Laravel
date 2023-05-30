 function handleFormSubmitFunc(formId,langs){


 
   let quillelements = [];
   Object.keys(langs).forEach(key => {      
      quillelements.push(
      '#description_div_'+key
      );
      quillelements.push(
        '#meta_tag_description_div_'+key
        );        
    });

  
  

  
     quillelements.forEach(element => {
         let quill = document.querySelector(element);
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
                     ['direction', 'rtl' ] // this is rtl support
                 ]
             },
            //  placeholder: 'Type your text here...',
             theme: 'snow', // or 'bubble'
              
         });
     });



 


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

  // Define all elements for quill editor

    // Submit form handler 



      let validator;
      let parentId;        
      let icon;

      let keys;
      // Get elements
      const form = document.getElementById(formId);
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

          Object.keys(langs).forEach(key => {      
            $("#description_"+keys).val(
                ($("#description_div_"+keys+" p").html())
            );                      
        });

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
                            url: $("#"+formId).data("route-url"),
                            data: new FormData($("#"+formId)[0]),
                            processData: false,
                            contentType: false,
                            cache: false,

                            success: function (response, textStatus, xhr) {
                                if (response["status"] == 'success') {
                                    Swal.fire({
                                        text: response["message"],
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
                                }else{
                                    Swal.fire({
                                        text: response["message"],
                                        icon: "warning",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    })
                                }
                            },
                        
                        });

 
                      }, 2000);
                  } else {
                      Swal.fire({
                          text: form.getAttribute('data-form-submit-error'),
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