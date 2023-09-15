<?php

/**
 * Featured Post Banner Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured_banner-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured_banner';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$select_featured_post = get_field('select_featured_post');
$background_color = get_field('background_color');
$desktop_pattern_image = get_field('desktop_pattern_image');
$mobile_pattern_image = get_field('mobile_pattern_image');
foreach ($select_featured_post as $key => $postId) {
    $heading = get_the_title($postId);
    $link = get_the_permalink($postId);
    $img_url = get_the_post_thumbnail_url($postId, 'full');
    $date = get_the_date('j F Y', $postId);
    $coauthors = get_coauthors($postId);
    $short_description = (get_field('feature_banner_short_description', $postId)) ?: get_field('short_description', $postId);
}
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="featured_banner__inner" style=" background-color: <?php echo $background_color; ?>; background-image: url('<?php echo $desktop_pattern_image; ?>'), url('<?php echo $mobile_pattern_image; ?>');">
        <div class="container">
            <div class="featured_banner__container d-flex align-items-center">
                <div class="featured_banner__left">
                    <a href="<?php echo $link; ?>">
                        <div class="featured_banner__image" style="background-image: url('<?php echo $img_url; ?>');">
                            <img src="<?php echo $img_url; ?>" alt="<?php echo $heading; ?>" />
                        </div>
                    </a>
                </div>
                <div class="featured_banner__right">
                    <div class="featured_banner__content">
                        <div class="date"><?php echo $date; ?></div>
                        <h1 class="heading"><a href="<?php echo $link; ?>"><?php echo $heading; ?></a></h1>
                        <div class="featured_banner__image d-md-none" style="background-image: url('<?php echo $img_url; ?>');">
                            <img src="<?php echo $img_url; ?>" alt="<?php echo $heading; ?>" />
                        </div>
                        <?php if ($short_description) : ?><div class="short_description"><?php echo $short_description; ?></div> <?php endif; ?>
                        <div class="authors_list">
                            <div class="authors_list__images">
                                <?php foreach ($coauthors as $coauthor) { ?>
                                    <div class="authors_list__img"><?php echo get_avatar($coauthor->user_email); ?></div>
                                <?php } ?>
                            </div>
                            <div class="authors_list__names">
                                <?php foreach ($coauthors as $coauthor) { ?>
                                    <div class="authors_list__name"><?php echo $coauthor->display_name; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>