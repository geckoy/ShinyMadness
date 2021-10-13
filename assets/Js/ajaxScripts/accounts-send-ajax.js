(function($) {
    

    $(document).ready(function($) {
        $("#accountsSend").submit(function(event){
            
            // Prevent default posting of form - put here to work in case of errors
            event.preventDefault();

            // Abort any pending request
            //if (request) {
            //    request.abort();
            //}
            // setup some local variables
            var $form = $(this);

            // Let's select and cache all the fields
            var $inputs = $form.find("input, select, button, textarea");

            // Serialize the data in the form
            var serializedData = $form.serialize();
           
            // Let's disable the inputs for the duration of the Ajax request.
            // Note: we disable elements AFTER the form data has been serialized.
            // Disabled form elements will not be serialized.
            $inputs.prop("disabled", true);

            
            // hide privous data
            //$('#main-posts').empty();
            // Fire off the request to /form.php
            request = $.ajax({
                url: accounts_send_ajax_obj.ajax_url,
                type: "post",
                data: {
                    action: "ajax-accounts-send",
                    _ajax_nonce: accounts_send_ajax_obj.nonce,
                    search: serializedData
                }
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
               alert(response);
            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown){
                //  the error 
                alert(
                    "Error occurred Try again " + errorThrown
                );
            });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function () {
                // Reenable the inputs
                $inputs.prop("disabled", false);
                // hide loaders
                //$('.pokes-loader').css("display", "none");
            });
                
        });
    });











})( jQuery );