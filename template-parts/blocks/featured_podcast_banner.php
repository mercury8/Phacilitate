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
$id = 'featured_podcast_banner-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured_podcast_banner';
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
$show_read_time = get_field('show_read_time');
$mobile_image_before_content = get_field('mobile_image_before_content');

if (!empty($select_featured_post)) {
    foreach ($select_featured_post as $key => $postId) {
        $heading = get_the_title($postId);
        $link = get_the_permalink($postId);
        $img_url = get_the_post_thumbnail_url($postId, 'full');
        $date = get_the_date('j F Y', $postId);
        $coauthors = get_coauthors($postId);
        $feature_banner_short_description = get_field('feature_banner_short_description', $postId);
        $read_time = get_field('read_time', $postId);
    }
?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if ($mobile_image_before_content == 1) : ?>mobile_image_before_content<?php endif; ?>">
        <div class="featured_podcast_banner__inner" style=" background-color: <?php echo $background_color; ?>; background-image: url('<?php echo $desktop_pattern_image; ?>'), url('<?php echo $mobile_pattern_image; ?>');">
            <div class="container">
                <div class="featured_podcast_banner__container d-flex align-items-center">
                    <div class="featured_podcast_banner__left">
                        <?php if ($link) : ?>
                            <a href="<?php echo $link; ?>">
                            <?php endif; ?>
                            <div class="featured_podcast_banner__image" style="background-image: url('<?php echo $img_url; ?>');">
                                <img src="<?php echo $img_url; ?>" alt="<?php echo $heading; ?>" />
                            </div>
                            <?php if ($link) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="featured_podcast_banner__right">
                        <div class="featured_podcast_banner__content">
                            <h1 class="heading">
                                <?php if ($link) : ?>
                                    <a href="<?php echo $link; ?>">
                                    <?php endif; ?>
                                    <?php echo $heading; ?>
                                    <?php if ($link) : ?>
                                    </a>
                                <?php endif; ?>
                            </h1>
                            <div class="date"><?php echo $date; ?></div>
                            <div class="featured_podcast_banner__image d-md-none" style="background-image: url('<?php echo $img_url; ?>');">
                                <img src="<?php echo $img_url; ?>" alt="<?php echo $heading; ?>" />
                            </div>
                            <?php if ($feature_banner_short_description) : ?><div class="short_description"><?php echo $feature_banner_short_description; ?></div> <?php endif; ?>
                            <?php if ($show_read_time == 1) : ?>
                                <?php if ($read_time) : ?><div class="read_time"><?php echo $read_time; ?></div> <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($link) : ?><div class="text_link_main"><a class="text_link" href="<?php echo $link; ?>"><?php echo "Read More"; ?></a> </div><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>