<?php

/**
 * Image / Video With Link Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image_Video_with_link-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image_Video_with_link';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$image__video = get_field('image__video');
$image = get_field('image');
$show_play_button = get_field('show_play_button');
$image_max_width = get_field('image_max_width');
$iframe = get_field('video');
$video_image = get_field('video_image');
$button = get_field('link');

$select_video_open_type = get_field('select_video_open_type'); //lightbox external_link
$external_link_for_video_open = get_field('external_link_for_video_open');
$play_icon_text = get_field('play_icon_text');

preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// Add extra parameters to src and replcae HTML.
$params = array(
    // 'controls'  => 0,
    'hd'        => 1,
    'autohide'  => 1
);
$new_src = add_query_arg($params, $src);

$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0" id="video"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($image__video == "image"): ?>with_image<?php endif; ?><?php if($image__video == "video"): ?>with_video<?php endif; ?>">    
    <div class="image_Video_with_link__inner">
        <div class="container">
            <div class="image_Video_with_link__wrapper">
                <?php if($image__video == "image"): ?>
                    <div class="image_Video" style="max-width: <?php echo $image_max_width; ?>%; ">
                        <div class="image" style=" background-image: url('<?php echo $image['url']; ?>')">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/1153-646.png" alt="Banner" />
                        </div>
                        <?php if($show_play_button == 1){ ?>
                            <?php if($button && $button['title']){ ?>
                                <div class="video_play">
                                    <a href="<?php echo $button['url']; ?>" class="link" <?php echo ($button['target'])?'target="_blank"':''; ?> >
                                        <svg width="111" height="110" viewBox="0 0 111 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="55.3475" cy="54.9647" r="54.9647" fill="white"/>
                                            <path d="M74.7969 54.1189L44.3549 71.6946L44.3549 36.5432L74.7969 54.1189Z" fill="#1E0F49"/>
                                        </svg>
                                        <span><?php echo !empty($play_icon_text) ? $play_icon_text : "WATCH TRAILER"; ?></span>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php endif; ?> 
                <?php if($image__video == "video"): ?>
                    <div class="image_Video" style="max-width: <?php echo $image_max_width; ?>%; ">
                        <div class="video" style=" background-image: url('<?php echo $video_image['url']; ?>')">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/1153-646.png" alt="Banner" />
                        </div>
                        <?php if($select_video_open_type == 'lightbox'){ ?>
                            <div class="iframe" style="display: none;">
                                <?php echo $iframe; ?>
                            </div>
                        <?php } ?>
                        <div class="video_play btn_for_video">
                            <?php if($select_video_open_type == 'lightbox'){ ?>
                                <a href="javascript:void(0)">
                            <?php } ?>
                            <?php if($select_video_open_type == 'external_link'){ 
                                if($external_link_for_video_open){
                                    $external_link_for_video_open_url = $external_link_for_video_open['url']; 
                                    $external_link_for_video_open_title = $external_link_for_video_open['title'];
                                    $external_link_for_video_open_target = ($external_link_for_video_open['target'] ? 'target=_blank' : '');
                                }
                            ?>
                                <a href="<?php echo $external_link_for_video_open_url; ?>" <?php echo $external_link_for_video_open_target; ?>>
                            <?php } ?>
                                <svg width="111" height="110" viewBox="0 0 111 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="55.3475" cy="54.9647" r="54.9647" fill="white"/>
                                    <path d="M74.7969 54.1189L44.3549 71.6946L44.3549 36.5432L74.7969 54.1189Z" fill="#1E0F49"/>
                                </svg>
                                <span><?php echo !empty($play_icon_text) ? $play_icon_text : "WATCH TRAILER"; ?></span>
                            <?php if($select_video_open_type == 'lightbox'){ ?>
                                </a>
                            <?php } ?>
                            <?php if($select_video_open_type == 'external_link'){ if($external_link_for_video_open){ ?>
                                </a>
                            <?php } } ?>
                        </div>  
                    </div>
                <?php endif; ?> 
                <?php if($button && $button['title']): ?>
                    <div class="btn_box"><a href="<?php echo $button['url']; ?>" class="link" <?php echo ($button['target'])?'target="_blank"':''; ?> ><?php echo $button['title']; ?></a></div>
                <?php endif; ?>  
            </div>
        </div>
    </div>
</div>