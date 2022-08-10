jQuery(document).ready(function(){
    $('#check-menu').click(function(){
        $("body, html").toggleClass('hidden');
    });
    $('.photo-list').on('click', '.slide_click' ,function() {
        $("body, html").toggleClass('hidden-modal');
    })
    $('.close-modal').click(function(){
        $("body, html").toggleClass('hidden-modal');
    });
    $('.tabs').tabs();

    jcf.replaceAll();

    OpenBox({
        wrap: '.drop-box, .journal-menu-search',
        link: '.drop-btn, .search-btn',
        box: '.drop-list, .search-box',
        openClass: 'open',
        close: '.search-box .close-btn'
    });
    $('.simplebox').simplebox({
        overlay: {
            color: 'black',
            opacity: 0.3
        },
        linkClose: '.close-modal, .close-search'
    });
    $('.fade-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        adaptiveHeight: true,
    });

    $('.post-slider').gallery({
        oneSlide: true,
        infinite: true,
        autoHeight: true,
        switcher: '.switcher span'
    });
});

function OpenBox(obj){
    $(obj.wrap).each(function(){
        var hold = $(this);
        var link = hold.find(obj.link);
        var box = hold.find(obj.box);
        var w = obj.w;
        var close = hold.find(obj.close);
        link.click(function(){
            $(obj.wrap).not(hold).removeClass(obj.openClass);
            if (!hold.hasClass(obj.openClass)) {
                hold.addClass(obj.openClass);
            }
            else {
                hold.removeClass(obj.openClass);
            }
            return false;
        });

        hold.hover(function(){
            $(this).addClass('hovering');
        }, function(){
            $(this).removeClass('hovering');
        });

        $("body").click(function(){
            if (!hold.hasClass('hovering')) {
                hold.removeClass(obj.openClass);
            }
        });
        close.click(function(){
            hold.removeClass(obj.openClass);

            return false;
        });

        jQuery(document).bind('touchstart mousedown', function(e){
            if(!(jQuery(e.target).parents().index(hold) !== -1 || jQuery(e.target).index(hold) !== -1)){
                hold.removeClass(obj.openClass);
            }
        });
    });
}