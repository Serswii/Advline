<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$category = get_queried_object();
global $wp_query;
$max_pages = $wp_query->max_num_pages;

if ($paged < $max_pages):
    ?>
    <a id="more_posts" style="text-decoration: none;" data-max-pages="<?= $max_pages ?>" data-cat="<?php if(is_category()){echo $category->slug;} else{echo $category->post_name;}  ?>" data-paged="<?= $paged ?>" class="more-btn" href="#">Еще фото<span
                class="quantity"><?= $args['count'] ?></span></a>
<?php
endif;
?>