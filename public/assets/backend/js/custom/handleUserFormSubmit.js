alert('dasdas');
document.addEventListener('DOMContentLoaded', function (e) {
    FormValidation.formValidation(document.getElementById('demoForm'), {
        fields: {
            pwd: {
                validators: {
                    notEmpty: {
                        message: 'The password is required',
                    },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            tachyons: new FormValidation.plugins.Tachyons(),
            icon: new FormValidation.plugins.Icon({
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh',
            }),
 
        },
    });
});


 
