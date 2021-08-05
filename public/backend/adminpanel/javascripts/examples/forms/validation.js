
$(function() {

    "use strict";

    //INLINE VALIDATION
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $("#inline-validation").validate({

        highlight: function(label) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function(label) {
            $(label).closest('.form-group').removeClass('has-error');
            label.remove();
        }
    });

    //MESSAGE BOX VALIDATION
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    var form = $("#messagebox-validation");

    $("#messagebox-validation").validate({

        errorContainer: form.find('.message-container'),
        errorLabelContainer: form.find('.message-container ul'),
        wrapper: 'li',

        rules: {
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },

        messages: {
            username: {
                required: "Please enter your username"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password",
            }
        }
    });
});

