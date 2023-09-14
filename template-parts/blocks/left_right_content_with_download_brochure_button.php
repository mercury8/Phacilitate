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
$id = 'left_right_content_with_download_brochure_button-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'left_right_content_with_download_brochure_button';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


$heading = get_field('heading');
$content = get_field('content');

$select_option = get_field('select_option'); //link file_add
$file_upload = get_field('file_upload');
$add_link = get_field('add_link');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="left_right_content_with_download_brochure_button_main">
        <div class="container">
            <div class="section_inner">
                <div class="left_section">
                    <?php if ($heading) { ?>
                        <div class="heading_text h3">
                            <?php echo $heading ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="right_section">
                    <?php if ($content) { ?>
                        <div class="content">
                            <?php echo $content ?>
                        </div>
                    <?php } ?>
                    <?php if ($select_option == 'file_add') { ?>
                        <?php if ($file_upload) { ?>
                            <div class="file_upload">
                                <a class="btn" href="<?php echo $file_upload['url']; ?>" download>
                                    Download Brochure
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($select_option == 'link') { ?>
                        <?php if ($add_link) { 
                            $add_link_url = $add_link['url']; 
                            $add_link_title = $add_link['title'];
                            $add_link_target = ($add_link['target'] ? 'target=_blank' : '');
                        ?>
                            <div class="file_upload">
                                <a class="btn" href="<?php echo $add_link_url; ?>" <?php echo $add_link_target; ?>>
                                    <?php echo $add_link_title; ?>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>