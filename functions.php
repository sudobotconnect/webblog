<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

use mtekk\adminKit\setting\setting;

define('AXIL_THEME_URI', get_template_directory_uri());
define('AXIL_THEME_DIR', get_template_directory());
define('AXIL_CSS_URL', get_template_directory_uri() . '/assets/css/');
define('AXIL_RTL_URL', get_template_directory_uri() . '/assets/css-auto-rtl/');

define('AXIL_ADMIN_CSS_URL', get_template_directory_uri() . '/assets/admin/css/');
define('AXIL_JS_URL', get_template_directory_uri() . '/assets/js/');
define('AXIL_ADMIN_JS_URL', get_template_directory_uri() . '/assets/admin/js/');
define('AXIL_FONTS_URL', get_template_directory_uri() . '/assets/fonts/font-awesome/css');
define('AXIL_IMG_URL', AXIL_THEME_URI . '/assets/img/');
define('AXIL_WOOCMMERCE', AXIL_THEME_DIR . '/woocommerce/custom/');
define('AXIL_FREAMWORK_DIRECTORY', AXIL_THEME_DIR . '/inc/');
define('AXIL_FREAMWORK_LAB', AXIL_THEME_DIR . '/inc/lab/');
define('AXIL_FREAMWORK_DIRECTORY_VIEW', AXIL_THEME_DIR . '/inc/views/');
define('AXIL_PLUGINS_DIR', AXIL_THEME_DIR . '/inc/plugin-bundle/');

define('AXIL_FREAMWORK_HELPER', AXIL_THEME_DIR . '/inc/helper/');
define('AXIL_FREAMWORK_RI', AXIL_THEME_DIR . '/inc/redux-include/');
define('AXIL_FREAMWORK_DS', AXIL_THEME_DIR . '/inc/dynamic-style/');
define('AXIL_FREAMWORK_TP', AXIL_THEME_DIR . '/template-parts/');
$axi_theme_data = wp_get_theme();
$action = 'axil_theme_init';
do_action($action);
define('AXIL_VERSION', (WP_DEBUG) ? time() : $axi_theme_data->get('Version'));
define('AXIL_AUTHOR_URI', $axi_theme_data->get('AuthorURI'));
define('AXIL_PRFX', 'papr');
define('AXIL_WIDGET_PREFIX', 'papr');
define('AXIL_THEME_PREFIX', 'papr');
define('AXIL_THEME_FIX', 'axil');


if (version_compare(PHP_VERSION, '5.3', '>=')) {
    /*
    * plugin.php has to load to know which plugin is active
    */
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    /*
    * Enable support TGM features.
    */
    // helper trait
    require_once(AXIL_FREAMWORK_HELPER . "elementor-loaded-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "icon-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "menu-area-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "social-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "footer-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "advertisements-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "pagination-trai.php");
    require_once(AXIL_FREAMWORK_HELPER . "page-title-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "post-metas-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "option-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "post-image-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "layout-trait.php");
    // helper
    require_once(AXIL_FREAMWORK_HELPER . "helper.php");
    require_once(AXIL_FREAMWORK_HELPER . "helper-post.php");
    // axilsetup
    require_once(AXIL_FREAMWORK_DIRECTORY . "theme-setup.php");
    //related
    require_once(AXIL_FREAMWORK_TP . "post-related-grid.php");
    // inc
    require_once(AXIL_FREAMWORK_DIRECTORY . "tgm-config.php");
    require_once(AXIL_FREAMWORK_DIRECTORY . "demo-import-config.php");
    require_once(AXIL_FREAMWORK_DIRECTORY . "register-custom-fonts.php");
    require_once(AXIL_FREAMWORK_DIRECTORY . "scripts.php");
    require_once(AXIL_FREAMWORK_DIRECTORY . "general-widget.php");
    //redux include
    require_once(AXIL_FREAMWORK_RI . "redux-help.php");
    require_once(AXIL_FREAMWORK_RI . "redux-init.php");
    //dynamic-style
    require_once(AXIL_FREAMWORK_DS . "style-scripts.php");
    require_once(AXIL_FREAMWORK_DS . "customizer.php");
    // Lab
    require_once(AXIL_FREAMWORK_LAB . "class-tgm-plugin-activation.php");
    require_once(AXIL_FREAMWORK_LAB . "axil-post-views.php");
    // -- Nav Walker
    require_once(AXIL_FREAMWORK_LAB . "aw-nav-menu-walker.php");


    // WooCommerce
    if (class_exists('WooCommerce')) {
        require_once(AXIL_WOOCMMERCE . "wooc-functions.php");
        require_once(AXIL_WOOCMMERCE . "wooc-hooks.php");
    }

} else {

    add_filter('template_include', 'axil_php_template', 99);
    add_action('admin_notices', 'axil_php_version');
    function axil_php_template($template)
    {
        $template = locate_template(array('fallback.php'));
        return $template;
    }

    function axil_php_version()
    {
        $msg = sprintf(esc_html__('Error: Your current PHP version is %s. You need at least PHP version 5.4+ . Please upgrade your PHP version 5.4+', 'papr'), PHP_VERSION);
        echo '<div class="error">' . $msg . '</div>';
    }
}
add_editor_style('style-editor.css');


