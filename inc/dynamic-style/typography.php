<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

/*-------------------------------------
INDEX
=======================================
#. Typography
-------------------------------------*/
$papr_options = Helper::axil_get_options();
$typo_body = $papr_options['typo_body'];
$typo_h1 = $papr_options['typo_h1'];
$typo_h2 = $papr_options['typo_h2'];
$typo_h3 = $papr_options['typo_h3'];
$typo_h4 = $papr_options['typo_h4'];
$typo_h5 = $papr_options['typo_h5'];
$typo_h6 = $papr_options['typo_h6'];
?>
<?php
/*-------------------------------------
#. Typography
---------------------------------------*/
?>
body, p, ul li {
font-family: '<?php echo esc_attr($typo_body['font-family']); ?>', sans-serif;
font-size: <?php echo esc_attr($typo_body['font-size']); ?>;
line-height: <?php echo esc_attr($typo_body['line-height']); ?>;
font-weight : <?php echo esc_attr($typo_body['font-weight']); ?>;
font-style: <?php echo empty($typo_body['font-style']) ? 'normal' : $typo_body['font-style']; ?>;

}
h1 {
font-family: '<?php echo esc_attr($typo_h1['font-family']); ?>', sans-serif;
font-size: <?php echo esc_attr($typo_h1['font-size']); ?>;
line-height: <?php echo esc_attr($typo_h1['line-height']); ?>;
font-weight : <?php echo esc_attr($typo_h1['font-weight']); ?>;
font-style: <?php echo empty($typo_h1['font-style']) ? 'normal' : $typo_h1['font-style']; ?>;
}

h2 {
font-family: '<?php echo esc_attr($typo_h2['font-family']); ?>', sans-serif;
font-size: <?php echo esc_attr($typo_h2['font-size']); ?>;
line-height: <?php echo esc_attr($typo_h2['line-height']); ?>;
font-weight : <?php echo esc_attr($typo_h2['font-weight']); ?>;
font-style: <?php echo empty($typo_h2['font-style']) ? 'normal' : $typo_h2['font-style']; ?>;
}

h3 {
font-family: '<?php echo esc_attr($typo_h3['font-family']); ?>', sans-serif;
font-size: <?php echo esc_attr($typo_h3['font-size']); ?>;
line-height: <?php echo esc_attr($typo_h3['line-height']); ?>;
font-weight : <?php echo esc_attr($typo_h3['font-weight']); ?>;
font-style: <?php echo empty($typo_h3['font-style']) ? 'normal' : $typo_h3['font-style']; ?>;
}

h4 {
font-family: '<?php echo esc_attr($typo_h4['font-family']); ?>', sans-serif;
font-size: <?php echo esc_attr($typo_h4['font-size']); ?>;
line-height: <?php echo esc_attr($typo_h4['line-height']); ?>;
font-weight : <?php echo esc_attr($typo_h4['font-weight']); ?>;
font-style: <?php echo empty($typo_h4['font-style']) ? 'normal' : $typo_h4['font-style']; ?>;
}
h5 {
font-family: '<?php echo esc_attr($typo_h5['font-family']); ?>', sans-serif;
font-size: <?php echo esc_attr($typo_h5['font-size']); ?>;
line-height: <?php echo esc_attr($typo_h5['line-height']); ?>;
font-weight : <?php echo esc_attr($typo_h5['font-weight']); ?>;
font-style: <?php echo empty($typo_h5['font-style']) ? 'normal' : $typo_h5['font-style']; ?>;
}
h6 {
font-family: '<?php echo esc_attr($typo_h6['font-family']); ?>', sans-serif;
font-size: <?php echo esc_attr($typo_h6['font-size']); ?>;
line-height: <?php echo esc_attr($typo_h6['line-height']); ?>;
font-weight : <?php echo esc_attr($typo_h6['font-weight']); ?>;
font-style: <?php echo empty($typo_h6['font-style']) ? 'normal' : $typo_h6['font-style']; ?>;
}
