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
$id = 'profile_card-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'profile_card';
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

$category = get_field('select_category');

$post_list_type = get_field('post_list_type'); //default manual
$select_post = get_field('select_post');

$post_per_page = get_field('post_per_page');

$text_link = get_field('text_link');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="profile_card_main bg_clr_<?php echo $select_background_color; ?>">
        <div class="container">
            <div class="profile_card_inner">

                <?php if ($heading || $sub_heading) { ?>
                    <div class="heading_section pt-5">
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

                <div class="latest_post_list">
                    <?php
                    if ($post_list_type == 'manual') {
                        $args = array(
                            'post__in'   => $select_post,
                            'orderby'   => 'post__in',
                            'post_type'        => 'team',
                            'post_status'      => 'publish',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                  'taxonomy' => 'team_category',
                                  'terms' => $category,
                                ),
                            ),
                        );
                    } else {
                        $args = array(
                            'post_type'        => 'team',
                            'post_status'      => 'publish',
                            'posts_per_page' => $post_per_page,
                            'orderby'          => 'date',
                            'order'            => 'DESC',
                            'tax_query' => array(
                                array(
                                  'taxonomy' => 'team_category',
                                  'terms' => $category,
                                ),
                            ),
                        );
                    }
                    $the_query = new WP_Query($args);
                    ?>

                    <?php if ($the_query->have_posts()) { ?>

                        <div class="three_column_grid team_section">
                            <div class="team_section_inner">

                                <?php while ($the_query->have_posts()) {
                                    $the_query->the_post();  ?>
                                    <?php get_template_part('template-parts/content', 'team'); ?>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($the_query->max_num_pages > 1 && $post_list_type != 'manual') { ?>
                            <div class="load_more_btn">
                                <input type="hidden" id="posts_to_show" class="posts_to_show" value="<?php echo $post_per_page; ?>" />
                                <a href="javascript:void(0)" class="btn more_posts" id="loadmore">Load more News</a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

                <?php if ($add_button_section == 1) { ?>
                    <?php if (have_rows('button_list')) { ?>
                        <div class="button_list pb-5">
                            <?php while (have_rows('button_list')) {
                                the_row();
                                $button_link = get_sub_field('link'); //array
                                $select_type = get_sub_field('select_type');
                            ?>
                                <div class="item">
                                    <?php if ($button_link) {
                                        $button_link_url = $button_link['url'];
                                        $button_link_title = $button_link['title'];
                                        $button_link_target = ($button_link['target'] ? 'target=_blank' : '');
                                    ?>
                                        <div class="link">
                                            <a class="btn<?php if ($select_type == 'purple') { ?> light__purple<?php } ?>" href="<?php echo $button_link_url; ?>" <?php echo $button_link_target; ?>>
                                                <?php echo $button_link_title; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>

                <?php if ($text_link) {
                    $url = $text_link['url'];
                    $title = $text_link['title'];
                    $target = ($text_link['target'] ? 'target=_blank' : '');
                ?>
                    <div class="bottom_text_link">
                        <a href="<?php echo $url; ?>" <?php echo $target; ?>>
                            <?php echo $title; ?>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>