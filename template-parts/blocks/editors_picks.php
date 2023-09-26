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
$id = 'editors_picks-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'editors_picks';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$select_background_color = get_field('select_background_color');
$heading = get_field('heading');
$sub_heading = get_field('sub_heading');
$add_button_section = get_field('add_button_section');

$show_category_name = get_field('show_category_name');
$select_latest_post_showing_type = get_field('select_latest_post_showing_type'); //default manual
$select_post = get_field('select_post');
$select_category = get_field('select_category');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="editors_picks_main bg_clr_<?php echo $select_background_color; ?>">
        <div class="container">
            <div class="editors_picks_inner">
                <?php if ($heading || $sub_heading) { ?>
                    <div class="heading_section">
                        <?php if ($heading) { ?>
                            <div class="heading h2">
                                <?php echo $heading ?>
                            </div>
                        <?php } ?>
                        <?php if ($sub_heading) { ?>
                            <div class="sub_heading h6">
                                <?php echo $sub_heading ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if($select_latest_post_showing_type == 'default'){ ?>
                    <div class="latest_post_list">
                        <?php
                            $cat_args = array(
                                'orderby'      => 'date',
                                'order'        => 'DESC',
                                'child_of'     => 0,
                                'parent'       => '',
                                'type'         => 'post',
                                'hide_empty'   => true,
                                'taxonomy'     => 'category',
                                'include'       => $select_category,
                            );
                            //echo "<pre>"; print_r($cat_args); echo "</pre>";
                            $categories = get_categories( $cat_args );
                            foreach ( $categories as $category ) {

                                $query_args = array(
                                    'post_type'      => 'post',
                                    'category_name'  => $category->slug,
                                    'posts_per_page' => 1,
                                    'orderby'        => 'date',
                                    'order'          => 'DESC'
                                );

                                $recent = new WP_Query($query_args);

                                while( $recent->have_posts() ) :
                                    $recent->the_post();
                                    $id = get_the_ID();
                                    $thumbnail = get_the_post_thumbnail_url($id);
                                ?>
                                    <div class="item <?php echo $category->slug;?>">
                                        <div class="item_inner">
                                            <div class="image_section">
                                                <div class="img_bg" style="background-image:url('<?php echo $thumbnail ?>')">
                                                    <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_236_344.png" alt="<?php echo $title ?>" />
                                                    <a class="hover_link" href="<?php echo get_term_link($category);?>"></a>
                                                </div>
                                            </div>
                                            <div class="content_section">
                                                <?php if($show_category_name == 1){ ?>
                                                    <div class="category_name">
                                                        <?php /* <a href="<?php echo get_term_link($category);?>"> */ ?>
                                                            <?php echo $category->name;?>
                                                        <?php /* </a> */ ?>
                                                    </div>
                                                <?php } ?>
                                                <div class="post_name">
                                                    <a class="title_text" href="<?php the_permalink(); ?>" title="<?php ///the_title(); ?>">
                                                        <?php get_the_title(); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                            } wp_reset_postdata();
                        ?>
                    </div>
                <?php } ?>

                <?php if($select_latest_post_showing_type == 'manual'){ ?>
                    <div class="latest_post_list manual_selection">
                        <?php foreach( $select_post as $post ): 
                            setup_postdata($post); 
                            $post_id = $post->ID;
                            $post_thumbnail = get_the_post_thumbnail_url($post_id);
                            $post_permalink = get_permalink($post_id);
                            $post_title = get_the_title($post_id);

                            $categories = get_the_category($post_id);//$post->ID
                            foreach($categories as $category){
                            //echo $category->name;
                            }

                        ?>
                        
                            <div class="item">
                                <div class="item_inner">
                                    <div class="image_section">
                                        <div class="img_bg" style="background-image:url('<?php echo $post_thumbnail ?>')">
                                            <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_236_344.png" alt="<?php echo $title ?>" />
                                            <a class="hover_link" href="<?php echo $post_permalink; ?>"></a>
                                        </div>
                                    </div>
                                    <div class="content_section">
                                        <?php if($show_category_name == 1){ ?>
                                            <div class="category_name">
                                                <a href="<?php echo get_term_link($category);?>">
                                                    <?php echo $category->name;?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="post_name">
                                            <a class="title_text" href="<?php echo $post_permalink; ?>" title="<?php //echo $post_title; ?>">
                                                <?php echo $post_title; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                <?php } ?>
                

                <?php if($add_button_section == 1){ ?>
                    <?php if( have_rows('button_list') ){ ?>
                        <div class="button_list">
                            <?php while ( have_rows('button_list') ) { the_row(); 
                                $button_link = get_sub_field('link'); //array
                                $select_type = get_sub_field('select_type');
                            ?>
                                <div class="item">
                                    <?php if($button_link){
                                        $button_link_url = $button_link['url']; 
                                        $button_link_title = $button_link['title'];
                                        $button_link_target = ($button_link['target'] ? 'target=_blank' : '');
                                    ?>
                                        <div class="link">
                                            <a class="btn<?php if($select_type == 'purple'){?> light__purple<?php } ?>" href="<?php echo $button_link_url; ?>" <?php echo $button_link_target; ?>>
                                                <?php echo $button_link_title; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>