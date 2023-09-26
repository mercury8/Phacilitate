<?php

/**
 * Upcoming Event Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'events_list_with_top_next_event-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'events_list_with_top_next_event';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title');
$title_font_weight = get_field('title_font_weight');
$sub_heading = get_field('sub_heading');
$featured_post = get_field('select_up_next_event');
$select_event_cards  = get_field('select_event_cards');
$btn_url = get_field('btn_url');
$button_text = get_field('button_text');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="next_upcoming_event_main">
            <div class="upcoming_event__inner">

                <div class="upcoming_event__wrapper">
                    <?php if ($title || $sub_heading) { ?>
                        <div class="heading_section">
                            <?php if ($title) : ?>
                                <h2 class="heading h1 font_weight_<?php echo $title_font_weight; ?>"><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if ($sub_heading) : ?>
                                <div class="sub_heading"><?php echo $sub_heading; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php } ?>

                    <?php if ($featured_post) {
                        $image = wp_get_attachment_url(get_post_thumbnail_id($featured_post->ID));
                        $title = $featured_post->post_title;
                        $link = get_permalink($featured_post->ID);
                        $excerpt = get_field('short_description', $featured_post->ID);
                        $time = get_field('time', $featured_post->ID);
                        $location = get_field('location', $featured_post->ID);
                        $external_link = get_field('external_link', $featured_post->ID);
                        $date = get_the_date('j M Y', $featured_post->ID);
                        $slug = get_post_field('post_name', $featured_post->ID);
                        $event_date = get_field('event_date', $featured_post->ID);
                        $hide_date = get_field('hide_date', $featured_post->ID) ? true : "";
                        if (!empty($event_date)) {
                            $date = $event_date;
                        }
                    ?>
                        <div class="upcoming_event">
                            
                            <?php if ($image) : ?>
                                <div class="upcoming_event_left">
                                    <div class="image" style=" background-image: url('<?php echo $image; ?>')">
                                        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/513-513.png" alt="Upcoming Event" />
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="upcoming_event_right">

                                <h2 class="title h1"><b><?php echo "Up Next:&nbsp;"; ?></b><?php echo $title; ?></h2>

                                <?php if ($excerpt) : ?>
                                    <div class="excerpt"><?php echo $excerpt; ?></div>
                                <?php endif; ?>
                                <?php if ($date && empty($hide_date)) : ?>
                                    <div class="date icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 3H19V1H17V3H7V1H5V3H4C2.9 3 2 3.9 2 5V21C2 22.1 2.9 23 4 23H20C21.1 23 22 22.1 22 21V5C22 3.9 21.1 3 20 3ZM20 21H4V10H20V21ZM20 8H4V5H20V8Z" fill="#83AC16" />
                                        </svg>
                                        <span><?php echo $date; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($time) : ?>
                                    <div class="time icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20Z" fill="#83AC16" />
                                            <path d="M12.5 7H11V13L16.25 16.15L17 14.92L12.5 12.25V7Z" fill="#83AC16" />
                                        </svg>
                                        <span><?php echo $time; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($location) : ?>
                                    <div class="location icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 12C10.9 12 10 11.1 10 10C10 8.9 10.9 8 12 8C13.1 8 14 8.9 14 10C14 11.1 13.1 12 12 12ZM18 10.2C18 6.57 15.35 4 12 4C8.65 4 6 6.57 6 10.2C6 12.54 7.95 15.64 12 19.34C16.05 15.64 18 12.54 18 10.2ZM12 2C16.2 2 20 5.22 20 10.2C20 13.52 17.33 17.45 12 22C6.67 17.45 4 13.52 4 10.2C4 5.22 7.8 2 12 2Z" fill="#83AC16" />
                                        </svg>
                                        <span><?php echo $location; ?></span>
                                    </div>
                                <?php endif; ?>

                                <!-- switch -->
                                    
                                <?php if ( 'yes' == get_field('button_switch') ): ?>

                                    <?php if( get_field('btn_url') ): ?>
                                        <div class="link"><a href="<?php echo $btn_url; ?>" class="text_link" role="button"><?php echo $button_text; ?></a></div>
                                    <?php endif; ?> 

                                <?php else: ?>

                                    <div class="link"><a href="<?php echo !empty($external_link) && !empty($external_link['url']) ? $external_link['url'] : $link; ?>" <?php if (!empty($external_link) && $external_link['target']) { ?> target="_blank" <?php } ?> class="text_link"><?php echo "LEARN MORE"; ?></a></div>

                                <?php endif; ?>

                                <!-- switch end -->

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

        <?php if ($select_event_cards) { ?>
            <div class="events_card_section">
                <div class="events_list">
                    <?php foreach ($select_event_cards  as $event_cards_post) {
                        setup_postdata($event_cards_post);
                        $post_id = $event_cards_post->ID;
                        $title = $event_cards_post->post_title;
                        $link = get_permalink($post_id);
                        $image = get_the_post_thumbnail_url($post_id, 'full');
                        $time = get_field('time', $post_id);
                        $location = get_field('location', $post_id);
                        $external_link = get_field('external_link', $post_id);
                        $date = get_the_date('j M Y', $post_id);
                        $event_date = get_field('event_date', $post_id);
                        $hide_date = get_field('hide_date', $post_id) ? true : "";
                        if (!empty($event_date)) {
                            $date = $event_date;
                        }
                    ?>

                        <div class="events_list_item">
                            <div class="events_list_item_inner">
                                <a class="events_list_item_link" href="<?php echo !empty($external_link) && !empty($external_link['url']) ? $external_link['url'] : $link; ?>" <?php if (!empty($external_link) && $external_link['target']) { ?> target="_blank" <?php } ?>></a>
                                <div class="events_list_top">
                                    <div class="image" style=" background-image: url('<?php echo $image; ?>')">
                                        <a href="<?php echo !empty($external_link) && !empty($external_link['url']) ? $external_link['url'] : $link; ?>" <?php if (!empty($external_link) && $external_link['target']) { ?> target="_blank" <?php } ?>><img src="<?php echo get_template_directory_uri(); ?>/dist/images/empty_341_220.png" alt="empty_341_220" /></a>
                                    </div>
                                </div>
                                <div class="events_list_Bottom">
                                    <?php if ($title) : ?>
                                        <h4 class="title"><a href="<?php echo !empty($external_link) && !empty($external_link['url']) ? $external_link['url'] : $link; ?>" <?php if (!empty($external_link) && $external_link['target']) { ?> target="_blank" <?php } ?>><?php echo $title; ?></a></h4>
                                    <?php endif; ?>
                                    <?php if ($date || $time || $location) : ?>
                                        <div class="icon-main">
                                            <?php if ($date && empty($hide_date)) : ?>
                                                <div class="date icon">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 3H19V1H17V3H7V1H5V3H4C2.9 3 2 3.9 2 5V21C2 22.1 2.9 23 4 23H20C21.1 23 22 22.1 22 21V5C22 3.9 21.1 3 20 3ZM20 21H4V10H20V21ZM20 8H4V5H20V8Z" fill="#83AC16" />
                                                    </svg>
                                                    <span><?php echo $date; ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($time) : ?>
                                                <div class="time icon">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20Z" fill="#83AC16" />
                                                        <path d="M12.5 7H11V13L16.25 16.15L17 14.92L12.5 12.25V7Z" fill="#83AC16" />
                                                    </svg>
                                                    <span><?php echo $time; ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($location) : ?>
                                                <div class="location icon">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 12C10.9 12 10 11.1 10 10C10 8.9 10.9 8 12 8C13.1 8 14 8.9 14 10C14 11.1 13.1 12 12 12ZM18 10.2C18 6.57 15.35 4 12 4C8.65 4 6 6.57 6 10.2C6 12.54 7.95 15.64 12 19.34C16.05 15.64 18 12.54 18 10.2ZM12 2C16.2 2 20 5.22 20 10.2C20 13.52 17.33 17.45 12 22C6.67 17.45 4 13.52 4 10.2C4 5.22 7.8 2 12 2Z" fill="#83AC16" />
                                                    </svg>
                                                    <span><?php echo $location; ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($link) : ?>
                                        <div class="link"><a href="<?php echo !empty($external_link) && !empty($external_link['url']) ? $external_link['url'] : $link; ?>" <?php if (!empty($external_link) && $external_link['target']) { ?> target="_blank" <?php } ?> class="text_link"><?php echo "LEARN MORE"; ?></a></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    wp_reset_postdata(); ?>
                </div>
            </div>
        <?php } ?>

    </div>
</div>