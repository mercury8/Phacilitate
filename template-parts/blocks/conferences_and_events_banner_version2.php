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
$id = 'conferences_and_events_banner_' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'conferences_and_events_banner';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$background_color = get_field('background_color');


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="conferences_and_events_banner_inner" style=" background-color: <?php echo $background_color; ?>;">

        <div class="big-container">
            <div class="banner_inner">
                <?php if (have_rows('left_section')) { ?>
                    <div class="banner_left">
                        <?php while (have_rows('left_section')) {
                            the_row();
                            $tag_line_text = get_sub_field('tag_line_text');
                            $heading = get_sub_field('heading');
                            $short_description = get_sub_field('short_description');
                            $button = get_sub_field('button');
                            $btn_download = get_sub_field('btn_download');
                            $btn_download_title = get_sub_field('btn_download_title');
                        ?>
                            <div class="banner_left_inner">
                                <?php if ($tag_line_text) { ?>
                                    <div class="tag_line_text h6"><?php echo $tag_line_text; ?></div>
                                <?php } ?>
                                <?php if ($heading) { ?>
                                    <h1 class="heading"><?php echo $heading; ?></h1>
                                <?php } ?>
                                <?php if ($short_description) { ?>
                                    <div class="description"><?php echo $short_description; ?></div>
                                <?php } ?>
                                <?php if ($button && $button['title']) { ?>
                                    <div class="btn_box"><a href="<?php echo $button['url']; ?>" class="btn btn_green" <?php echo ($button['target']) ? 'target="_blank"' : ''; ?>><?php echo $button['title']; ?></a>
                                    <p><a href="<?php echo $btn_download; ?>" class="btn_download_title" ><?php echo $btn_download_title; ?></a></p></div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>


                <?php if (have_rows('right_section')) { ?>
                    <div class="banner_image_section">
                        <?php while (have_rows('right_section')) {
                            the_row();
                            $logo = get_sub_field('logo');
                            $banner_image = get_sub_field('banner_image');
                            $video = get_sub_field("video", false, false)
                        ?>
                            <div class="banner_image_section_inner">
                                <?php if ($banner_image) { ?>
                                    <div class="image_vector">
                                        <img src="<?php echo get_template_directory_uri() ?>/dist/images/event_banner_vector-new.png" alt="event_banner_vector" />
                                        <div class="image_section">
                                            <img src="<?php echo $banner_image ?>" alt="empty_902_800" />
                                        </div>
                                        <?php if ($logo) {
                                            $logo_url =  $logo['url'];
                                            $logo_alt =  $logo['alt'];
                                        ?>
                                            <div class="logo">
                                                <img src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>" />
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($video)) { ?>
                                    <div class="video_pay_icon_section">
                                        <div class="section_inner">
                                            <a href="<?php echo $video ? $video : "javascript:void(0)"; ?>" <?php if (!empty($video)) { ?> data-lity <?php } ?>>
                                                <div class="icon">
                                                    <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M32.5 65C50.4493 65 65 50.4493 65 32.5C65 14.5507 50.4493 0 32.5 0C14.5507 0 0 14.5507 0 32.5C0 50.4493 14.5507 65 32.5 65ZM26 42.3923L44 32L26 21.6077L26 42.3923Z" fill="white" />
                                                    </svg>
                                                </div>
                                                <div class="text">
                                                    WATCH VIDEO
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>