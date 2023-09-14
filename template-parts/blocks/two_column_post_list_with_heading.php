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
$id = 'two_column_post_list_with_heading-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'two_column_post_list_with_heading';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$post_per_page = get_field('post_per_page');
$heading = get_field('heading');
$select_post = get_field('select_post');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="two_column_post_list_with_heading_main">
        <div class="container">
            <div class="section_inner">
                <?php if ($heading) { ?>
                    <div class="heading_section">
                        <?php if ($heading) { ?>
                            <div class="heading h2">
                                <?php echo $heading ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="two_column_selected_post_list two_column_selected_post_list_list_<?php echo esc_attr($id); ?>">
                    <?php $ik = 0;
                    foreach ($select_post as $post) :
                        setup_postdata($post);
                        $post_id = $post->ID;
                        $post_thumbnail = get_the_post_thumbnail_url($post_id);
                        $post_permalink = get_permalink($post_id);
                        $post_title = get_the_title($post_id);

                        $short_description = get_field('short_description', $post_id);

                        $categories = get_the_category($post_id); //$post->ID
                        foreach ($categories as $category) {
                            //echo $category->name;
                        }
                        $ik++;

                    ?>

                        <div class="item" <?php /*if ($ik > $post_per_page) { ?> style="display: none;" <?php } */ ?>>
                            <div class="item_inner">
                                <div class="image_section">
                                    <div class="img_bg" style="background-image:url('<?php echo $post_thumbnail ?>')">
                                        <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_700_700.png" alt="<?php echo $title ?>" />
                                        <a class="hover_link" href="<?php echo $post_permalink; ?>"></a>
                                    </div>
                                </div>
                                <div class="content_section">
                                    <?php if ($category->name) { ?>
                                        <div class="category_name">
                                            <a href="<?php echo get_term_link($category); ?>">
                                                <?php echo $category->name; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="post_name">
                                        <a class="title_text" href="<?php echo $post_permalink; ?>" title="<?php echo $post_title; ?>">
                                            <?php echo $post_title; ?>
                                        </a>
                                    </div>
                                    <?php if ($short_description) { ?>
                                        <div class="short_description">
                                            <?php echo $short_description; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
                <?php  /* ?>
                <div class="load_more_btn">
                    <a href="javascript:void(0)" class="btn white more_posts load_more_button_<?php echo esc_attr($id); ?>" id="loadmore">
                        Load More
                    </a>
                </div>
                <?php */  ?>
            </div>
        </div>
    </div>
</div>

<script>
    var id = '<?php echo esc_attr($id); ?>';
    jQuery(".load_more_button_" + id).on("click", function() {
        jQuery(".two_column_selected_post_list_list_" + id + " .item").show();
        jQuery(this).hide();
    });
</script>