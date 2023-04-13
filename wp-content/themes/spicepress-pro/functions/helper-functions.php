<?php
/**
 * Get Footer widgets
 */
//Container Setting For Page
function spicepress_container()
{
  if(get_theme_mod('page_container_setting','default')=='default')
{
 $container_width= " container_default";
}
elseif(get_theme_mod('page_container_setting','default')=='full_width_fluid')
{
 $container_width= "-fluid";
}
else
{
  $container_width= "-fluid streached";
}
return $container_width;
}

//Container Setting For Blog Post
function spicepress_blog_post_container()
{
  if(get_theme_mod('post_container_setting','default')=='default')
{
 $container_width= " container_default";
}
elseif(get_theme_mod('post_container_setting','default')=='full_width_fluid')
{
 $container_width= "-fluid";
}
else
{
  $container_width= "-fluid streached";
}
return $container_width;
}

//Conainer Setting For Single Post

function spicepress_single_post_container()
{
  if(get_theme_mod('single_post_container_setting','default')=='default')
{
 $container_width= " container_default";
}
elseif(get_theme_mod('single_post_container_setting','default')=='full_width_fluid')
{
 $container_width= "-fluid";
}
else
{
  $container_width= "-fluid streached";
}
return $container_width;
}

if (!function_exists('spicepress_footer_widget_area')) {

    /**
     * Get Footer Default Sidebar
     *
     * @param  string $sidebar_id   Sidebar Id..
     * @return void
     */
    function spicepress_footer_widget_area($sidebar_id) {

        if (is_active_sidebar($sidebar_id)) {
            dynamic_sidebar($sidebar_id);
        } elseif (current_user_can('edit_theme_options')) {

            global $wp_registered_sidebars;
            $sidebar_name = '';
            if (isset($wp_registered_sidebars[$sidebar_id])) {
                $sidebar_name = $wp_registered_sidebars[$sidebar_id]['name'];
            }
            ?>
            <div class="widget ast-no-widget-row">
                <h2 class='widget-title'><?php echo esc_html($sidebar_name); ?></h2>

                <p class='no-widget-text'>
                    <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'>
                        <?php esc_html_e('Click here to assign a widget for this area.', 'spicepress'); ?>
                    </a>
                </p>
            </div>
            <?php
        }
    }

}

/**
 * Function to get Footer Menu
 */
if (!function_exists('spicepress_footer_bar_menu')) {

    /**
     * Function to get Footer Menu
     *
     */
    function spicepress_footer_bar_menu() {

        ob_start();

        if (has_nav_menu('footer_menu')) {
            wp_nav_menu(
                    array(
                        'theme_location' => 'footer_menu',
                        'menu_class' => 'nav-menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 1,
                    )
            );
        } else {
            if (is_user_logged_in() && current_user_can('edit_theme_options')) {
                ?>
                <a href="<?php echo esc_url(admin_url('/nav-menus.php?action=locations')); ?>"><?php esc_html_e('Assign Footer Menu', 'spicepress'); ?></a>
                <?php
            }
        }

        return ob_get_clean();
    }

}

if (!function_exists('spicepress_widget_layout')):

    function spicepress_widget_layout() {

        $spicepress_footer_widget = get_theme_mod('footer_widgets_section', 3);
        switch ($spicepress_footer_widget) {
            case 1:
                get_template_part('inc/footer-widget/layout-1');
                break;

            case 2:
                get_template_part('inc/footer-widget/layout-2');
                break;

            case 3:
                get_template_part('inc/footer-widget/layout-3');
                break;

            case 4:
                get_template_part('inc/footer-widget/layout-4');
                break;

            case 5:
                get_template_part('inc/footer-widget/layout-5');
                break;

            case 6:
                get_template_part('inc/footer-widget/layout-6');
                break;

            case 7:
                get_template_part('inc/footer-widget/layout-7');
                break;

            case 8:
                get_template_part('inc/footer-widget/layout-8');
                break;

            case 9:
                get_template_part('inc/footer-widget/layout-9');
                break;
        }
    }

endif;

/* Footer Widget Layout section */
if (!function_exists('spicepress_footer_widget_layout_section')) {

    function spicepress_footer_widget_layout_section() {
        if (get_theme_mod('ftr_widgets_enable', true) === true):
            /**
             * Get Footer widgets
             */
            if (!function_exists('spicepress_footer_widget_area')) {

                /**
                 * Get Footer Default Sidebar
                 *
                 * @param  string $sidebar_id   Sidebar Id..
                 * @return void
                 */
                function spicepress_footer_widget_area($sidebar_id) {

                    if (is_active_sidebar($sidebar_id)) {
                        dynamic_sidebar($sidebar_id);
                    } elseif (current_user_can('edit_theme_options')) {

                        global $wp_registered_sidebars;
                        $sidebar_name = '';
                        if (isset($wp_registered_sidebars[$sidebar_id])) {
                            $sidebar_name = $wp_registered_sidebars[$sidebar_id]['name'];
                        }
                        ?>
                        <div class="widget ast-no-widget-row">
                            <h2 class='widget-title'><?php echo esc_html($sidebar_name); ?></h2>

                            <p class='no-widget-text'>
                                <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'>
                                    <?php esc_html_e('Click here to assign a widget for this area.', 'spicepress'); ?>
                                </a>
                            </p>
                        </div>
                        <?php
                    }
                }

            }
            /* Function for widget sectons */
            spicepress_widget_layout();
        /* Function for widget sectons */

        else:
            ?><style>
                .site-footer{
                    padding: 0px;
                }
            </style>
        <?php
        endif;
    }

}
/* Footer Widget Layout section */

/* Footer Bar layout section */
if (!function_exists('spicepress_footer_bar_section')) {

    function spicepress_footer_bar_section() {
        if (get_theme_mod('ftr_bar_enable', true) == true):
            echo '<div class="row">';
            $advance_footer_bar_section = get_theme_mod('advance_footer_bar_section', 1);
            switch ($advance_footer_bar_section) {
                case 1:
                    get_template_part('inc/footer-bar/layout-1');
                    break;

                case 2:
                    get_template_part('inc/footer-bar/layout-2');
                    break;
            }
        endif;
        echo '</div>';
    }

}
/* Footer Bar layout section */

/**
 * Functions for services
 */
