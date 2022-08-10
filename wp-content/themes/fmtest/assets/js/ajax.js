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
        $('#modal-photo').fadeIn("hide");
        $("#modal-photo").addClass('open-slide');
        $(".simplebox-overlay").css('display', 'block');
        if(index_slide !== id_post){
            index_slide = id_post
            $('.fade-slider').slick('goTo',$(index_slide).index()).slick('setPosition');
        }

        document.getElementById('modal-photo').scrollIntoView({behavior: "smooth"});
    });
    $('body').on('click', '.simplebox-overlay',function (event) {
        event.preventDefault();
        $('#modal-photo').fadeOut("hide");
        $("#modal-photo").removeClass("open-slide");
        $(".simplebox-overlay").css('display', 'none');
        // $.simplebox.busy = true;
    })

    $('.close-modal').click(function (event) {
        event.preventDefault();
        $('#modal-photo').fadeOut("hide");
        $("#modal-photo").removeClass("open-slide");
        $(".simplebox-overlay").css('display', 'none');
        // $.simplebox.busy = true;
    })
    $('.slide_click').on('click', function(event) {
        let id_post = "#" + $(this).parent().attr('id');
        if(index_slide !== id_post){
            index_slide = id_post
            $("#modal-photo").css({'display' : 'block', 'left': '-9999px', 'top': '-9999px', 'opacity': '0', 'animation': 'ani 0.7s forwards'});
            $('.fade-slider').slick('goTo',$(index_slide).index()).slick('setPosition');

        }
        event.preventDefault();

    })
});
