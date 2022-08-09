<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a id="img_slide" class="slide_click photo-img simplebox" href="#modal-photo">
        <?php
        the_post_thumbnail();
        ?>
    </a>
    <ul class="date-location">
        <?php the_date("j F Y", '<li>', '</li>'); ?>
        <li class="location"><?php $all_the_tags = get_the_tags(get_the_ID());
        echo $all_the_tags[0]->name;?></li>
    </ul>
    <a class="slide_click photo-text simplebox" href="#modal-photo"><?php $anons = get_the_excerpt()." ..."; echo $anons?></a>
</li>
