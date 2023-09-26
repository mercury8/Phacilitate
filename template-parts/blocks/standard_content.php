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
$id = 'standard_content-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'standard_content';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$content = get_field('content');
$heading = get_field('heading');
$heading_font_weight = get_field('heading_font_weight');
$container_options = get_field('container_options');
$select_font_size = get_field('select_font_size');
$add_date = get_field('add_date');
$overflow_content = get_field('overflow_content');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($overflow_content == 1): ?>overflow_content<?php endif; ?>">
    <div class="standard_content_main">
        <?php if ($container_options == 'small_container') { ?>
            <div class="small-container">
        <?php } elseif ($container_options == 'big_container') { ?>
            <div class="big-container">
        <?php } else { ?>
            <div class="container">
        <?php } ?>

            <?php if ($heading) { ?>
                <div class="heading_date">
                    <h1 class="heading_text font_weight_<?php echo $heading_font_weight; ?>"> <?php echo $heading ?></h1>
                    <?php if($add_date == 1){ ?>
                        <div class="date">
                            <p><?php printf(__('Last updated %s', 'wp-bootstrap-starter'), get_the_modified_date()); ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ($content) { ?>
                <div class="content<?php if ($select_font_size == 'big') { ?> big_fonts<?php } ?>">
                    <?php echo $content ?>
                </div>
            <?php } ?>

        </div>
    </div>
</div>