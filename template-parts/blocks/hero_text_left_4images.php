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
    $id = 'hero_text_left_4images-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'hero_text_left_4images';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

    $tag_line_text = get_field('tag_line_text');

    $heading = get_field('heading');
    $heading_text_color = get_field('heading_text_color');
    $short_description = get_field('short_description');
    $button = get_field('button');
    $background_color = get_field('background_color');

    $select_image_position = get_field('select_image_position');

    $image_1 = get_field('image_1');
    $image_2 = get_field('image_2');
    $image_3 = get_field('image_3');
    $image_4 = get_field('image_4');
    $select_image_1_height = get_field('select_image_1_height');
    $select_image_2_height = get_field('select_image_2_height');
    $select_image_3_height = get_field('select_image_3_height');
    $select_image_4_height = get_field('select_image_4_height');
    $desktop_pattern_image = get_field('desktop_pattern_image');
    $mobile_pattern_image = get_field('mobile_pattern_image');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hero_text_left_4images__inner d-flex align-items-center image_in_<?php echo $select_image_position; ?>" style="background-color:<?php echo $background_color; ?>; background-image: url('<?php echo $desktop_pattern_image; ?>')<?php if( $mobile_pattern_image ): ?>, url('<?php echo $mobile_pattern_image; ?>')<?php endif; ?>;">
        <div class="container">
            <div class="hero_text_left_4images_inner_section">
                <div class="hero_text_left_4images__container d-flex align-items-center" >
                    <div class="hero_text_left_4images__left">
                        <?php if($tag_line_text){ ?>
                            <div class="tag_line_text">
                                <?php echo $tag_line_text; ?>
                            </div>
                        <?php } ?>
                        <h2 class="heading" style="color:<?php echo $heading_text_color; ?>"><?php echo $heading; ?></h2>
                        <?php if( $short_description ): ?><div class="description"><?php echo $short_description; ?></div><?php endif; ?>
                        <?php if($button && $button['title']): ?>
                            <div class="btn_box">
                                <a href="<?php echo $button['url']; ?>" class="btn" <?php echo ($button['target'])?'target="_blank"':''; ?> ><?php echo $button['title']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="hero_text_left_4images__right">
                        <div class="hero_text_left_4images__images d-flex align-items-center">
                            <div class="image1 image image_height_<?php echo $select_image_1_height; ?>"><img src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>" /></div>
                            <div class="image2 image image_height_<?php echo $select_image_2_height; ?>"><img src="<?php echo $image_2['url']; ?>" alt="<?php echo $image_2['alt']; ?>" /></div>
                            <div class="image3 image image_height_<?php echo $select_image_3_height; ?>"><img src="<?php echo $image_3['url']; ?>" alt="<?php echo $image_3['alt']; ?>" /></div>
                            <div class="image4 image image_height_<?php echo $select_image_4_height; ?>"><img src="<?php echo $image_4['url']; ?>" alt="<?php echo $image_4['alt']; ?>" /></div>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>