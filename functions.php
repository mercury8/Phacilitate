<?php

/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */

if (!function_exists('wp_bootstrap_starter_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wp_bootstrap_starter_setup()
    {
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on WP Bootstrap Starter, use a find and replace
        * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
        */
        load_theme_textdomain('wp-bootstrap-starter', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'wp-bootstrap-starter'),
            'footer-col-1'   => __('Footer Column 1', 'twentytwentyone'),
            'footer-col-2'   => __('Footer Column 2', 'twentytwentyone'),
            'footer-col-3'   => __('Footer Column 3', 'twentytwentyone'),
            'footer-bottom-menu'   => __('Footer Bottom Menu', 'twentytwentyone'),
        ));

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('wp_bootstrap_starter_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        function wp_boostrap_starter_add_editor_styles()
        {
            add_editor_style('custom-editor-style.css');
        }
        add_action('admin_init', 'wp_boostrap_starter_add_editor_styles');
    }
endif;
add_action('after_setup_theme', 'wp_bootstrap_starter_setup');


/**
 * Register and Enqueue Styles.
 */
function twentytwenty_register_styles()
{

    $theme_version = wp_get_theme()->get('Version');

    //wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );
    //wp_style_add_data( 'twentytwenty-style', 'rtl', 'replace' );

    // Add output of Customizer settings as inline style.
    //wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_customizer_css( 'front-end' ) );

    // Add print CSS.
    //wp_enqueue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

// add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );

/**
 * Add Welcome message to dashboard
 */
function wp_bootstrap_starter_reminder()
{
    $theme_page_url = 'https://afterimagedesigns.com/wp-bootstrap-starter/?dashboard=1';

    if (!get_option('triggered_welcomet')) {
        $message = sprintf(
            __('Welcome to WP Bootstrap Starter Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'wp-bootstrap-starter'),
            esc_url($theme_page_url)
        );

        printf(
            '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
            $message
        );
        add_option('triggered_welcomet', '1', '', 'yes');
    }
}
add_action('admin_notices', 'wp_bootstrap_starter_reminder');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wp_bootstrap_starter_content_width', 1170);
}
add_action('after_setup_theme', 'wp_bootstrap_starter_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_starter_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'wp-bootstrap-starter'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'wp-bootstrap-starter'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'wp-bootstrap-starter'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'wp-bootstrap-starter'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'wp-bootstrap-starter'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'wp-bootstrap-starter'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'wp-bootstrap-starter'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'wp-bootstrap-starter'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
// add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_starter_scripts()
{

    $theme_version = wp_get_theme()->get('Version');

    // load bootstrap css
    if (get_theme_mod('cdn_assets_setting') === 'yes') {
        // wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' );
        // wp_enqueue_style( 'wp-bootstrap-starter-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.10.2/css/all.css' );
    } else {
        wp_enqueue_style('wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css');
        wp_enqueue_style('wp-bootstrap-starter-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css');
    }
    // load bootstrap css
    // load AItheme styles
    // load WP Bootstrap Starter styles
    wp_enqueue_style('wp-bootstrap-starter-style', get_stylesheet_uri());
    if (get_theme_mod('theme_option_setting') && get_theme_mod('theme_option_setting') !== 'default') {
        wp_enqueue_style('wp-bootstrap-starter-' . get_theme_mod('theme_option_setting'), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/' . get_theme_mod('theme_option_setting') . '.css', false, '');
    }
    if (get_theme_mod('preset_style_setting') === 'poppins-lora') {
        wp_enqueue_style('wp-bootstrap-starter-poppins-lora-font', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700');
    }
    if (get_theme_mod('preset_style_setting') === 'montserrat-merriweather') {
        wp_enqueue_style('wp-bootstrap-starter-montserrat-merriweather-font', 'https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800');
    }
    if (get_theme_mod('preset_style_setting') === 'poppins-poppins') {
        wp_enqueue_style('wp-bootstrap-starter-poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700');
    }
    if (get_theme_mod('preset_style_setting') === 'roboto-roboto') {
        wp_enqueue_style('wp-bootstrap-starter-roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i');
    }
    if (get_theme_mod('preset_style_setting') === 'arbutusslab-opensans') {
        wp_enqueue_style('wp-bootstrap-starter-arbutusslab-opensans-font', 'https://fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800');
    }
    if (get_theme_mod('preset_style_setting') === 'oswald-muli') {
        wp_enqueue_style('wp-bootstrap-starter-oswald-muli-font', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700');
    }
    if (get_theme_mod('preset_style_setting') === 'montserrat-opensans') {
        wp_enqueue_style('wp-bootstrap-starter-montserrat-opensans-font', 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800');
    }
    if (get_theme_mod('preset_style_setting') === 'robotoslab-roboto') {
        wp_enqueue_style('wp-bootstrap-starter-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i');
    }
    if (get_theme_mod('preset_style_setting') && get_theme_mod('preset_style_setting') !== 'default') {
        wp_enqueue_style('wp-bootstrap-starter-' . get_theme_mod('preset_style_setting'), get_template_directory_uri() . '/inc/assets/css/presets/typography/' . get_theme_mod('preset_style_setting') . '.css', false, '');
    }
    //Color Scheme
    /*if(get_theme_mod( 'preset_color_scheme_setting' ) && get_theme_mod( 'preset_color_scheme_setting' ) !== 'default') {
        wp_enqueue_style( 'wp-bootstrap-starter-'.get_theme_mod( 'preset_color_scheme_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/'.get_theme_mod( 'preset_color_scheme_setting' ).'.css', false, '' );
    }else {
        wp_enqueue_style( 'wp-bootstrap-starter-default', get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/blue.css', false, '' );
    }*/

    wp_enqueue_style('wp-bootstrap-starter-site', get_template_directory_uri() . '/dist/css/site.css?' . time(), null, $theme_version);

    wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
    wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');

    // load bootstrap js
    if (get_theme_mod('cdn_assets_setting') === 'yes') {
        // wp_enqueue_script('wp-bootstrap-starter-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.15.0/dist/umd/popper.min.js', array(), '', true );
        // wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), '', true );
    } else {
        wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true);
        wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true);
    }
    wp_enqueue_script('wp-bootstrap-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true);

    wp_enqueue_script('js-lity', get_template_directory_uri() . '/inc/assets/js/lity.js', array(), '', true);
    wp_enqueue_script('js-js', get_template_directory_uri() . '/dist/js/js.js', array(), '', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wp_bootstrap_starter_scripts');



/**
 * Add Preload for CDN scripts and stylesheet
 */
function wp_bootstrap_starter_preload($hints, $relation_type)
{
    if ('preconnect' === $relation_type && get_theme_mod('cdn_assets_setting') === 'yes') {
        $hints[] = [
            'href'        => 'https://cdn.jsdelivr.net/',
            'crossorigin' => 'anonymous',
        ];
        $hints[] = [
            'href'        => 'https://use.fontawesome.com/',
            'crossorigin' => 'anonymous',
        ];
    }
    return $hints;
}

add_filter('wp_resource_hints', 'wp_bootstrap_starter_preload', 10, 2);



function wp_bootstrap_starter_password_form()
{
    global $post;
    $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
    $o = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
    <div class="d-block mb-3">' . __("To view this protected post, enter the password below:", "wp-bootstrap-starter") . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __("Password:", "wp-bootstrap-starter") . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__("Submit", "wp-bootstrap-starter") . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter('the_password_form', 'wp_bootstrap_starter_password_form');



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';


require get_template_directory() . '/inc/custom-post-type.php';


/**
 * Load custom WordPress nav walker.
 */
if (!class_exists('wp_bootstrap_navwalker')) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'    => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'    => 'theme-general-settings',
    ));
}

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'Team Slider',
            'title'             => __('Team Slider'),
            'description'       => __('Team Slider'),
            'render_template'   => 'template-parts/blocks/slider-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Standard Content', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'standard_content',
            'title'             => __('Standard Content'),
            'description'       => __('Standard Content'),
            'render_template'   => 'template-parts/blocks/standard_content.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Standard Content', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'profile_card',
            'title'             => __('Profile Card'),
            'description'       => __('Profile Card'),
            'render_template'   => 'template-parts/blocks/profile_card.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Profile Card', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'content-pricing',
            'title'             => __('Pricing Block'),
            'description'       => __('Pricing Block'),
            'render_template'   => 'template-parts/blocks/content-pricing.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Pricing Block'),
        ));
        acf_register_block_type(array(
            'name'              => 'generic_form',
            'title'             => __('Generic Form'),
            'description'       => __('Generic Form'),
            'render_template'   => 'template-parts/blocks/generic_form.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Generic Form', 'quote'),
        ));

        acf_register_block_type(array(
            'name'              => 'editors_picks',
            'title'             => __('Editors Picks'),
            'description'       => __('Editors Picks'),
            'render_template'   => 'template-parts/blocks/editors_picks.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Editors Picks', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'main_banner',
            'title'             => __('Main Banner'),
            'description'       => __('Main Banner'),
            'render_template'   => 'template-parts/blocks/main_banner.php',
            'category'          => 'media',
            'icon'              => 'admin-comments',
            // 'keywords'          => array('Title Content With 4 Column Grid', 'quote'), 			
        ));

        acf_register_block_type(array(
            'name'              => 'left_1image_right_text',
            'title'             => __('Left 1 Image Right Text'),
            'description'       => __('Left 1 Image Right Text'),
            'render_template'   => 'template-parts/blocks/left_1image_right_text.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'left_title_right_text',
            'title'             => __('Left Title Right Text'),
            'description'       => __('Left Title Right Text'),
            'render_template'   => 'template-parts/blocks/left_title_right_text.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'title_with_pricing_tables',
            'title'             => __('Title With Pricing Tables'),
            'description'       => __('Title With Pricing Tables'),
            'render_template'   => 'template-parts/blocks/title_with_pricing_tables.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'quote',
            'title'             => __('Quote'),
            'description'       => __('Quote'),
            'render_template'   => 'template-parts/blocks/quote.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'text_left_with_3images',
            'title'             => __('Text Left With 3 Images'),
            'description'       => __('Text Left With 3 Images'),
            'render_template'   => 'template-parts/blocks/text_left_with_3images.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'column4_grid_items',
            'title'             => __('Column 4 Grid Items'),
            'description'       => __('Column 4 Grid Items'),
            'render_template'   => 'template-parts/blocks/column4_grid_items.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'left_data_with_right_5images',
            'title'             => __('Left Data With Right 5 Images'),
            'description'       => __('Left Data With Right 5 Images'),
            'render_template'   => 'template-parts/blocks/left_data_with_right_5images.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'hero_text_left_4images',
            'title'             => __('Hero, Text Left, 4 Images'),
            'description'       => __('Hero, Text Left, 4 Images'),
            'render_template'   => 'template-parts/blocks/hero_text_left_4images.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'upcoming_event',
            'title'             => __('Upcoming Event'),
            'description'       => __('Upcoming Event'),
            'render_template'   => 'template-parts/blocks/upcoming_event.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'upcoming_event_webinars',
            'title'             => __('Upcoming Events and Webinars'),
            'description'       => __('Upcoming Events and Webinars'),
            'render_template'   => 'template-parts/blocks/upcoming_event_webinars.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
		acf_register_block_type(array(
            'name'              => 'upcoming_event_webinars_version2',
            'title'             => __('Upcoming Events and Webinars version 2'),
            'description'       => __('Upcoming Events and Webinars vserion 2'),
            'render_template'   => 'template-parts/blocks/upcoming_event_webinars_version2.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
		acf_register_block_type(array(
            'name'              => 'upcoming_event_webinars_version3',
            'title'             => __('Upcoming Events and Webinars version 3'),
            'description'       => __('Upcoming Events and Webinars vserion 3'),
            'render_template'   => 'template-parts/blocks/upcoming_event_webinars_version3.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
		acf_register_block_type(array(
            'name'              => 'upcoming_event_webinars_version4',
            'title'             => __('Upcoming Events and Webinars version 4'),
            'description'       => __('Upcoming Events and Webinars vserion 4'),
            'render_template'   => 'template-parts/blocks/upcoming_event_webinars_version4.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'left_right_content_with_download_brochure_button',
            'title'             => __('Left/Right Content With Download Brochure Button'),
            'description'       => __('Left/Right Content With Download Brochure Button'),
            'render_template'   => 'template-parts/blocks/left_right_content_with_download_brochure_button.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'two_column_post_list_with_heading',
            'title'             => __('2 Column Post List With Heading'),
            'description'       => __('2 Column Post List With Heading'),
            'render_template'   => 'template-parts/blocks/two_column_post_list_with_heading.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'three_column_podcast_list',
            'title'             => __('3 Column Podcast List'),
            'description'       => __('3 Column Podcast List'),
            'render_template'   => 'template-parts/blocks/three_column_podcast_list.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'image_Video_with_link',
            'title'             => __('Image / Video With Link'),
            'description'       => __('Image / Video With Link'),
            'render_template'   => 'template-parts/blocks/image_Video_with_link.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'tribe_cards',
            'title'             => __('Tribe Cards'),
            'description'       => __('Tribe Cards'),
            'render_template'   => 'template-parts/blocks/tribe_cards.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'authors_date_event_meta',
            'title'             => __('Authors / Date / Event Meta'),
            'description'       => __('Authors / Date / Event Meta'),
            'render_template'   => 'template-parts/blocks/authors_date_event_meta.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'click_to_share',
            'title'             => __('Click to Share'),
            'description'       => __('Click to Share'),
            'render_template'   => 'template-parts/blocks/click_to_share.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'cta',
            'title'             => __('CTA'),
            'description'       => __('CTA'),
            'render_template'   => 'template-parts/blocks/cta.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'faqs',
            'title'             => __('FAQs'),
            'description'       => __('FAQs'),
            'render_template'   => 'template-parts/blocks/faqs.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'post_data_with_sidebar',
            'title'             => __('Post Data With Sidebar'),
            'description'       => __('Post Data With Sidebar'),
            'render_template'   => 'template-parts/blocks/post_data_with_sidebar.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'post_data_with_sidebar_version2',
            'title'             => __('Post Data With Sidebar version 2'),
            'description'       => __('Post Data With Sidebar version 2'),
            'render_template'   => 'template-parts/blocks/post_data_with_sidebar_version2.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'post_data_with_no_sidebar',
            'title'             => __('Post Data With No Sidebar'),
            'description'       => __('Post Data With No Sidebar'),
            'render_template'   => 'template-parts/blocks/post_data_with_no_sidebar.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'post_data_with_sidebar_video_image',
            'title'             => __('Post Data With Sidebar plus video/image'),
            'description'       => __('Post Data With Sidebar plus video/image'),
            'render_template'   => 'template-parts/blocks/post_data_with_sidebar_video_image.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'our_ebooks',
            'title'             => __('Our eBooks'),
            'description'       => __('Our eBooks'),
            'render_template'   => 'template-parts/blocks/our_ebooks.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'our_ebooks_version2',
            'title'             => __('Our eBooks version 2'),
            'description'       => __('Our eBooks version 2'),
            'render_template'   => 'template-parts/blocks/our_ebooks_v2.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'featured_post_banner',
            'title'             => __('Featured Post Banner'),
            'description'       => __('Featured Post Banner'),
            'render_template'   => 'template-parts/blocks/featured_post_banner.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'stripe_banner',
            'title'             => __('Stripe Banner'),
            'description'       => __('Stripe Banner'),
            'render_template'   => 'template-parts/blocks/stripe_banner.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'featured_podcast_banner',
            'title'             => __('Featured Podcast Banner'),
            'description'       => __('Featured Podcast Banner'),
            'render_template'   => 'template-parts/blocks/featured_podcast_banner.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'category_list_with_sidebar',
            'title'             => __('Category List With Sidebar'),
            'description'       => __('Category List With Sidebar'),
            'render_template'   => 'template-parts/blocks/category_list_with_sidebar.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'image_with_lightbox',
            'title'             => __('Image With Lightbox'),
            'description'       => __('Image With Lightbox'),
            'render_template'   => 'template-parts/blocks/image_with_lightbox.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'posts_with_load_more',
            'title'             => __('Posts With Load More'),
            'description'       => __('Posts With Load More'),
            'render_template'   => 'template-parts/blocks/posts_with_load_more.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'sponsors',
            'title'             => __('Sponsors'),
            'description'       => __('Sponsors'),
            'render_template'   => 'template-parts/blocks/sponsors.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'speakers_list',
            'title'             => __('Speakers List'),
            'description'       => __('Speakers List'),
            'render_template'   => 'template-parts/blocks/speakers_list.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'heading_with_description_button',
            'title'             => __('Heading With Description & Button'),
            'description'       => __('Heading With Description & Button'),
            'render_template'   => 'template-parts/blocks/heading_with_description_button.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'hero_text_left_three_images_in_right',
            'title'             => __('Hero, Text Left, 3 Images In Right'),
            'description'       => __('Hero, Text Left, 3 Images In Right'),
            'render_template'   => 'template-parts/blocks/hero_text_left_three_images_in_right.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'sub_categories_for_mobile',
            'title'             => __('Sub Categories For Mobile'),
            'description'       => __('Sub Categories For Mobile'),
            'render_template'   => 'template-parts/blocks/sub_categories_for_mobile.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'mini_site_cta',
            'title'             => __('Mini Site : CTA'),
            'description'       => __('Mini Site : CTA'),
            'render_template'   => 'template-parts/blocks/mini_site_cta.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'mini_site_hero_text_right_4images_in_left',
            'title'             => __('Mini Site : Hero, Text Right, 4 Images In Left'),
            'description'       => __('Mini Site : Hero, Text Right, 4 Images In Left'),
            'render_template'   => 'template-parts/blocks/mini_site_hero_text_right_4images_in_left.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'speakers_data',
            'title'             => __('Speakers Data'),
            'description'       => __('Speakers Data'),
            'render_template'   => 'template-parts/blocks/speakers_data.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'stream_list',
            'title'             => __('Stream List'),
            'description'       => __('Stream List'),
            'render_template'   => 'template-parts/blocks/stream_list.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'insights_filter',
            'title'             => __('Insights Filter'),
            // 'description'       => __('Insights Filter'), 
            'render_template'   => 'template-parts/blocks/insights_filter.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'webinars_list_upcoming_ondemand',
            'title'             => __('Webinars List Upcoming & OnDemand'),
            'description'       => __('Webinars List Upcoming & OnDemand'),
            'render_template'   => 'template-parts/blocks/webinars_list_upcoming_ondemand.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
		acf_register_block_type(array(
            'name'              => 'webinars_list_upcoming_ondemand_version2',
            'title'             => __('Webinars List Upcoming & OnDemand version 2'),
            'description'       => __('Webinars List Upcoming & OnDemand version 2'),
            'render_template'   => 'template-parts/blocks/webinars_list_upcoming_ondemand_version2.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'meet_us_event_list',
            'title'             => __('Meet Us Event List'),
            'description'       => __('Meet Us Event List'),
            'render_template'   => 'template-parts/blocks/meet_us_event_list.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'events_list_with_top_next_event',
            'title'             => __('Events List With Top Next Event'),
            'description'       => __('Events List With Top Next Event'),
            'render_template'   => 'template-parts/blocks/events_list_with_top_next_event.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'icons_with_external_link',
            'title'             => __('Icons With External Link'),
            'description'       => __('Icons With External Link'),
            'render_template'   => 'template-parts/blocks/icons_with_external_link.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
		acf_register_block_type(array(
            'name'              => 'icons_with_Modal_link',
            'title'             => __('Icons With Modal Link'),
            'description'       => __('Icons With Modal Link'),
            'render_template'   => 'template-parts/blocks/icons_with_modal_link.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
		acf_register_block_type(array(
            'name'              => 'icons_with_modal_link_load_more',
            'title'             => __('Icons With Modal Link load more'),
            'description'       => __('Icons With Modal Link load more'),
            'render_template'   => 'template-parts/blocks/icons_with_modal_link_load_more.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
        acf_register_block_type(array(
            'name'              => 'conferences_and_events_banner',
            'title'             => __('Conferences And Events Banner'),
            'description'       => __('Conferences And Events Banner'),
            'render_template'   => 'template-parts/blocks/conferences_and_events_banner.php',
            'category'          => 'media',
            'icon'              => 'admin-comments',
        ));
		acf_register_block_type(array(
            'name'              => 'conferences_and_events_banner_version2',
            'title'             => __('Conferences And Events Banner version 2'),
            'description'       => __('Conferences And Events Banner with download link'),
            'render_template'   => 'template-parts/blocks/conferences_and_events_banner_version2.php',
            'category'          => 'media',
            'icon'              => 'admin-comments',
        ));
		acf_register_block_type(array(
            'name'              => 'profile_card_version2',
            'title'             => __('Profile Card version 2'),
            'description'       => __('Profile Card version 2'),
            'render_template'   => 'template-parts/blocks/profile_card_version2.php',
			'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Profile Card version 2', 'quote'),
        ));
		acf_register_block_type(array(
            'name'              => 'logo_ticker',
            'title'             => __('logo_ticker'),
            'description'       => __('logo_ticker'),
            'render_template'   => 'template-parts/blocks/logo_ticker.php',
			'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Profile Card version 2', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'logo ticker version 2',
            'title'             => __('logo ticker version 2'),
            'description'       => __('logo_ticker_v2'),
            'render_template'   => 'template-parts/blocks/logo_ticker_v2.php',
			'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('Profile Card version 2', 'quote'),
        ));
        acf_register_block_type(array(
            'name'              => 'Testimonial Single',
            'title'             => __('Testimonial Single'),
            'description'       => __('Testimonial Single'),
            'render_template'   => 'template-parts/blocks/testimonials.php',
			'category'          => 'formatting',
            'icon'              => 'admin-comments',
        ));
    }
}


/*
function team_loadmore()
{

	$paged = $_POST["paged"];
	$postPerPage = $_POST["postperpage"];
	$currentPostCount = $_POST["currentPostCount"];
	$type = $_POST["type"];

	$args = array(
		'post_type' => 'team',
		'posts_per_page' => $postPerPage,
		'post_status' => 'publish',
		'orderby' => array('date' => 'DESC')
	);

	$args_total = array(
		'post_type' => 'team',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);

	$args['paged'] = $paged;

	wp_reset_query();
	$loop_total = new WP_Query($args_total);

	$totalPost = $loop_total->found_posts;
	//echo "<pre>"; print_r($loop_total); echo "</pre>";
	ob_start();

	wp_reset_query();
	$my_query = null;
	$my_query = new WP_Query($args);
	// echo "<pre>";
	// print_r($my_query);
	// echo "</pre>";
	if ($my_query->have_posts()) {
		//echo "true";

		while ($my_query->have_posts()) : $my_query->the_post();
			echo get_template_part('template-parts/content', 'team');
		endwhile;

		echo	'<input type="hidden" value="' . $totalPost . '" id="total_post_count" />';
		echo	'<input type="hidden" value="' . $currentPostCount . '" id="current_post_count" />';
	} else {
		echo "false";
	}

	$output = ob_get_contents();
	ob_end_clean();
	wp_send_json_success($output);
}

add_action("wp_ajax_team_loadmore", "team_loadmore");
add_action("wp_ajax_nopriv_team_loadmore", "team_loadmore");

*/


function podcast_loadmore()
{
    $paged = $_POST["paged"];
    $postPerPage = $_POST["postperpage"];
    $currentPostCount = $_POST["currentPostCount"];
    $type = $_POST["type"];
    $cat = $_POST["cat"];
    $sType = $_POST["sType"];
    $cType = $_POST["cType"];

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'order' => 'DESC',
    );

    $args_total = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    if ($sType == "category" && !empty($cat)) {
        $args['cat'] = $cat;
        $args_total['cat'] = $cat;
    } else if ($sType == "type" && !empty($cType)) {
        $args['meta_query'] = array(
            array(
                'key'     => 'content_type',
                'value'   => $cType,
                'compare' => 'LIKE',
            ),
        );

        $args_total['meta_query'] = array(
            array(
                'key'     => 'content_type',
                'value'   => $cType,
                'compare' => 'LIKE',
            ),
        );
    }


    if ($paged && $type == "loadmore") {
        $args['paged'] = $paged;
    } else {
        $args['paged'] = 1;
    }

    wp_reset_query();
    $loop_total = new WP_Query($args_total);

    $totalPost = $loop_total->found_posts;
    //echo "<pre>"; print_r($loop_total); echo "</pre>";
    ob_start();

    wp_reset_query();
    $my_query = null;
    $my_query = new WP_Query($args);
    // echo "<pre>";
    // print_r($my_query);
    // echo "</pre>";
    if ($my_query->have_posts()) {
        //echo "true";
        $ii = 0;
        while ($my_query->have_posts()) : $my_query->the_post();
            echo get_template_part('template-parts/content', 'podcast');
        endwhile;

        echo    '<input type="hidden" value="' . $totalPost . '" id="total_post_count" />';
        echo    '<input type="hidden" value="' . $currentPostCount . '" id="current_post_count" />';
    } else {
        echo "false";
    }

    $output = ob_get_contents();
    ob_end_clean();
    wp_send_json_success($output);
}

add_action("wp_ajax_podcast_loadmore", "podcast_loadmore");
add_action("wp_ajax_nopriv_podcast_loadmore", "podcast_loadmore");


function filter_webinar()
{
    $paged = $_POST["postperpage"];
    $postPerPage = $_POST["postperpage"];
    $currentPostCount = $_POST["currentPostCount"];
    $paged = $_POST["paged"];
    $webinar_type = $_POST["webinar_type"];
    $type = $_POST["type"];
    $cat = $_POST["cat"];

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'cat' => $cat,
    );

    $args_total = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'cat' => $cat
    );


    if ($paged && $type == "loadmore") {
        $args['paged'] = $paged;
    } else {
        $args['paged'] = 1;
    }

    wp_reset_query();
    $loop_total = new WP_Query($args_total);

    $totalPost = $loop_total->found_posts;
    //echo "<pre>"; print_r($loop_total); echo "</pre>";
    ob_start();

    wp_reset_query();
    $my_query = null;
    $my_query = new WP_Query($args);
    // echo "<pre>";
    // print_r($my_query);
    // echo "</pre>";
    if ($my_query->have_posts()) {
        //echo "true";
        $ii = 0;
        while ($my_query->have_posts()) : $my_query->the_post();
            $upcoming_posts_id = get_the_ID();
            set_query_var('postId', $upcoming_posts_id);
            echo get_template_part('template-parts/content-webinars_list_upcoming_item');
            echo get_template_part('template-parts/content-webinars_list_upcoming_item_version2');
        endwhile;

        echo    '<input type="hidden" value="' . $totalPost . '" id="total_post_count" />';
        echo    '<input type="hidden" value="' . $currentPostCount . '" id="current_post_count" />';
    } else {
        echo "false";
    }

    $output = ob_get_contents();
    ob_end_clean();
    wp_send_json_success($output);
}

add_action("wp_ajax_filter_webinar", "filter_webinar");
add_action("wp_ajax_nopriv_filter_webinar", "filter_webinar");

function filter_webinar01()
{
    $paged = $_POST["postperpage"];
    $postPerPage = $_POST["postperpage"];
    $currentPostCount = $_POST["currentPostCount"];
    $paged = $_POST["paged"];
    $webinar_type = $_POST["webinar_type"];
    $type = $_POST["type"];
    $cat = $_POST["cat"];

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'cat' => $cat
    );

    $args_total = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'cat' => $cat
    );


    if ($paged && $type == "loadmore") {
        $args['paged'] = $paged;
    } else {
        $args['paged'] = 1;
    }

    wp_reset_query();
    $loop_total = new WP_Query($args_total);

    $totalPost = $loop_total->found_posts;
    //echo "<pre>"; print_r($loop_total); echo "</pre>";
    ob_start();

    wp_reset_query();
    $my_query = null;
    $my_query = new WP_Query($args);
    // echo "<pre>";
    // print_r($my_query);
    // echo "</pre>";
    if ($my_query->have_posts()) {
        //echo "true";
        $ii = 0;
        while ($my_query->have_posts()) : $my_query->the_post();
            $upcoming_posts_id = get_the_ID();
            set_query_var('postId', $upcoming_posts_id);
            // echo get_template_part('template-parts/content-webinars_list_upcoming_item_version2');
        endwhile;

        echo    '<input type="hidden" value="' . $totalPost . '" id="total_post_count" />';
        echo    '<input type="hidden" value="' . $currentPostCount . '" id="current_post_count" />';
    } else {
        echo "false";
    }

    $output = ob_get_contents();
    ob_end_clean();
    wp_send_json_success($output);
}

add_action("wp_ajax_filter_webinar", "filter_webinar01");
add_action("wp_ajax_nopriv_filter_webinar", "filter_webinar01");

function filter_post_load_more_mp09()
{
    $post_count       = $_POST["post_count"];
    $paged       = $_POST["paged"];
    $term_id       = $_POST["term_id"];
    $tax_query = '';
    if ($term_id) {
        $tax_query = array(
            'taxonomy' => 'insight_category',
            'field'    => 'term_id',
            'terms'    => $term_id,
        );
    }

    $postQuery = new WP_Query(array(
        'posts_per_page'      => $post_count,
        'post_type'        => 'insight',
        'post_status'    => 'publish',
        'paged' => $paged,
        'fields' => 'ids',
        'tax_query' => array(
            $tax_query
        ),
    ));
    $postList = $postQuery->posts;
    $maxPages = $postQuery->max_num_pages;

    ob_start();    ?>
    <?php if (count($postList) > 0) : ?>
        <?php foreach ($postList as $key => $postId) {
            set_query_var('postId', $postId);
            get_template_part('template-parts/content-posts_load_more');
        } ?>
        <?php if ($maxPages > 1 && $paged != $maxPages) : ?>
            <div class="posts_load_more__item loadMore text-center w-100 mt-3">
                <a href="#" class="posts_load_more_loadMore btn white" data-paged="<?php echo ($paged + 1); ?>">Load More</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php
    $output = ob_get_contents();
    ob_end_clean();
    wp_send_json_success($output);
}
add_action("wp_ajax_filter_post_load_more", "filter_post_load_more_mp09");
add_action("wp_ajax_nopriv_filter_post_load_more", "filter_post_load_more_mp09");


function filter_upcoming_event_webinars_mp09()
{
    $post_count       = $_POST["post_count"];
    $paged       = $_POST["paged"];
    $cat       = $_POST["cat"];
    $sType = $_POST["sType"];
    $cType = $_POST["cType"];

    $args = array(
        'posts_per_page'      => $post_count,
        'post_type'        => 'post',
        'post_status'    => 'publish',
        'paged' => $paged,
        'fields' => 'ids',
		'orderby' 	=> 'date',
        'order' => 'ASC',
    );

    if ($sType == "category" && !empty($cat)) {
        $args['cat'] = $cat;
    } else if ($sType == "type" && !empty($cType)) {
        $args['meta_query'] = array(
            array(
                'key'     => 'content_type',
                'value'   => $cType,
                'compare' => 'LIKE',
            ),
        );
    }
    $postQuery = new WP_Query($args);
    $postList = $postQuery->posts;
    $maxPages = $postQuery->max_num_pages;
    ob_start();    ?>
    <?php if (count($postList) > 0) : ?>
        <?php foreach ($postList as $key => $postId) {
            set_query_var('postId', $postId);
            get_template_part('template-parts/content-upcoming_event_webinars_item');
        } ?>
        <?php if ($maxPages > 1 && $paged != $maxPages) : ?>
            <div class="upcoming_event_webinars_list_item loadMore text-center w-100 mt-5">
                <a href="#" class="upcoming_event_webinars_loadMore btn white" data-paged="<?php echo ($paged + 1); ?>">Load More</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php
    $output = ob_get_contents();
    ob_end_clean();
    wp_send_json_success($output);
}
add_action("wp_ajax_filter_upcoming_event_webinars", "filter_upcoming_event_webinars_mp09");
add_action("wp_ajax_nopriv_filter_upcoming_event_webinars", "filter_upcoming_event_webinars_mp09");

function filter_upcoming_event_webinars_mp10()
{
    $post_count       = $_POST["post_count"];
    $paged       = $_POST["paged"];
    $cat       = $_POST["cat"];
    $sType = $_POST["sType"];
    $cType = $_POST["cType"];

    $args = array(
        'posts_per_page'      => $post_count,
        'post_type'        => 'post',
        'post_status'    => 'publish',
        'paged' => $paged,
        'fields' => 'ids',
		'orderby' 	=> 'date',
        'order' => 'DESC',

		
    );

    if ($sType == "category" && !empty($cat)) {
        $args['cat'] = $cat;
    } else if ($sType == "type" && !empty($cType)) {
        $args['meta_query'] = array(
            array(
                'key'     => 'content_type',
                'value'   => $cType,
                'compare' => 'LIKE',
            ),
        );
    }
    $postQuery = new WP_Query($args);
    $postList = $postQuery->posts;
    $maxPages = $postQuery->max_num_pages;
    ob_start();    ?>
    <?php if (count($postList) > 0) : ?>
        <?php foreach ($postList as $key => $postId) {
            set_query_var('postId', $postId);
            get_template_part('template-parts/content-upcoming_event_webinars_item_version3');
        } ?>
        <?php if ($maxPages > 1 && $paged != $maxPages) : ?>
            <div class="upcoming_event_webinars_list_item updated_upcoming loadMore text-center w-100 mt-5">
                <a href="#" class="upcoming_event_webinars_loadMore btn white" data-paged="<?php echo ($paged + 1); ?>">Load More</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php
    $output = ob_get_contents();
    ob_end_clean();
    wp_send_json_success($output);
}
add_action("wp_ajax_filter_upcoming_event_webinarsa", "filter_upcoming_event_webinars_mp10");
add_action("wp_ajax_nopriv_filter_upcoming_event_webinarsa", "filter_upcoming_event_webinars_mp10");

function filter_upcoming_event_webinars_mp11()
{
    $post_count       = $_POST["post_count"];
    $paged       = $_POST["paged"];
    $cat       = $_POST["cat"];
    $sType = $_POST["sType"];
    $cType = $_POST["cType"];

    $args = array(
        'posts_per_page'      => $post_count,
        'post_type'        => 'post',
        'post_status'    => 'publish',
        'paged' => $paged,
        'fields' => 'ids',
		'orderby' 	=> 'date',
        'order' => 'ASC'
    );

    if ($sType == "category" && !empty($cat)) {
        $args['cat'] = $cat;
    } else if ($sType == "type" && !empty($cType)) {
        $args['meta_query'] = array(
            array(
                'key'     => 'content_type',
                'value'   => $cType,
                'compare' => 'LIKE'
            ),
        );
    }
    $postQuery = new WP_Query($args);
    $postList = $postQuery->posts;
    $maxPages = $postQuery->max_num_pages;
    ob_start();    ?>
    <?php if (count($postList) > 0) : ?>
        <?php foreach ($postList as $key => $postId) {
            set_query_var('postId', $postId);
            get_template_part('template-parts/content-upcoming_event_webinars_item_version4');
        } ?>
        <?php if ($maxPages > 1 && $paged != $maxPages) : ?>
            <div class="upcoming_event_webinars_list_item updated_upcoming loadMore text-center w-100 mt-5">
                <a href="#" class="upcoming_event_webinars_loadMore btn white" data-paged="<?php echo ($paged + 1); ?>">Load More</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php
    $output = ob_get_contents();
    ob_end_clean();
    wp_send_json_success($output);
}
add_action("wp_ajax_filter_upcoming_event_webinarsb", "filter_upcoming_event_webinars_mp11");
add_action("wp_ajax_nopriv_filter_upcoming_event_webinarsb", "filter_upcoming_event_webinars_mp11");

function filter_profile_cards()
{
    $paged            = $_POST["paged"];
    $postPerPage      = $_POST["postperpage"];
    $currentPostCount = $_POST["currentPostCount"];

    $args = array(
        'post_type'        => 'team',
        'post_status'      => 'publish',
        'posts_per_page'   => $postPerPage,
        'orderby'          => 'date',
        'order'            => 'DESC'
    );

    if (!empty($paged)) {
        $args['paged'] = $paged;
    }

    wp_reset_query();
    $args_total = array(
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    $loop_total = new WP_Query($args_total);

    $totalPost = $loop_total->found_posts;
    //echo "<pre>"; print_r($loop_total); echo "</pre>";
    ob_start();

    wp_reset_query();
    $my_query = null;
    $my_query = new WP_Query($args);

    if ($my_query->have_posts()) {
        //echo "true";
        while ($my_query->have_posts()) : $my_query->the_post();
            echo get_template_part('template-parts/content', 'team');
        endwhile;

        echo '<input type="hidden" value="' . $totalPost . '" id="total_post_count" />';
        echo '<input type="hidden" value="' . $currentPostCount . '" id="current_post_count" />';
    } else {
        echo "false";
    }

    $output = ob_get_contents();
    ob_end_clean();
    wp_send_json_success($output);
}

add_action("wp_ajax_filter_profile_cards", "filter_profile_cards");
add_action("wp_ajax_nopriv_filter_profile_cards", "filter_profile_cards");

function wpd_subcategory_template($template)
{
    $cat = get_queried_object();
    if (0 < $cat->category_parent)
        $template = locate_template('subcategory.php');
    return $template;
}
add_filter('category_template', 'wpd_subcategory_template');

function pre_get_posts_mp009($query)
{
    if ($query->is_main_query() && $query->is_search() && !is_admin()) {
        $query->set('posts_per_page', -1);
        $query->set('post_type', array('post', 'insight'));
    }
}
add_action('pre_get_posts', 'pre_get_posts_mp009');

function cameronjonesweb_unregister_tags()
{
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'cameronjonesweb_unregister_tags');

function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

/*
 * Set post views count using post meta
 */
function setPostViews($postID)
{
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

// ACF style fix

function acf_filter_rest_api_preload_paths( $preload_paths ) {
  if ( ! get_the_ID() ) {
    return $preload_paths;
  }
  $remove_path = '/wp/v2/' . get_post_type() . 's/' . get_the_ID() . '?context=edit';
  $v1 =  array_filter(
    $preload_paths,
    function( $url ) use ( $remove_path ) {
      return $url !== $remove_path;
    }
  );
  $remove_path = '/wp/v2/' . get_post_type() . 's/' . get_the_ID() . '/autosaves?context=edit';
  return array_filter(
    $v1,
    function( $url ) use ( $remove_path ) {
      return $url !== $remove_path;
    }
  );
}
add_filter( 'block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1 );

// JS add to page

function js_code_post() {
if (is_single ('7219')) { 
?>
<script type="text/javascript">
// Add your JavaScript code here
</script>
<?php
}
}
add_action('wp_head', 'js_code_post');

// Register a slider block.
add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('A custom slider block.'),
            'render_template'   => 'template-parts/blocks/slider/slider.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
				wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
				wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

				wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.scss', array(), '1.0.0' );
				wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.js', array(), '1.0.0', true );
			  },
        ));
    }
}

add_filter('acf/format_value/type=textarea', 'do_shortcode');

function my_acf_format_value( $value, $post_id, $field ) {

    // Render shortcodes in all textarea values.
    return do_shortcode( $value );
}

// slider code
// Ishs start here

function featured_sponsors()
{
	$arg = array(
		'post_type' => 'sponsor',
		'posts_per_page' => -1,
		);
        $sponsorPost = new WP_Query($arg);
        
	?>
	<div id="featured_sponsors">
        
	<?php if ($sponsorPost->have_posts()) :
	 ?>
        
			<?php $inc = 1; while ($sponsorPost->have_posts()) : ?>
                
			<?php $sponsorPost->the_post(); 
			if(get_field('featured') == true ) : 
			?>
                    
                <div class="sponsors-single single-<?php echo $inc; ?>">
                    <a class="fullLink" href="<?php the_permalink(); ?>"></a>         
                        <div class="imageArea">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'single-sponsors-img' ) ); ?>
                            </a>
                        </div>
                        <div class="contentArea tick">
                            <a href="<?php the_permalink(); ?>">
                                <h2><?php the_title(); ?></h2>
                                <p><?= the_field('sub_title') ?></p>
                                <?php if ( 'on' == get_field('paid_version') ): ?>
                                    <img src="/wp-content/uploads/2023/09/verified-gold.png" alt="verfied" style="width: 16px;height: 16px;margin-left: 4px;">
                                <?php else: ?>
                                <?php endif; ?>
                            </a>
                        </div>
                    
			 
		        </div>

			<?php  endif ?>    
			<?php  
				$inc++;
			endwhile;
		
			?>   
            
            
            <?php endif; ?>
    </div>

<?php
	wp_reset_postdata();

}
add_shortcode('featured-sponsors', 'featured_sponsors');



/******************************* Search **************************/


// search starts from here

//* Enqueue Ajax call on wp_enqueue_scripts hook


add_action('wp_enqueue_scripts', 'enqueue_ajax_call');
function enqueue_ajax_call()
{

    $localize_arr = array(
        'ajax_url' => admin_url('admin-ajax.php')
    );

    wp_enqueue_script('enqueue-ajax-call', get_stylesheet_directory_uri() . '/js/filter.js', array('jquery'));
    //wp_enqueue_script('enqueue-fancybox-css', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css');
    wp_enqueue_script('enqueue-fancybox', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js' , array('jquery'));
    wp_localize_script('enqueue-ajax-call', 'ajax_call', $localize_arr);
}


add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');


function misha_filter_function()
{

    global $wpdb;
	$taxonomies = array(
			'sponsor_category',
			'location',
			'events',
            'product',
            'modality'
        
    );

    $args = array(
        'post_type' => 'sponsor'
    );

    // if only search
    if (    isset($_POST['ponty_search']) &&  ( $_POST['sponsor_categoryfilter'] == ''  &&  $_POST['locationfilter'] == ''  &&  $_POST['eventsfilter'] == '' &&  $_POST['productfilter'] == ''  &&  $_POST['modalityfilter'] == '')    ) {

        $str = $_POST['ponty_search'];
        $mypostids = $wpdb->get_col("select ID from $wpdb->posts where post_title LIKE '%".$str."%' || post_excerpt LIKE '%".$str."%' || post_content LIKE '%".$str."%' ");
        $args['post__in'] = $mypostids;

    } else {		
			$relation = 'AND';
			$params = array();
			$args['tax_query']['relation'] = $relation;
			foreach ( $taxonomies as $tax ) {
				if( isset( $_POST[ $tax . 'filter' ] ) && !empty( $_POST[ $tax . 'filter' ] ) )  {
					
					$str = $_POST['ponty_search'];
					$mypostids = $wpdb->get_col("select ID from $wpdb->posts where post_title LIKE '%".$str."%' || post_excerpt LIKE '%".$str."%' || post_content LIKE '%".$str."%' ");
					$args['post__in'] = $mypostids;
					
					
					$args['tax_query'][] = array(
							'taxonomy' => $tax,
							'field' => 'id',
							'terms' => array($_POST[ $tax . 'filter' ]),
						);
				}
			}	
	}
	

    
  

        // if (    isset($_POST['ponty_search'])  ) {

            // $str = $_POST['ponty_search'];
            // $mypostids = $wpdb->get_col("select ID from $wpdb->posts where post_title LIKE '%".$str."%' || post_excerpt LIKE '%".$str."%' || post_content LIKE '%".$str."%' ");
            // $args['post__in'] = $mypostids;

           // $args['tax_query'] = array(
				// array(
					// 'taxonomy' => 'sponsor_category',
					// 'field' => 'id',
					// 'terms' => $_POST['ponty_category']
				// )
			// );

        // } 


     //echo '<pre>';
     //echo $var;
    // print_r($taxonomies);
     //print_r($args);
     /*die;*/

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()): $query->the_post();
            get_template_part( 'loop', 'sponsers' );
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p><center>No records found.</center></p>';
    endif;

    die();
}

function wpb_total_posts() { 

$count_posts = wp_count_posts('sponsor');
$total_posts = $count_posts->publish;
echo $total_posts;
} 
add_shortcode('total_posts','wpb_total_posts');

function main_sponsors()
{ ?>
    <div class="form-check filterWrapper">
        <form method="POST" id="search_form">
            
             <label class="form-check-label">
                <input type="text" class="filter-field" name="ponty_search" id="ponty_search" value="" placeholder="Search" >  
              </label>
              
              <?php //echo '<pre>'; print_r(get_locations()); ?>

              <div class="search_fields_dir">

              <label class="form-check-label">
                    <select name="productfilter" id="ponty_product">
                    <option value="">Select Product & Services</option>
                    <?php foreach (array_unique(get_product()) as $key => $product) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $product; ?></option>
                    <?php } ?>
                </select>
                </label>
              
              <!-- <label class="form-check-label">
                <select name="sponsor_categoryfilter" id="ponty_category" >
                    <option value="">Select Modality...</option>
                    
                </select>
              </label> -->

              <label class="form-check-label">
                <select name="modalityfilter" id="ponty_modality" >
                    <option value="">Select Modality...</option>
                    <?php foreach (array_unique(get_modality()) as $key => $mod) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $mod; ?></option>
                    <?php } ?>
                </select>
              </label>
              
              <label class="form-check-label">
                    <select name="locationfilter" id="ponty_location">
                    <option value="">Select Region..</option>
                    <?php foreach (array_unique(get_locations()) as $key => $loc) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $loc; ?></option>
                    <?php } ?>
                </select>
              </label>
              
              <label class="form-check-label">
                    <select name="eventsfilter" id="ponty_events">
                    <option value="">Select Event...</option>
                    <?php foreach (array_unique(get_events()) as $key => $event) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $event; ?></option>
                    <?php } ?>
                </select>
                </label>

                </div>


            <input  type="hidden" name="action" value="myfilter">
            
            
            <div class="Submit_btn">
            <input class="filterBtn" type="button" onClick="window.location.reload();" value="Reset"  >
            
            <input class="filterBtn" type="submit" name="submit" value="Submit">
                    </div>
        </form>
    </div>

<p><center><div id="loading" style="display:none;"> 
				  <img src="https://cdnjs.cloudflare.com/ajax/libs/galleriffic/2.0.1/css/loader.gif" title="loading" />
				</div></p></center>
    <div class="article_row" >
        <div class="container" id="response">
            
        <?php

        $args = array(
            'post_type' => 'sponsor', // we will sort posts by date
            'posts_per_page' => '-1',
            'orderby' 	=> 'title',
            'order' => 'ASC'
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()): $query->the_post();
                ?>
                <div class="sponsors-single ">
                <a class="fullLink" href="<?php the_permalink(); ?>"></a>                    
                <div class="imageArea">
		                <?php the_post_thumbnail( 'full', array( 'class' => 'single-sponsors-img' ) ); ?>
		            </div>
		            <div class="contentArea tick">
		                <h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
		                <!-- <p><?= the_field('sub_title') ?></p> -->
                        <?php if ( 'on' == get_field('paid_version') ): ?>
                            <img src="/wp-content/uploads/2023/09/verified-gold.png" alt="verfied" style="width: 16px;height: 16px;margin-left: 4px;">
                        <?php else: ?>
                        <?php endif; ?>
		            </div>
		        </div>
              
            <?php
            endwhile;
			
            wp_reset_postdata();
        else :
                echo '<p><center>No records found.</center></p>';
        endif;
        ?>


    </div>
    </div>
<?php }

