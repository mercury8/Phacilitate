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
$id = 'our_ebooks-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'our_ebooks';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

if( is_tax() ){
    $term = $args['term'];
    
    $heading = get_field('heading', $term);
    $post_selection_type = get_field('post_selection_type', $term); //all manual
    $select_post = get_field('select_post', $term);

}else{
    $heading = get_field('heading');
    $post_selection_type = get_field('post_selection_type'); //all manual
    $select_post = get_field('select_post');
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="our_ebooks_list_main">
        <div class="container">
            <div class="our_ebooks_list_wrapper">
                <?php if ($heading) { ?>
                    <div class="heading_section">
                        <div class="heading h2"><?php echo $heading ?></div>
                    </div>
                <?php } ?>

                <div class="our_ebooks_list_section">
                    <?php
                        if($post_selection_type == 'manual'){
                            $args = array(
                                'post__in'   => $select_post,
                                'orderby'   => 'post__in',
                                'post_type'        => 'e-book',
                                'post_status'      => 'publish'
                            );
                        }else {
                            $args = array(
                                'post_type'        => 'e-book',
                                'post_status'      => 'publish'
                            );
                        }
                        $the_query = new WP_Query( $args );
                    ?>
                    <?php if($the_query->have_posts()){ ?>
                        <div class="our_ebooks_list">
                            <?php while( $the_query->have_posts() ) { $the_query->the_post();  ?>
                                <?php get_template_part( 'template-parts/content', 'ebook' );?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>