<?php

// SpicePrss slider content data
if (!function_exists('spicepress_slider_default_customize_register')) :
    add_action('customize_register', 'spicepress_slider_default_customize_register');

    function spicepress_slider_default_customize_register($wp_customize) {

        //SpicePrss lite slider data
        if (get_theme_mod('home_slider_title') != '' || get_theme_mod('home_slider_discription') != '' || get_theme_mod('home_slider_image') != '') {

            $home_slider_title = get_theme_mod('home_slider_title');
            $home_slider_discription = get_theme_mod('home_slider_discription');
            $home_slider_btn_target = get_theme_mod('home_slider_btn_target');
            $home_slider_btn_txt = get_theme_mod('home_slider_btn_txt');
            $home_slider_btn_link = get_theme_mod('home_slider_btn_link');
            $home_slider_image = get_theme_mod('home_slider_image');


            if ($home_slider_btn_target == 1) {

                $home_slider_btn_target = true;
            }

            $spicepress_slider_content_control = $wp_customize->get_setting('spicepress_slider_content');
            if (!empty($spicepress_slider_content_control)) {
                $spicepress_slider_content_control->default = json_encode(array(
                    array(
                        'title' => !empty($home_slider_title) ? $home_slider_title : 'Standard Format',
                        'text' => !empty($home_slider_discription) ? $home_slider_discription : 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
                        'button_text' => !empty($home_slider_btn_txt) ? $home_slider_btn_txt : 'Read more',
                        'link' => !empty($home_slider_btn_link) ? $home_slider_btn_link : '#',
                        'slide_format' => 'customizer_repeater_slide_format_standard',
                        'image_url' => !empty($home_slider_image) ? $home_slider_image : get_template_directory_uri() . '/images/slide/slide01.jpg',
                        'open_new_tab' => !empty($home_slider_btn_target) ? $home_slider_btn_target : false,
                        'id' => 'customizer_repeater_56d7ea7f40b50',
                    ),
                        ));
            }
        } else {

            $spicepress_slider_content_control = $wp_customize->get_setting('spicepress_slider_content');
            if (!empty($spicepress_slider_content_control)) {
                $spicepress_slider_content_control->default = json_encode(array(
                    array(
                        'title' => esc_html__('Standard format', 'spicepress'),
                        'text' => esc_html__('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.', 'spicepress'),
                        'button_text' => __('Read More', 'spicepress'),
                        'link' => '#',
                        'slide_format' => 'customizer_repeater_slide_format_standard',
                        'image_url' => get_template_directory_uri() . '/images/slide/slide01.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_56d7ea7f40b96',
                    ),
                    array(
                        'title' => esc_html__('Status format', 'spicepress'),
                        'text' => esc_html__('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.', 'spicepress'),
                        'button_text' => __('Read More', 'spicepress'),
                        'link' => '#',
                        'slide_format' => 'customizer_repeater_slide_format_status',
                        'image_url' => get_template_directory_uri() . '/images/slide/slide02.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_56d7ea7f40b97',
                    ),
                    array(
                        'title' => '',
                        'text' => esc_html__('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.', 'spicepress'),
                        'button_text' => '',
                        'link' => '#',
                        'slide_format' => 'customizer_repeater_slide_format_aside',
                        'image_url' => get_template_directory_uri() . '/images/slide/slide03.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_56d7ea7f40b98',
                    ),
                    array(
                        'title' => 'Martin Doe',
                        'text' => 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
                        'button_text' => '',
                        'link' => '#',
                        'slide_format' => 'customizer_repeater_slide_format_quote',
                        'image_url' => get_template_directory_uri() . '/images/slide/slide04.jpg',
                        'open_new_tab' => 'no',
                        'id' => 'customizer_repeater_56d7ea7f40b99',
                    ),
                    array(
                        'title' => esc_html__('Video format', 'spicepress'),
                        'text' => esc_html__('This is an example of a video post format displayed in the featured slider with an excerpt added.', 'spicepress'),
                        'button_text' => 'Read More',
                        'link' => '#',
                        'slide_format' => 'customizer_repeater_slide_forma_video',
                        'image_url' => get_template_directory_uri() . '/images/slide/slide05.jpg',
                        'open_new_tab' => 'no',
                        'video_url' => 'https://www.youtube.com/watch?v=sAWTZVpvPrQ',
                        'id' => 'customizer_repeater_56d7ea7f40b100',
                    ),
                        ));
            }
        }
    }

