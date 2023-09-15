<?php 
    $id = get_the_ID();
    $link = get_the_permalink();
    $img_url = get_the_post_thumbnail_url($id);    
    $heading = get_the_title();
    $date = get_the_date( 'j F Y' );
    $short_description = get_field('short_description', $id); 
?>


<div class="item">
    <div class="image_section">
        <div class="post_img" style="background-image:url('<?php echo $img_url ?>')">
            <a href="<?php echo $link; ?>">
                <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_140_140.png" alt="<?php echo $heading ?>" />
            </a>
        </div>
    </div>
    <div class="post_section">
        <div class="date"><?php echo $date; ?></div>
        <div class="heading">
            <a class="h5" href="<?php echo $link; ?>">
                <?php echo $heading; ?>
            </a>
        </div>
        <?php if( $short_description ): ?>
            <div class="short_description">
                <?php echo wp_trim_words($short_description, 5,''); ?>
                <?php //echo mb_strimwidth($short_description, 0, 36, ""); ?>
            </div>
        <?php endif; ?>
    </div>
</div>