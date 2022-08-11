<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Test
 * @since Test 1.0
 */
?>
<footer id="footer">
    <div class="container">
        <div class="footer-hold"><strong class="title-networks">Я в соцсетях</strong>
            <ul class="networks-list">
                <li><a class="insta-link" href="#"></a></li>
                <li><a class="vk-link" href="#"></a></li>
                <li><a class="facebook-link" href="#"></a></li>
            </ul>
            <span class="copy">&copy;
                <?php
                echo date_i18n(
                /* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
                    _x('Y', 'copyright date format', 'Test')
                );
                ?> Yuriy Gorlov</span>
        </div>
    </div>
</footer>
</div>
    <div class="modal-window" id="modal-photo"><span class="close-modal"></span>
    <?php
    $category = get_queried_object();
    if (is_category()): ?>
        <div class="modal-head"><a class="album-col" href="#"><span class="album-img"><img
                            src="<?= get_field("category_image", $category) ?>" alt="image"></span>
                <div class="album-info"><span class="album-title">Альбом</span><strong
                            class="album-name"><?= $category->name ?></strong></div>
            </a><span class="number-photo">Фото 5 из 195</span></div>
    <?php else: ?>
        <div class="modal-head"><a class="album-col" href="#"><span class="album-img"><img
                            src="<?php echo get_template_directory_uri() ?>/assets/images/rubric-img01.jpg"
                            alt="image"></span>
                <div class="album-info"><span class="album-title">Альбом</span><strong class="album-name">Моя
                        жизнь</strong></div>
            </a><span class="number-photo">Фото 5 из 195</span></div>
    <?php endif; ?>
    <div class="fade-slider">
        <?php
        $category = get_queried_object();
        $page = get_pages();
        $count_posts_publish = wp_count_posts()->publish;
        $count_all = 8;
        $args = array(
            'post_type' => 'post',
            'cat' => $category->cat_ID,
            'posts_per_page' => $count_all
        );

        $query = new WP_Query($args);
        ?>
        <?php if ($query->have_posts()): ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="slide">
                    <figure> <?php the_post_thumbnail(); ?></figure>
                    <ul class="date-location">
                        <?php the_date("j F Y", '<li>', '</li>'); ?>
                        <li class="location"><?php $all_the_tags = get_the_tags(get_the_ID());
                            echo $all_the_tags[0]->name; ?></li>
                    </ul>
                    <?php the_content(); ?>
                    <p>Пример ссылки: <a href="<?php echo get_permalink(get_the_ID()); ?>">выглядит вот так</a></p>
                </div>
            <?php endwhile; ?>

        <?php else: ?>
            Записей нет.
        <?php endif;
        wp_reset_query(); ?>
    </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>