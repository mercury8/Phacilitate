<?php 
    $upcoming_posts_id = get_query_var( 'postId' );
    $title = get_the_title( $upcoming_posts_id );
    $link = get_the_permalink( $upcoming_posts_id );
    $image = get_the_post_thumbnail_url( $upcoming_posts_id, 'full' );
    $time = get_field('time', $upcoming_posts_id);
    $location = get_field('location',$upcoming_posts_id);
    $date = get_the_date( 'j M Y',$upcoming_posts_id );
    $short_description = get_field('short_description', $upcoming_posts_id);
?>


<div class="webinars_list_upcoming_ondemand_list_item" id="updated_upcoming">
    <div class="webinars_list_upcoming_ondemand_list_item_inner">
        <a class="webinars_list_upcoming_ondemand_list_item_link" href="<?php echo $link; ?>"></a>
        <div class="webinars_list_upcoming_ondemand_list_top">
            <div class="image" style=" background-image: url('<?php echo $image; ?>')">
                <a href="<?php echo $link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/empty_341_220.png" alt="empty_341_220" /></a>
            </div>
        </div>
        <div class="webinars_list_upcoming_ondemand_list_Bottom">
            <div class="webinars_list_upcoming_ondemand_list_slide_top">
            <?php if($title): ?>
                <h4 class="title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h4>
            <?php endif; ?>

            <?php if ($short_description) { ?>
                <div class="short_description body3">
                    <?php echo $short_description; ?>
                </div>
            <?php } ?>
            </div>

            <div class="webinars_list_upcoming_ondemand_list_slide_bottom">
            <?php if($date || $time || $location): ?>
                <div class="icon-main">
                    <?php if($date): ?>
                        <div class="date icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 3H19V1H17V3H7V1H5V3H4C2.9 3 2 3.9 2 5V21C2 22.1 2.9 23 4 23H20C21.1 23 22 22.1 22 21V5C22 3.9 21.1 3 20 3ZM20 21H4V10H20V21ZM20 8H4V5H20V8Z" fill="#83AC16"/>
                            </svg>
                            <span><?php echo $date; ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if($time): ?>
                        <div class="time icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20Z" fill="#83AC16"/>
                                <path d="M12.5 7H11V13L16.25 16.15L17 14.92L12.5 12.25V7Z" fill="#83AC16"/>
                            </svg>
                            <span><?php echo $time; ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if($location): ?>
                        <div class="location icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C10.9 12 10 11.1 10 10C10 8.9 10.9 8 12 8C13.1 8 14 8.9 14 10C14 11.1 13.1 12 12 12ZM18 10.2C18 6.57 15.35 4 12 4C8.65 4 6 6.57 6 10.2C6 12.54 7.95 15.64 12 19.34C16.05 15.64 18 12.54 18 10.2ZM12 2C16.2 2 20 5.22 20 10.2C20 13.52 17.33 17.45 12 22C6.67 17.45 4 13.52 4 10.2C4 5.22 7.8 2 12 2Z" fill="#83AC16"/>
                            </svg>
                            <span><?php echo $location; ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if($link): ?>
                <div class="link"><a href="<?php echo $link; ?>" class="text_link"><?php echo "LEARN MORE"; ?></a></div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>