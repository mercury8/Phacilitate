<?php

/**
 * Posts Withh load More Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'posts_load_more-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'posts_load_more insight_block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$tax_query = '';
if( is_tax() ){
    $term = $args['term'];
    $show_posts = get_field('show_posts', $term);
    $show_load_more = get_field('show_load_more', $term);
    $number_of_post = get_field('number_of_post', $term);
    $term_id = $term->term_id;
    $tax_query = array(
        'taxonomy' => $term->taxonomy,
        'field'    => 'term_id',
        'terms'    => $term_id,
    );

}else{
    $show_posts = get_field('show_posts');
    $show_load_more = get_field('show_load_more');
    $number_of_post = get_field('number_of_post');   
    $term_id = '';
}

if( $show_posts == true ):

  /*   $posts = get_posts( array(
        'numberposts' => $number_of_post,
        'fields' => 'ids',
        'post_status'    => 'publish',
        'paged'    => 1,
    ) ); */

    $paged = 1;
    $i_args = array(
        'posts_per_page'      => $number_of_post,
        'post_type'        => array('insight', 'post'),
        'post_status'    => 'publish',
        'paged' => 1,
        'fields' => 'ids'
    );
    // if(!empty($tax_query)) {
    //     $i_args['tax_query'] = array(
    //         $tax_query
    //     );
    // }
    $postQuery = new WP_Query($i_args);
    $postList = $postQuery->posts; 
    $maxPages = $postQuery->max_num_pages;
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="posts_load_more__inner">
        <div class="container">
        <?php if( count( $postList ) > 0 ): ?>
            <div class="posts_load_more__container">
                <div class="posts_load_more__list">
            <?php foreach ($postList as $key => $postId) {                
                    set_query_var( 'postId', $postId );
                    get_template_part( 'template-parts/content-posts_load_more' );
                } ?>
            <?php if( $show_load_more == true && $maxPages > 1 && $paged != $maxPages ): ?>
                <div class="posts_load_more__item loadMore text-center w-100 mt-3">
                    <a href="#" class="posts_load_more_loadMore btn white" data-paged="2">Load More</a>
                </div>
            <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
<?php if( $show_load_more == true && $maxPages > 1 && $paged != $maxPages ): ?>
<script type="text/javascript">
jQuery( document ).ready(function($) {

    $( "body" ).on( "click", ".posts_load_more__list a.posts_load_more_loadMore", function(event) {
        event.preventDefault();
        var paged = $(this).attr('data-paged');
        filter_post( paged, $(this) );
    });

});

function filter_post( paged = 1, self = '' ){

    jQuery(self).closest('.posts_load_more').addClass('loading');
        jsonObj = {
            "action": "filter_post_load_more",            
            "post_count": "<?php echo $number_of_post; ?>",
            "paged": paged,
            "term_id": "<?php echo $term_id; ?>",
        };
        var self = self;
    jQuery.ajax({
        url: ajax_call_url,
        data: jsonObj, // form data
        type: "POST", // POST
        // async: true,
        beforeSend: function(xhr) {
            // console.log("ajax start"); // changing the button label
        },
        success: function(xhr) {
            jQuery(self).closest('.posts_load_more').removeClass('loading');
            if( xhr.success === true ){
                jQuery('.posts_load_more .posts_load_more__list > .loadMore').remove();
                jQuery('.posts_load_more .posts_load_more__list > .posts_load_more__item:last-child').after(xhr.data);                
            }
            
        },
        error: function(xhr) {
            console.log(xhr);
            jQuery(self).closest('.posts_load_more').removeClass('loading');
        }
    });

}
</script> <?php endif; ?>
</div>
<?php endif; ?>