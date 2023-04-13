<?php
// honeypress slider content data
if ( ! function_exists( 'honeypress_slider_default_customize_register' ) ) :
add_action( 'customize_register', 'honeypress_slider_default_customize_register' );
	function honeypress_slider_default_customize_register( $wp_customize ){

		//honeypress lite slider data
		if( get_theme_mod('home_slider_title') != '' || get_theme_mod('home_slider_discription') != '' || get_theme_mod('home_slider_image') != ''){
			
			$home_slider_title = get_theme_mod('home_slider_title');
			$home_slider_discription = get_theme_mod('home_slider_discription');
			$home_slider_btn_target = get_theme_mod('home_slider_btn_target');
			$home_slider_btn_txt = get_theme_mod('home_slider_btn_txt');
			$home_slider_btn_txt2 = get_theme_mod('home_slider_btn_txt2');
			$home_slider_btn_link = get_theme_mod('home_slider_btn_link');
			$home_slider_btn_link2 = get_theme_mod('home_slider_btn_link2');
			$home_slider_image = get_theme_mod('home_slider_image');
			
			
			if($home_slider_btn_target == 1){
				
				$home_slider_btn_target = true;
			}
			
			$honeypress_slider_content_control = $wp_customize->get_setting( 'honeypress_slider_content' );
			if ( ! empty( $honeypress_slider_content_control ) ) {
				$honeypress_slider_content_control->default = json_encode( array(
					array(
					'title'      => !empty($home_slider_title)? $home_slider_title:'We Provide Quality Business <br> Solution',
					'text'       => !empty($home_slider_discription)? $home_slider_discription :'Welcome to honeypress',
					'button_text'      => !empty($home_slider_btn_txt)? $home_slider_btn_txt : 'Learn More',
					'abtbutton_text'      => !empty($home_slider_btn_txt2)? $home_slider_btn_txt2 : 'About Us',
					'link'       => !empty($home_slider_btn_link)? $home_slider_btn_link : '#',
					'abtlink'       => !empty($home_slider_btn_link2)? $home_slider_btn_link2 : '#',
					'image_url'  => !empty($home_slider_image)? $home_slider_image :  HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/slider/slide-1.jpg',
					'open_new_tab' => !empty($home_slider_btn_target)? $home_slider_btn_target : false,
					'id'         => 'customizer_repeater_56d7ea7f40b50',
					'home_slider_caption' => 'customizer_repeater_slide_caption_left',
					),
				) );
			}
			
		}
		else{

			//honeypress slider data
			$honeypress_slider_content_control = $wp_customize->get_setting( 'honeypress_slider_content' );
				if ( ! empty( $honeypress_slider_content_control ) ) {
				$honeypress_slider_content_control->default = json_encode( array(
				array(
				'title'      => __( 'We provide solutions to <br> grow your business', 'honeypress' ),
				'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua.', 'honeypress' ),
				'button_text'      => __('Learn More','honeypress'),
				'link'       => '#',
				'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/slider/slide-1.jpg',
				'open_new_tab' => 'yes',
				'abtbutton_text'      => __('About Us','honeypress'),
				'abtlink'       => '#',
				'abtopen_new_tab' => 'yes',
				'home_slider_caption' => 'customizer_repeater_slide_caption_left',
				'sidebar_check' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b96',
				),
				array(
				'title'      => __( 'We create stunning <br>WordPress themes', 'honeypress' ),
				'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua.', 'honeypress' ),
				'button_text'      => __('Learn More','honeypress'),
				'link'       => '#',
				'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/slider/slide-2.jpg',
				'open_new_tab' => 'yes',
				'abtbutton_text'      => __('About Us','honeypress'),
				'abtlink'       => '#',
				'abtopen_new_tab' => 'yes',
				'home_slider_caption' => 'customizer_repeater_slide_caption_left',
				'sidebar_check' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b97',
				),
				array(
				'title'      => __( 'We provide solutions to <br> grow your business', 'honeypress' ),
				'text'       => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua.', 'honeypress' ),
				'button_text'      => __('Learn More','honeypress'),
				'link'       => '#',
				'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/slider/slide-3.jpg',
				'open_new_tab' => 'yes',
				'abtbutton_text'      => __('About Us','honeypress'),
				'abtlink'       => '#',
				'abtopen_new_tab' => 'yes',
				'home_slider_caption' => 'customizer_repeater_slide_caption_left',
				'sidebar_check' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b98',
				),
				
				
			) );

		}
	
	}
}
endif;


