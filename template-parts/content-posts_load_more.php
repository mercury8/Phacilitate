
<?php 
    $postId = get_query_var( 'postId' );
    $title = get_the_title( $postId );
    $link = get_the_permalink( $postId );
    $imgUrl = get_the_post_thumbnail_url( $postId, 'full' );
    $short_description = get_field('short_description', $postId);
    $membership = get_field('membership', $postId);    
?>
    <div class="posts_load_more__item">
        <div class="posts_load_more__item__inner">
            <div class="posts_load_more__image <?php echo ($imgUrl)?'has_image':'no_image';?>">
                <a href="<?php echo $link; ?>" <?php if( $imgUrl ): ?> style=" background-image: url('<?php echo $imgUrl; ?>'); " <?php endif; ?>><img src="<?php echo $imgUrl; ?>" alt="<?php echo $title; ?>" /></a>
            </div>
            <div class="posts_load_more__content">
                <a href="<?php echo $link; ?>" class="h4 title"><?php echo $title; ?></a>
                <?php if( $short_description ): ?><p class="text"><?php echo substr($short_description, 0, 70); ?></p> <?php endif; ?>
                <?php if( $membership ): ?><div class="membership <?php echo $membership['value']; ?>"><?php echo $membership['label']; ?></div><?php endif; ?>
            </div>
        </div>
    </div>
