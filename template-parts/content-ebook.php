<?php 

    $post_id = get_the_ID();
    $link = get_the_permalink($post_id);
    $thumbnail = get_the_post_thumbnail_url($post_id);
    $title = get_the_title($post_id);
    $short_description = get_field('short_description', $post_id);

?>

<div class="item item_id_<?php echo $post_id; ?>">
    <div class="item_inner">
        <div class="image_section">
            <a href="<?php echo $link; ?>">
                <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title ?>" />
            </a>
        </div>
        <div class="content_section">
            <div class="title">
                <a class="h5" href="<?php echo $link; ?>">
                    <?php echo $title; ?>
                </a>
            </div>
            <?php if ($short_description) { ?>
                <div class="short_description body3">
                    <?php echo $short_description; ?>
                </div>
            <?php } ?>
            <div class="download_link">
                <a class="text_link" href="<?php echo $link; ?>">
                    <?php echo "DOWNLOAD"; ?>
                </a>
            </div>
        </div>
    </div>
</div>