function spicepress_advance_service_fn() {
    $service_data = get_theme_mod('spicepress_service_content');
    if (empty($service_data)) {
        $service_data = json_encode(array(
            array(
                'icon_value' => 'fa-headphones',
                'title' => esc_html__('Unlimited Support', 'spicepress'),
                'text' => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'spicepress'),
                'choice' => 'customizer_repeater_icon',
                'link' => '#',
                'open_new_tab' => 'yes',
                'id' => 'customizer_repeater_56d7ea7f40b56',
            ),
            array(
                'icon_value' => 'fa-mobile',
                'title' => esc_html__('Pixel Perfect Design', 'spicepress'),
                'text' => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'spicepress'),
                'choice' => 'customizer_repeater_icon',
                'link' => '#',
                'open_new_tab' => 'yes',
                'id' => 'customizer_repeater_56d7ea7f40b66',
            ),
            array(
                'icon_value' => 'fa fa-cogs',
                'title' => esc_html__('Powerful Options', 'spicepress'),
                'text' => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'spicepress'),
                'choice' => 'customizer_repeater_icon',
                'link' => '#',
                'open_new_tab' => 'yes',
                'id' => 'customizer_repeater_56d7ea7f40b86',
            ),
            array(
                'icon_value' => 'fa-android',
                'title' => esc_html__('App Development', 'spicepress'),
                'text' => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'spicepress'),
                'choice' => 'customizer_repeater_icon',
                'link' => '#',
                'open_new_tab' => 'yes',
                'id' => 'customizer_repeater_56d7ea7f40b88',
            ),
            array(
                'icon_value' => 'fa-code',
                'title' => esc_html__('Unique and Clean', 'spicepress'),
                'text' => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'spicepress'),
                'choice' => 'customizer_repeater_icon',
                'link' => '#',
                'open_new_tab' => 'yes',
                'id' => 'customizer_repeater_56d7ea7f40b89',
            ),
            array(
                'icon_value' => 'fa-users',
                'title' => esc_html__('Satisfied Clients', 'spicepress'),
                'text' => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'spicepress'),
                'choice' => 'customizer_repeater_icon',
                'link' => '#',
                'open_new_tab' => 'yes',
                'id' => 'customizer_repeater_56d7ea7f40b91',
            ),
        ));
    }
    $spicepress_service_section_title = get_theme_mod('home_service_section_title', __('Our Services', 'spicepress'));
    $spicepress_service_section_discription = get_theme_mod('home_service_section_discription', __('Why Choose Us', 'spicepress'));

    if (get_page_template_slug() == 'template/template-service.php') {
        $spicepress_service_layout = 1;
    } elseif (get_page_template_slug() == 'template/template-service-2.php') {
        $spicepress_service_layout = 2;
    } elseif (get_page_template_slug() == 'template/template-service-3.php') {
        $spicepress_service_layout = 3;
    } elseif (get_page_template_slug() == 'template/template-service-4.php') {
        $spicepress_service_layout = 4;
    } else {
        $spicepress_service_layout = get_theme_mod('home_serive_design_layout', 1);
    }
}

add_action('spicepress_advance_service', 'spicepress_advance_service_fn');

class Webriti_pagination {

    function Webriti_page($curpage, $post_type_data, $total, $posts_per_page) {
        if(!is_rtl()){$pag_icon_next='right';}else{$pag_icon_next='left';}
        if(is_rtl()){$pag_icon_prev='right';}else{$pag_icon_prev='left';}
        $count = $total - $posts_per_page;
        if ($count <= 0) {
            return;
        } else {
            ?>
            <div class="sm-blog-pagi projct-pagination">
                <?php
                if ($curpage != 1) {
                    echo '<a href="' . get_pagenum_link(($curpage - 1 > 0 ? $curpage - 1 : 1)) . '"><i class="fa fa-angle-double-'.$pag_icon_prev.' "></i></a>';
                }
                ?>
                <?php
                for ($i = 1; $i <= $post_type_data->max_num_pages; $i++) {
                    echo '<a class="' . ($i == $curpage ? 'active ' : '') . '" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
                }
                if ($i - 1 != $curpage) {
                echo '<a class="" href="' . get_pagenum_link(($curpage + 1 <= $post_type_data->max_num_pages ? $curpage + 1 : $post_type_data->max_num_pages)) . '"><i class="fa fa-angle-double-'.$pag_icon_next.' "></i></a>';
                }
                ?>
            </div>
            <?php
        }
    }

}