// honeypress default service data
if ( ! function_exists( 'honeypress_service_default_customize_register' ) ) :
	function honeypress_service_default_customize_register( $wp_customize ){
				
				$honeypress_service_content_control = $wp_customize->get_setting( 'honeypress_service_content' );
				if ( ! empty( $honeypress_service_content_control ) ) {
					$honeypress_service_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa-headphones',
						'title'      => esc_html__( 'Unlimited Support', 'honeypress' ),
						'text'       => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'yes',
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						),
						array(
						'icon_value' => 'fa-mobile',
						'title'      => esc_html__( 'Pixel Perfect Design', 'honeypress' ),
						'text'       => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'yes',
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						),
						array(
						'icon_value' => 'fa-cogs',
						'title'      => esc_html__( 'Powerful Options', 'honeypress' ),
						'text'       => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'yes',
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						),
						array(
						'icon_value' => 'fa-android',
						'title'      => esc_html__( 'App Development', 'honeypress' ),
						'text'       => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'yes',
						'id'         => 'customizer_repeater_56d7ea7f40b88',
						),
						array(
						'icon_value' => 'fa-code',
						'title'      => esc_html__( 'Unique and Clean', 'honeypress' ),
						'text'       => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'yes',
						'id'         => 'customizer_repeater_56d7ea7f40b89',
						),
						array(
						'icon_value' => 'fa-users',
						'title'      => esc_html__( 'Satisfied Clients', 'honeypress' ),
						'text'       => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.',
						'choice'    => 'customizer_repeater_icon',
						'link'       => '#',
						'open_new_tab' => 'yes',
						'id'         => 'customizer_repeater_56d7ea7f40b91',
						),
						
					) );

				}
	}
	
add_action( 'customize_register', 'honeypress_service_default_customize_register' );
	
endif;


// honeypress default Funfact data
if ( ! function_exists( 'honeypress_funfact_default_customize_register' ) ) :
	function honeypress_funfact_default_customize_register( $wp_customize ){
				
				$honeypress_funfact_content_control = $wp_customize->get_setting( 'honeypress_funfact_content' );
				if ( ! empty( $honeypress_funfact_content_control ) ) {
					$honeypress_funfact_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa-smile-o',
						'title'      => '4050',
						'text'       => esc_html('Satisfied Clients','honeypress'),
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						),
						array(
						'icon_value' => 'fa-handshake-o',
						'title'      => '150',
						'text'       => esc_html('Finish Projects','honeypress'),
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						),
						array(
						'icon_value' => 'fa-line-chart',
						'title'      => '90%',
						'text'       => esc_html('Business Growth','honeypress'),
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						),
						
					) );

				}
	}
	
add_action( 'customize_register', 'honeypress_funfact_default_customize_register' );
	
endif;

// honeypress default Contact data
if ( ! function_exists( 'honeypress_contact_default_customize_register' ) ) :
	function honeypress_contact_default_customize_register( $wp_customize ){
				
				$honeypress_contact_content_control = $wp_customize->get_setting( 'honeypress_contact_content' );
				if ( ! empty( $honeypress_contact_content_control ) ) {
					$honeypress_contact_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa fa-map-marker',
						'link'       => '#',
						'title'      => 'Address',
						'text'       => __('514 S. Magnolia St. Orlando, <br/>FL 32806','honeypress'),
						'id'         => 'customizer_repeater_56d7ea7f40b60',
						),
						array(
							'icon_value' => 'fa fa-phone',
							'link'       => '#',
							'title'      => 'Phone',
							'text'       => __('+(15) 718-999-3939, <br/>+(15) 781-254-8437','honeypress'),
							'id'         => 'customizer_repeater_56d7ea7f40b61',
						),
						array(
							'icon_value' => 'fa fa-envelope-o',
							'link'       => '#',
							'title'      => 'Email',
							'text'       => __('info@honeypress.com <br/>support@honeypress.com','honeypress'),
							'id'         => 'customizer_repeater_56d7ea7f40b62',
						),
						
					) );

				}
	}
	
