<div class="journal-head">
    <div class="container">
        <ul class="journal-tabs">
            <li class="active"><a href="moments-albums.html">Альбомы</a></li>
        </ul>
        <ul class="albums-list">
            <?php
            $categories = get_categories(array('taxonomy' => 'category', 'hide_empty' => false, 'orderby' => 'term_id', 'order' => 'ASC',));
            $category_now = get_queried_object();
            if ($categories) {
                foreach ($categories as $cat) {
                    ?>
                        <?php if($category_now->term_id === $cat->term_id || ($cat->name === "Моя Жизнь" && !is_category())): ?>
                        <li class="active">
                    <?php else: ?>
                        <li>
                    <?php endif; ?>
                        <a href="<?= get_category_link($cat->term_id) ?>">
                            <?php if ($category_image = get_field("category_image", $cat)) { ?>
                                <span class="album-img"><img src="<?= $category_image ?>"/></span>
                            <?php } ?>
                            <span class="album-name"><?= $cat->name ?><span
                                    class="quantity-photo"><?= $cat->category_count ?></span></span>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>
