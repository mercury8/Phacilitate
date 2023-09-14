<?php

/**
 * Category List With Sidebar Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'podcast_list_with_sidebar-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'podcast_list_with_sidebar';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$term = get_field('select_category');
$select_content_type = get_field('select_content_type');
$term_name = $term->name;
$term_id = $term->term_id;
$defaultPostPerPage = get_field('post_per_page');
$load_more_text = get_field('load_more_text');
$mobile_sidebar_between_posts = get_field('mobile_sidebar_between_posts');
$mobile_2_column_layout = get_field('mobile_2_column_layout');
$selection_type = get_field('selection_type');

if (empty($defaultPostPerPage)) {
    $defaultPostPerPage = 6;
}
?>

<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $defaultPostPerPage,
);

if ($selection_type == "category" && !empty($term_name)) {
    $args['category_name'] = $term_name;
} else if ($selection_type == "type" && !empty($select_content_type)) {
    $args['meta_query'] = array(
        array(
            'key'     => 'content_type',
            'value'   => $select_content_type,
            'compare' => 'LIKE',
        ),
    );
}
$the_query = new WP_Query($args);
// echo $the_query->found_posts;
// echo '<pre>';
// print_r($the_query);
// echo '</pre>';
$cpCount = 0;
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if ($mobile_sidebar_between_posts == 1) : ?>mobile_sidebar_between_posts<?php endif; ?> <?php if ($mobile_2_column_layout == 1) : ?>mobile_2_column_layout<?php endif; ?>">
    <div class="podcast_list_with_sidebar_main">
        <div class="container">
            <div class="podcast_list_with_sidebar_inner content_with_right_sidebar">
                <div class="content_section">

                    <?php if ($the_query->have_posts()) {
                        $i = 0;
                    ?>
                        <div class="archive__list">
                            <?php if ($mobile_2_column_layout == 1) : ?>
                                <div class="mobile-heading"><?php echo "Recent Stories"; ?></div>
                            <?php endif; ?>
                            <div class="archive__list_inner">
                                <?php while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    $i++;
                                    $cpCount++;
                                    // echo get_the_ID();
                                ?>

                                    <?php get_template_part('template-parts/content', 'podcast'); ?>

                                    <?php if ($mobile_sidebar_between_posts == 1) : ?>
                                        <?php if ($i == 4) { ?>
                                            <div class="right_sidebar mobile">
                                                <?php if (have_rows('sidebar_data')) { ?>
                                                    <div class="sidebar_data">
                                                        <?php while (have_rows('sidebar_data')) {
                                                            the_row();
                                                            $advertise_banner = get_sub_field('advertise_banner');
                                                            $show_popular_items = get_sub_field('show_popular_items');
                                                            $advertise_banner_link = get_sub_field('advertise_banner_link');
                                                        ?>
                                                            <?php if ($advertise_banner) { ?>
                                                                <div class="advertise_banner">
                                                                    <?php if ($advertise_banner_link) { ?>
                                                                        <a href="<?php echo $advertise_banner_link['url'] ? $advertise_banner_link['url'] : "javascript:void(0)"; ?>" <?php if ($advertise_banner_link['target']) { ?>target="_blank" <?php } ?> class="link">
                                                                        <?php } ?>
                                                                        <img src="<?php echo $advertise_banner['url']; ?>" alt="<?php echo $advertise_banner['alt']; ?>" />
                                                                        <?php if ($advertise_banner_link) { ?>
                                                                        </a>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($show_popular_items == 1) : ?>
                                                                <?php
                                                                $next_args = array(
                                                                    'post_type' => 'post',
                                                                    'post_status' => 'publish',
                                                                    'posts_per_page' => 3,
                                                                    'order' => 'DESC',
                                                                    'orderby' => 'ID'
                                                                );
                                                                $next_the_query = new WP_Query($next_args);
                                                                if ($next_the_query->have_posts()) { ?>
                                                                    <div class="more_posts">
                                                                        <div class="more_title">
                                                                            <h6><?php echo "POPULAR NEWS ITEMS"; ?></h6>
                                                                        </div>
                                                                        <div class="more_posts_list more_posts_slider">
                                                                            <?php while ($next_the_query->have_posts()) {
                                                                                $next_the_query->the_post();
                                                                                $id = $post->ID;
                                                                                $title = get_the_title($id);
                                                                                $link = get_permalink($id);
                                                                                $image = get_the_post_thumbnail_url($id, 'full');
                                                                                $date = get_the_date('j F Y', $id);
                                                                            ?>
                                                                                <div class="more_posts_list_item">
                                                                                    <div class="more_posts_list_image">
                                                                                        <div class="image" style="background-image: url(<?php echo $image; ?>);">
                                                                                            <a href="<?php echo $link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/140-140.png" alt="Image" /></a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="more_posts_list_details">
                                                                                        <div class="post_date"><?php echo $date; ?></div>
                                                                                        <h4 class="more_posts_list_heading"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h4>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="arrows_pagingInfo">
                                                                            <div class="pagingInfo"></div>
                                                                            <div class="arrows">
                                                                                <div class="prev-slide">
                                                                                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M6.00016 12L7.41016 10.59L2.83016 6L7.41016 1.41L6.00016 -1.23266e-07L0.000156927 6L6.00016 12Z" fill="#7361A7" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="next-slide">
                                                                                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M1.99984 0L0.589844 1.41L5.16984 6L0.589844 10.59L1.99984 12L7.99984 6L1.99984 0Z" fill="#7361A7" />
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                }
                                                                wp_reset_postdata();
                                                                ?>
                                                            <?php endif; ?>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <?php endif; ?>

                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($the_query->max_num_pages > 1) { ?>
                            <div class="loadmore card__btn load_more_btn">
                                <a href="javascript:void(0)" class="more_posts load_more_button btn light__purple" id="loadmore">
                                    <?php echo $load_more_text; ?>
                                </a>
                                <input type="hidden" value="<?php echo $term_id; ?>" id="selected_term" class="selected_term" />
                                <input type="hidden" value="<?php echo $selection_type; ?>" id="selection_type" class="selection_type" />
                                <input type="hidden" value="<?php echo $select_content_type; ?>" id="select_content_type" class="select_content_type" />
                            </div>
                        <?php } ?>
                    <?php }
                    wp_reset_postdata(); ?>

                </div>
                <div class="right_sidebar desktop">
                    <?php if (have_rows('sidebar_data')) { ?>
                        <div class="sidebar_data">
                            <?php while (have_rows('sidebar_data')) {
                                the_row();
                                $advertise_banner = get_sub_field('advertise_banner');
                                $show_popular_items = get_sub_field('show_popular_items');
                                $show_sub_categories = get_sub_field('show_sub_categories');
                            ?>
                                <?php if (have_rows('listen_anywhere_section')) { ?>
                                    <?php while (have_rows('listen_anywhere_section')) {
                                        the_row();
                                        $heading = get_sub_field('heading');
                                    ?>
                                        <?php if (have_rows('icon_list')) { ?>
                                            <div class="listen_anywhere_section">
                                                <?php if ($heading) { ?>
                                                    <div class="heading">
                                                        <?php echo $heading; ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if (have_rows('icon_list')) { ?>
                                                    <div class="icon_list">
                                                        <?php while (have_rows('icon_list')) {
                                                            the_row();
                                                            $icon = get_sub_field('icon');
                                                            $link = get_sub_field('link');
                                                        ?>
                                                            <div class="item">
                                                                <?php if ($icon) { ?>
                                                                    <div class="icon">
                                                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['url']; ?>" />
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($link) {
                                                                    $link_url = $link['url'];
                                                                    $link_title = $link['title'];
                                                                    $link_target = ($link['target'] ? 'target=_blank' : '');
                                                                ?>
                                                                    <div class="link">
                                                                        <a href="<?php echo $link_url; ?>" <?php echo $link_target; ?>>
                                                                            <?php echo $link_title; ?>
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($show_sub_categories == 1) { ?>
                                    <?php if ($selection_type == "category" && !empty($term_name)) {
                                        $term_id = $term->term_id;
                                        $categories = get_categories(array('parent' => $term_id));
                                    } else if ($selection_type == "type" && !empty($select_content_type)) {
                                        $args = array(
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'meta_query' => array(
                                                array(
                                                    'key'     => 'content_type',
                                                    'value'   => $select_content_type,
                                                    'compare' => 'LIKE',
                                                ),
                                            )
                                        );

                                        $the_query = new WP_Query($args);
                                        // echo $the_query->found_posts;
                                        // echo '<pre>';
                                        // print_r($the_query);
                                        // echo '</pre>';

                                        $category_array = [];
                                        if ($the_query->have_posts()) {
                                            while ($the_query->have_posts()) {
                                                $the_query->the_post();
                                                $id = get_the_ID();
                                                $cat = get_the_category($id);
                                                foreach ($cat as $cd) {
                                                    if (!in_array($cd->term_id, $category_array)) {
                                                        array_push($category_array, $cd->term_id);
                                                    }
                                                }
                                            }
                                        }
                                        // echo "<pre>";
                                        // print_r($category_array);
                                        // echo "</pre>";
                                    } ?>
                                    <?php if ($selection_type == "category" && !empty($term_name)) { ?>
                                        <?php if ($categories) { ?>
                                            <div class="sub_categories">
                                                <div class="sub_categories_title">
                                                    <h6><?php echo "RECOMENDED TOPICS"; ?></h6>
                                                </div>
                                                <div class="sub_categories_list">
                                                    <?php foreach ($categories as $c) {  ?>
                                                        <div class="sub_categories_list_item"><a href="<?php echo esc_attr(esc_url(get_category_link($c->term_id))) ?>"><?php echo $c->cat_name; ?></a></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($selection_type == "type" && !empty($select_content_type)) { ?>
                                        <?php if (!empty($category_array)) { ?>
                                            <div class="sub_categories">
                                                <div class="sub_categories_title">
                                                    <h6><?php echo "RECOMENDED TOPICS"; ?></h6>
                                                </div>
                                                <div class="sub_categories_list">
                                                    <?php foreach ($category_array as $c) {
                                                        $obj = get_category($c);
                                                    ?>
                                                        <div class="sub_categories_list_item"><a href="<?php echo esc_attr(esc_url(get_category_link($obj->term_id))) ?>"><?php echo $obj->cat_name; ?></a></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($show_popular_items == 1) : ?>
                                    <?php
                                    $next_args = array(
                                        'post_type' => 'post',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 3,
                                        // 'orderby' => 'ID',
                                        'meta_key' => 'post_views_count',
                                        'orderby' => 'meta_value_num,ID',
                                        'order' => 'DESC',
                                    );
                                    $next_the_query = new WP_Query($next_args);
                                    if ($next_the_query->have_posts()) { ?>
                                        <div class="more_posts">
                                            <div class="more_title">
                                                <h6><?php echo "POPULAR NEWS ITEMS"; ?></h6>
                                            </div>
                                            <div class="more_posts_list">
                                                <?php while ($next_the_query->have_posts()) {
                                                    $next_the_query->the_post();
                                                    $id = $post->ID;
                                                    $title = get_the_title($id);
                                                    $link = get_permalink($id);
                                                    $image = get_the_post_thumbnail_url($id, 'full');
                                                    $date = get_the_date('j F Y', $id);
                                                ?>
                                                    <div class="more_posts_list_item">
                                                        <div class="more_posts_list_image">
                                                            <div class="image" style="background-image: url(<?php echo $image; ?>);">
                                                                <a href="<?php echo $link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/140-140.png" alt="Image" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="more_posts_list_details">
                                                            <h4 class="more_posts_list_heading"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h4>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                        ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($advertise_banner) { ?>
                                        <div class="advertise_banner">
                                            <?php if ($advertise_banner_link) { ?>
                                                <a href="<?php echo $advertise_banner_link['url'] ? $advertise_banner_link['url'] : "javascript:void(0)"; ?>" <?php if ($advertise_banner_link['target']) { ?>target="_blank" <?php } ?> class="link">
                                                <?php } ?>
                                                <img src="<?php echo $advertise_banner['url']; ?>" alt="<?php echo $advertise_banner['alt']; ?>" />
                                                <?php if ($advertise_banner_link) { ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var ajax_call_url;
    var posts_per_page = '<?php echo $defaultPostPerPage; ?>';
    var paged = 1;
    var currentPostCount = '<?php echo $cpCount; ?>'
    ajax_call_url = "<?php echo admin_url('admin-ajax.php'); ?>";
    jQuery(document).ready(function($) {
        jQuery(".load_more_btn .more_posts").on("click", function() {
            var term_id = jQuery(".load_more_btn .selected_term").val();
            var selection_type = jQuery(".load_more_btn .selection_type").val();
            var content_type = jQuery(".load_more_btn .select_content_type").val();
            debugger;
            filterPost("loadmore", term_id, selection_type, content_type);
        })
    })


    function filterPost(type, id, stype, ctype) {

        var currentPostCount = jQuery(".archive__list .archive__list_inner > div.item").length;
        paged = paged + 1;

        jsonObj = {
            "action": "podcast_loadmore",
            "postperpage": parseInt(posts_per_page),
            "paged": paged,
            "currentPostCount": currentPostCount,
            "type": type,
            "cat": id,
            "sType": stype,
            "cType": ctype
        };
        // console.log(jsonObj);

        jQuery.ajax({
            url: ajax_call_url,
            data: jsonObj, // form data
            type: "POST", // POST
            async: true,
            beforeSend: function(xhr) {
                console.log("ajax start"); // changing the button label
            },
            success: function(data) {
                // console.log(data.data);

                jQuery('.load_more_img').hide();
                jQuery(".archive__list .archive__list_inner").show();
                jQuery(".archive__list .archive__list_inner").append(data.data);


                setTimeout(function() {
                    var total = jQuery("#total_post_count").val();
                    var current = jQuery("#current_post_count").val();

                    var c_total = jQuery(".archive__list .archive__list_inner > div.item").length;
                    if (total != '' && current != '') {
                        if (parseInt(total) == c_total) {
                            jQuery(".load_more_btn").hide();
                        } else {
                            jQuery(".load_more_btn").show();
                        }
                    }
                    jQuery("#total_post_count").remove();
                    jQuery("#current_post_count").remove();
                }, 1000);

            },
            error: function(xhr) {
                jQuery('.load_more_img').hide();
                jQuery(".archive__list .archive__list_inner").show();
                console.log(xhr);
            }
        });
    }
</script>