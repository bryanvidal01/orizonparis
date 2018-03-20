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

    var isClick
    jQuery('.push-project').each(function(){
        var el = jQuery(this);
        if(el.hasClass('is-click')){
            isClick = true;
        }
    });
    if(!
        el.hasClass('current') && (!isClick)){

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


function animMenu() {
    jQuery('.navigation').click(function(){
        jQuery('.menu').toggleClass('is-open');
        jQuery('body').toggleClass('menu-is-open');
    });
}


function ajaxHome() {
    jQuery('.link-project').click(function(event){
        event.preventDefault();
        var el = jQuery(this);
        var parent = el.closest('.push-project');
        var link = el.attr('href');
        jQuery('.container-project').fadeOut();
        parent.addClass('is-click');
        jQuery('body').addClass('projet-click');


        jQuery.ajax({
            url: link,
            type: 'GET',
            data: {'isAjax': true}
        }).done(function (data) {
            jQuery('body').append(data);
            jQuery('.container-project').remove();
            jQuery('.background-home').remove();
            setTimeout(function(){
                jQuery('body').removeClass('projet-click');
            }, 100);
            setTimeout(function(){
                jQuery('.container-project').remove();
                jQuery('.background-home').remove();
            }, 1200);
        });
    });

    jQuery('body').on('click', '.push-single.footer-next-post', function(event){
        var el = jQuery(this);
        var link = el.attr('href');
        el.addClass('is-click');
        event.preventDefault();
        jQuery('.header').removeClass('is-fixed');


        jQuery('body').addClass('next-click');

        jQuery.ajax({
            url: link,
            type: 'GET',
            data: {'isAjax': true}
        }).done(function (data) {
            jQuery('.content-single').remove();
            setTimeout(function(){
                jQuery('.footer-next-post').remove();
                jQuery('body').append(data);
                setTimeout(function(){
                    jQuery('body').removeClass('next-click');
                }, 300);
            }, 100);

        });

    });
}

function animLoader(status) {
    if(status){

    }else{
        setTimeout(function(){
            jQuery('.loader').fadeOut();
        }, 2000);
    }
}

function fixedMenu(currentScroll) {
    if(jQuery('.content-single').length > 0){
        var heightWindow = jQuery(window).height();
        var container = jQuery('.content-single');
        var content = container.height() + container.offset().top;
        var progressBar = jQuery('.footer-next-post').find('.title .progress-project');

        if(currentScroll > heightWindow){
            jQuery('.header').addClass('is-fixed');
        }else{
            jQuery('.header').removeClass('is-fixed');
        }

        if(currentScroll + heightWindow > content){
            jQuery('.footer-next-post').addClass('visible');

        }else{
            jQuery('.footer-next-post').removeClass('visible');
        }

    }

}

function smoothScroll() {
    jQuery(function(){
        var $window = jQuery(window);
    	var scrollTime = .6;
    	var scrollDistance = 100;

    	$window.on("mousewheel DOMMouseScroll", function(event){

    		event.preventDefault();

    		var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
    		var scrollTop = $window.scrollTop();
    		var finalScroll = scrollTop - parseInt(delta*scrollDistance);

    		TweenMax.to($window, scrollTime, {
    			scrollTo : { y: finalScroll, autoKill:true },
    				ease: Power2.easeOut,
    				overwrite: 5
    			});

    	});
    });
}