add_action( 'customize_register', 'honeypress_contact_default_customize_register' );
	
endif;


// honeypress default Ribon data
if ( ! function_exists( 'honeypress_ribon_default_customize_register' ) ) :
	function honeypress_ribon_default_customize_register( $wp_customize ){
				
				$honeypress_ribon_content_control = $wp_customize->get_setting( 'honeypress_ribon_content' );
				if ( ! empty( $honeypress_ribon_content_control ) ) {
					$honeypress_ribon_content_control->default = json_encode( array(
						array(
				        'icon_value' => 'fa fa-facebook',
				        'title'      => esc_html__( 'Facebook', 'honeypress' ),
				        'link'       => '#',
				        'open_new_tab' => 'yes',
				        'id'         => 'customizer_repeater_56d7ea7f40b76',
				        ),
				        array(
				        'icon_value' => 'fa fa-twitter',
				        'title'      => esc_html__( 'Twitter', 'honeypress' ),
				        'link'       => '#',
				        'open_new_tab' => 'yes',
				        'id'         => 'customizer_repeater_56d7ea7f40b77',
				        ),
				        array(
				        'icon_value' => 'fa fa-linkedin',
				        'title'      => esc_html__( 'LinkedIn', 'honeypress' ),
				        'link'       => '#',
				        'open_new_tab' => 'yes',
				        'id'         => 'customizer_repeater_56d7ea7f40b78',
				        ),
				        array(
				        'icon_value' => 'fa fa-google-plus',
				        'title'      => esc_html__( 'Google', 'honeypress' ),
				        'link'       => '#',
				        'open_new_tab' => 'yes',
				        'id'         => 'customizer_repeater_56d7ea7f40b79',
				        ),
				        array(
				        'icon_value' => 'fa fa-instagram',
				        'title'      => esc_html__( 'Instagram', 'honeypress' ),
				        'link'       => '#',
				        'open_new_tab' => 'yes',
				        'id'         => 'customizer_repeater_56d7ea7f40b80',
				        ),
					) );
				}
	}
	
add_action( 'customize_register', 'honeypress_ribon_default_customize_register' );
	
endif;


// honeypress Testimonial content data
if ( ! function_exists( 'honeypress_testimonial_default_customize_register' ) ) :
add_action( 'customize_register', 'honeypress_testimonial_default_customize_register' );
function honeypress_testimonial_default_customize_register( $wp_customize ){
	if( get_theme_mod('home_testimonial_section_title') != '' || get_theme_mod('home_testimonial_section_discription') != '' || get_theme_mod('home_testimonial_thumb') != '')
	{
		$home_testimonial_section_title = get_theme_mod('home_testimonial_section_title');
		$home_testimonial_section_discription = get_theme_mod('home_testimonial_section_discription');
		$home_testimonial_desc = get_theme_mod('home_testimonial_desc');
		$home_testimonial_title = get_theme_mod('home_testimonial_title');
		$home_testimonial_designation = get_theme_mod('designation');	
		$home_testimonial_thumb = get_theme_mod('home_testimonial_thumb');	
		$honeypress_testimonial_content_control = $wp_customize->get_setting( 'honeypress_testimonial_content' );
		if ( ! empty( $honeypress_testimonial_content_control ) ) 
		{
			$honeypress_testimonial_content_control->default = json_encode( array(
				array(
					'title'      => !empty($home_testimonial_title)? $home_testimonial_title:'Cras Vitae',
					'text'       => !empty($home_testimonial_desc)? $home_testimonial_desc :'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
					'designation'      => !empty($home_testimonial_designation)? $home_testimonial_designation : 'UI Developer',
					'image_url'  => !empty($home_testimonial_thumb)? $home_testimonial_thumb :  HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/user1.jpg',
					'id'         => 'customizer_repeater_56d7ea7f40b96',
					),
				) );
		}			
	}
	else
	{
		//honeypress default testimonial data.
		$honeypress_testimonial_content_control = $wp_customize->get_setting( 'honeypress_testimonial_content' );
		if ( ! empty( $honeypress_testimonial_content_control ) ) 
			{
			$honeypress_testimonial_content_control->default = json_encode( array(
				array(
					'title'      => 'Martin Wills',
					'text'       => 'It is a long established fact that a reader will be distracted by the readable content of a page when<br> looking at its layout. The point of using Lorem ipsum dolor sit amet,<br> temp consectetur adipisicing elit.',
					'designation' => __('Developer','honeypress'),
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/user1.jpg',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b96',
					
					),
				array(
					'title'      => 'Amanda Smith',
					'text'       => 'It is a long established fact that a reader will be distracted by the readable content of a page when<br> looking at its layout. The point of using Lorem ipsum dolor sit amet,<br> temp consectetur adipisicing elit.',
					'designation' => __('Team Leader','honeypress'),
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/user2.jpg',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b97',
					),
				array(
					'title'      => 'Travis Cullan',
					'text'       => 'It is a long established fact that a reader will be distracted by the readable content of a page when<br> looking at its layout. The point of using Lorem ipsum dolor sit amet,<br> temp consectetur adipisicing elit.',
					'designation' => __('Volunteer','honeypress'),
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/user3.jpg',
					'id'         => 'customizer_repeater_56d7ea7f40b98',
					'open_new_tab' => 'no',
					),
					
				) );

			}
			}
			
		}
