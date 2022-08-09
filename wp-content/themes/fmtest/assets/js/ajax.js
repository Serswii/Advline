$(document).ready(function() {
    let button = $('#more_posts'),
        paged = button.data('paged'),
        count_posts = 8,
        maxPages = button.data('max-pages'),
        category_name = button.data('cat'),
        block_post = document.querySelector('.photo-list');
    let index_slide = "0";

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
                    id_post_search = data.match(/post-\d{2} /gm);
                array.pop();
                array.forEach(function (elem) {
                    block_post.insertAdjacentHTML("beforeend", elem);
                });
                const id_post = id_post_search.map(item => {
                    return parseInt(item.replace(/\D/g,''));
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
                        action: 'slideedit',
                    },
                    success: function (response) {
                        let array = response.split('slide-stop')
                        array.pop();
                        array.forEach(function(elem) {
                            $('.fade-slider').slick('slickAdd',elem)
                        })
                        console.log(array)
                    }
                })
            }
        });
    })
    $('.photo-list').on('click','#img_slide',function(event){
        let id_post = "#" + $(this).parent().attr('id');
        event.preventDefault();
        if(index_slide !== id_post){
            index_slide = id_post
            $('.fade-slider').slick('goTo',$(index_slide).index()).slick('setPosition');
        }
        $('#modal-photo').fadeIn("hide");
        $("#modal-photo").addClass('open-slide');
        $(".simplebox-overlay").css('display', 'block');
        document.getElementById('modal-photo').scrollIntoView({behavior: "smooth"});
    });
    $('.simplebox-overlay').click(function (event) {
        event.preventDefault();
        $('#modal-photo').fadeOut("hide");
        $("#modal-photo").removeClass("open-slide");
        $(".simplebox-overlay").css('display', 'none');
    })
    $('.close-modal').click(function (event) {
        event.preventDefault();
        $('#modal-photo').fadeOut("hide");
        $("#modal-photo").removeClass("open-slide");
        $(".simplebox-overlay").css('display', 'none');
    })
    $('.slide_click').on('click', function(event) {
        let id_post = "#" + $(this).parent().attr('id');
        if(index_slide !== id_post){
            index_slide = id_post
            $('.fade-slider').slick('goTo',$(index_slide).index()).slick('setPosition');
        }
        event.preventDefault();

    })
});
