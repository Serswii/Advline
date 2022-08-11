 <?php
 $post = get_post($args['id_post']);
    setup_postdata($post); ?>
    <div class="slide" tabindex="-1">
        <figure><?php echo stripcslashes($args['image']); ?></figure>
        <ul class="date-location">
            <?php the_date("j F Y", '<li>', '</li>'); ?>
            <li class="location"><?php $all_the_tags = get_the_tags(get_the_ID());
                echo $all_the_tags[0]->name;?></li>
        </ul>
        <?php the_content(); ?>
        <p>Пример ссылки: <a href="<?php echo get_permalink(get_the_ID()); ?>">выглядит вот так</a></p>
    </div>
<?php
echo "slide-stop";
wp_reset_postdata();
?>


