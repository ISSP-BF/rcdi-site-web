<?php
$portfolio_animation_speed = get_theme_mod('portfolio_animation_speed', 3000);
$isRTL = (is_rtl()) ? (bool) true : (bool) false;
$projectsettings = array('animationSpeed' => $portfolio_animation_speed, 'rtl' => $isRTL);

wp_register_script('spicepress-project', get_template_directory_uri() . '/js/front-page/project.js', array('jquery'));
wp_localize_script('spicepress-project', 'portfolio_settings', $projectsettings);
wp_enqueue_script('spicepress-project');
?>
<!-- Portfolio Section -->
<section class="portfolio-section">
    <div class="container<?php echo spicepress_container();?>">
        <?php
        $home_portfolio_section_title = get_theme_mod('home_portfolio_section_title', __('Our Portfolio', 'spicepress'));
        $home_portfolio_section_discription = get_theme_mod('home_portfolio_section_discription', 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
        ?>
        <!-- Section Title -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-header">
                    <h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms"><?php echo $home_portfolio_section_title; ?></h1>
                    <div class="widget-separator"><span></span></div>
                    <p class="wow fadeInDown animated"><?php echo $home_portfolio_section_discription; ?></p>
                </div>
            </div>
        </div>
        <!-- /Section Title -->		

        <!-- Item Scroll -->
        <div class="wow fadeInUp animated row" data-wow-delay="100ms" data-wow-duration="300ms">
            <div class="row">
                <div id="portfolio-carousel" class="owl-carousel owl-theme col-md-12 horizontal-nav">
                    <?php
                    $post_type = 'spicepress_portfolio';

                    $args = array(
                        'post_type' => $post_type,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'portfolio_categories',
                                'field' => 'id',
                                'terms' => get_theme_mod('portfolio_selected_category_id', 2),
                            //'operator' => 'NOT IN',
                            ),
                        ),
                        //'posts_per_page' => $project_setting['portfolio_list'],
                        'post_status' => 'publish');
                    $j = 1;
                    $portfolio_query = null;
                    $portfolio_query = new WP_Query($args);
                    if ($portfolio_query->have_posts()) {
                        while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                            $portfolio_title_description = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_title_description', true));
                            $portfolio_link = esc_url(get_post_meta(get_the_ID(), 'portfolio_link', true));
                            $portfolio_target = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_target', true));
                            ?>

                            <div class="item">					
                                <article class="post">
                                    <figure class="post-thumbnail">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $class = array('class' => 'img-responsive');
                                            the_post_thumbnail('', $class);
                                            $post_thumbnail_id = get_post_thumbnail_id();
                                            $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
                                        }
                                        ?>
                                        <div class="thumbnail-showcase-overlay">
                                            <div class="thumbnail-showcase-icons">
                                                <?php if (isset($post_thumbnail_url)) { ?>
                                                    <a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
                                                <?php } ?>
                                                <?php if (!empty($portfolio_link)) { ?>
                                                    <a href="<?php echo $portfolio_link; ?>" <?php
                                                    if (!empty($portfolio_target)) {
                                                        echo 'target="_blank"';
                                                    }
                                                    ?> class="hover_thumb"><i class="fa fa-link"></i></a>
        <?php } ?>
                                            </div>
                                        </div>
                                    </figure>
                                    <header class="entry-header">
                                        <h4 class="entry-title"><?php if (!empty($portfolio_link)) { ?>
                                                <a href="<?php echo $portfolio_link; ?>" <?php
                                                   if (!empty($portfolio_target)) {
                                                       echo 'target="_blank"';
                                                   }
                                                   ?> class="hover_thumb"><?php the_title(); ?></a>
                                    <?php } else the_title(); ?>
                                        </h4>
                                    </header>	
                                    <?php if (get_post_meta(get_the_ID(), 'portfolio_title_description', true)) {
                                        ?>
                                        <div class="entry-content">
                                            <p><?php echo get_post_meta(get_the_ID(), 'portfolio_title_description', true); ?></p>
                                        </div>
                            <?php } ?>
                                </article>
                            </div>
        <?php
        $j++;
    endwhile;
}
?>					
                </div>			
            </div>
        </div>
        <!-- /Item Scroll -->		
    </div>
</section>
<!-- /Portfolio Section -->