endif;


// honeypress Team content data
if ( ! function_exists( 'honeypress_team_default_customize_register' ) ) :
add_action( 'customize_register', 'honeypress_team_default_customize_register' );
function honeypress_team_default_customize_register( $wp_customize ){
				//honeypress default team data.
				$honeypress_team_content_control = $wp_customize->get_setting( 'honeypress_team_content' );
				if ( ! empty( $honeypress_team_content_control ) ) 
				{
				$honeypress_team_content_control->default = json_encode( array(
					array(
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/team/team1.jpg',
					'title'           => 'Danial Wilson',
					'subtitle'        => esc_html__( 'Senior Manager', 'honeypress' ),
					'open_new_tab' => 'no',
					'id'              => 'customizer_repeater_56d7ea7f40c56',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb908674e06',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb9148530fc',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb9150e1e89',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb9150e1e256',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
						)
					),
				),
				array(
					'image_url'  =>  HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/team/team2.jpg',
					'title'           => 'Amanda Smith',
					'subtitle'        => esc_html__( 'Founder & CEO', 'honeypress' ),
					'open_new_tab' => 'no',
					'id'              => 'customizer_repeater_56d7ea7f40c66',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb9155a1072',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb9160ab683',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb916ddffc9',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb916ddffc784',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
						)
					),
				),
				array(
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/team/team3.jpg',
					'title'           => 'Victoria Wills',
					'subtitle'        => esc_html__( 'Web Master', 'honeypress' ),
					'text'            => 'Pok pok direct trade godard street art, poutine fam typewriter food truck narwhal kombucha wolf cardigan butcher whatever pickled you.',
					'open_new_tab' => 'no',
					'id'              => 'customizer_repeater_56d7ea7f40c76',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb917e4c69e',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb91830825c',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb918d65f2e',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb918d65f2e8',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
						)
					),
				),
				array(
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/team/team4.jpg',
					'title'           => 'Travis Marcus',
					'subtitle'        => esc_html__( 'UI Developer', 'honeypress' ),
					'open_new_tab' => 'no',
					'id'              => 'customizer_repeater_56d7ea7f40c86',
					'social_repeater' => json_encode(
						array(
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb925cedcb2',
								'link' => 'facebook.com',
								'icon' => 'fa-facebook',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb92615f030',
								'link' => 'twitter.com',
								'icon' => 'fa-twitter',
							),
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb9266c223a',
								'link' => 'linkedin.com',
								'icon' => 'fa-linkedin',
							),
							
							array(
								'id'   => 'customizer-repeater-social-repeater-57fb9266c223a',
								'link' => 'behance.com',
								'icon' => 'fa-behance',
							),
						)
					),
				),
				
				
				
				
				
				) );

			}
}
endif;