if (!function_exists('testimonial_design')) {

    function testimonial_design($design_id) {
        //echo get_theme_mod('home_testimonial_design_layout', 1);
        $testimonial_options = get_theme_mod('spicepress_testimonial_content');
        if (empty($testimonial_options)) {

            if (get_theme_mod('home_testimonial_title') != '' || get_theme_mod('home_testimonial_designation') != '' || get_theme_mod('home_testimonial_thumb') != '' || get_theme_mod('home_testimonial_desc') != '') {

                $home_testimonial_title = get_theme_mod('home_testimonial_title');
                $home_testimonial_desc = get_theme_mod('home_testimonial_desc');
                $designation = get_theme_mod('designation');
                $home_testimonial_thumb = get_theme_mod('home_testimonial_thumb');

                $testimonial_options = json_encode(array(
                    array(
                        'title' => !empty($home_testimonial_title) ? $home_testimonial_title : 'Alice Culan',
                        'text' => !empty($home_testimonial_desc) ? $home_testimonial_desc : 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                        'designation' => !empty($designation) ? $designation : 'UI Developer',
                        'link' => '#',
                        'image_url' => !empty($home_testimonial_thumb) ? $home_testimonial_thumb : get_template_directory_uri() . '/images/item7.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_56d7ea7f40b51',
                    ),
                ));
            }
        }

        if (empty($testimonial_options)) {
            $testimonial_options = json_encode(array(
                array(
                    'title' => 'Alice Culan',
                    'text' => 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                    'designation' => __('UI Developer', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/item7.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b88',
                ),
                array(
                    'title' => 'Bella Swan',
                    'text' => 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                    'designation' => __('Manager', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/item8.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b89',
                ),
                array(
                    'title' => 'Jenifer Doe',
                    'text' => 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                    'designation' => __('Designer', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/item9.jpg',
                    'id' => 'customizer_repeater_56d7ea8f40b98',
                    'open_new_tab' => 'no',
                ),
            ));
        }


        $testimonial_animation = get_theme_mod('testimonial_animation', '');
        $testimonial_animation_speed = get_theme_mod('testimonial_animation_speed', 3000);
        $testimonial_smooth_speed = get_theme_mod('testimonial_smooth_speed', 1000);
        $slide_items = get_theme_mod('home_testimonial_slide_item', 1);
        $testimonial_nav_style = get_theme_mod('testimonial_nav_style', 'bullets');
        $isRTL = (is_rtl()) ? (bool) true : (bool) false;
        $testimonialsettings = array('testimonial_nav_style' => $testimonial_nav_style, 'smoothSpeed' => $testimonial_smooth_speed, 'slide_items' => $slide_items, 'design_id' => '#' . $design_id, 'animation' => $testimonial_animation, 'animationSpeed' => $testimonial_animation_speed, 'rtl' => $isRTL);


        wp_register_script('spicepress-testimonial', get_template_directory_uri() . '/js/front-page/testimonial.js', array('jquery'));
        wp_localize_script('spicepress-testimonial', 'testimonial_settings', $testimonialsettings);
        wp_enqueue_script('spicepress-testimonial');



        $testimonial_carousel5=array('testimonial-carousel5');
        $testimonial_callout_background = get_theme_mod('testimonial_callout_background', '');
        if ($testimonial_callout_background != '') {
            ?>
            <section class="testimonial-section <?php if(in_array($design_id,$testimonial_carousel5)) echo 'testimonial5';?>" style="background-image:url('<?php echo esc_url($testimonial_callout_background); ?>'); background-repeat: no-repeat; background-position: top left;">
            <?php } else { ?>
                <section class="testimonial-section <?php if(in_array($design_id,$testimonial_carousel5)) echo 'testimonial5';?>">
                    <?php
                }
                $testimonial_overlay_section_color = get_theme_mod('testimonial_overlay_section_color', 'rgba(0,0,0,0.85)');
                $testimonial_image_overlay = get_theme_mod('testimonial_image_overlay', true);
                ?>
                <div class="overlay"<?php if ($testimonial_image_overlay != false) { ?>style="background-color:<?php
                    echo $testimonial_overlay_section_color;
                }
                ?>">
                    <div class="container<?php echo spicepress_container();?>">
                        <?php
                        $home_testimonial_section_title = get_theme_mod('home_testimonial_section_title', __('What our clients say', 'spicepress'));
                        $home_testimonial_section_discription = get_theme_mod('home_testimonial_section_discription', 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
                        ?>

                        <?php if ($home_testimonial_section_title != '' || $home_testimonial_section_discription != '') { ?>
                            <!-- Section Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-header">
                                        <h1 class="white wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="500ms">
                                            <?php echo esc_attr($home_testimonial_section_title); ?>
                                        </h1>
                                        <div class="widget-separator"><span></span></div>
                                        <p class="white wow fadeInDown animated">
                                            <?php echo esc_attr($home_testimonial_section_discription); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- /Section Title -->
                        <!-- Testimonial -->
                        <div class="row">
                            <div id="<?php echo $design_id; ?>" class="owl-carousel owl-theme col-md-12">
                                <?php
                                $testimonial_options = json_decode($testimonial_options);
                                if ($testimonial_options != '') {
                                    $allowed_html = array(
                                        'br' => array(),
                                        'em' => array(),
                                        'strong' => array(),
                                        'b' => array(),
                                        'i' => array(),
                                    );

                                    foreach ($testimonial_options as $testimonial_iteam) {

                                        $title = !empty($testimonial_iteam->title) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->title, 'Testimonial section') : '';
                                        $test_desc = !empty($testimonial_iteam->text) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->text, 'Testimonial section') : '';
                                        $test_link = !empty($testimonial_iteam->link) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->link, 'Testimonial section') : '';
                                        $open_new_tab = $testimonial_iteam->open_new_tab;

                                        $designation = !empty($testimonial_iteam->designation) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->designation, 'Testimonial section') : '';

                                        $testimonial_image = !empty($testimonial_iteam->image_url) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->image_url, 'Testimonial section') : '';
                                        ?>
                                        <div class="item <?php if(in_array($design_id,$testimonial_carousel5)): echo 'col-md-12';endif;?>">
                                            <article class="testmonial-block <?php
                                            if (in_array($design_id, array('testimonial-carousel3', 'testimonial-carousel4'))) {
                                                echo 'text-center';
                                            }
                                            ?>">
                                            <?php if(in_array($design_id,$testimonial_carousel5)): echo '<div class="col-lg-4">';endif;?>
                                                <figure class="avatar">
                                                    <?php if ($test_link != '') { ?>
                                                        <a href="<?php echo $test_link; ?>" <?php
                                                        if ($open_new_tab == 'yes') {
                                                            echo 'target="_blank"';
                                                        }
                                                        ?>>
                                                           <?php } ?>
                                                           <?php if ($testimonial_image != '') { ?>
                                                            <img alt="img" class="img-responsive img-circle" src="<?php echo $testimonial_image; ?>" draggable="false">
                                                        <?php } ?>
                                                        <?php if ($test_link != '') { ?>
                                                        </a>
                                                    <?php } ?>
                                                </figure>
                                                <?php
                                                if(in_array($design_id,$testimonial_carousel5)): echo '</div>';endif;

                                                if (in_array($design_id, array('testimonial-carousel3', 'testimonial-carousel4'))): ?>
                                                <h4> <?php if ($test_link != '') { ?> <a href="<?php echo $test_link; ?>" <?php
                                                        if ($open_new_tab == 'yes') {
                                                            echo 'target="_blank"';
                                                        }
                                                        ?>> <?php } ?> <?php echo $title; ?> <?php if ($test_link != '') { ?> </a> <?php } ?> <?php if ($designation != '') { ?> - <span class="designation"><?php echo $designation; ?></span> <?php } ?>
                                                </h4>
                                                <?php endif;
                                                if(in_array($design_id,$testimonial_carousel5)): echo '<div class="col-lg-8 testimonial-text">';endif;?>
                                                <div class="entry-content">
                                                    <p class="text-white"><?php echo wp_kses(html_entity_decode($test_desc), $allowed_html); ?></p>
                                                </div>
                                                <?php
                                                if (in_array($design_id, array('testimonial-carousel2','testimonial-carousel5'))): ?>
                                                    <h4> <?php if ($test_link != '') { ?> <a href="<?php echo $test_link; ?>" <?php
                                                            if ($open_new_tab == 'yes') {
                                                                echo 'target="_blank"';
                                                            }
                                                            ?>> <?php } ?> <?php echo $title; ?> <?php if ($test_link != '') { ?> </a> <?php } ?> <?php if ($designation != '') { ?> - <span class="designation"><?php echo $designation; ?></span> <?php } ?>
                                                    </h4>
                                                <?php endif;
                                                if(in_array($design_id,$testimonial_carousel5)): echo '</div>';endif;?>
                                            </article>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /Testimonial -->

                    </div>
                </div>
            </section>
            <!-- /Testimonial Section -->
            <div class="clearfix"></div><?php
        }

    }

    if (!function_exists('testimonial_design_default')) {

        function testimonial_design_default() {
            $testimonial_options = get_theme_mod('spicepress_testimonial_content');

            if (empty($testimonial_options)) {

                if (get_theme_mod('home_testimonial_title') != '' || get_theme_mod('home_testimonial_designation') != '' || get_theme_mod('home_testimonial_thumb') != '' || get_theme_mod('home_testimonial_desc') != '') {

                    $home_testimonial_title = get_theme_mod('home_testimonial_title');
                    $home_testimonial_desc = get_theme_mod('home_testimonial_desc');
                    $designation = get_theme_mod('designation');
                    $home_testimonial_thumb = get_theme_mod('home_testimonial_thumb');

                    $testimonial_options = json_encode(array(
                        array(
                            'title' => !empty($home_testimonial_title) ? $home_testimonial_title : 'Alice Culan',
                            'text' => !empty($home_testimonial_desc) ? $home_testimonial_desc : 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                            'designation' => !empty($designation) ? $designation : 'UI Developer',
                            'link' => '#',
                            'image_url' => !empty($home_testimonial_thumb) ? $home_testimonial_thumb : get_template_directory_uri() . '/images/item7.jpg',
                            'open_new_tab' => 'no',
                            'id' => 'customizer_repeater_56d7ea7f40b51',
                        ),
                    ));
                }
            }

            if (empty($testimonial_options)) {
                $testimonial_options = json_encode(array(
                    array(
                        'title' => 'Alice Culan',
                        'text' => 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                        'designation' => __('UI Developer', 'spicepress'),
                        'link' => '#',
                        'image_url' => get_template_directory_uri() . '/images/item7.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_56d7ea7f40b88',
                    ),
                    array(
                        'title' => 'Bella Swan',
                        'text' => 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                        'designation' => __('Manager', 'spicepress'),
                        'link' => '#',
                        'image_url' => get_template_directory_uri() . '/images/item8.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_56d7ea7f40b89',
                    ),
                    array(
                        'title' => 'Jenifer Doe',
                        'text' => 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                        'designation' => __('Designer', 'spicepress'),
                        'link' => '#',
                        'image_url' => get_template_directory_uri() . '/images/item9.jpg',
                        'id' => 'customizer_repeater_56d7ea8f40b98',
                        'open_new_tab' => 'no',
                    ),
                ));
            }

            $testimonial_animation = get_theme_mod('testimonial_animation', '');
            $testimonial_animation_speed = get_theme_mod('testimonial_animation_speed', 3000);
            $design_id = '#testimonial-carousel';
            $slide_items = get_theme_mod('home_testimonial_slide_item', 1);
            $testimonial_nav_style = get_theme_mod('testimonial_nav_style', 'bullets');
            $testimonial_smooth_speed = get_theme_mod('testimonial_smooth_speed', 1000);

            $isRTL = (is_rtl()) ? (bool) true : (bool) false;
            $testimonialsettings = array('testimonial_nav_style' => $testimonial_nav_style, 'smoothSpeed' => $testimonial_smooth_speed, 'slide_items' => $slide_items, 'design_id' => $design_id, 'animation' => $testimonial_animation, 'animationSpeed' => $testimonial_animation_speed, 'rtl' => $isRTL);

            wp_register_script('spicepress-testimonial', get_template_directory_uri() . '/js/front-page/testimonial.js', array('jquery'));
            wp_localize_script('spicepress-testimonial', 'testimonial_settings', $testimonialsettings);         wp_enqueue_script('spicepress-testimonial');


            $testimonial_callout_background = get_theme_mod('testimonial_callout_background', '');
            if ($testimonial_callout_background != '') {
                ?>
                <section class="testimonial-section" style="background-image:url('<?php echo esc_url($testimonial_callout_background); ?>'); background-repeat: no-repeat; background-position: top left;">
                <?php } else { ?>
                    <section class="testimonial-section">
                        <?php
                    }
                    $testimonial_overlay_section_color = get_theme_mod('testimonial_overlay_section_color', 'rgba(0,0,0,0.85)');
                    $testimonial_image_overlay = get_theme_mod('testimonial_image_overlay', true);
                    ?>
                    <div class="overlay"<?php if ($testimonial_image_overlay != false) { ?>style="background-color:<?php
                        echo $testimonial_overlay_section_color;
                    }
                    ?>">
                        <div class="container<?php echo spicepress_container();?>">
                            <?php
                            $home_testimonial_section_title = get_theme_mod('home_testimonial_section_title', __('What our clients say', 'spicepress'));
                            $home_testimonial_section_discription = get_theme_mod('home_testimonial_section_discription', 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
                            ?>

                            <?php if ($home_testimonial_section_title != '' || $home_testimonial_section_discription != '') { ?>
                                <!-- Section Title -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-header">
                                            <h1 class="white wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="500ms">
                                                <?php echo esc_attr($home_testimonial_section_title); ?>
                                            </h1>
                                            <div class="widget-separator"><span></span></div>
                                            <p class="white wow fadeInDown animated">
                                                <?php echo esc_attr($home_testimonial_section_discription); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- /Section Title -->
                            <!-- Testimonial -->
                            <div class="row">
                                <div id="testimonial-carousel" class="owl-carousel owl-theme col-md-12">
                                    <?php
                                    $testimonial_options = json_decode($testimonial_options);
                                    if ($testimonial_options != '') {
                                        $allowed_html = array(
                                            'br' => array(),
                                            'em' => array(),
                                            'strong' => array(),
                                            'b' => array(),
                                            'i' => array(),
                                        );

                                        foreach ($testimonial_options as $testimonial_iteam) {

                                            $title = !empty($testimonial_iteam->title) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->title, 'Testimonial section') : '';
                                            $test_desc = !empty($testimonial_iteam->text) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->text, 'Testimonial section') : '';
                                            $test_link = !empty($testimonial_iteam->link) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->link, 'Testimonial section') : '';
                                            $open_new_tab = $testimonial_iteam->open_new_tab;

                                            $designation = !empty($testimonial_iteam->designation) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->designation, 'Testimonial section') : '';

                                            $testimonial_image = !empty($testimonial_iteam->image_url) ? apply_filters('spicepress_translate_single_string', $testimonial_iteam->image_url, 'Testimonial section') : '';
                                            ?>
                                            <div class="item">
                                                <div class="media testmonial-area">
                                                    <?php $default_arg = array('class' => "img-circle"); ?>
                                                    <div class="author-box">
                                                        <?php if ($test_link != '') { ?>
                                                            <a href="<?php echo $test_link; ?>" <?php
                                                            if ($open_new_tab == 'yes') {
                                                                echo 'target="_blank"';
                                                            }
                                                            ?>>
                                                               <?php } ?>
                                                               <?php if ($testimonial_image != '') { ?>
                                                                <img alt="img" class="img-responsive img-circle" src="<?php echo $testimonial_image; ?>" draggable="false">
                                                            <?php } ?>
                                                            <?php if ($test_link != '') { ?>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="description-box">
                                                            <div class="author-description">
                                                                <p><?php echo wp_kses(html_entity_decode($test_desc), $allowed_html); ?></p>
                                                            </div>
                                                        </div>
                                                        <h4 class="name"> <?php if ($test_link != '') { ?> <a href="<?php echo $test_link; ?>" <?php
                                                                if ($open_new_tab == 'yes') {
                                                                    echo 'target="_blank"';
                                                                }
                                                                ?>> <?php } ?> <?php echo $title; ?> <?php if ($test_link != '') { ?> </a> <?php } ?> <?php if ($designation != '') { ?> - <span class="designation"><?php echo $designation; ?></span> <?php } ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- /Testimonial -->

                        </div>
                    </div>
                </section>
                <!-- /Testimonial Section -->
                <div class="clearfix"></div>
                <?php
            }

        }
        /**
         * Team default design
         */
        if (!function_exists('team_design_default')) {

            function team_design_default() {
                ?>
                <section class="homepage-team-section">
                    <div class="container<?php echo spicepress_container();?>">

                        <?php
                        $home_team_section_title = get_theme_mod('home_team_section_title', __('Meet The Team', 'spicepress'));
                        $home_team_section_discription = get_theme_mod('home_team_section_discription', 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
                        $team_options = get_theme_mod('spicepress_team_content');
                        if (($home_team_section_title) || ($home_team_section_discription) != '') {
                            ?>
                            <!-- Section Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-header">
                                        <?php if ($home_team_section_title) { ?>
                                            <h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms">
                                                <?php echo $home_team_section_title; ?>
                                            </h1>
                                        <?php } ?>
                                        <div class="widget-separator"><span></span></div>
                                        <?php if ($home_team_section_discription) { ?>
                                            <p class="wow fadeInDown animated">
                                                <?php echo $home_team_section_discription; ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /Section Title -->
                        <?php } ?>

                        <!-- Team Area -->
                        <div class="row">
                            <?php
                            $team_options = json_decode($team_options);
                            if ($team_options != '') {
                                foreach ($team_options as $team_item) {


                                    $image = !empty($team_item->image_url) ? apply_filters('spicepress_translate_single_string', $team_item->image_url, 'Team section') : '';
                                    $title = !empty($team_item->title) ? apply_filters('spicepress_translate_single_string', $team_item->title, 'Team section') : '';
                                    $subtitle = !empty($team_item->subtitle) ? apply_filters('spicepress_translate_single_string', $team_item->subtitle, 'Team section') : '';
                                    $link = !empty($team_item->link) ? apply_filters('spicepress_translate_single_string', $team_item->link, 'Team section') : '';
                                    $open_new_tab = $team_item->open_new_tab;
                                    ?>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="team-area wow fadeInDown animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
                                            <div class="team-image">
                                                <?php if (!empty($image)) : ?>
                                                    <?php
                                                    if (!empty($link)) :
                                                        $link_html = '<a href="' . esc_url($link) . '"';
                                                        if (function_exists('spicepress_is_external_url')) {
                                                            $link_html .= spicepress_is_external_url($link);
                                                        }
                                                        $link_html .= '>';
                                                        echo wp_kses_post($link_html);
                                                    endif;
                                                    echo '<img class="img" src="' . esc_url($image) . '"';
                                                    if (!empty($title)) {
                                                        echo 'alt="' . esc_attr($title) . '" title="' . esc_attr($title) . '"';
                                                    }
                                                    echo '/>';
                                                    if (!empty($link)) {
                                                        echo '</a>';
                                                    }
                                                    ?>
                                                <?php endif; ?>

                                                <div class="team-showcase-overlay">
                                                    <div class="team-showcase-overlay-inner">

                                                        <div class="team-showcase-icons">
                                                            <?php
                                                            if (!empty($team_item->social_repeater)) :
                                                                $icons = html_entity_decode($team_item->social_repeater);
                                                                $icons_decoded = json_decode($icons, true);
                                                                if (!empty($icons_decoded)) :
                                                                    ?>
                                                                    <?php
                                                                    foreach ($icons_decoded as $value) {
                                                                        $social_icon = !empty($value['icon']) ? apply_filters('spicepress_translate_single_string', $value['icon'], 'Team section') : '';
                                                                        $social_link = !empty($value['link']) ? apply_filters('spicepress_translate_single_string', $value['link'], 'Team section') : '';

                                                                        if (!empty($social_icon)) {
                                                                            ?>


                                                                            <a <?php
                                                                            if ($open_new_tab == 'yes') {
                                                                                echo 'target="_blank"';
                                                                            }
                                                                            ?> href="<?php echo esc_url($social_link); ?>" class="btn btn-just-icon btn-simple"><i class="fa <?php echo esc_attr($social_icon); ?> "></i></a>

                                                                            <?php
                                                                        }
                                                                    }
                                                                endif;
                                                            endif;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="team-caption"><?php if (!empty($title)) : ?>

                                                    <?php if (!empty($link)) : ?>
                                                        <a href="<?php echo $link ?>" <?php
                                                        if ($open_new_tab == 'yes') {
                                                            echo 'target="_blank"';
                                                        }
                                                        ?>>
                                                           <?php endif; ?>
                                                        <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                                                        <?php if (!empty($link)) : ?>
                                                        </a>
                                                    <?php endif; ?>

                                                <?php endif; ?><?php if (!empty($subtitle)) : ?>
                                                    <h6 class="category text-muted"><?php echo esc_html($subtitle); ?></h6>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                $image = array('team1.jpg', 'team2.jpg', 'team3.jpg', 'team4.jpg');
                                $name = array('John Doe', 'Sarah Culan', 'Chao Kang', 'Megan Sheryl');
                                for ($i = 0; $i <= 3; $i++) {
                                    ?>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="team-area wow fadeInDown animated" data-wow-delay="0.4s">
                                            <div class="team-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/team/<?php echo $image[$i]; ?>" class="img" alt="img">
                                                <div class="team-showcase-overlay">
                                                    <div class="team-showcase-overlay-inner">
                                                        <div class="team-showcase-icons">
                                                            <a href="#" title="Facebook" class="hover_thumb"><i class="fa fa-facebook"></i></a>
                                                            <a href="#" title="Twitter" class="hover_thumb"><i class="fa fa-twitter"></i></a>
                                                            <a href="#" title="Linkedin" class="hover_thumb"><i class="fa fa-linkedin"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="team-caption"><h4><?php echo $name[$i]; ?></h4><h6><?php esc_attr_e('Developer', 'spicepress'); ?></h6></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- /Team Area -->
                    </div>
                </section>
                <div class="clearfix"></div>
                <?php
            }

        }

        /**
         * Team design
         */
        if (!function_exists('team_design')) {

            function team_design($design_class = '') {

                if ($design_class == 'team4') {

                }

                $overlay_start_wrapper = ($design_class == 'team4') ? '<div class="overlay">' : '';
                $overlay_end_wrapper = ($design_class == 'team4') ? '</div>' : '';

                $team_animation_speed = get_theme_mod('team_animation_speed', 1500);
                $team_nav_style = get_theme_mod('team_nav_style', 'bullets');
                $team_smooth_speed = get_theme_mod('team_smooth_speed', 1000);
                $isRTL = (is_rtl()) ? (bool) true : (bool) false;
                $teamsettings = array('team_nav_style' => $team_nav_style, 'smoothSpeed' => $team_smooth_speed, 'animationSpeed' => $team_animation_speed, 'rtl' => $isRTL);

                wp_register_script('spicepress-team', get_template_directory_uri() . '/js/front-page/team.js', array('jquery'));
                wp_localize_script('spicepress-team', 'team_settings', $teamsettings);
                wp_enqueue_script('spicepress-team');
                ?>
                <!--Team Section-->
                <section class="section-module team-mambers <?php echo $design_class; ?>">
                    <div class="container<?php echo spicepress_container();?>">
                        <?php
                        $home_team_section_title = get_theme_mod('home_team_section_title', __('Meet The Team', 'spicepress'));
                        $home_team_section_discription = get_theme_mod('home_team_section_discription', 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
                        $team_options = get_theme_mod('spicepress_team_content');
                        if (empty($team_options)) {
                            $team_options = json_encode(array(
                                array(
                                    'image_url' => get_template_directory_uri() . '/images/team1.jpg',
                                    'title' => 'John Doe',
                                    'subtitle' => esc_html__('Developer', 'spicepress'),
                                    'text' => 'Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.',
                                    'open_new_tab' => 'no',
                                    'id' => 'customizer_repeater_56d7ea7f40c56',
                                    'social_repeater' => json_encode(
                                            array(
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb908674e06',
                                                    'link' => 'facebook.com',
                                                    'icon' => 'fa-facebook',
                                                ),
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb9148530fc',
                                                    'link' => 'twitter.com',
                                                    'icon' => 'fa-twitter',
                                                ),
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb9150e1e89',
                                                    'link' => 'linkedin.com',
                                                    'icon' => 'fa-linkedin',
                                                ),
                                            )
                                    ),
                                ),
                                array(
                                    'image_url' => get_template_directory_uri() . '/images/team2.jpg',
                                    'title' => 'Sarah Culan',
                                    'subtitle' => esc_html__('Developer', 'spicepress'),
                                    'text' => 'Craft beer salvia celiac mlkshk. Pinterest celiac tumblr, portland salvia skateboard cliche thundercats. Tattooed chia austin hell.',
                                    'open_new_tab' => 'no',
                                    'id' => 'customizer_repeater_56d7ea7f40c66',
                                    'social_repeater' => json_encode(
                                            array(
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb9155a1072',
                                                    'link' => 'facebook.com',
                                                    'icon' => 'fa-facebook',
                                                ),
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb9160ab683',
                                                    'link' => 'twitter.com',
                                                    'icon' => 'fa-twitter',
                                                ),
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb916ddffc9',
                                                    'link' => 'linkedin.com',
                                                    'icon' => 'fa-linkedin',
                                                ),
                                            )
                                    ),
                                ),
                                array(
                                    'image_url' => get_template_directory_uri() . '/images/team3.jpg',
                                    'title' => 'Chao Kang',
                                    'subtitle' => esc_html__('Developer', 'spicepress'),
                                    'text' => 'Pok pok direct trade godard street art, poutine fam typewriter food truck narwhal kombucha wolf cardigan butcher whatever pickled you.',
                                    'open_new_tab' => 'no',
                                    'id' => 'customizer_repeater_56d7ea7f40c76',
                                    'social_repeater' => json_encode(
                                            array(
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb917e4c69e',
                                                    'link' => 'facebook.com',
                                                    'icon' => 'fa-facebook',
                                                ),
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb91830825c',
                                                    'link' => 'twitter.com',
                                                    'icon' => 'fa-twitter',
                                                ),
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb918d65f2e',
                                                    'link' => 'linkedin.com',
                                                    'icon' => 'fa-linkedin',
                                                ),
                                            )
                                    ),
                                ),
                                array(
                                    'image_url' => get_template_directory_uri() . '/images/team4.jpg',
                                    'title' => 'Megan Sheryl',
                                    'subtitle' => esc_html__('Developer', 'spicepress'),
                                    'text' => 'Small batch vexillologist 90\'s blue bottle stumptown bespoke. Pok pok tilde fixie chartreuse, VHS gluten-free selfies wolf hot.',
                                    'open_new_tab' => 'no',
                                    'id' => 'customizer_repeater_56d7ea7f40c86',
                                    'social_repeater' => json_encode(
                                            array(
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb925cedcb2',
                                                    'link' => 'facebook.com',
                                                    'icon' => 'fa-facebook',
                                                ),
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb92615f030',
                                                    'link' => 'twitter.com',
                                                    'icon' => 'fa-twitter',
                                                ),
                                                array(
                                                    'id' => 'customizer-repeater-social-repeater-57fb9266c223a',
                                                    'link' => 'linkedin.com',
                                                    'icon' => 'fa-linkedin',
                                                ),
                                            )
                                    ),
                                ),
                            ));
                        }

                        if (($home_team_section_title) || ($home_team_section_discription) != '') {
                            ?>
                            <!-- Section Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-header wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms">
                                        <?php if ($home_team_section_title) { ?>
                                            <h1 class="widget-title"><?php echo $home_team_section_title; ?></h1>
                                            <div class="widget-separator"><span></span></div><?php } ?>
                                        <?php if ($home_team_section_discription) { ?>
                                            <p class="wow fadeInDown animated"><?php echo $home_team_section_discription; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /Section Title -->
                        <?php } ?>

                        <div class="row">
                            <div id="team-carousel" class="owl-carousel owl-theme col-lg-12">
                                <?php
                                $team_options = json_decode($team_options);
                                if ($team_options != '') {
                                    foreach ($team_options as $team_item) {


                                        $image = !empty($team_item->image_url) ? apply_filters('spicepress_translate_single_string', $team_item->image_url, 'Team section') : '';
                                        $title = !empty($team_item->title) ? apply_filters('spicepress_translate_single_string', $team_item->title, 'Team section') : '';
                                        $subtitle = !empty($team_item->subtitle) ? apply_filters('spicepress_translate_single_string', $team_item->subtitle, 'Team section') : '';
                                        $link = !empty($team_item->link) ? apply_filters('spicepress_translate_single_string', $team_item->link, 'Team section') : '';
                                        $open_new_tab = $team_item->open_new_tab;
                                        ?>
                                        <div class="item">
                                            <div class="team-grid text-center">

                                                <?php
                                                echo $overlay_start_wrapper;
                                                if (!empty($image)) {
                                                    ?>
                                                    <div class="img-holder">
                                                        <?php
                                                        if (!empty($link)) :
                                                            $link_html = '<a href="' . esc_url($link) . '"';
                                                            if (function_exists('spicepress_is_external_url')) {
                                                                $link_html .= spicepress_is_external_url($link);
                                                            }
                                                            $link_html .= '>';
                                                            echo wp_kses_post($link_html);
                                                        endif;
                                                        echo '<img class="img-fluid" src="' . esc_url($image) . '"';
                                                        if (!empty($title)) {
                                                            echo 'alt="' . esc_attr($title) . '" title="' . esc_attr($title) . '"';
                                                        }
                                                        echo '/>';
                                                        if (!empty($link)) {
                                                            echo '</a>';
                                                        }
                                                        ?>
                                                    </div>
                                                <?php } ?>

                                                <?php
                                                if (in_array($design_class, array('team4'))):
                                                    if (!empty($team_item->social_repeater)) {
                                                        ?>
                                                        <!--social links-->
                                                        <ul class="custom-social-icons">
                                                            <?php
                                                            $icons = html_entity_decode($team_item->social_repeater);
                                                            $icons_decoded = json_decode($icons, true);
                                                            if (!empty($icons_decoded)) {
                                                                ?>
                                                                <?php
                                                                foreach ($icons_decoded as $value) {
                                                                    $social_icon = !empty($value['icon']) ? apply_filters('spicepress_translate_single_string', $value['icon'], 'Team section') : '';
                                                                    $social_link = !empty($value['link']) ? apply_filters('spicepress_translate_single_string', $value['link'], 'Team section') : '';

                                                                    if (!empty($social_icon)) {
                                                                        $social_class = explode('-', $social_icon)[1];
                                                                        ?>


                                                                        <li><a <?php
                                                                            if ($open_new_tab == 'yes') {
                                                                                echo 'target="_blank"';
                                                                            }
                                                                            ?> href="<?php echo esc_url($social_link); ?>" class="btn btn-just-icon btn-simple <?php echo $social_class; ?>"><i class="fa <?php echo esc_attr($social_icon); ?> "></i></a></li>

                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                        <!--social links-->
                                                        <?php
                                                    } endif;
                                                echo $overlay_end_wrapper;
                                                ?>

                                                <figcaption class="details">
                                                    <?php if (!empty(($title))) { ?>
                                                        <h4 class="name"><?php echo esc_html($title); ?></h4>
                                                    <?php } ?>
                                                    <?php if (!empty(($subtitle))) { ?>
                                                        <span class="position"><?php echo esc_html($subtitle); ?></span>
                                                    <?php } ?>

                                                    <?php if (!in_array($design_class, array('team4'))): ?>
                                                        <!--social links-->
                                                        <ul class="custom-social-icons">
                                                            <?php
                                                            if (!empty($team_item->social_repeater)) {
                                                                $icons = html_entity_decode($team_item->social_repeater);
                                                                $icons_decoded = json_decode($icons, true);
                                                                if (!empty($icons_decoded)) {
                                                                    ?>
                                                                    <?php
                                                                    foreach ($icons_decoded as $value) {
                                                                        $social_icon = !empty($value['icon']) ? apply_filters('spicepress_translate_single_string', $value['icon'], 'Team section') : '';
                                                                        $social_link = !empty($value['link']) ? apply_filters('spicepress_translate_single_string', $value['link'], 'Team section') : '';

                                                                        if (!empty($social_icon)) {
                                                                            $social_class = explode('-', $social_icon)[1];
                                                                            ?>


                                                                            <li><a <?php
                                                                                if ($open_new_tab == 'yes') {
                                                                                    echo 'target="_blank"';
                                                                                }
                                                                                ?> href="<?php echo esc_url($social_link); ?>" class="btn btn-just-icon btn-simple <?php echo $social_class; ?>"><i class="fa <?php echo esc_attr($social_icon); ?> "></i></a></li>

                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                    <!--social links-->
                                                </figcaption>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!--/Team Members-->


                    </div>
                </section>
                <!--/End of Team Section-->

                <div class="clearfix"></div><?php
            }

        }

        add_action('spicepress_sticky_header_logo', 'spicepress_sticky_header_logo_fn');

        function spicepress_sticky_header_logo_fn() {
            if (get_theme_mod('header_varition', 'standard') == 'standard' && get_theme_mod('header_logo_placing', 'left') == 'center') {
                $stickyLogoClass = 'align-center';
            } else if (get_theme_mod('header_logo_placing', 'left') == 'right') {
                $stickyLogoClass = 'align-right';
            } else {
                $stickyLogoClass = '';
            }

            $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            if (get_theme_mod('sticky_header_device_enable', 'desktop') == 'desktop') {
                $sticky_header_logo_desktop = get_theme_mod('sticky_header_logo_desktop', '');
                if (!empty($sticky_header_logo_desktop)):
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand sticky-logo <?php echo $stickyLogoClass; ?>" style="display: none;">
                        <img src="<?php echo esc_url($sticky_header_logo_desktop); ?>" class="custom-logo"></a>
                    <?php
                else:
                if($image!=null){
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand sticky-logo <?php echo $stickyLogoClass; ?>" style="display: none;">
                        <img src="<?php echo esc_url($image[0]); ?>" class="custom-logo"></a>
                <?php
                }
                endif;
            } elseif (get_theme_mod('sticky_header_device_enable', 'desktop') == 'mobile') {
                $sticky_header_logo_mbl = get_theme_mod('sticky_header_logo_mbl', '');
                if (!empty($sticky_header_logo_mbl)):
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand sticky-logo-mbl <?php echo $stickyLogoClass; ?>" style="display: none;">
                        <img width="280" height="48" src="<?php echo esc_url($sticky_header_logo_mbl); ?>" class="custom-logo"></a>
                <?php else:
                    ?><a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand sticky-logo-mbl <?php echo $stickyLogoClass; ?>" style="display: none;">
                        <img width="280" height="48" src="<?php echo esc_url($image[0]); ?>" class="custom-logo"></a>
                <?php
                endif;
            } else {
                $sticky_header_logo_desktop = get_theme_mod('sticky_header_logo_desktop', '');
                if (!empty($sticky_header_logo_desktop)):
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand sticky-logo <?php echo $stickyLogoClass; ?>" style="display: none;">
                        <img src="<?php echo esc_url($sticky_header_logo_desktop); ?>" class="custom-logo"></a>
                <?php else:
                    ?><a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand sticky-logo <?php echo $stickyLogoClass; ?>" style="display: none;">
                        <img src="<?php echo esc_url($image[0]); ?>" class="custom-logo"></a>
                <?php
                endif;

                $sticky_header_logo_mbl = get_theme_mod('sticky_header_logo_mbl', '');
                if (!empty($sticky_header_logo_mbl)):
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand sticky-logo-mbl <?php echo $stickyLogoClass; ?>" style="display: none;">
                        <img width="280" height="48" src="<?php echo esc_url($sticky_header_logo_mbl); ?>" class="custom-logo"></a>
                <?php else:
                    ?><a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand sticky-logo-mbl <?php echo $stickyLogoClass; ?>" style="display: none;">
                        <img width="280" height="48" src="<?php echo esc_url($image[0]); ?>" class="custom-logo"></a>
                    <?php
                    endif;
                }
            }

            if (!function_exists('spicepress_posted_content')) :

                function spicepress_posted_content() {
                    $blog_content = get_theme_mod('spicepress_blog_content', 'excerpt');
                    $excerpt_length = get_theme_mod('spicepress_blog_content_length', 30);

                    if ('excerpt' == $blog_content) {
                        $excerpt = spicepress_the_excerpt(absint($excerpt_length));
                        if (!empty($excerpt)) :
                            ?>


                        <?php
                        echo wp_kses_post(wpautop($excerpt));
                        ?>


                        <?php
                    endif;
                } else {
                    ?>

                    <?php the_content(); ?>

                <?php }
                ?>
                <?php
            }

        endif;



        if (!function_exists('spicepress_the_excerpt')) :

            function spicepress_the_excerpt($length = 0, $post_obj = null) {

                global $post;

                if (is_null($post_obj)) {
                    $post_obj = $post;
                }

                $length = absint($length);

                if (0 === $length) {
                    return;
                }

                $source_content = $post_obj->post_content;

                if (!empty($post_obj->post_excerpt)) {
                    $source_content = $post_obj->post_excerpt;
                }

                $source_content = preg_replace('`\[[^\]]*\]`', '', $source_content);
                $trimmed_content = wp_trim_words($source_content, $length, '&hellip;');
                return $trimmed_content;
            }

        endif;

        /*  Related posts
          /* ------------------------------------ */
        if (!function_exists('spicepress_related_posts')) {

            function spicepress_related_posts() {
                wp_reset_postdata();
                global $post;
                // Define shared post arguments
                $args = array(
                    'no_found_rows' => true,
                    'update_post_meta_cache' => false,
                    'update_post_term_cache' => false,
                    'ignore_sticky_posts' => 1,
                    'orderby' => 'rand',
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => 10
                );
                // Related by categories
                if (get_theme_mod('spicepress_related_post_option') == 'categories') {
                    $cats = get_post_meta($post->ID, 'related-cat', true);
                    if (!$cats) {
                        $cats = wp_get_post_categories($post->ID, array('fields' => 'ids'));
                        $args['category__in'] = $cats;
                    } else {
                        $args['cat'] = $cats;
                    }
                }
                // Related by tags
                if (get_theme_mod('spicepress_related_post_option') == 'tags') {
                    $tags = get_post_meta($post->ID, 'related-tag', true);
                    if (!$tags) {
                        $tags = wp_get_post_tags($post->ID, array('fields' => 'ids'));
                        $args['tag__in'] = $tags;
                    } else {
                        $args['tag_slug__in'] = explode(',', $tags);
                    }
                    if (!$tags) {
                        $break = true;
                    }
                }
                $query = !isset($break) ? new WP_Query($args) : new WP_Query;
                return $query;
            }

        }

        if (!function_exists('spicepress_blog_meta')) {

            function spicepress_blog_meta() {
                if (get_theme_mod('spicepress_enable_blog_author') == false || get_theme_mod('spicepress_enable_single_post_admin') == false) {
                    $string = ' In ';
                } else {
                    $string = ' in ';
                }
                return $string;
            }

        }
