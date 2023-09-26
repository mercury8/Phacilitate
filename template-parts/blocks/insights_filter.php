<?php

/**
 * Insights Filter Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'insights_filter-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'insights_filter';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (is_tax()) {
    $term = $args['term'];
    // echo '<pre>'; print_r( $term ); echo '</pre>';
    $show_filter = get_field('show_filter', $term);
    $select_taxonomy = array();
    $cterm_id = $term->term_id;
    $term_id = $term->term_id;
    $select_taxonomy = get_terms($term->taxonomy, array(
        'hide_empty' => false,
        'parent' => $term_id,
    ));
    if (count($select_taxonomy) == 0) {
        $term_id = $term->parent;
        $select_taxonomy = get_terms($term->taxonomy, array(
            'parent' => $term_id,
        ));
    }
    // $allLink = get_term_link( $term_id, $term->taxonomy );
} else {
    $show_filter = get_field('show_filter');
    $select_taxonomy = get_field('select_taxonomy');
    $term_id = 0;
    // $allLink = '#';

}
$page_id = get_the_ID();
$page_name = "";
if (is_category()) {
    $page_object = get_queried_object();
    $page_name = $page_object->cat_name;
}

$allLink = get_field('select_insight_page', 'option');

$menu_parent = array();
if (have_rows("menu_list", "option")) {
    $ik = 0;
    while (have_rows("menu_list", "option")) : the_row();
        $menu_id = get_sub_field("menu_id");
        $ik++;
        $jk = 0;
        if (!empty($menu_id)) {
            if (is_nav_menu($menu_id)) {
                $menu_items = wp_get_nav_menu_items($menu_id);
                if (!empty($menu_items)) {

                    foreach ($menu_items as $key => $value) {
                        // array_push($menu_parent, $value);
                        $active = false;
                        if ($page_name != "" && $page_name == $value->title) {
                            $active = true;
                        }
                        if ($value->menu_item_parent == 0) {
                            $menu_parent['parent'][$ik]['id'] = $value->ID;
                            $menu_parent['parent'][$ik]['title'] = $value->title;
                            $menu_parent['parent'][$ik]['url'] = 'javascript:void(0)';
                            $menu_parent['parent'][$ik]['active'] = $active;
                        } else {
                            $jk++;
                            $mid = $value->menu_item_parent;
                            $menu_parent[$mid][$jk]['id'] = $value->ID;
                            $menu_parent[$mid][$jk]['title'] = $value->title;
                            $menu_parent[$mid][$jk]['url'] = $value->url;
                            $menu_parent[$mid][$jk]['active'] = $active;
                        }
                    }
                }
            }
        }
    endwhile;
}

$menu_items = wp_get_nav_menu_items(7);
// echo "<pre>";
// print_r($menu_items);
// echo "</pre>";
// if ($show_filter == true) :

$terms = get_terms('insight_category', array(
    'parent' => 0,
));
$parent_item = $menu_parent['parent'];
//     echo "<pre>";
// print_r($parent_item);
// echo "</pre>";
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="insights_filter__inner">
        <div class="big-container">
            <div class="insights_filter__container d-flex align-items-center position-relative">
                <div class="insights_filter__left">
                    <label for="" class="insights_filter__label"><span class="text">All Insights and Resources</span> <span class="icon"><svg width="8" height="6" viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.94 0.726562L4 3.7799L7.06 0.726562L8 1.66656L4 5.66656L0 1.66656L0.94 0.726562Z" fill="#1E0F49" />
                            </svg></span></label>
                    <ul class="insights_filter__dropdown" style=" display: none; ">
                        <li><a class="option" href="<?php echo $allLink; ?>">All Insights and Resources</a></li>
                        <?php if (!empty($parent_item)) {
                            foreach ($parent_item as $key => $value) {  ?>
                                <li data-id="<?php echo $value['id']; ?>" class="filter_link_<?php echo $value['id']; ?>"><a class="option" href="<?php echo $value['url']; ?>"><?php echo $value['title']; ?></a></li>
                        <?php }
                        } ?>
                    </ul>
                </div>
                <div class="insights_filter__right">
                    <?php if (count($menu_parent) > 0) : ?>
                        <?php foreach ($menu_parent as $key => $other_items) {
                            if ($key != 'parent') {
                        ?>
                                <div class="insights_filter__current_list insights_filter_list__slider filter_list_<?php echo $key; ?>" id="filter_list_<?php echo $key; ?>" data-parent="<?php echo $key; ?>" style="display: none;">
                                    <?php foreach ($other_items as $key => $value) { ?>
                                        <div>
                                            <div class="insights_filter__item">
                                                <a class="insights_filter__item__link <?php echo ($value['active']) ? 'active' : ''; ?>" href="<?php echo $value['url']; ?>" data-term_id="<?php echo $value['id']; ?>">
                                                    <?php echo $value['title']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php // endif; 
?>