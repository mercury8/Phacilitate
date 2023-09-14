<?php

/**
 * 3 Column Podcast List Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'podcast_list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'podcast_list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (is_tax()) {
    $term = $args['term'];
    $title = get_field('podcast_list_title', $term);
    $subtitle = get_field('podcast_list_subtitle', $term);
    $featured_posts = get_field('podcast_list_select_podcast', $term);
    $button = get_field('podcast_list_button', $term);
} else {
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $featured_posts = get_field('select_podcast');
    $button = get_field('button');
}

$args_new = array(
    'posts_per_page'      => 3,
    'post_type'        => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => array(
        array(
            'key'     => 'content_type',
            'value'   => 'podcast',
            'compare' => 'LIKE',
        )
    )
);

$the_query = new WP_Query($args_new);

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="podcast_list__inner">
        <div class="container">
            <div class="podcast_list__wrapper">
                <?php if ($title) : ?><h2 class="heading h1"><?php echo $title; ?></h2><?php endif; ?>
                <?php if ($subtitle) : ?><h6 class="subtitle h6"><?php echo $subtitle; ?></h6><?php endif; ?>
                <?php if ($the_query->have_posts()) : ?>
                    <div class="podcast_list_main">
                        <?php while ($the_query->have_posts()) : $the_query->the_post();
                            $post_id = get_the_ID();
                            // foreach ($featured_posts as $featured_post) :
                            $image = get_the_post_thumbnail_url($post_id);
                            $title = get_the_title();
                            $excerpt = get_field('short_description', $post_id);
                            $link = get_the_permalink();
                        ?>
                            <div class="podcast_list_item">
                                <div class="podcast_list_item_inner">
                                    <a class="podcast_list_item_link" href="<?php echo $link; ?>"></a>
                                    <div class="podcast_list_top">
                                        <div class="image" <?php if ($image) : ?> style=" background-image: url('<?php echo $image; ?>')" <?php endif; ?>>
                                            <a href="<?php echo $link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/343-260.png" alt="Podcast" /></a>
                                        </div>
                                    </div>
                                    <div class="podcast_list_Bottom">
                                        <?php if ($title) : ?>
                                            <h4 class="title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h4>
                                        <?php endif; ?>
                                        <?php if ($excerpt) : ?>
                                            <div class="excerpt"><?php echo $excerpt; ?></div>
                                        <?php endif; ?>
                                        <?php if ($link) : ?>
                                            <div class="link"><a href="<?php echo $link; ?>" class="text_link"><?php echo "WATCH NOW"; ?></a></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
                <?php if ($button && $button['title']) : ?>
                    <div class="btn_box"><a href="<?php echo $button['url']; ?>" class="btn" <?php echo ($button['target']) ? 'target="_blank"' : ''; ?>><?php echo $button['title']; ?></a></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>