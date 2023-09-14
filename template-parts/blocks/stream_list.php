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
$id = 'stream_post_list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'stream_post_list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');
$heading_short_description = get_field('heading_short_description');

$post_selection_type = get_field('post_selection_type'); //all manual
$select_post = get_field('select_post');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="stream_post_list_main">
        <div class="container">
            <div class="stream_post_list_wrapper">
                <?php if ($heading || $heading_short_description) { ?>
                    <div class="heading_section">
                        <?php if ($heading) { ?>
                            <div class="heading h2">
                                <?php echo $heading ?>
                            </div>
                        <?php } ?>
                        <?php if ($heading_short_description) { ?>
                            <div class="heading_short_description">
                                <?php echo $heading_short_description ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="stream_post_list_section">
                    <?php
                        if($post_selection_type == 'manual'){
                            $args = array(
                                'post__in'   => $select_post,
                                'post_type'        => 'stream',
                                'order' => 'ASC',
                                'post_status'      => 'publish'
                            );
                        }else {
                            $args = array(
                                'post_type'        => 'stream',
                                'order' => 'ASC',
                                'post_status'      => 'publish'
                            );
                        }
                        $the_query = new WP_Query( $args );
                    ?>
                    <?php if($the_query->have_posts()){ ?>
                        <div class="three_column_grid stream_post_list">
                            <?php while( $the_query->have_posts() ) { $the_query->the_post();  ?>
                                <?php get_template_part( 'template-parts/content', 'stream' );?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>