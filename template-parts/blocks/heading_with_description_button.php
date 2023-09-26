<?php

/**
 * Featured Post Banner Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'heading_with_description_button-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'heading_with_description_button';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');
$description = get_field('description');
$button_link = get_field('button_link');
?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="heading_with_description_button_main">
        <div class="container">
            <div class="heading_with_description_button_inner">
                <?php if($heading){ ?>
                    <div class="heading h3"><?php echo $heading; ?></div>
                <?php } ?>
                <?php if($description){ ?>
                    <div class="description"><?php echo $description; ?></div>
                <?php } ?>
                <?php if($button_link){
                    $button_link_url = $button_link['url']; 
                    $button_link_title = $button_link['title'];
                    $button_link_target = ($button_link['target'] ? 'target=_blank' : '');
                ?>
                    <div class="button_section">
                        <a class="btn" href="<?php echo $button_link_url; ?>" <?php echo $button_link_target; ?>>
                            <?php echo $button_link_title; ?>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>