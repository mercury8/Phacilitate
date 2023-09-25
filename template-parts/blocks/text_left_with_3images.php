<?php

/**
 * Text Left With 3 Images Text Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text_left_with_3images-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text_left_with_3images';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if( is_tax() ){
    $term = $args['term'];

    $title = get_field('title', $term);
    $subtitle = get_field('subtitle', $term);
    $content = get_field('content', $term);
    $button = get_field('button', $term);
    $button_light = get_field('button_light', $term);
    $image_1 = get_field('image_1', $term);
    $image_2 = get_field('image_2', $term);
    $image_3 = get_field('image_3', $term);
    $desktop_pattern_image = get_field('desktop_pattern_image', $term);
    $mobile_pattern_image = get_field('mobile_pattern_image', $term);
    $enable_background = get_field('enable_background', $term);
    $title_tag = get_field('title_tag', $term);
    $height = get_field('enable_big_section_height', $term);
    $reduce_space = get_field('reduce_space', $term);
    
}else{

$title = get_field('title');
$subtitle = get_field('subtitle');
$content = get_field('content');
$button = get_field('button');
$button_light = get_field('button_light');
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$image_3 = get_field('image_3');
$desktop_pattern_image = get_field('desktop_pattern_image');
$mobile_pattern_image = get_field('mobile_pattern_image');
$enable_background = get_field('enable_background');
$title_tag = get_field('title_tag');
$height = get_field('enable_big_section_height');
$reduce_space = get_field('reduce_space');

}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($enable_background == 1): ?>enable_background<?php endif; ?> <?php if($height == 1): ?>enable_height<?php endif; ?> <?php if($reduce_space == 1): ?>reduce_space<?php endif; ?>">    
    <div class="text_left_with_3images__inner" <?php if($desktop_pattern_image || $mobile_pattern_image ): ?>style="background-image: url('<?php echo $desktop_pattern_image; ?>')<?php if( $mobile_pattern_image ): ?>, url('<?php echo $mobile_pattern_image; ?>')<?php endif; ?>;"<?php endif; ?>>
        <div class="container">
            <div class="text_left_with_3images__wrapper">
                <div class="text_left_with_3images__left">
                    <div class="text_left_with_3images__left__inner">
                        <?php if( $subtitle ): ?><div class="subtitle"><h6><?php echo $subtitle; ?></h6></div><?php endif; ?>
                        <?php if( $title ): ?><div class="title title__<?php echo $title_tag; ?>"><<?php echo $title_tag; ?>><?php echo $title; ?></<?php echo $title_tag; ?>></div><?php endif; ?>
                        <?php if( $content ): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
                        <?php if($button && $button['title']): ?>
                            <div class="btn_box"><a href="<?php echo $button['url']; ?>" class="btn <?php if($button_light == 1): ?>light__purple<?php endif; ?>" <?php echo ($button['target'])?'target="_blank"':''; ?> ><?php echo $button['title']; ?></a>	</div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="text_left_with_3images__right">                    
                    <?php if( $image_1 ): ?><div class="image_1 image_common"><img src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>" /></div><?php endif; ?>
                    <?php if( $image_2 ): ?><div class="image_2 image_common"><img src="<?php echo $image_2['url']; ?>" alt="<?php echo $image_2['alt']; ?>" /></div><?php endif; ?>
                    <?php if( $image_3 ): ?><div class="image_3 image_common"><img src="<?php echo $image_3['url']; ?>" alt="<?php echo $image_3['alt']; ?>" /></div><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>