add_shortcode('main-sponsors', 'main_sponsors');

function get_cats()
{
    $categories = get_categories( array(
    	'taxonomy' => 'sponsor_category',
		'hide_empty' => false
    ) );
    
    foreach ( $categories as $category ) {
    	$cat[$category->term_id] = $category->name;
    }
    return $cat; 
    
}


function get_locations()
{
	$args = array(
		'hide_empty' => false, 
	);

	$terms = get_terms('location', $args);
    
    foreach ( $terms as $term ) {
    	$ter[$term->term_id] = $term->name;
    }
    return $ter; 
    
}


function get_events()
{
    
	
	$args = array(
		'hide_empty' => false, 
	);

	$terms = get_terms('events', $args);
    
    foreach ( $terms as $term ) {
    	$eve[$term->term_id] = $term->name;
    }
    return $eve; 
    
}

function get_product()
{
    
	
	$args = array(
		'hide_empty' => false, 
	);

	$terms = get_terms('product', $args);
    
    foreach ( $terms as $term ) {
    	$prd[$term->term_id] = $term->name;
    }
    return $prd; 
    
}

function get_modality()
{
    
	
	$args = array(
		'hide_empty' => false, 
	);

	$terms = get_terms('modality', $args);
    
    foreach ( $terms as $term ) {
    	$mod[$term->term_id] = $term->name;
    }
    return $mod; 
    
}