// honeypress Pricing content data
if ( ! function_exists( 'honeypress_pricing_default_customize_register' ) ) :
add_action( 'customize_register', 'honeypress_pricing_default_customize_register' );
function honeypress_pricing_default_customize_register( $wp_customize ){
				//SpicePrss default team data.
				$honeypress_pricing_content_control = $wp_customize->get_setting( 'honeypress_pricing_content' );
				if ( ! empty( $honeypress_pricing_content_control ) ) 
				{
				$honeypress_pricing_content_control->default = json_encode( 
				
				array(
				
				array(
					'price_heighlight' => 'customizer_repeater_price_heighlight_nonlight',
					'title'           => __('Basic Plan','honeypress'),
					'price' => '<span class="currency">'.__('$','honeypress').'</span>'.__('25','honeypress').'<small>/ '.__('Month','honeypress').'</small>', 
					'features'            => '<div class="price-list-item">
								<ul class="price-list-style">
									<li>'.__('6GB Space','honeypress').'</li>
									<li>'.__('Security and admin controls','honeypress').'</li>
									<li>'.__('24/7 phone and email support','honeypress').'</li>
								</ul>
							</div>',
					'button_text'      => __('Get Started','honeypress'),
					'link'       => '#',
					'open_new_tab' => 'no',
					'id'              => 'customizer_repeater_56d7ea7f4i84',
				),
					array(
					'price_heighlight' => 'customizer_repeater_price_heighlight',
					'title'           => __('Standard Plan','honeypress'),
					'price' => '<span class="currency">'.__('$','honeypress').'</span>'.__('49','honeypress').'<small>/ '.__('Month','honeypress').'</small>', 
					'features'            => '<div class="price-list-item">
								<ul class="price-list-style">
									<li>'.__('10GB Space','honeypress').'</li>
									<li>'.__('Security and admin controls','honeypress').'</li>
									<li>'.__('24/7 phone and email support','honeypress').'</li>
									<li>'.__('User Popular Choice','honeypress').'</li>
								</ul>
							</div>',
					'button_text'      => __('Get Started','honeypress'),
					'link'       => '#',
					'open_new_tab' => 'no',
					'id'              => 'customizer_repeater_56d7ea7f4i82',
				),
				
				array(
					'price_heighlight' => 'customizer_repeater_price_heighlight_nonlight',
					'title'           => __('Professional Plan','honeypress'),
					'price' => '<span class="currency">'.__('$','honeypress').'</span>'.__('69','honeypress').'<small>/ '. __('Month','honeypress').'</small>',
					'features'            => '<div class="price-list-item">
								<ul class="price-list-style">
									<li>'. __('Unlimited Space','honeypress').'</li>
									<li>'. __('Quality & Customer Experiance','honeypress').'</li>
									<li>'. __('phone and email support','honeypress').'</li>
								</ul>
							</div>',
					'button_text'      => __('Get Started','honeypress'),
					'link'       => '#',
					'open_new_tab' => 'no',
					'id'              => 'customizer_repeater_56d7ea7f4i83',
				)
				
				) );

			}
}
endif;

//Client section
if ( ! function_exists( 'honeypress_client_default_customize_register' ) ) :
add_action( 'customize_register', 'honeypress_client_default_customize_register' );
function honeypress_client_default_customize_register( $wp_customize ){
				//honeypress default client data.
				$honeypress_client_content_control = $wp_customize->get_setting( 'honeypress_clients_content' );
				if ( ! empty( $honeypress_client_content_control ) ) 
				{
				$honeypress_client_content_control->default = json_encode( array(
					array(
					
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/sponsors/logo1.png',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b96',
					),
					
					array(
					
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/sponsors/logo2.png',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b97',
					),
					
					array(
					
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/sponsors/logo3.png',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b98',
					
					),
					
					array(
					
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/sponsors/logo4.png',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b99',
					
					),
					
					array(
					
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/sponsors/logo5.png',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b100',
					
					),
					array(
					
					'link'       => '#',
					'image_url'  => HONEYPRESS_PRO_TEMPLATE_DIR_URI .'/assets/images/sponsors/logo1.png',
					'open_new_tab' => 'no',
					'id'         => 'customizer_repeater_56d7ea7f40b96',
					),
					
				) );

			}
}
endif;