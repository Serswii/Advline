<?php get_header(); ?>
    <div id="main">
        <?php get_template_part('template-parts/category', 'filter'); ?>
        <div class="container">
            <h1><img src="<?php echo get_template_directory_uri(); ?>/assets/images/title-icon02.png" alt="image">
            <?php
            $cat_name = get_the_category_by_ID(5);
            $count_all = 8;
            $args = array(
                'post_type' => 'post',
                'cat' => 5,
                'posts_per_page' => $count_all
            );
            $the_query = new WP_Query( $args );
            ?>
                <?= $cat_name ?><sup><?= get_category("5")->category_count ?></sup></h1>
            <div class="album-additional">
                <p>Моменты из жизни и отдыха. Все, что не связано с работой</p>
            </div>
            <ul class="photo-list">
                <?php if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php get_template_part('template-parts/content', get_post_format()); ?>
                <?php endwhile; ?>

                <?php else: ?>
                    Записей нет.
                <?php endif; ?>
               <?php wp_reset_query(); ?>
            </ul>
            <?php
            $count_posts_publish = get_category("5")->category_count;
            $count = $count_posts_publish - $count_all;
            $params = ['count' => $count];
            get_template_part('loadmore', null, $params) ?>
        </div>
    </div>
    </div>
<?php get_footer() ?>