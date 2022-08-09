<li>
                            <a class="photo-img simplebox" href="#modal-photo">
                                <?php
                                $name_field = "post_image"; // Название поля
                                $get_image_id = get_field($name_field);
                                $size = "full";
                                if ($get_image_id) {
                                    $full_image_link = wp_get_attachment_image($get_image_id, $size, '');
                                    echo $full_image_link;
                                }
                                ?>
                            </a>
                            <ul class="date-location">
                                <li><?php the_field('date_publication') ?></li>
                                <li class="location"><?php the_field('location') ?></li>
                            </ul>
                            <a class="photo-text simplebox" href="#modal-photo"><?php the_field('short_description') ?>
                                ...</a>
                        </li>