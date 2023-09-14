<?php

/**
 * Click to Share Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'icons_with_external_link' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'icons_with_external_link';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$add_icons_section = get_field('add_icons_section');

?>

<?php if($add_icons_section == 1){ ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">   
        <div class="small-container"> 
            <div class="icons_with_external_link_inner">
                <?php if( have_rows('icon_list') ){ ?>
                    <div class="icon_list">
                        <?php while ( have_rows('icon_list') ) { the_row(); 
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link');
                        ?>
                            <div class="item">
                                
                                <div class="item_inner"> 
                                    <?php if($link){
                                        $link_url = $link['url']; 
                                        $link_title = $link['title'];
                                        $link_target = ($link['target'] ? 'target=_blank' : '');
                                    ?>
                                        <a class="link" href="<?php echo $link_url; ?>" <?php echo $link_target; ?>>
                                    <?php } ?>
                                        <div class="icon_img" style="background-image:url('<?php echo $icon; ?>')">
                                            <img src="<?php echo get_template_directory_uri() ?>/dist/images/empty_55_55.png" alt="icon_img" />
                                        </div>
                                    <?php if($link){ ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>