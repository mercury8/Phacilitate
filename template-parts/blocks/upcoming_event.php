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
$id = 'upcoming_event-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'upcoming_event_main';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title');
$featured_post = get_field('select_event');
$button = get_field('button');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="upcoming_event__inner">
        <div class="container">
            <div class="upcoming_event__wrapper">
                <?php if ($title) : ?><h2 class="heading h1"><?php echo $title; ?></h2><?php endif; ?>
                <?php if ($featured_post) :
                    $image = wp_get_attachment_url(get_post_thumbnail_id($featured_post->ID));
                    $title = $featured_post->post_title;
                    $excerpt = get_field('short_description', $featured_post->ID);
                    $time = get_field('time', $featured_post->ID);
                    $location = get_field('location', $featured_post->ID);
                    $date = get_the_date('j M Y', $featured_post->ID);
                    $slug = get_post_field('post_name', $featured_post->ID);
                    $external_link = get_field('external_link', $featured_post->ID);
                    $event_date = get_field('event_date', $featured_post->ID);
                    $hide_date = get_field('hide_date', $featured_post->ID) ? true : "";
                    if (!empty($event_date)) {
                        $date = $event_date;
                    }
                ?>
                    <div class="upcoming_event">
                        <?php if ($external_link) { ?>
                            <a class="upcoming_event_hover_link" href="<?php echo !empty($external_link) && !empty($external_link['url']) ? $external_link['url'] : $link; ?>" <?php if (!empty($external_link) && $external_link['target']) { ?> target="_blank" <?php } ?>></a>
                        <?php } ?>
                        <?php if ($image) : ?>
                            <div class="upcoming_event_left">
                                <div class="image" style=" background-image: url('<?php echo $image; ?>')">
                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/513-513.png" alt="Upcoming Event" />
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="upcoming_event_right">
                            <?php if ($title) : ?>
                                <h2 class="title h1"><b><?php echo "Up Next:&nbsp;"; ?></b><?php echo $title; ?></h2>
                            <?php endif; ?>
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
                            <?php if (!empty($external_link)) { ?>
                                <div class="link"><a href="<?php echo !empty($external_link) && !empty($external_link['url']) ? $external_link['url'] : $link; ?>" <?php if (!empty($external_link) && $external_link['target']) { ?> target="_blank" <?php } ?> class="text_link"><?php echo "LEARN MORE"; ?></a></div>
                            <?php } else { ?>
                                <div class="link"><a href="<?php get_site_url(); ?><?php echo $slug ? $slug : ""; ?>" class="text_link"><?php echo "LEARN MORE"; ?></a></div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($button && $button['title']) : ?>
                    <div class="btn_box"><a href="<?php echo $button['url']; ?>" class="btn" <?php echo ($button['target']) ? 'target="_blank"' : ''; ?>><?php echo $button['title']; ?></a></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>