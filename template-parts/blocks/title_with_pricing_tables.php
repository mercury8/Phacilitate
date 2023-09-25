<?php

/**
 * Pricing Tables Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pricing_tables-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'pricing_tables';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="pricing_tables_main">            
        <div class="container">

            <?php if ($title) { ?>
                <div class="title">
                    <h1><?php echo $title; ?></h1>
                </div>
            <?php } ?>

            <?php if( have_rows('list') ): ?>
                <div class="pricing_tables_list">
                    <?php while( have_rows('list') ): the_row(); 
                        $title = get_sub_field('title');
                        $price = get_sub_field('price');
                        $link = get_sub_field('link');
                        $most_popular = get_sub_field('most_popular');
                        ?>
                        <div class="pricing_tables_list_item <?php if ($most_popular == 1) { ?>most_popular<?php } ?>">
                            <?php if ($most_popular == 1) { ?>
                                <div class="pricing_tables_tag">
                                    <?php echo "Most Popular"; ?>
                                </div>
                            <?php } ?>
                            <div class="pricing_tables_list_item_inner">
                                <?php if ($title) { ?>
                                    <div class="pricing_tables_title">
                                        <h4><?php echo $title; ?></h4>
                                    </div>
                                <?php } ?>
                                <?php if ($price) { ?>
                                    <div class="pricing_tables_price">
                                        <?php echo $price; ?>
                                    </div>
                                <?php } ?>
                                <?php if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <div class="pricing_tables_btn">
                                        <a class="btn <?php if ($most_popular == 1) { ?>light__purple<?php } ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if( have_rows('text_list') ): ?>
                                    <div class="text_list">
                                        <?php while( have_rows('text_list') ): the_row(); 
                                            $text = get_sub_field('text');
                                            $enable_disable = get_sub_field('enable_disable');
                                            ?>
                                            <?php if ($text) { ?>
                                                <div class="text_list_item <?php echo $enable_disable; ?>">
                                                    <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.75115 11.5183L2.23365 7.00081L0.695312 8.52831L6.75115 14.5841L19.7511 1.58414L18.2236 0.0566406L6.75115 11.5183Z" fill="#1D0E49"/>
                                                    </svg>
                                                    <span><?php echo $text; ?></span>
                                                </div>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>