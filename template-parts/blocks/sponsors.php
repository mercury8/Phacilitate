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
$id = 'sponsors-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'sponsors';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');
$add_bottom_border = get_field('add_bottom_border');
$add_more_space_in_bottom = get_field('add_more_space_in_bottom');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($overflow_content == 1): ?>overflow_content<?php endif; ?>">
    <div class="sponsors_main">
        <div class="container">
            <div class="sponsors_inner<?php if($add_bottom_border == 0){?> no_bottom_border<?php } ?><?php if($add_more_space_in_bottom == 1){?> add_bottom_more_space<?php } ?>">

                <?php if ($heading) { ?>
                    <div class="heading_section">
                        <div class="heading_text h4">
                            <?php echo $heading ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if( have_rows('item') ){ ?>
                    
                    <div class="sponser_list">
                        <?php while( have_rows('item') ){ the_row(); 
                            $logo = get_sub_field('logo');
                            $title = get_sub_field('title');
                            $sub_title = get_sub_field('sub_title');
                            $link = get_sub_field('link');

                            $link_url = $link['url']; 
                            $link_title = $link['title'];
                            $link_target = ($link['target'] ? 'target=_blank' : '');
                        ?>
                            <div class="item">
                                <div class="item_inner">
                                    <a class="hover_link" href="<?php echo $link_url; ?>" <?php echo $link_target; ?>></a>
                                    <div class="logo_section">
                                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                                    </div>
                                    <div class="content_section">
                                        <?php if($title){ ?>
                                            <div class="title">
                                                <?php echo $title; ?>
                                            </div>
                                        <?php } ?>
                                        <?php if($sub_title){ ?>
                                            <div class="sub_title">
                                                <?php echo $sub_title; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            
        </div>
    </div>
</div>