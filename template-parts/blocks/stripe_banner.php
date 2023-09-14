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
$id = 'stripe_banner-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'stripe_banner';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$add_stripe_banner = get_field('add_stripe_banner');
$section_background_color = get_field('section_background_color');
$background_image = get_field('background_image');
$background_image_color = get_field('background_image_color');
$content = get_field('content');
$link = get_field('link');

?>

<?php if ($add_stripe_banner == 1) { ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="stripe_banner_main" style="background-color: <?php echo $section_background_color; ?>">
            <div class="container">
                <div class="stripe_banner_inner">
                    <?php if ($link) { ?>
                        <a href="<?php echo $link['url'] ? $link['url'] : "javascript:void(0)"; ?>" <?php if ($link['target']) { ?>target="_blank" <?php } ?> class="link"></a>
                    <?php } ?>
                    <div class="stripe_banner_bg_img" style="background-image: url('<?php echo $background_image; ?>'); background-color: <?php echo $background_image_color; ?>">
                        <div class="content">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>