add_filter( 'posts_where', 'qirolab_posts_where', 10, 2 );
function qirolab_posts_where( $where, &$wp_query )
{
    global $wpdb;
    if ( $title = $wp_query->get( 'ponty_search' ) ) {
        $where .= " AND " . $wpdb->posts . ".post_title LIKE '" . esc_sql( $wpdb->esc_like( $title ) ) . "%'";
    }
    return $where;
}

// tag code

function custom_taxonomy() {
    register_taxonomy(
        'sponsor_tag_option_1',
        'sponsor',
        array(
            'label' => __( 'Sponsor Tag Option 1' ),
            'rewrite' => array( 'slug' => 'sponsor-tag-option-1' ),
            'hierarchical' => true,
        )
    );
    register_taxonomy(
        'sponsor_tag_option_2',
        'sponsor',
        array(
            'label' => __( 'Sponsor Tag Option 2' ),
            'rewrite' => array( 'slug' => 'sponsor-tag-option-2' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'custom_taxonomy', 0 );


function add_custom_taxonomies_to_sponsor() {
    register_taxonomy_for_object_type( 'sponsor_tag_option_1', 'sponsor' );
    register_taxonomy_for_object_type( 'sponsor_tag_option_2', 'sponsor' );
}
add_action( 'init', 'add_custom_taxonomies_to_sponsor' );


function breadcrumbs($id = null){
    ?>
    <div id="breadcrumbs">
        <a href="/the-cell-and-gene-directory/">The Cell and Gene Directory</a></span> >
        <?php if(!empty($id)): ?>
        <a href="<?php echo get_permalink( $id ); ?>" ><?php echo get_the_title( $id ); ?></a>
        <?php endif; ?>
        
    </div>
    <?php }