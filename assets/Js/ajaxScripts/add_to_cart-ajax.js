function add_to_cart_ajax()
{
    (function($) {
        

        // $(document).ready(function($) {
            $(".submit_cart_url_shiny").on("click", function(event){
                
                // Prevent default posting of form - put here to work in case of errors
                event.preventDefault();

                
                // setup some local variables
                var $button = $(this);
                

                var product_id = $button.val();
                var status = $button.attr("status");
                var loader = $button.find("img");
                var cart_add_remove_text = $button.find(".add_remove_cart_url_text");
                // Let's disable the inputs for the duration of the Ajax request.
                // Note: we disable elements AFTER the form data has been serialized.
                // Disabled form elements will not be serialized.
                $button.prop("disabled", true);
                cart_add_remove_text.css("display","none");
                loader.css("display","block");
                
                
                // Fire on the request to /form.php
                request = $.ajax({
                    url: add_to_cart_ajax_obj.ajax_url,
                    type: "post",
                    data: {
                        action: "ajax-add_to_cart",
                        _ajax_nonce: add_to_cart_ajax_obj.nonce,
                        product_id: product_id,
                        status: status
                    }
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR){
                // alert(response);
                //    alert(JSON.stringify(response));
                //    return;
                if(response.action === "adding" )
                {
                    if(response.status === "true")
                    {    if(response.cart_key)
                            {
                                setCookie(product_id, response.cart_key, 30);
                            }
                            let $key = "remove&" + response.cart_key;
                            let $remove_svg = $button.find(".remove_svg");
                            let $add_svg = $button.find(".add_svg");
                            $button.attr("status", $key);
                            $add_svg.css("display","none");
                            $remove_svg.css("display","block");
                            
                    }else
                    {
                        if(getCookie(product_id))
                        {
                                let $key = "remove&" + getCookie(product_id);
                                $button.attr("status", $key);
                        }else
                        {
                            alert('Sorry this product is bought');
                        }
                            
                            let $remove_svg = $button.find(".remove_svg");
                            let $add_svg = $button.find(".add_svg");
                            $add_svg.css("display","none");
                            $remove_svg.css("display","block");
                            alert( 'product adding error already exist in your cart' );
                            deleteCookie(product_id);
                        }
                }else if(response.action === "removing")
                {
                        if(response.status === "true")
                        {
                            let $remove_svg = $button.find(".remove_svg");
                            let $add_svg = $button.find(".add_svg");
                            $button.attr("status", "add");
                            $add_svg.css("display","block");
                            $remove_svg.css("display","none");
                        
                        }else
                        {
                            
                            let $remove_svg = $button.find(".remove_svg");
                            let $add_svg = $button.find(".add_svg");
                            $button.attr("status", "add");
                            $add_svg.css("display","block");
                            $remove_svg.css("display","none");
                            alert('product removing error: already removed from your cart');
                        }
                }
                });

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown){
                    //  the error 
                    alert(
                        "Error occurred Try again" /* + errorThrown */
                    );
                });

                // Callback handler that will be called regardless
                // if the request failed or succeeded
                request.always(function () {
                    // Reenable the inputs
                    $button.prop("disabled", false);
                    cart_add_remove_text.css("display","block");
                    loader.css("display","none");                
                });
                    
            });
        // });
        
    })( jQuery );
}
add_to_cart_ajax();