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
$id = 'generic_form-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'generic_form';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$form_title = get_field('form_title');
$select_heading_text_weight = get_field('select_heading_text_weight');
$form_subtitle = get_field('form_subtitle');
$form_short_code = get_field('form_short_code');
$bottom_space_selection = get_field('bottom_space_selection');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="generic_form_main bottom_space_is_<?php echo $bottom_space_selection; ?>">
        <div class="container">
            <div class="generic_form_inner">
                <?php if ($form_subtitle || $form_title) { ?>
                    <div class="form_title_block">
                        <?php if ($form_subtitle) { ?>
                            <h6> <?php echo $form_subtitle ?></h6>
                        <?php } ?>
                        <?php if ($form_title) { ?>
                            <h1 class="heading_text font_is_<?php echo $select_heading_text_weight; ?>"> <?php echo $form_title ?></h1>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if ($form_short_code) { ?>
                    <div class="form_section_content">
                        <div class="form-code">
                            <?php echo do_shortcode($form_short_code); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>

</div>