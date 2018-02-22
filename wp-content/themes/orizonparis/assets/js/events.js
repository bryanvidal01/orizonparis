jQuery(document).ready(function(){
    animHome();


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
                    msg = 'Désolé, une erreur est survenue.';
                    else
                    msg = 'Merci de votre inscription';

                    $form.siblings('.message-error').text(msg);
                    $form.siblings('.message-error').fadeIn();
                }
            });
        }else{
            inputEmail.addClass('require');
        }
    });

});
