<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$axil_socials = Helper::socials();
$papr_options = Helper::axil_get_options();
$axil_logos = Helper::axil_logos();
$axil_dark_logo = $axil_logos['axil_dark_logo'];
$axil_light_logo = $axil_logos['axil_light_logo'];
$axil_logo_symbol = $axil_logos['axil_logo_symbol'];
$header_top_menu_args = Helper::header_top_menu_args();
?>
<div class="header-top header-top__style-two bg-grey-dark-seven">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
                <?php if (has_nav_menu('headertop') && $papr_options['header_top_menu_args']) { ?>
                    <?php wp_nav_menu($header_top_menu_args); ?>
                <?php } ?>
                <!-- End of .header-top-nav -->
            </div>
            <div class="brand-logo-container col-md-4 text-center">
                <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="brand-logo" src="<?php echo esc_url($axil_light_logo); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
            </div>
            <!-- End of .brand-logo-container -->
            <div class="col-md-4">
                <?php if ($axil_socials): ?>
                    <ul class="ml-auto social-share header-top__social-share justify-content-end">
                        <?php foreach ($axil_socials as $axil_social): ?>
                            <li><a target="_blank" href="<?php echo esc_url($axil_social['url']); ?>">
                                <i class="fab <?php echo esc_attr($axil_social['icon']); ?>"></i></a></li>
                        <?php endforeach; ?>
                         <?php if ( $papr_options['social_rumble'] ): ?>
                                        <li>
                                            <a target="_blank" href="<?php echo esc_url($papr_options['social_rumble']); ?>">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            </li>
                                       <?php endif; ?> 
                                       <?php if ( $papr_options['social_person_pregnant'] ): ?>
                                        <li>
                                            <a target="_blank" href="<?php echo esc_url($papr_options['social_person_pregnant']); ?>">
                                             <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M192 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM120 383c-13.8-3.6-24-16.1-24-31V296.9l-4.6 7.6c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c15-24.9 40.3-41.5 68.7-45.6c4.1-.6 8.2-1 12.5-1h1.1 12.5H192c1.4 0 2.8 .1 4.1 .3c35.7 2.9 65.4 29.3 72.1 65l6.1 32.5c44.3 8.6 77.7 47.5 77.7 94.3v32c0 17.7-14.3 32-32 32H304 264v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V384h-8-8v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V383z"/></svg>
                                            </a>
                                            </li>
                                       <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->
</div>
<!-- End of .header-top -->