endif;

// SpicePrss default service content data
if (!function_exists('spicepress_service_default_customize_register')) :

    function spicepress_service_default_customize_register($wp_customize) {
        //Run this code section if user Install direct pro new theme (This is the default service data)
        $spicepress_service_content_control = $wp_customize->get_setting('spicepress_service_content');
        if (!empty($spicepress_service_content_control)) {
            $spicepress_service_content_control->default = json_encode(array(
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
                ),
                    ));
        }
    }

    add_action('customize_register', 'spicepress_service_default_customize_register');

endif;

// SpicePrss Testimonial content data
if (!function_exists('spicepress_testimonial_default_customize_register')) :
    add_action('customize_register', 'spicepress_testimonial_default_customize_register');

    function spicepress_testimonial_default_customize_register($wp_customize) {

        //SpicePrss lite testimonial data
        if (get_theme_mod('home_testimonial_title') != '' || get_theme_mod('home_testimonial_designation') != '' || get_theme_mod('home_testimonial_thumb') != '' || get_theme_mod('home_testimonial_desc') != '') {

            $home_testimonial_title = get_theme_mod('home_testimonial_title');
            $home_testimonial_desc = get_theme_mod('home_testimonial_desc');
            $designation = get_theme_mod('designation');
            $home_testimonial_thumb = get_theme_mod('home_testimonial_thumb');

            $spicepress_testimonial_content_control = $wp_customize->get_setting('spicepress_testimonial_content');
            if (!empty($spicepress_testimonial_content_control)) {
                $spicepress_testimonial_content_control->default = json_encode(array(
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
        } else {
            //SpicePrss default testimonial data.
            $spicepress_testimonial_content_control = $wp_customize->get_setting('spicepress_testimonial_content');
            if (!empty($spicepress_testimonial_content_control)) {
                $spicepress_testimonial_content_control->default = json_encode(array(
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
        }
    }

endif;


// SpicePrss Team content data
if (!function_exists('spicepress_team_default_customize_register')) :
    add_action('customize_register', 'spicepress_team_default_customize_register');

    function spicepress_team_default_customize_register($wp_customize) {
        //SpicePrss default team data.
        $spicepress_team_content_control = $wp_customize->get_setting('spicepress_team_content');
        if (!empty($spicepress_team_content_control)) {
            $spicepress_team_content_control->default = json_encode(array(
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
    }

endif;


//Client section
if (!function_exists('spicepress_client_default_customize_register')) :
    add_action('customize_register', 'spicepress_client_default_customize_register');

    function spicepress_client_default_customize_register($wp_customize) {
        //SpicePrss default client data.
        $spicepress_client_content_control = $wp_customize->get_setting('spicepress_clients_content');
        if (!empty($spicepress_client_content_control)) {
            $spicepress_client_content_control->default = json_encode(array(
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client1.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b96',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client2.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b97',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client3.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b98',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client4.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b99',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client5.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b100',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client1.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b101',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client2.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b102',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client3.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b103',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client4.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b104',
                ),
                array(
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/clients/client5.png',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b105',
                ),
                    ));
        }
    }

endif;



//Gallery section
if (!function_exists('spicepress_gallery_default_customize_register')) :
    add_action('customize_register', 'spicepress_gallery_default_customize_register');

    function spicepress_gallery_default_customize_register($wp_customize) {
        //SpicePrss default client data.
        $spicepress_gallery_content_control = $wp_customize->get_setting('spicepress_gallery_content');
        if (!empty($spicepress_gallery_content_control)) {
            $spicepress_gallery_content_control->default = json_encode(array(
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery1.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b96',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery2.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b97',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery3.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b98',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery4.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b99',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery5.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b100',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery6.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b101',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery7.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b102',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery8.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b103',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery9.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b104',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery10.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b105',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery11.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b106',
                ),
                array(
                    'title' => esc_html__('Gallery', 'spicepress'),
                    'link' => '#',
                    'image_url' => get_template_directory_uri() . '/images/gallery/gallery12.jpg',
                    'open_new_tab' => 'no',
                    'id' => 'customizer_repeater_56d7ea7f40b107',
                ),
                    ));
        }
    }


endif;