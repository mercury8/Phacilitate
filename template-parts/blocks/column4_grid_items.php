<?php

/**
 * Column 4 Grid Items Text Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'col4_grid_items-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'col4_grid_items';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title');
$button = get_field('button');
$small_text = get_field('small_text');
$link = get_field('link');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">    
    <div class="col4_grid_items__inner">
        <div class="container">
            <div class="col4_grid_items__wrapper">
                <?php if( $title ): ?><div class="col4_grid_items__title"><h3><?php echo $title; ?></h3></div><?php endif; ?>
                <?php if( have_rows('list') ): ?>
                    <div class="list">
                        <?php while( have_rows('list') ): the_row(); 
                            $image = get_sub_field('image');
                            $heading = get_sub_field('heading');
                            $text = get_sub_field('text');
                            $link1 = get_sub_field('link');
                            if( $link ): 
                                $link1_url = $link1['url'];
                                $link1_title = $link1['title'];
                                $link1_target = $link1['target'] ? $link1['target'] : '_self';
                            endif;
                            ?>
                            <div class="list__item">
                                <?php if( $image ): ?>
                                    <div class="image" style="background-image: url(<?php echo $image['url']; ?>);">
                                        <a href="<?php echo esc_url( $link1_url ); ?>" target="<?php echo esc_attr( $link1_target ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/274-275.png" alt="<?php echo $image['alt']; ?>" />
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if( $heading ): ?>
                                    <div class="heading">
                                        <a href="<?php echo esc_url( $link1_url ); ?>" target="<?php echo esc_attr( $link1_target ); ?>">
                                            <?php echo $heading; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if( $text ): ?>
                                    <div class="text">
                                        <?php echo $text; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                    ?>
                    <div class="col4_grid_items__btn"><a class="btn" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a></div>
                <?php endif; ?>
                <?php if( $small_text || $link ): ?>
                    <div class="col4_grid_items__data">
                        <?php if( $small_text ): ?><div class="col4_grid_items__small_text"><?php echo $small_text; ?></div><?php endif; ?>
                        <?php if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="col4_grid_items__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>