<?php 

    $post_id = get_the_ID();
    $link = get_the_permalink($post_id);
    $thumbnail = get_the_post_thumbnail_url($post_id);
    $title = get_the_title($post_id);
    $designation = get_field('designation', $post_id);
    $person_detail = get_field('person_detail', $post_id);
    $email_id = get_field('email_id', $post_id);

?>


<div>

    <div class="item item_id_<?php echo $post_id; ?>">



        <div class="item_inner">
            <a class="hover_link" href="<?php echo $link; ?>"></a>
            <div class="item_data">
                <div class="image_section">
                    <div class="image_bg" style="background-image:url(<?php echo $thumbnail; ?>)">
                        <a href="<?php echo $link; ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_343_260.png" alt="<?php echo $title ?>" />
                        </a>
                    </div>
                </div>
                <div class="content_section">
                    <?php if ($designation) { ?>
                        <div class="designation">
                            <?php echo $designation; ?>
                        </div>
                    <?php } ?>
                    <div class="title">
                        <a class="h4" href="<?php echo $link; ?>">
                            <?php echo $title; ?>
                        </a>
                    </div>
                    <?php if ($person_detail) { ?>
                        <div class="person_detail body2">
                            <?php echo mb_strimwidth($person_detail, 0, 130, "..."); ?>
                        </div>
                    <?php } ?>
                    <?php if ($email_id) { ?>
                        <div class="email_section">
                            <a href="mailto:<?php echo $email_id; ?>">
                                <?php echo $email_id; ?>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="learm_more">
                        <a class="text_link" href="<?php echo $link; ?>">
                            LEARN MORE
                        </a>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</div>