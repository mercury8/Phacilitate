<?php

/**
 * Main Banner Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main_banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'main_banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');
$short_description = get_field('short_description');
$button = get_field('button');
$background_color = get_field('background_color');
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$image_3 = get_field('image_3');
$desktop_pattern_image = get_field('desktop_pattern_image');
$mobile_pattern_image = get_field('mobile_pattern_image');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="main_banner__inner d-flex align-items-center" style=" background-color: <?php echo $background_color; ?>; background-image: url('<?php echo $desktop_pattern_image; ?>'), url('<?php echo $mobile_pattern_image; ?>');">
        <div class="container">
            <div class="main_banner__container d-flex align-items-center">
                <div class="main_banner__left">
                    <h1 class="heading"><?php echo $heading; ?></h1>
                    <?php if( $short_description ): ?><div class="description"><?php echo $short_description; ?></div><?php endif; ?>
                    <?php if($button && $button['title']): ?>
                        <div class="btn_box"><a href="<?php echo $button['url']; ?>" class="btn light__purple" <?php echo ($button['target'])?'target="_blank"':''; ?> ><?php echo $button['title']; ?></a>	</div>
                    <?php endif; ?>
                </div>
                <div class="main_banner__right">
                    <div class="main_banner__images d-flex align-items-center">
                        <div class="image1 image"><img src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>" /></div>
                        <div class="image2 image"><img src="<?php echo $image_2['url']; ?>" alt="<?php echo $image_2['alt']; ?>" /></div>
                        <div class="image1 image"><img src="<?php echo $image_3['url']; ?>" alt="<?php echo $image_3['alt']; ?>" /></div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>