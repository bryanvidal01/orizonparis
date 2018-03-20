jQuery(document).ready(function(){
    animHome();

    animMenu();

    ajaxHome();

    jQuery(window).scroll(function(){
        // fixedMenu();
    })

    smoothScroll();

    jQuery(window).scroll(function(){
        var scroll = jQuery(window).scrollTop();
        fixedMenu(scroll);
    });

    jQuery(document).on('submit','.newsletter-form', function(e){
        e.preventDefault();
        var $form = jQuery(this);
        var datas = $form.serialize();
        var inputEmail = $form.find('input[type="email"]')
        if(inputEmail.val() != ''){
            inputEmail.removeClass('require');
            jQuery.ajax({
                url: $form.data('json'),
                type: 'GET',
                data: datas,
                cache: false,
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                beforeSend: function(){
                    $form.siblings('.message-error').fadeOut();
                },
                success: function (resp) {
                    if (resp.result == 'error')
                    msg = 'Sorry, an error has occurred.';
                    else{
                        msg = 'Thank you for your registration';
                    }

                    setTimeout(function(){
                        $form.find('.message-error').text(msg);
                        $form.find('.message-error').fadeIn(500);
                    }, 100);
                    $form.find('input, button').fadeOut(100);
                }
            });
        }else{
            inputEmail.addClass('require');
        }
    });

    animLoader(false);
});
