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
$id = 'faqs-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'faqs';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($overflow_content == 1): ?>overflow_content<?php endif; ?>">
    <div class="faqs_main">
        <div class="container">
            <div class="faqs_inner">
                <?php if ($heading) { ?>
                    <div class="heading_section">
                        <div class="heading_text h3">
                            <?php echo $heading ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if( have_rows('list') ){ ?>
                    <div class="accordian">
                        <div class="accordian__wrapper">
                            <div class="accordian__list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $question = get_sub_field('question');
                                    $answer = get_sub_field('answer');
                                    ?>
                                    <div class="accordian__list__item">
                                        <?php if($question): ?><div class="accordian__list__item__question"><?php echo $question; ?></div><?php endif; ?>
                                        <?php if($answer): ?><div class="accordian__list__item__answer"><?php echo $answer; ?></div><?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>