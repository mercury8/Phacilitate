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
$id = 'meet_us_event_list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'meet_us_event_list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($overflow_content == 1): ?>overflow_content<?php endif; ?>">
    <div class="meet_us_event_list_main">
        <div class="container">
            <div class="meet_us_event_list_inner<?php if($add_bottom_border == 0){?> no_bottom_border<?php } ?><?php if($add_more_space_in_bottom == 1){?> add_bottom_more_space<?php } ?>">

                <?php if ($heading) { ?>
                    <div class="heading_section">
                        <div class="heading_text h2">
                            <?php echo $heading ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if( have_rows('event_list') ){ ?>
                    
                    <div class="meet_us_event_list_list">
                        <?php while( have_rows('event_list') ){ the_row(); 
                            $date = get_sub_field('date');
                            $month_text = get_sub_field('month_text');
                            $title = get_sub_field('title');
                            $event_organiser = get_sub_field('event_organiser');
                            $link = get_sub_field('link');

                            $link_url = $link['url']; 
                            $link_title = $link['title'];
                            $link_target = ($link['target'] ? 'target=_blank' : '');
                        ?>
                            <div class="item">
                                <div class="item_inner">
                                    <div class="date_section">
                                        <?php if($date){ ?>
                                            <div class="date">
                                                <?php echo $date; ?>
                                            </div>
                                        <?php } ?>
                                        <?php if($month_text){ ?>
                                            <div class="month_text">
                                                <?php echo $month_text; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="content_section">
                                        <?php if($title){ ?>
                                            <div class="title h5">
                                                <a href="<?php echo $link_url; ?>" <?php echo $link_target; ?>>
                                                    <?php echo $title; ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <?php if($event_organiser){ ?>
                                            <div class="sub_title">
                                                <?php echo $event_organiser; ?>
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