"use strict";

// Class definition
var KTProjectsAdd = function() {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizard;
    var _avatar;
    var _validations = [];

    // Private functions
    var initWizard = function() {
        // Initialize form wizard
        _wizard = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: true // allow step clicking
        });

        // Validation before going to next page
        _wizard.on('beforeNext', function(wizard) {
            // Don't go to the next step yet
            _wizard.stop();

            // Validate form
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
            validator.validate().then(function(status) {
                if (status == 'Valid') {
                    _wizard.goNext();
                    KTUtil.scrollTop();
                } else {
                    Swal.fire({
                        text: "Error, hemos detectado algunos errores, intenta de nuevo.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, ir allí!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Change Event
        _wizard.on('change', function(wizard) {
            KTUtil.scrollTop();
        });
    }

    // Form Validation
    var initValidation = function() {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        _validations.push(FormValidation.formValidation(
            _formEl, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre del producto es requerido'
                            }
                        }
                    },
                    code: {
                        validators: {
                            notEmpty: {
                                message: 'Código es requerido'
                            }
                        }
                    },
                    unit_cost: {
                        validators: {
                            notEmpty: {
                                message: 'El costo es requerido'
                            }
                        }
                    },
                    catalog: {
                        validators: {
                            notEmpty: {
                                message: 'El catalogo es requerido'
                            }
                        }
                    },
                    id_brand: {
                        validators: {
                            notEmpty: {
                                message: 'Marca es requerida'
                            }
                        }
                    },
                    id_metric_unit: {
                        validators: {
                            notEmpty: {
                                message: 'Unidad de medida es requerida'
                            }
                        }
                    },
                    stock: {
                        validators: {
                            notEmpty: {
                                message: 'Stock es requerido'
                            }
                        }
                    }             
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        ));

    }

    var initAvatar = function() {
        _avatar = new KTImageInput('kt_projects_add_avatar');
    }

    return {
        // public functions
        init: function() {
            _wizardEl = KTUtil.getById('kt_projects_add');
            _formEl = KTUtil.getById('kt_projects_add_form');

            initWizard();
            initValidation();
            initAvatar();
        }
    };
}();

jQuery(document).ready(function() {
    KTProjectsAdd.init();
});