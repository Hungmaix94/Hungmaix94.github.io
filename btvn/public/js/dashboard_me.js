/**
 * Created by I_am_Po on 8/13/2016.
 */
// Contact Form Scripts

$(function () {
    // console.log("asdas");
    $("#dashboardForm input").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // additional error messages or events

            console.log(errors);
        },
        submitSuccess: function ($form, event) {


            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var Mailfrom = $("input#Mailfrom").val();
            var Mailto = $("input#Mailto").val();
            var subject = $("input#subject").val();
            var Message = $("textarea#Message").val();
            // Check for white space in name for Success/Fail message
            $.ajax({
                url: "./admin/mailto",
                type: "POST",
                data: {
                    Mailfrom: Mailfrom,
                    subject: subject,
                    Mailto: Mailto,
                    Message: Message
                },
                cache: true,
                success: function () {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Gửi được rồi chờ hơi lâu tý thôi </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#dashboardForm').trigger("reset");
                },
                error: function () {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                },
                beforeSend: function () {
                    $("#sendEmail").addClass("fa fa-spin fa-spinner");
                },
                complete: function () {
                    $("#sendEmail").removeClass("fa fa-spin fa-spinner");
                }
            });
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });


});