/**
 * Escapeing
 */
if (!function_exists('axilescap')) {
    function axilescap($html)
    {
        return $html;
    }
}


/**
 * Shared Counts, add a Big Block style
 * @see https://sharedcountsplugin.com/2019/05/13/creating-new-button-styles/
 *
 * @param array $styles
 * @return array
 */
if (!function_exists('axil_shared_counts_styles')) {
    function axil_shared_counts_styles($styles)
    {
        $styles['axil_style'] = esc_html__('Papr Style', 'papr');
        return $styles;
    }

    add_filter('shared_counts_styles', 'axil_shared_counts_styles');
}

/**
 * Move Shared Counts
 * @see https://sharedcountsplugin.com/2019/03/27/change-the-theme-location-for-share-buttons/
 *
 * @param array $locations
 * @return array
 */
function axil_shared_counts_location($locations)
{
    $locations['after']['hook'] = 'after_post_content';
    $locations['after']['filter'] = false;

    $locations['before']['hook'] = 'before_post_content';
    $locations['before']['filter'] = false;
    return $locations;
}

add_filter('shared_counts_theme_locations', 'axil_shared_counts_location');


/**
 * Shared Counts - change buttons in "Before Content" location
 * @see https://sharedcountsplugin.com/2019/03/27/display-different-buttons-in-each-location/
 */
function axil_total_shared_counts($services, $location)
{
    if ('papr-meta' === $location) {
        $services = array('included_total');
    }
    return $services;
}

add_filter('shared_counts_display_services', 'axil_total_shared_counts', 10, 2);


/**
 * Aallowed svg types
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 */
function axil_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'axil_mime_types');


/**
 * Maintenance Mode
 */
add_action('template_include', 'under_construction_mode_enable', 999);

function under_construction_mode_enable($template)
{
    $papr_options = Helper::axil_get_options();

    if (!class_exists('ReduxFramework')) {
        return $template;
    }

    $enable = (isset($papr_options['under_construction_mode_enable'])) ? $papr_options['under_construction_mode_enable'] : 'off';

    $enable = isset($_GET['emm']) ? '1' : $enable;

    if (is_user_logged_in() || 'off' === $enable) {
        return $template;
    }


    $maintenance_mode = true;

    if (!$maintenance_mode) {
        return $template;
    }

    $new_template = locate_template(array('construction.php'));
    if ('' != $new_template) {
        return $new_template;
    }

    return $template;

}


/**
 * Escapeing
 */
if (!function_exists('awescapeing')) {
    function awescapeing($html)
    {
        return $html;
    }
}

/**
 * Remove Edit Page Link Form UnderConstruction Template
 */
function papr_add_custom_edit_menu_for_construction()
{
    global $wp_admin_bar;
    if (class_exists('Redux')) {
        if (is_page_template('construction.php')) {
            $wp_admin_bar->remove_menu('edit');
        }
    }
}

