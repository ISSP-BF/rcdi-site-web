<!-- Latest News section -->
<section class="blog-section home-news ">
    <div class="container<?php echo spicepress_container();?>">
        <?php
        $home_news_section_title = get_theme_mod('home_news_section_title', __('Latest News', 'spicepress'));
        $home_news_section_discription = get_theme_mod('home_news_section_discription', 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
        $home_meta_section_settings = get_theme_mod('home_meta_section_settings', true);
        $index_news_link = get_theme_mod('home_blog_more_btn_link', __('#', 'spicepress'));
        if (empty($index_news_link)) {
            $index_news_link = '#';
        }
        $index_more_btn = get_theme_mod('home_blog_more_btn', __('View More Posts', 'spicepress'));

        if (($home_news_section_title) || ($home_news_section_discription) != '') {
            ?>
            <!-- Section Title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header">
                        <?php if ($home_news_section_title) { ?>
                            <h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms">
                                <?php echo $home_news_section_title; ?>
                            </h1>
                        <?php } ?>
                        <div class="widget-separator"><span></span></div>
                        <?php if ($home_news_section_discription) { ?>
                            <p class="wow fadeInDown animated">
                                <?php echo $home_news_section_discription; ?>
                            </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- /Section Title -->
        <?php } ?>

        <div class="row blog-list-layout">
            <?php
            $post_display_count = get_theme_mod('spicepress_post_display_count', 2);

            $args = array('post_type' => 'post', 'posts_per_page' => $post_display_count, 'post__not_in' => get_option("sticky_posts"));
            query_posts($args);
            if (query_posts($args)) {
                ?><div class="col-md-12 col-sm-12 col-xs-12"><?php
                while (have_posts()):the_post(); {
                        ?>
                            <article class="post wow fadeInDown animated" data-wow-delay="0.4s">
                                <div class="media">
                                    <figure class="post-thumbnail thumb-width thumb-align-left"><?php $defalt_arg = array('class' => "img-responsive"); ?>
                                        <?php if (has_post_thumbnail()) { ?>
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', $defalt_arg); ?></a>
                                        <?php } ?>
                                    </figure>

                                    <div class="media-body">
                                        <?php if ($home_meta_section_settings == true) { ?>
                                            <div class="entry-meta">
                                                <span class="entry-date">
                                                    <a href="<?php echo get_month_link(get_post_time('Y'), get_post_time('m')); ?>"><time datetime=""><?php echo esc_html(get_the_date()); ?></time></a>
                                                </span>
                                            </div>
                                        <?php } ?>

                                        <header class="entry-header">
                                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php if ($home_meta_section_settings == true) { ?>
                                                <div class="entry-meta">
                                                    <span class="author"><?php _e('By', 'spicepress'); ?> <a rel="tag" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                                                    </span>
                                                    <?php
                                                    $cat_list = get_the_category_list();
                                                    if (!empty($cat_list)) {
                                                        ?>
                                                        <span class="cat-links"><?php _e('in', 'spicepress'); ?><a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a></span>
                                                        <?php
                                                    }

                                                    $tag_list = get_the_tag_list();
                                                    if (!empty($tag_list)) {
                                                        ?>
                                                        <span class="tag-links"><?php _e('Tag', 'spicepress'); ?> <?php the_tags('', ', ', ''); ?></span>
                                                    <?php }
                                                    ?>
                                                </div>
                                            <?php } ?>
                                        </header>
                                        <div class="entry-content">
                                            <?php the_excerpt(); ?>
                                            <p><a href="<?php the_permalink(); ?>" class="more-link"><?php echo get_theme_mod('home_news_button_title', __('Read More', 'spicepress')); ?></a></p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                        } endwhile;
                    ?></div><?php
                }
                ?>
        </div>

        <?php if (!empty($index_more_btn)): ?>
            <div class="row text-center view-more-posts-row">
                <div class="sm-callout-btn">
                    <a href="<?php echo $index_news_link; ?>" class="btn-small btn-default-dark business-view-more-post" <?php
            if (get_theme_mod('home_blog_more_btn_link_target', false) == true) {
                echo "target='_blank'";
            };
            ?>><?php echo get_theme_mod('home_blog_more_btn', __('View More Posts', 'spicepress')); ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- /Latest News Section -->
<div class="clearfix"></div>
