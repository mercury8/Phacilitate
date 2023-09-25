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
$id = 'mini_site_cta-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'mini_site_cta';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');
$button_link = get_field('button_link');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($overflow_content == 1): ?>overflow_content<?php endif; ?>">
    <div class="mini_site_cta_main">
        <div class="container">
            <div class="mini_site_cta_inner">
                <?php if ($heading) { ?>
                    <div class="heading">
                        <?php echo $heading ?>
                    </div>
                <?php } ?>
                <?php if($button_link){
                    $button_link_url = $button_link['url']; 
                    $button_link_title = $button_link['title'];
                    $button_link_target = ($button_link['target'] ? 'target=_blank' : '');
                ?>
                    <div class="button_section">
                        <a class="btn orange" href="<?php echo $button_link_url; ?>" <?php echo $button_link_target; ?>>
                            <?php echo $button_link_title; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>