add_action('wp_before_admin_bar_render', 'papr_add_custom_edit_menu_for_construction');

/**
 * Papr Unique ID
 */
function papr_unique_id($prefix = '')
{
    static $id_counter = 0;
    if (function_exists('wp_unique_id')) {
        return wp_unique_id($prefix);
    }
    return $prefix . (string)++$id_counter;
}


/**
 * Set the excerpt length based on a theme option
 */
if ( ! function_exists('axil_excerpt_length')){
    function axil_excerpt_length($length)
    {
        $papr_options = Helper::axil_get_options();
        $custom_number = $papr_options['blog_content_number'];
        if ($custom_number != '') {
            return $length = intval($custom_number);
        } else {
            return $length;
        }
    }

    add_filter('excerpt_length', 'axil_excerpt_length', 999);
}


/**
 * Remove more or […] text from short post
 */
if (!function_exists('axil_excerpt_more')) {
    function axil_excerpt_more($more)
    {
        return '';
    }

    add_filter('excerpt_more', 'axil_excerpt_more');
}

////Exclude pages from WordPress Search
//if (!is_admin()) {
//    function papr_search_filter($query) {
//        if ($query->is_search) {
//            $query->set('post_type', 'post');
//        }
//        return $query;
//    }
//    add_filter('pre_get_posts','papr_search_filter');
//}

// Simply remove anything that looks like an archive title prefix ("Archive:", "Foo:", "Bar:").

add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});

add_action( 'wp_head', 'noscript_hide_preloader', 1 );
add_action( 'wp_body_open', 'preloader');

function noscript_hide_preloader(){
    // Hide preloader if js is disabled
    echo '<noscript><style>#preloader{display:none;}</style></noscript>';
}

function preloader(){
$papr_options   = Helper::axil_get_options();      
    // Preloader
    if ( $papr_options['preloader'] ) {
        if ( !empty( $papr_options['preloader_image']['url'] ) ) {
            $preloader_img = $papr_options['preloader_image']['url'];
            echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>'; 
        }else{          
            echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . Helper::get_img('papr-preloader.gif') . ');"></div>';
        }
    }      
}

/**
 * Style Switcher
 */
add_action('wp_body_open', 'axil_style_switcher' );
if (!function_exists('axil_style_switcher')) {
function axil_style_switcher()
    {
     $papr_options   = Helper::axil_get_options();   
        if (isset($papr_options['show_ld_switcher_form_user_end'])) {
            if ($papr_options['show_ld_switcher_form_user_end'] === 'on' || $papr_options['show_ld_switcher_form_user_end'] == 1) {
                echo '<div id="my_switcher">
                    <ul>
                        <li>
                            <a href="javascript: void(0);" data-theme="light"  class="setColor light">
                                <span title="Light Mode">' . esc_html__('Light', 'papr') . '</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" data-theme="dark"  class="setColor dark">
                                <span title="Dark Mode">' . esc_html__('Dark', 'papr') . '</span>
                            </a>
                        </li>
                    </ul>
                </div>';
            }
        }
    }
 }


 function papr_custom_logo_size() {
    global $papr_options;

    // Check and get width value
    $logo_width = isset($papr_options['logo_size_width']) && !empty($papr_options['logo_size_width']) 
        ? $papr_options['logo_size_width'] 
        : '170';

    // Check and get height value
    $logo_height = isset($papr_options['logo_size']) && !empty($papr_options['logo_size']) 
        ? $papr_options['logo_size'] 
        : '';

    // Generate dynamic CSS
    if (!empty($logo_width) || !empty($logo_height)) {
        echo '<style>
            .site-logo img, .brand-logo {';
        
        // Apply width if set
        if (!empty($logo_width)) {
            echo 'width: ' . esc_attr($logo_width) . 'px' . ';';
        } 
        
        // Apply height if set
        if (!empty($logo_height)) {
            echo 'height: ' . esc_attr($logo_height) . 'px' . ';';
        } 

        echo '}
        </style>';
    }
}
add_action('wp_head', 'papr_custom_logo_size');