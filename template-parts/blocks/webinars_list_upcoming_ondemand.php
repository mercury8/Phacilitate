<?php

/**
 * Upcoming Events and Webinars Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'webinars_list_upcoming_ondemand-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'webinars_list_upcoming_ondemand';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title');

$upcoming_webinar_toggle_text = get_field('upcoming_webinar_toggle_text');
// $select_category_for_upcoming_webinars = get_field('select_category_for_upcoming_webinars');
$select_upcoming_posts = get_field('select_upcoming_posts');
$ondemand_webinar_toggle_text = get_field('ondemand_webinar_toggle_text');
// $select_category_for_ondemand_webinars = get_field('select_category_for_ondemand_webinars');
$select_ondemand_posts = get_field('select_ondemand_posts');

$paged = 1;

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="webinars_list_upcoming_ondemand__inner">
        <div class="container">
            <div class="webinars_list_upcoming_ondemand__wrapper">
                <?php if ($title) : ?><h2 class="heading h1"><?php echo $title; ?></h2><?php endif; ?>

                <div class="webinars_list_upcoming_ondemand_post_section">
                    <!-- Tab links -->
                    <div class="tab_section">
                        <div class="tab">
                            <div class="tablinks active" onclick="openCity(event, '<?php echo $upcoming_webinar_toggle_text; ?>')" data-catid="51">
                                <?php echo $upcoming_webinar_toggle_text; ?>
                            </div>
                            <div class="tablinks" onclick="openCity(event, '<?php echo $ondemand_webinar_toggle_text; ?>')" data-catid="52">
                                <?php echo $ondemand_webinar_toggle_text; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tab content -->
                    <div id="<?php echo $upcoming_webinar_toggle_text; ?>" class="tabcontent upcoming_webinar_post_list" style="display: block;">
                        <div class="webinars_list_upcoming_ondemand_list">
                            <?php
                            // $upcoming_postQuery = new WP_Query(array(
                            //     'posts_per_page'      => -1,
                            //     'post_type'        => 'post',
                            //     'post_status'    => 'publish',
                            //     'fields' => 'ids',
                            //     'post__in' => $select_upcoming_posts,
                            // ));
                            // $upcoming_posts = $upcoming_postQuery->posts;
                            // $maxPages = $upcoming_postQuery->max_num_pages;
                            ?>
                            <?php if (!empty($select_upcoming_posts)) {
                                foreach ($select_upcoming_posts as $upcoming_posts_id) { ?>
                                    <?php
                                    set_query_var('postId', $upcoming_posts_id);
                                    get_template_part('template-parts/content-webinars_list_upcoming_item');
                                    ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <?php  /*if ($maxPages > 1 && $paged != $maxPages) { ?>
                            <div class="webinars_list_upcoming_ondemand_list_item loadMore text-center w-100 mt-5">
                                <a href="javascript:void(0)" class="webinars_list_upcoming_ondemand_loadMore upcoming_loadmore btn" data-paged="<?php echo ($paged + 1); ?>">Load more Webinars</a>
                                <input type="hidden" id="upcoming_paged" class="upcoming_paged" value="1" />
                                <input type="hidden" id="upcoming_perpage" class="upcoming_perpage" value="6" />
                                <input type="hidden" id="upcoming_cat_id" class="upcoming_cat_id" value="<?php echo $select_category_for_upcoming_webinars; ?>" />
                            </div>
                        <?php } */ ?>
                    </div>

                    <div id="<?php echo $ondemand_webinar_toggle_text; ?>" class="tabcontent ondemand_webinar_post_list">

                        <?php
                        $parent_cat_arg = array('hide_empty' => false, 'parent' => $select_category_for_ondemand_webinars);
                        $parent_categories = get_terms('category', $parent_cat_arg);
                        /*if (!empty($parent_categories)) {
                        ?>
                            <div class="category_filter">
                                <div class="category_filter_inner">
                                    <div class="item filter_title">
                                        Filter
                                    </div>

                                    <?php foreach ($parent_categories as $category) { ?>
                                        <div class="item">
                                            <a href="javascript:void(0)<?php //echo esc_url(get_category_link($category->term_id)); 
                                                                        ?>" data-catid="<?php echo $category->term_id; ?>">
                                                <?php echo  $category->name; ?>
                                            </a>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        <?php } */ ?>

                        <div class="webinars_list_ondemand_list_outer">
                            <div class="webinars_list_upcoming_ondemand_list">
                                <?php
                                // $ondemand_postQuery = new WP_Query(array(
                                //     'posts_per_page'      => -1,
                                //     'post_type'        => 'post',
                                //     'post_status'    => 'publish',
                                //     'paged' => $paged,
                                //     'fields' => 'ids',
                                //     'post__in'
                                // ));
                                // $ondemand_posts = $ondemand_postQuery->posts;
                                // $maxPages = $ondemand_postQuery->max_num_pages;
                                ?>
                                <?php if (!empty($select_ondemand_posts)) {
                                    foreach ($select_ondemand_posts as $ondemand_posts_id) { ?>
                                        <?php
                                        set_query_var('postId', $ondemand_posts_id);
                                        get_template_part('template-parts/content-webinars_list_upcoming_item');
                                        ?>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <?php /* if ($maxPages > 1 && $paged != $maxPages) { ?>
                                <div class="webinars_list_upcoming_ondemand_list_item loadMore text-center w-100 mt-5">
                                    <a href="javascript:void(0)" class="webinars_list_upcoming_ondemand_loadMore ondemand_load_more btn white" data-paged="<?php echo ($paged + 1); ?>">Load More</a>
                                    <input type="hidden" id="ondemand_paged" class="ondemand_paged" value="1" />
                                    <input type="hidden" id="ondemand_perpage" class="ondemand_perpage" value="6" />
                                    <input type="hidden" id="ondemand_cat_id" class="ondemand_cat_id" value="<?php echo $select_category_for_ondemand_webinars; ?>" />
                                </div>
                            <?php } */ ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php /*if( $maxPages > 1 && $paged != $maxPages ): ?>
        <script type="text/javascript">
            jQuery( document ).ready(function($) {

                $( "body" ).on( "click", ".upcoming_event_webinars_list a.upcoming_event_webinars_loadMore", function(event) {
                    event.preventDefault();
                    var paged = $(this).attr('data-paged');
                    filter_post( paged, $(this) );
                });

            });

            function filter_post( paged = 1, self = '' ){

                jQuery(self).closest('.upcoming_event_webinars').addClass('loading');
                jsonObj = {
                    "action": "filter_upcoming_event_webinars",            
                    "post_count": "<?php echo $number_of_post; ?>",
                    "paged": paged,
                    "cat": <?php echo $select_category_for_upcoming_webinars; ?>,
                };
                var self = self;
                jQuery.ajax({
                    url: ajax_call_url,
                    data: jsonObj, // form data
                    type: "POST", // POST
                    // async: true,
                    beforeSend: function(xhr) {
                        // console.log("ajax start"); // changing the button label
                    },
                    success: function(xhr) {
                        jQuery(self).closest('.upcoming_event_webinars').removeClass('loading');
                        if( xhr.success === true ){
                            jQuery('.upcoming_event_webinars_list > .loadMore').remove();
                            jQuery('.upcoming_event_webinars_list > .upcoming_event_webinars_list_item:last-child').after(xhr.data);                
                        }
                        
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        jQuery(self).closest('.upcoming_event_webinars').removeClass('loading');
                    }
                });
            }
        </script>
    <?php endif; */ ?>
</div>

<script type="text/javascript">
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>