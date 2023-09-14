<?php

/**
 * Left Title, Text Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'left_1image_text-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'left_1image_text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$select_background_color = get_field('select_background_color');

$right_heading = get_field('right_heading');
$left_heading = get_field('left_heading');
$heading_type_select = get_field('heading_type_select');
$short_description = get_field('short_description');
$button = get_field('button');
$select_button_type = get_field('select_button_type');
$image_1 = get_field('image_1');
$desktop_pattern_image = get_field('desktop_pattern_image');
$mobile_pattern_image = get_field('mobile_pattern_image');

$for_mobile_set_image_then_text = get_field('for_mobile_set_image_then_text');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>"> 
    <div class="left_1image_text_main bg_clr_<?php echo $select_background_color; ?><?php if($for_mobile_set_image_then_text){ ?> mobile_image_first<?php } ?>">   
    
    <div class="left_1image_text__inner d-flex align-items-center" style=" background-image: url('<?php echo $desktop_pattern_image; ?>')<?php if( $mobile_pattern_image ): ?>, url('<?php echo $mobile_pattern_image; ?>')<?php endif; ?>;">
            <div class="container">
                <div class="left_1image_text__container d-flex align-items-top">
                    <div class="left_1image_text__left order-lg-1">
                        <?php if( $right_heading ): ?>
                                <h2 class="heading <?php echo $heading_right_type_select; ?>"><?php echo $right_heading; ?></h2>
                            <?php endif; ?>
                        <?php if( $short_description ): ?>
                                <div class="description"><?php echo $short_description; ?></div>
                            <?php endif; ?>
                        <?php if($button && $button['title']): ?>
                            <div class="btn_box"><a href="<?php echo $button['url']; ?>" class="btn button_<?php echo $select_button_type; ?>" <?php echo ($button['target'])?'target="_blank"':''; ?> ><?php echo $button['title']; ?></a>	</div>
                        <?php endif; ?>
                    </div>
                    <div class="left_1image_text__right">
                    <h2 class="heading mr-5<?php echo $heading_left_type_select; ?>"><?php echo $left_heading; ?></h2>                        
                        <div class="image1 image"><img src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>