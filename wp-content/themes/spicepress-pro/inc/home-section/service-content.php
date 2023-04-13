<?php
if (get_page_template_slug() == 'template/template-service.php') {
    $spicepress_service_layout = 1;
} elseif (get_page_template_slug() == 'template/template-service-2.php') {
    $spicepress_service_layout = 2;
} elseif (get_page_template_slug() == 'template/template-service-3.php') {
    $spicepress_service_layout = 3;
} elseif (get_page_template_slug() == 'template/template-service-4.php') {
    $spicepress_service_layout = 4;
}elseif (get_page_template_slug() == 'template/template-service-5.php') {
    $spicepress_service_layout = 5;
} else {
    $spicepress_service_layout = get_theme_mod('home_serive_design_layout', 1);
}

switch ($spicepress_service_layout) {
    case 1:
        $service_section_layout_wrapper = '<section class="service-section">';
        $service_post_div_wrap_start = '<div class="post text-center wow flipInX animated" data-wow-delay=".5s">';
        $service_post_div_wrap_end = '</div>';
        break;

    case 2:
        $service_section_layout_wrapper = '<section class="section-module services2 service_wrapper">';
        $service_post_div_wrap_start = '<article class="post">';
        $service_post_div_wrap_end = '</article>';
        break;

    case 3:
        $service_section_layout_wrapper = '<section class="section-module services3 service_wrapper">';
        $service_post_div_wrap_start = '<article class="post text-center">';
        $service_post_div_wrap_end = '</article>';
        break;

    case 4:
        $service_section_layout_wrapper = '<section class="section-module services4 service_wrapper">';
        $service_post_div_wrap_start = '<article class="post">';
        $service_post_div_wrap_end = '</article>';
        break;

    case 5:
        $service_section_layout_wrapper = '<section class="section-module services5 service_wrapper">';
        $service_post_div_wrap_start = '<article class="post text-center">';
        $service_post_div_wrap_end = '</article>';
        break;
}
echo $service_section_layout_wrapper;
?>
<div class="container<?php echo spicepress_container();?>">
    <?php
    $spicepress_service_content = get_theme_mod('spicepress_service_content');
    $home_service_section_title = get_theme_mod('home_service_section_title', __('What we offer', 'spicepress'));
    $home_service_section_discription = get_theme_mod('home_service_section_discription', 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
    if (($home_service_section_title) || ($home_service_section_discription) != '') {
        ?>
        <!-- Section Title -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-header">
                    <?php if (!empty($home_service_section_title) || is_customize_preview()) : ?>
                        <h1 class="widget-title">
                            <?php echo $home_service_section_title; ?>
                        </h1>
                    <?php endif; ?>
                    <div class="widget-separator"><span></span></div>
                    <?php if ($home_service_section_discription) { ?>
                        <p class="wow fadeInDown animated">
                            <?php echo $home_service_section_discription; ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /Section Title -->
    <?php } ?>
    <div class="row">
        <?php
        if (empty($spicepress_service_content)) {
            $spicepress_service_content = json_encode(array(
                array(
                    'icon_value' => 'fa-laptop',
                    'title' => esc_html__('Easy to use', 'spicepress'),
                    'text' => 'Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis vitae velit.volutpat porttitor a sit amet est. In eu rutrum ante. Nullam id lorem fermentum, accumsan enim non auctor neque.',
                    'link' => '#',
                    'open_new_tab' => 'no',
                    'choice' => 'customizer_repeater_icon',
                    'id' => 'customizer_repeater_56d7ea7f40b56',
                ),
                array(
                    'icon_value' => 'fa fa-cogs',
                    'title' => esc_html__('Multi-purpose', 'spicepress'),
                    'text' => 'Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis vitae velit.volutpat porttitor a sit amet est. In eu rutrum ante. Nullam id lorem fermentum, accumsan enim non auctor neque.',
                    'link' => '#',
                    'open_new_tab' => 'no',
                    'choice' => 'customizer_repeater_icon',
                    'id' => 'customizer_repeater_56d7ea7f40b66',
                ),
                array(
                    'icon_value' => 'fa fa-mobile',
                    'title' => esc_html__('Responsive Design', 'spicepress'),
                    'text' => 'Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis vitae velit.volutpat porttitor a sit amet est. In eu rutrum ante. Nullam id lorem fermentum, accumsan enim non auctor neque.',
                    'link' => '#',
                    'open_new_tab' => 'no',
                    'choice' => 'customizer_repeater_icon',
                    'id' => 'customizer_repeater_56d7ea7f40b86',
                ),
                array(
                    'icon_value' => 'fa fa-cogs',
                    'title' => esc_html__('Powerful Options', 'spicepress'),
                    'text' => 'Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis vitae velit.volutpat porttitor a sit amet est. In eu rutrum ante. Nullam id lorem fermentum, accumsan enim non auctor neque.',
                    'link' => '#',
                    'open_new_tab' => 'no',
                    'choice' => 'customizer_repeater_icon',
                    'id' => 'customizer_repeater_56d7ea1f40b87',
                ),
                array(
                    'icon_value' => 'fa fa-code',
                    'title' => esc_html__('Unique and Clean', 'spicepress'),
                    'text' => 'Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis vitae velit.volutpat porttitor a sit amet est. In eu rutrum ante. Nullam id lorem fermentum, accumsan enim non auctor neque.',
                    'link' => '#',
                    'open_new_tab' => 'no',
                    'choice' => 'customizer_repeater_icon',
                    'id' => 'customizer_repeater_56d7ea2f40b88',
                ),
                array(
                    'icon_value' => 'fa fa-users',
                    'title' => esc_html__('Satisfied Clients', 'spicepress'),
                    'text' => 'Phasellus facilisis, nunc in lacinia auctor, eros lacus aliquet velit, quis lobortis risus nunc nec nisi maecans et turpis vitae velit.volutpat porttitor a sit amet est. In eu rutrum ante. Nullam id lorem fermentum, accumsan enim non auctor neque.',
                    'link' => '#',
                    'open_new_tab' => 'no',
                    'choice' => 'customizer_repeater_icon',
                    'id' => 'customizer_repeater_56d3ea7f40b89',
                )
            ));
        }

        if (!empty($spicepress_service_content)) {
            $allowed_html = array(
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'b' => array(),
                'i' => array(),
            );
            $spicepress_service_content = json_decode($spicepress_service_content);
            foreach ($spicepress_service_content as $features_item) {
                $icon = !empty($features_item->icon_value) ? apply_filters('spicepress_translate_single_string', $features_item->icon_value, 'Features section') : '';
                $title = !empty($features_item->title) ? apply_filters('spicepress_translate_single_string', $features_item->title, 'Features section') : '';
                $text = !empty($features_item->text) ? apply_filters('spicepress_translate_single_string', $features_item->text, 'Features section') : '';
                $link = !empty($features_item->link) ? apply_filters('spicepress_translate_single_string', $features_item->link, 'Features section') : '';
                $image = !empty($features_item->image_url) ? apply_filters('spicepress_translate_single_string', $features_item->image_url, 'Features section') : '';
                $choice = !empty($features_item->choice) ? $features_item->choice : 'customizer_repeater_icon';

                $open_new_tab = $features_item->open_new_tab;
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <?php
                    echo $service_post_div_wrap_start;
                    if ($choice == 'customizer_repeater_image') {
                        if (!empty($image)) :
                            ?>
                            <figure class="post-thumbnail">	

                                <?php if (!empty($link)) : ?>
                                    <a href="<?php echo esc_url($link); ?>" <?php
                                    if ($open_new_tab == 'yes') {
                                        echo 'target="_blank"';
                                    }
                                    ?>>
                                       <?php endif; ?>
                                    <img class="services_cols_mn_icon"
                                         src="<?php echo esc_url($image); ?>" <?php if (!empty($title)) : ?> alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" <?php endif; ?> />

                                    <?php if (!empty($link)) : ?>
                                    </a>
                                <?php endif; ?>

                            </figure>
                        <?php endif; ?>
                    <?php } ?>

                    <?php if ($choice == 'customizer_repeater_icon') { ?>

                        <?php if (!empty($icon)) : ?>

                            <figure class="post-thumbnail">	
                                <?php if (!empty($link)) : ?>
                                    <a href="<?php echo esc_url($link); ?>" <?php
                                    if ($open_new_tab == 'yes') {
                                        echo 'target="_blank"';
                                    }
                                    ?> >
                                       <?php endif; ?>
                                    <i class="fa <?php echo esc_html($icon); ?> txt-pink"></i>

                                    <?php if (!empty($link)) : ?>
                                    </a>
                                <?php endif; ?>

                            </figure>
                        <?php endif; ?>
                    <?php } ?>



                    <?php if (!empty($title)) { ?>
                        <div class="entry-header">
                            <h4 class="entry-title">
                                <?php if (!empty($link)) { ?>
                                    <a href="<?php echo esc_url($link); ?>" <?php
                                    if ($open_new_tab == 'yes') {
                                        echo 'target="_blank"';
                                    }
                                    ?> >
                                           <?php echo esc_html($title); ?>
                                    </a>

                                    <?php
                                } else {
                                    echo esc_html($title);
                                }
                                ?>
                            </h4></div>
                    <?php } ?>


                    <?php if (!empty($text)) : ?>
                        <div class="entry-content">
                            <p><?php echo wp_kses(html_entity_decode($text), $allowed_html); ?></p>
                        </div>
                        <?php
                    endif;
                    echo $service_post_div_wrap_end;
                    ?>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
</section>	