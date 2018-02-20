function animHome() {
    jQuery('.push-project').each(function(){
        var el = jQuery(this);
        var top = el.offset().top;
        var height = el.height();
        var bottom = top + height;
        var scrollParallax = 1;


        function animParallax(){
            var currentScroll = jQuery(window).scrollTop();
            var detectAnim = currentScroll + ((jQuery(window).height() / 4) * 2);
            var bottomWindow = currentScroll + jQuery(window).height();

            if((detectAnim > top) && (detectAnim < bottom)){
                changeBackground(el);
                el.addClass('visible');

            }

            if(bottomWindow > top && bottomWindow < (bottom + jQuery(window).height()) ){
                var progress = bottomWindow - top;

                // el.find('.text-push').css({'-webkit-transform':'translate(0, -'+ progress / 2 +'px)'});
                el.find('.text-push').css({'-webkit-transform':'translate3D(0, -' + progress * .25 + 'px, 2px)'});
            }
        }


        jQuery(window).scroll(function(){
            animParallax();
        });

        animParallax();

    })
}


function changeBackground(el) {

    if(!el.hasClass('current')){

        var dataImg = el.data('img');

        jQuery('.push-project').removeClass('current');
        jQuery('.background-home').fadeOut(300);
        setTimeout(function(){
            jQuery('.background-home').css('background-image', 'url(' + dataImg + ')');
            jQuery('.background-home').fadeIn(400);
        }, 300);

        el.addClass('current');
    }
}
