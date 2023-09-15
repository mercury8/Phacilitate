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
$id = 'click_to_share-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'click_to_share';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

global $post;
$show_share = get_field('show_share');
$current_post = $post->ID;
$title = get_the_title($current_post);
?>
<?php if($show_share == 1): ?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">    
    <div class="click_to_share__inner">
        <div class="small-container">
            <div class="click_to_share__wrapper">
                <h6><?php echo "SHARE NOW"; ?></h6>
                <div class="share_section">
                    <div data-network="twitter" class="st-custom-button">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="20" fill="#1D0E49"/>
                            <path d="M26.3553 16.7407C26.3653 16.8826 26.3653 17.0251 26.3653 17.167C26.3653 21.502 23.0659 26.497 17.0356 26.497C15.1778 26.497 13.4519 25.9588 12 25.0251C12.2641 25.0554 12.5178 25.0657 12.7919 25.0657C14.3247 25.0657 15.7359 24.5476 16.8628 23.6645C16.1786 23.6519 15.5154 23.426 14.9658 23.0182C14.4161 22.6105 14.0076 22.0413 13.7972 21.3901C14.002 21.4224 14.2089 21.4393 14.4162 21.4407C14.7106 21.4407 15.005 21.4001 15.2791 21.3291C14.5366 21.1789 13.8691 20.7762 13.3898 20.1896C12.9106 19.603 12.6492 18.8685 12.65 18.111V18.0704C13.1044 18.324 13.6122 18.4666 14.1322 18.4866C13.6821 18.1873 13.3131 17.7813 13.058 17.3049C12.8029 16.8284 12.6696 16.2962 12.67 15.7557C12.67 15.1466 12.8325 14.5882 13.1169 14.101C13.9405 15.1148 14.9681 15.9441 16.1328 16.5352C17.2976 17.1263 18.5736 17.466 19.8781 17.5323C19.8275 17.2885 19.7969 17.0351 19.7969 16.7813C19.7969 14.9741 21.2587 13.502 23.0763 13.502C24.02 13.502 24.8731 13.8979 25.4722 14.5376C26.2066 14.3962 26.9108 14.1282 27.5534 13.7457C27.3089 14.5036 26.7962 15.1461 26.1116 15.5529C26.7716 15.4816 27.4113 15.2988 28 15.0451C27.5511 15.6988 26.995 16.272 26.3553 16.7407Z" fill="white"/>
                        </svg>
                    </div>
                    <div data-network="facebook" class="st-custom-button">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="20" fill="#1D0E49"/>
                            <path d="M27.9839 12.8978V27.0982C27.9839 27.5864 27.5884 27.9784 27.1037 27.9784H23.0342V21.7993H25.1082L25.4182 19.3904H23.0307V17.851C23.0307 17.1525 23.2231 16.6786 24.2244 16.6786H25.5002V14.5227C25.2792 14.4942 24.5238 14.4265 23.64 14.4265C21.8013 14.4265 20.5398 15.549 20.5398 17.6122V19.3904H18.4587V21.7993H20.5398V27.9819H12.8997C12.4151 27.9819 12.0195 27.5864 12.0195 27.1018V12.8978C12.0195 12.4131 12.4151 12.0176 12.8997 12.0176H27.1002C27.5884 12.0176 27.9839 12.4131 27.9839 12.8978Z" fill="white"/>
                        </svg>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5a1d025263750b0012e6bac3&product=custom-share-buttons' async='async'></script>