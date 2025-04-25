<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
?>
    <!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<?php
$papr_options = Helper::axil_get_options();
$popup_area = $papr_options['popup_area'];
$popup_whare_to_show = $papr_options['popup_whare_to_show'];

$themepfix = AXIL_THEME_FIX;
$page_template_fixed = get_post_meta(get_the_ID(), $themepfix . "_select_page_template_fixed", true);
$page_template_fixed_value = (isset($page_template_fixed) && 'yes' == $page_template_fixed) ? 'fixed-top' : '';


if (function_exists('wp_body_open')) {
    wp_body_open();
} else {
    do_action('wp_body_open');
}
?>
<div class="wrp">
    <!-- Main contents -->
<main class="main-content <?php echo esc_attr($page_template_fixed_value); ?>">
<?php


// Subscribe Popup
if (!empty($popup_area)) {
    if (is_front_page() && $popup_whare_to_show == 'home') {
        get_template_part('template-parts/header/popup', 'one');
    }
    if (is_single() && $popup_whare_to_show == 'posts') {
        get_template_part('template-parts/header/popup', 'one');
    }
    if (is_page() && $popup_whare_to_show == 'page') {
        get_template_part('template-parts/header/popup', 'one');
    }
    if ($popup_whare_to_show == 'everywhere') {
        get_template_part('template-parts/header/popup', 'one');
    }
}

get_template_part('template-parts/header/header', 'main');
