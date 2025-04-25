<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$papr_options = Helper::axil_get_options();
$axil_image_size = 'axil-size-md';
$content = Helper::get_current_post_content();
$content = wp_trim_words($content, $papr_options['blog_content_number']);
$content = "<p class='mid'>$content</p>";
$post_id = get_the_ID();
$author = $post->post_author;
$axil_post_or_page_cat = get_the_category($post_id);
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="media post-block post-block__mid m-b-xs-30">
        <?php Helper::get_generate_blog_thumbnail_image($post_id, $class = "m-r-xs-30", $axil_image_size); ?>
        <div class="media-body">
            <?php if ($papr_options['blog_cats'] && !empty($axil_post_or_page_cat)) { ?>
                <div class="post-cat-group m-b-xs-10">
                    <?php echo axil_get_the_category($post_id); ?>
                </div>
            <?php } ?>
            <h3 class="axil-post-title hover-line"><a href="<?php the_permalink(); ?>" class="entry-title"
                                                      rel="bookmark"><?php the_title(); ?></a></h3>

            <?php 
            $papr_options = Helper::axil_get_options();
        $formatted_post_date = get_the_date();
        $post_comment_num = number_format_i18n(get_comments_number());
        ?>
            <div class="post-metas caption-meta">
                <ul class="list-inline">
                    <?php if ($papr_options['blog_author_name']) { ?>
                        <li>
                            <span><?php esc_html_e('By', 'papr'); ?></span> <?php printf('<a href="%1$s"><span class="vcard author author_name"><span class="fn">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', $author))), get_the_author_meta('display_name', $author)); ?>
                        </li>
                    <?php } ?>
                    <?php if ($papr_options['blog_date']) { ?>
                        <li><i class="dot">.</i> <?php echo esc_attr($formatted_post_date); ?></li>
                    <?php } ?>

                    <?php if ($papr_options['blog_update_date']) { ?>
                        <li>
                            <i class="dot">.</i> <?php esc_html_e('Update:', 'papr'); ?> <?php echo get_post_modified_time(get_option('date_format') . ' ' . get_option('time_format'), false, null, true); ?>
                        </li>
                    <?php } ?>
                    <?php if ($papr_options['blog_comment_num']): ?>
                        <li class="axil-comments"><i class="fa fa-comments"
                                                     aria-hidden="true"></i> <?php echo wp_kses_post($post_comment_num); ?>
                        </li>
                    <?php endif; ?>
                    <?php if ($papr_options['blog_view'] && function_exists('axil_post_views')) { ?>
                        <li><?php echo axil_post_views('Views'); ?></li>
                    <?php } ?>
                    <?php if ($papr_options['blog_shares'] && function_exists('shared_counts')) { ?>
                        <li class="papr-meta-total-share post-grid-meta"><i class="feather icon-share-2"></i>
                            <?php
                            shared_counts()->front->display($location = 'papr-meta', $echo = true, $style = 'icon');
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>  
            <?php if ($papr_options['blog_content_display']) {
                the_excerpt();
            } ?>
        </div>
    </div>
</div>
