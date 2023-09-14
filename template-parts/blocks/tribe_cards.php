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
$id = 'tribe_cards-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'tribe_cards';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');
$sub_heading = get_field('sub_heading');
$button_link = get_field('button_link');
$text_link = get_field('text_link');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="tribe_cards_main">
        <div class="container">
            <div class="tribe_cards_inner">
                <?php if ($heading || $sub_heading) { ?>
                    <div class="heading_section">
                        <?php if ($heading) { ?>
                            <div class="heading h2">
                                <?php echo $heading ?>
                            </div>
                        <?php } ?>
                        <?php if ($sub_heading) { ?>
                            <div class="sub_heading h6">
                                <?php echo $sub_heading ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                
                <?php if( have_rows('cards') ){ ?>
                    <div class="tribe_cards_list">
                        <div class="three_column_grid tribe_cards_section">
                            <div class="tribe_cards_section_inner">
                                <?php while ( have_rows('cards') ) { the_row(); 
                                    $image = get_sub_field('image');
                                    $title = get_sub_field('title');
                                    $short_description = get_sub_field('short_description');
                                    $learn_more_link = get_sub_field('learn_more_link');
                                ?>
                                    <div class="item">
                                        <div class="item_inner">
                                            <a class="hover_link" href="<?php echo $learn_more_link['url'] ? $learn_more_link['url'] : "javascript:void(0)"; ?>" <?php if($learn_more_link['target']) { ?> target="_blank" <?php } ?>></a>
                                            <div class="item_data">
                                                <div class="image_section">
                                                    <div class="image_bg" style="background-image:url(<?php echo $image; ?>)">
                                                        <?php if($learn_more_link){ ?>
                                                            <a href="<?php echo $learn_more_link['url'] ? $learn_more_link['url'] : "javascript:void(0)"; ?>" <?php if($learn_more_link['target']) { ?> target="_blank" <?php } ?>>
                                                        <?php } ?>
                                                            <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_343_260.png" alt="<?php echo $title ?>" />
                                                        <?php if($learn_more_link){ ?>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="content_section">
                                                    <div class="title">
                                                        <?php if($learn_more_link){ ?>
                                                            <a class="h4" <?php if($learn_more_link['target']) { ?> target="_blank" <?php } ?> href="<?php echo $learn_more_link['url'] ? $learn_more_link['url'] : "javascript:void(0)"; ?>">
                                                        <?php } ?>
                                                            <?php echo $title; ?>
                                                        <?php if($learn_more_link){ ?>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                    <?php if ($short_description) { ?>
                                                        <div class="short_description body2">
                                                            <?php echo $short_description; ?>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if($learn_more_link){ ?>
                                                        <div class="learm_more">
                                                            <a class="text_link" <?php if($learn_more_link['target']) { ?> target="_blank" <?php } ?> href="<?php echo $learn_more_link['url'] ? $learn_more_link['url'] : "javascript:void(0)"; ?>">LEARN MORE</a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($button_link){
                    $button_link_url = $button_link['url']; 
                    $button_link_title = $button_link['title'];
                    $button_link_target = ($button_link['target'] ? 'target=_blank' : '');
                ?>
                    <div class="button_link_section">
                        <a class="btn" href="<?php echo $button_link_url; ?>" <?php echo $button_link_target; ?>>
                            <?php echo $button_link_title; ?>
                        </a>
                    </div>
                <?php } ?>

                <?php if($text_link){ 
                    $url = $text_link['url']; 
                    $title = $text_link['title'];
                    $target = ($text_link['target'] ? 'target=_blank' : '');
                ?>
                    <div class="bottom_text_link">
                        <a href="<?php echo $url; ?>" <?php echo $target; ?>>
                            <?php echo $title; ?>
                        </a>
                    </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>