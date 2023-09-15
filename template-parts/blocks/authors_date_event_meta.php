<?php

/**
 * Authors / Date / Event Meta Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'authors_date_event_meta-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'authors_date_event_meta';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

global $post;
$show_post_data = get_field('show_post_data');
$current_post = $post->ID;
$title = get_the_title($current_post);
$coauthors = get_coauthors($current_post);
$date = get_the_date('j F Y', $current_post);
$show_manual_author = get_field("show_manual_author", $post->ID);
$manual_author_text = get_field("manual_author_text", $post->ID);
?>
<?php if ($show_post_data == 1) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="authors_date_event_meta__inner">
            <div class="small-container">
                <div class="authors_date_event_meta__wrapper">
                    <?php
                    $cat_name = 'category';
                    $categories = get_the_terms($post->ID, $cat_name);
                    if ($categories) : ?>
                        <div class="category_list">
                            <?php
                            foreach ($categories as $category) {
                                $category_link = get_category_link($category->term_id);
                                if ($category->parent) { ?>
                                    <div class="category_list_item"><a href="<?php echo $category_link; ?>"><?php echo $category->name; ?></a></div>
                            <?php }
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                    <h1 class="heading h1">
                        <?php echo $title; ?>
                    </h1>
                    <?php if ($show_manual_author && !empty($manual_author_text)) { ?>
                        <div class="authors_list">
                            <div class="authors_list_name">
                                <div class="authors_list_name_item"><?php echo $manual_author_text; ?></div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="authors_list">
                            <div class="authors_list_image">
                                <?php foreach ($coauthors as $coauthor) {
                                ?>
                                    <div class="authors_list_image_item"><?php echo get_avatar($coauthor->ID); ?></div>
                                <?php  } ?>
                            </div>
                            <div class="authors_list_name">
                                <?php foreach ($coauthors as $coauthor) { ?>
                                    <div class="authors_list_name_item"><?php echo $coauthor->display_name; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="date"><?php echo $date; ?></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>