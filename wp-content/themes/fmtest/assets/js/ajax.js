$(document).ready(function() {
    let button = $('#more_posts'),
        paged = button.data('paged'),
        posts = $('.photo-list'),
        count_posts = 8,
        maxPages = button.data('max-pages'),
        category_name = button.data('cat'),
        block_post = document.querySelector('.photo-list');
    let index_slide = "0",
        active_slide = $('.slick-active');
    function closeModel(event) {
        event.preventDefault();
        $('#modal-photo').fadeOut("hide");
        $("#modal-photo").css('display', 'none');
        $(".simplebox-overlay").css('display', 'none');
        $(".modal-wrapper").css('z-index', '0');
    }

    active_slide.removeClass("slick-current slick-active");
    button.click(function (event) {
        event.preventDefault();
        let remaining_posts = document.querySelector('.quantity').textContent
        if(category_name === "momenty"){
            category_name = "my-life";
        }
        $.ajax({
            type: 'POST',
            url: pagination.ajax_url, // получаем из wp_localize_script()
            data: {
                paged: paged,
                action: 'loadmore',
                category_name: category_name
            },
            beforeSend: function(xhr) {
                button.text( 'Загружаем...' );
            },
            success: function(data){
                let array = data.split('content-stop'),
                    id_post_search = data.match(/post-\d+ /gm),
                    images = data.match(/<img[^>]+?\s*\/>/gm);
                array.pop();
                array.forEach(function (elem) {
                    block_post.insertAdjacentHTML("beforeend", elem);
                });
                const id_post = id_post_search.map(item => {
                    return parseInt(item.replace(/\D+/g, ''));
                });
                remaining_posts = remaining_posts - count_posts;
                if (remaining_posts > 0){
                    document.getElementById('more_posts').innerHTML = 'Еще фото<span class="quantity">'+ remaining_posts +'</span>';
                }
                paged++;
                if(paged === maxPages){
                    $('#more_posts').remove();
                }

                $.ajax({
                    type: 'POST',
                    url: pagination.ajax_url, // получаем из wp_localize_script()
                    data: {
                        id_post: id_post,
                        image: images,
                        action: 'slideedit',
                    },
                    success: function (response) {

                        let array = response.split('slide-stop')
                        array.pop();
                        array.forEach(function(elem) {
                            $('.fade-slider').slick('slickAdd',elem)
                        })
                    }
                })
            }
        });
    })
    posts.on('click','#text_slide',function(event){
        let id_post = "#" + $(this).parent().attr('id');
        event.preventDefault();
        if(index_slide !== id_post){
            index_slide = id_post
            $('.fade-slider').slick('goTo',$(index_slide).index());
        }
        $('#modal-photo').fadeIn("hide");
        let height = document.getElementById("modal-photo").clientHeight;
        console.log(height);
        let width = document.getElementById("modal-photo").clientWidth;
        let position_height;
        if($(window).width() > 1440){
            position_height = (($(window).height() - height) / 2) + $(window).scrollTop() + 68;
        } else {
            position_height = (($(window).height() - height) / 2) + $(window).scrollTop();
        }
        let position_width = ($(window).width()- width) / 2 ;
        $("#modal-photo").css({'left': position_width + 'px', 'top': position_height + 'px', 'opacity': '1', 'animation': 'ani 1s forwards'});
        // $("#modal-photo").css('top', position_height + 'px');
        $(".simplebox-overlay").css('display', 'block');
        console.log("sadadw");
    });

    $('body').on('click', '.simplebox-overlay',function (event) {
        closeModel(event);
    })

    $('.close-modal').click(function (event) {
        closeModel(event);
    })
});
