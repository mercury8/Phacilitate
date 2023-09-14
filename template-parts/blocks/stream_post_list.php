<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'stream_post_list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'stream_post_list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');
$heading_short_description = get_field('heading_short_description');


?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="stream_post_list_main">
        <div class="container">
            <div class="stream_post_list_wrapper">
                <?php if ($heading || $heading_short_description) { ?>
                    <div class="heading_section">
                        <?php if ($heading) { ?>
                            <div class="heading h2">
                                <?php echo $heading ?>
                            </div>
                        <?php } ?>
                        <?php if ($heading_short_description) { ?>
                            <div class="heading_short_description">
                                <?php echo $heading_short_description ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="stream_post_list_section">
                    
                    <div class="three_column_grid stream_post_list">
                        <div class="item item_id_<?php echo $post_id; ?>">
                            <div class="item_inner">
                                <div class="image_section">
                                    <a href="<?php echo $link; ?>">
                                        <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title ?>" />
                                    </a>
                                </div>
                                <div class="content_section">
                                    <div class="title">
                                        <a class="h4" href="<?php echo $link; ?>">
                                            <?php echo $title; ?>
                                        </a>
                                    </div>
                                    <?php if ($short_description) { ?>
                                        <div class="short_description body2">
                                            <?php echo $short_description; ?>
                                        </div>
                                    <?php } ?>
                                    <div class="learn_more_link">
                                        <a class="text_link" href="<?php echo $link; ?>">
                                            LEARN MORE
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>