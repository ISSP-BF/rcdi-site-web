<?php
/**
 * General Settings Customizer
 *
 * @package honeypress
 */
function honeypress_general_settings_customizer ( $wp_customize )
{
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
class Honeypress_Header_Logo_Customize_Control_Radio_Image extends WP_Customize_Control {
	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.1.24
	 * @var   string
	 */
	public $type = 'radio-image';
	/**
	 * Displays the control content.
	 *
	 * @since  1.1.24
	 * @access public
	 * @return void
	 */
	public function render_content() {
		/* If no choices are provided, bail. */
		if ( empty( $this->choices ) ) {
			return;
		} ?>

		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>

		<div id="<?php echo esc_attr( "input_{$this->id}" ); ?>">

			<?php foreach ( $this->choices as $value => $args ) : ?>

				<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}" ); ?>" id="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>" <?php $this->link(); ?> <?php checked( $this->value(), $value ); ?> />

				<label for="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>" class="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>">
					<?php if ( ! empty( $args['label'] ) ) { ?>
						<span class="screen-reader-text"><?php echo esc_html( $args['label'] ); ?></span>
						<?php
}
?>
					<img class="wp-ui-highlight" src="<?php echo esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ); ?>" 
											<?php
											if ( ! empty( $args['label'] ) ) {
												echo 'alt="' . esc_attr( $args['label'] ) . '"'; } ?>
	/>
				</label>

			<?php endforeach; ?>

		</div><!-- .image -->

		<script type="text/javascript">
			jQuery( document ).ready( function() {
				jQuery( '#<?php echo esc_attr( "input_{$this->id}" ); ?>' ).buttonset();

				if(jQuery("#_customize-input-after_menu_multiple_option").val()=='menu_btn')
        		{
          			jQuery("#customize-control-after_menu_btn_txt").show();
            		jQuery("#customize-control-after_menu_btn_link").show();
            		jQuery("#customize-control-after_menu_btn_new_tabl").show();
            		jQuery("#customize-control-after_menu_btn_border").show();
            		jQuery("#customize-control-after_menu_html").hide();  
            		jQuery("#customize-control-after_menu_widget_area_section").hide();
        		}
        		else if(jQuery("#_customize-input-after_menu_multiple_option").val()=='html')
            	{
            		jQuery("#customize-control-after_menu_btn_txt").hide();
            		jQuery("#customize-control-after_menu_btn_link").hide();
            		jQuery("#customize-control-after_menu_btn_new_tabl").hide();
            		jQuery("#customize-control-after_menu_btn_border").hide();
            		jQuery("#customize-control-after_menu_widget_area_section").hide();
            		jQuery("#customize-control-after_menu_html").show(); 
            	}
            	else if(jQuery("#_customize-input-after_menu_multiple_option").val()=='top_menu_widget')
            	{

            		jQuery("#customize-control-after_menu_btn_txt").hide();
            		jQuery("#customize-control-after_menu_btn_link").hide();
            		jQuery("#customize-control-after_menu_btn_new_tabl").hide();
            		jQuery("#customize-control-after_menu_btn_border").hide();
            		jQuery("#customize-control-after_menu_html").hide();
            		jQuery("#customize-control-after_menu_widget_area_section").show();
            	}
            	else
            	{
            		jQuery("#customize-control-after_menu_btn_txt").hide();
            		jQuery("#customize-control-after_menu_btn_link").hide();
            		jQuery("#customize-control-after_menu_btn_new_tabl").hide();
            		jQuery("#customize-control-after_menu_btn_border").hide();
            		jQuery("#customize-control-after_menu_html").hide();
            		jQuery("#customize-control-after_menu_widget_area_section").hide();
            	}

            	//Js For Homepage Slider Variation
            	if(jQuery("#_customize-input-slide_variation").val()=='slide')
        		{
	            	jQuery("#customize-control-slide_video_upload").hide();
    	        	jQuery("#customize-control-slide_video_url").hide();
        		}
        		else
        		{
            		jQuery("#customize-control-slide_video_upload").show();
            		jQuery("#customize-control-slide_video_url").show();
            	}
			} );
		</script>
	<?php
	}
	/**
	 * Loads the jQuery UI Button script and hooks our custom styles in.
	 *
	 * @since  1.1.24
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'jquery-ui-button' );
		add_action( 'customize_controls_print_styles', array( $this, 'print_styles' ) );
	}
	/**
	 * Outputs custom styles to give the selected image a visible border.
	 *
	 * @since  1.1.24
	 * @access public
	 * @return void
	 */
	public function print_styles() {
	?>

		<style type="text/css" id="hybrid-customize-radio-image-css">
			.customize-control-radio-image .ui-buttonset {
				text-align: center;
			}
			.footer_widget_area_placing-3, .footer_widget_area_placing-4, .footer_widget_area_placing-6
			{
				max-width: 32% !important;
			}
			.footer_widget_area_placing-3 .wp-ui-highlight, .footer_widget_area_placing-4 .wp-ui-highlight, .footer_widget_area_placing-6 .wp-ui-highlight {
    		background-color: #e6e6e6 !important;
			}
			.customize-control-radio-image label {
				display: inline-block;
				max-width: 49%;
				padding: 3px;
				font-size: inherit;
				line-height: inherit;
				height: auto;
				cursor: pointer;
				border-width: 0;
				-webkit-appearance: none;
				-webkit-border-radius: 0;
				border-radius: 0;
				white-space: nowrap;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				color: inherit;
				background: none;
				-webkit-box-shadow: none;
				box-shadow: none;
				vertical-align: inherit;
			}

			.customize-control-radio-image label:first-of-type {
				float: left;
			}
		

			.customize-control-radio-image label:hover {
				background: none;
				border-color: inherit;
				color: inherit;
			}

			.customize-control-radio-image label:active {
				background: none;
				border-color: inherit;
				-webkit-box-shadow: none;
				box-shadow: none;
				-webkit-transform: none;
				-ms-transform: none;
				transform: none;
			}

			.customize-control-radio-image img { border: 1px solid transparent; }
			.customize-control-radio-image .ui-state-active img {
				border-color: #5b9dd9;
				-webkit-box-shadow: 0 0 3px rgba(0,115,170,.8);
				box-shadow: 0 0 10px rgba(0,115,170,.8);
				background-color: #1e8cbe;
			}
			.customize-control-radio-image .header_logo_placing-eight img
			{
				background-color:rgba(0, 0, 0,0.8) !important;
			}
		</style>
	<?php
	}
}	
	$wp_customize->add_panel('honeypress_general_settings',
		array(
			'priority' => 124,
			'capability' => 'edit_theme_options',
			'title' => __('General Settings','honeypress')
		)
	);


	// Preloader
	$wp_customize->add_section(
        'preloader_section',
        array(
            'title' =>esc_html__('Preloader','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 1,
			
			)
    );

     $wp_customize->add_setting('preloader_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'preloader_enable',
		array(
			'label'    => esc_html__( 'Enable / Disable Preloader', 'honeypress' ),
			'section'  => 'preloader_section',
			'type'     => 'toggle',
			'priority' => 1,
		)
	));

	if ( class_exists( 'Honeypress_Header_Logo_Customize_Control_Radio_Image' ) ) {
			$wp_customize->add_setting(
				'preloader_style', array(
					'default'           => 1,
				)
			);

			$wp_customize->add_control(
				new Honeypress_Header_Logo_Customize_Control_Radio_Image(
					$wp_customize, 'preloader_style', array(
						'label'    => esc_html__('Preloader Style', 'honeypress' ),
						'description' => esc_html__('You can change the color skin of only first and second Preloader styles', 'honeypress' ),
						'priority' => 2,
						'section' => 'preloader_section',
						'choices' => array(
							1 => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/loader/preloader1.png',
							),
							2 => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/loader/preloader2.png',
							),
							3 => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/loader/preloader3.png',

							),
							4 => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/loader/preloader4.png',
								
							),
							5 => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/loader/preloader5.png',
								
							),
							6 => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/loader/preloader6.png',
								
							),
						),
					)
				)
			);
		}





	// After Menu
	$wp_customize->add_section(
        'after_menu_setting_section',
        array(
            'title' =>esc_html__('After Menu','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 3,
			)
    );

	//Dropdown button or html option
	$wp_customize->add_setting(
    'after_menu_multiple_option',
    array(
        'default'           =>  'none',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'honeypress_sanitize_select',
    ));
	$wp_customize->add_control('after_menu_multiple_option', array(
		'label' => esc_html__('After Menu','honeypress'),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_multiple_option',
		'type'    =>  'select',
		'choices' =>  array(
			'none'		=>	esc_html__('None', 'honeypress'),
			'menu_btn' 	=> esc_html__('Button', 'honeypress'),
			'html' 		=> esc_html__('HTML', 'honeypress'),
			'top_menu_widget' => esc_html__('Widget', 'honeypress'),
			)
	));

	//After Menu Button Text
	$wp_customize->add_setting(
    'after_menu_btn_txt',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'honeypress_sanitize_text',
    ));
	$wp_customize->add_control('after_menu_btn_txt', array(
		'label' => esc_html__('Button Text','honeypress'),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_txt',
		'type' => 'text',
	));

	//After Menu Button Text
	$wp_customize->add_setting(
    'after_menu_btn_link',
    array(
        'default'           =>  '#',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'esc_url_raw',
    ));
	$wp_customize->add_control('after_menu_btn_link', array(
		'label' => esc_html__('Button Link','honeypress'),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_link',
		'type' => 'text',
	));

	//Open in new tab
	$wp_customize->add_setting(
    'after_menu_btn_new_tabl',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'honeypress_sanitize_checkbox',
    ) );
	
	$wp_customize->add_control('after_menu_btn_new_tabl', array(
		'label' => esc_html__('Open link in a new tab','honeypress'),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_new_tabl',
		'type'    =>  'checkbox'
	));	

	//Border Radius
	$wp_customize->add_setting( 'after_menu_btn_border',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'after_menu_btn_border',
			array(
				'label' => esc_html__( 'Button Border Radius', 'honeypress' ),
				'section' => 'after_menu_setting_section',
				'input_attrs' => array(
					'min' => 0,
					'max' => 30,
					'step' => 1,),)
		));

	//After Menu HTML section
	$wp_customize->add_setting('after_menu_html', 
		array(
		'default'=>	'',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback'=> 'honeypress_sanitize_text',
		)
	);

	$wp_customize->add_control('after_menu_html', 
		array(
			'label'=> __('HTML','honeypress'),
			'section'=> 'after_menu_setting_section',
			'type'=> 'textarea',
		)
	);


	class WP_After_Menu_Widget_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php _e('To add widgets, Go to Widgets >> After Menu Widget Area','honeypress');?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'after_menu_widget_area_section',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_After_Menu_Widget_Customize_Control( $wp_customize, 'after_menu_widget_area_section', array(	
			'section' => 'after_menu_setting_section',
			'setting' => 'after_menu_widget_area_section',
	    ))
	);

	//Enable / Disable Cart Icon
    $wp_customize->add_setting('cart_btn_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'cart_btn_enable',
		array(
			'label'    => esc_html__( 'Enable / Disable Cart', 'honeypress' ),
			'section'  => 'after_menu_setting_section',
			'type'     => 'toggle',
		)
	));


	// Header Preset Section
	$wp_customize->add_section(
        'header_preset_setting_section',
        array(
            'title' =>__('Header Variations & Presets','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 99,
			
			)
    );
    if ( class_exists( 'Honeypress_Header_Logo_Customize_Control_Radio_Image' ) ) {
			$wp_customize->add_setting(
				'header_logo_placing', array(
					'default'           => 'left',
				)
			);

			$wp_customize->add_control(
				new Honeypress_Header_Logo_Customize_Control_Radio_Image(
					$wp_customize, 'header_logo_placing', array(
						'label'    => esc_html__('Header layouts', 'honeypress' ),
						'priority' => 6,
						'section' => 'header_preset_setting_section',
						'choices' => array(
							'left' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/header-preset/container-right.png',
							),
							'right' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/header-preset/container-left.png',
							),
							'center' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/header-preset/center.png',

							),
							'full' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/header-preset/full-left.png',
								
							),
							'five' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/header-preset/5.png',
								
							),
							'six' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/header-preset/6.png',
								
							),
							'seven' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/header-preset/7.png',
								
							),
							'eight' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/header-preset/8.png',
								
							),
						),
					)
				)
			);
		}

	// Sticky Header 
	$wp_customize->add_section(
        'sticky_header_section',
        array(
            'title' =>__('Sticky Header','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 99,
			
			)
    );

     $wp_customize->add_setting('sticky_header_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'sticky_header_enable',
		array(
			'label'    => __( 'Enable / Disable Sticky Header', 'honeypress' ),
			'section'  => 'sticky_header_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));

	//Differet logo for sticky header
	$wp_customize->add_setting('sticky_header_logo',
		array(
			'default' => false,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'sticky_header_logo',
		array(
			'label'    => __( 'Differet logo for sticky header', 'honeypress' ),
			'section'  => 'sticky_header_section',
			'type'     => 'toggle',
			'priority' 	=> 2,
		)
	));

	// Stick Header logo for Desktop
	$wp_customize->add_setting( 'sticky_header_logo_desktop', array(
			  'sanitize_callback' => 'esc_url_raw',
			) );
			
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sticky_header_logo_desktop', array(
			  'label'    => __( 'Logo for desktop view', 'honeypress' ),
			  'section'  => 'sticky_header_section',
			  'settings' => 'sticky_header_logo_desktop',
			  'active_callback' => 'sticky_header_logo_callback',
			  'priority' 	=> 3,
			) ) );

	// Stick Header logo for Mobile
	$wp_customize->add_setting( 'sticky_header_logo_mbl', array(
			  'sanitize_callback' => 'esc_url_raw',
			) );
			
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sticky_header_logo_mbl', array(
			  'label'    => __( 'Logo for mobile view', 'honeypress' ),
			  'section'  => 'sticky_header_section',
			  'settings' => 'sticky_header_logo_mbl',
			  'active_callback' => 'sticky_header_logo_callback',
			  'priority' 	=> 4,
			) ) );

	//Sticky Header Animation Effect
	$wp_customize->add_setting( 'sticky_header_animation', array( 'default' => '') );
	$wp_customize->add_control(	'sticky_header_animation', 
		array(
			'label'    => __( 'Animation Effect', 'honeypress' ),
			'section'  => 'sticky_header_section',
			'type'     => 'select',
			'choices'=>array(
				''=>__('None', 'honeypress'),
				'slide'=>__('Slide', 'honeypress'),
				'fade'=>__('Fade', 'honeypress'),
				'shrink'=>__('Shrink', 'honeypress'),
				)
	));

	//Sticky Header Enable
	$wp_customize->add_setting( 'sticky_header_device_enable', array( 'default' => 'desktop') );
	$wp_customize->add_control(	'sticky_header_device_enable', 
		array(
			'label'    => __( 'Enable', 'honeypress' ),
			'section'  => 'sticky_header_section',
			'type'     => 'select',
			'choices'=>array(
				'desktop'=>__('Desktop', 'honeypress'),
				'mobile'=>__('Mobile', 'honeypress'),
				'both'=>__('Desktop + Mobile', 'honeypress')
				)
	));

	$wp_customize->add_setting('sticky_header_opacity',
		array(
			'default' => 1.0,
			'capability'     => 'edit_theme_options',
			));

	$wp_customize->add_control(new honeypress_Opacity_Control( $wp_customize, 'sticky_header_opacity',
		array(
			'label'    => __( 'Sticky Opacity', 'honeypress' ),
			'section'  => 'sticky_header_section',
			'type'     => 'slider',
			'min' 	=> 0.1,
			'max'	=> 1.0,
		)
	));

	//Sticky Header Height
	$wp_customize->add_setting('sticky_header_height',
		array(
			'default' => 0,
			'capability'     => 'edit_theme_options',
			)
	);

	$wp_customize->add_control(new honeypress_Slider_Control( $wp_customize, 'sticky_header_height',
		array(
			'label'    => __( 'Sticky Height', 'honeypress' ),
			'description'    => esc_html__( 'Note: Sticky Height will not work with shrink effect', 'honeypress' ),
			'section'  => 'sticky_header_section',
			'type'     => 'slider',
			'min' 	=> 0,
			'max'	=> 50,
		)
	));

	// Search Effect settings
	$wp_customize->add_section(
        'search_effect_setting_section',
        array(
            'title' =>__('Search settings','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 100,
			
			)
    );	
	//Enable/Disable Search Effect
    $wp_customize->add_setting('search_btn_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'search_btn_enable',
		array(
			'label'    => __( 'Enable / Disable Search Icon', 'honeypress' ),
			'section'  => 'search_effect_setting_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));

    $wp_customize->add_setting('search_effect_style_setting', 
	array(
		'default' 			=> 'toogle',
		'sanitize_callback' => 'honeypress_sanitize_select'
		)
	);

	$wp_customize->add_control('search_effect_style_setting', 
	array(		
		'label' 	=> esc_html__('Choose Position', 'honeypress'),		
		'section' 	=> 'search_effect_setting_section',
		'type' 		=> 'radio',
		'active_callback' => 'search_icon_hide_show_callback',
		'choices' 	=>  array(
			'toogle' 	=> esc_html__('Toggle', 'honeypress'),
			'popup_light' 	=> esc_html__('Pop up light', 'honeypress'),
			'popup_dark' 	=> esc_html__('Pop up dark', 'honeypress'),
			)
		)
	);

	// add section to manage breadcrumb settings
	$wp_customize->add_section(
        'breadcrumb_setting_section',
        array(
            'title' =>__('Breadcrumb settings','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 100,
			
			)
    );


	// enable/disable banner
    $wp_customize->add_setting('banner_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'banner_enable',
		array(
			'label'    => __( 'Enable / Disable Banner', 'honeypress' ),
			'section'  => 'breadcrumb_setting_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));
	

	// enable/disable breadcrumb
    $wp_customize->add_setting('breadcrumb_setting_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'breadcrumb_setting_enable',
		array(
			'label'    => __( 'Enable / Disable Breadcrumb', 'honeypress' ),
			'section'  => 'breadcrumb_setting_section',
			'type'     => 'toggle',
			'priority' 				=> 2,
			'active_callback' => 'breadcrumb_callback',
		)
	));

	// Image overlay
    $wp_customize->add_setting('breadcrumb_image_overlay',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'breadcrumb_image_overlay',
		array(
			'label'    => __( 'Enable / Disable Overlay', 'honeypress' ),
			'section'  => 'breadcrumb_setting_section',
			'type'     => 'toggle',
			'priority' 				=> 2,
			'active_callback' => 'breadcrumb_callback',
		)
	));
		
	//Slider Background Overlay Color
	$wp_customize->add_setting( 'breadcrumb_overlay_section_color', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'rgba(0,0,0,0.8)',
        ) 
	);	
            
    $wp_customize->add_control(new honeypress_Customize_Alpha_Color_Control( $wp_customize,'breadcrumb_overlay_section_color', array(
        'label'      => __('Breadcrumb image overlay color','honeypress' ),
        'palette' => true,
        'active_callback' => 'breadcrumb_callback',
        'section' => 'breadcrumb_setting_section')
    ) );


    class WP_Bread_Img_Color_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_attr_e('Breadcrumb Images','honeypress'); ?></h3>
	    <?php
	    }
	}
	$wp_customize->add_setting(
	    'bread_img_change',
	    array(
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
	    )	
	);
	$wp_customize->add_control( new WP_Bread_Img_Color_Customize_Control( $wp_customize, 'bread_img_change', array(	
			'section' => 'breadcrumb_setting_section',
			'setting' => 'bread_img_change',
	    ))
	);

    //Bg Image for 404 page
	$wp_customize->add_setting( 'error_background_img', array(
			  'sanitize_callback' => 'esc_url_raw',
	) );
			
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'error_background_img', array(
			  'label'    => __( '404 Page', 'honeypress' ),
			  'section'  => 'breadcrumb_setting_section',
			  'settings' => 'error_background_img',
	) ) );

	//Bg Image for search page
	$wp_customize->add_setting( 'search_background_img', array(
			  'sanitize_callback' => 'esc_url_raw',
	) );
			
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'search_background_img', array(
			  'label'    => __( 'Search Page', 'honeypress' ),
			  'section'  => 'breadcrumb_setting_section',
			  'settings' => 'search_background_img',
	) ) );

	//Bg Image for date page
	$wp_customize->add_setting( 'date_background_img', array(
			  'sanitize_callback' => 'esc_url_raw',
	) );
			
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'date_background_img', array(
			  'label'    => __( 'Date Archive', 'honeypress' ),
			  'section'  => 'breadcrumb_setting_section',
			  'settings' => 'date_background_img',
	) ) );

	//Bg Image for author page
	$wp_customize->add_setting( 'author_background_img', array(
			  'sanitize_callback' => 'esc_url_raw',
	) );
			
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'author_background_img', array(
			  'label'    => __( 'Author Archive', 'honeypress' ),
			  'section'  => 'breadcrumb_setting_section',
			  'settings' => 'author_background_img',
	) ) );




	// add section to manage ribbon settings
	$wp_customize->add_section(
        'ribon_setting_section',
        array(
            'title' =>__('Ribbon settings','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 101,
			
			)
    );
	
	// enable/disable footer ribbon
    $wp_customize->add_setting('ribon_setting_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'ribon_setting_enable',
		array(
			'label'    => __( 'Enable / Disable Footer Ribbon', 'honeypress' ),
			'section'  => 'ribon_setting_section',
			'type'     => 'toggle',
			'priority' => 1,
		)
	));

	// Ribon title
	$wp_customize->add_setting(
		'ribon_title', array(
		'default' => __('Follow Us:', 'honeypress'),
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'ribon_title',
		array(
			'type' => 'text',
			'label' => __('Title','honeypress'),
			'section' => 'ribon_setting_section',
			'active_callback' => 'ribbon_callback',
		)
	);

	if ( class_exists( 'honeypress_Repeater' ) ) 
	{
		$wp_customize->add_setting( 'honeypress_ribon_content', array() );

		$wp_customize->add_control( new honeypress_Repeater( $wp_customize, 'honeypress_ribon_content', array(
			'label'                             => esc_html__( 'Social Icon Details', 'honeypress' ),
			'section'                           => 'ribon_setting_section',
			'active_callback' => 'ribbon_callback',
			'priority'                          => 10,
			'add_field_label'                   => esc_html__( 'Add new Social Icon', 'honeypress' ),
			'item_name'                         => esc_html__( 'Social Icon', 'honeypress' ),
			'customizer_repeater_icon_control'  => true,
			'customizer_repeater_title_control' => true,
			'customizer_repeater_link_control'  => true,
			'customizer_repeater_checkbox_control' => true,
		) ) );
	}


// Container Setting
	$wp_customize->add_section(
        'container_width_section',
        array(
            'title' =>__('Container Settings','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 102,
			
			)
    );
    
    //Container width
	$wp_customize->add_setting( 'container_width_pattern',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_width_pattern',
			array(
				'label'    => __( 'Container Width', 'honeypress' ),
				'priority' => 1,
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));


  	$wp_customize->add_setting( 'page_container_setting', array( 'default' => 'default') );
		$wp_customize->add_control(	'page_container_setting', 
		array(
			'label'    => __( 'Page layout', 'honeypress' ),
			'priority' => 2,
			'section'  => 'container_width_section',
			'type'     => 'select',
			'choices'=>array(
				'default'=>__('Default', 'honeypress'),
				'full_width_fluid'=>__('Full Width / Container Fluid', 'honeypress'),
				'full_width_streched'=>__('Full Width / Streatched', 'honeypress'),
				)
		));
		$wp_customize->add_setting( 'post_container_setting', array( 'default' => 'default') );
		$wp_customize->add_control(	'post_container_setting', 
		array(
			'label'    => __( 'Blog layout', 'honeypress' ),
			'priority' => 3,
			'section'  => 'container_width_section',
			'type'     => 'select',
			'choices'=>array(
				'default'=>__('Default', 'honeypress'),
				'full_width_fluid'=>__('Full Width / Container Fluid', 'honeypress'),
				'full_width_streched'=>__('Full Width / Streatched', 'honeypress'),
				)
		));
		$wp_customize->add_setting( 'single_post_container_setting', array( 'default' => 'default') );
		$wp_customize->add_control(	'single_post_container_setting', 
		array(
			'label'    => __( 'Single Post layout', 'honeypress' ),
			'priority' => 4,
			'section'  => 'container_width_section',
			'type'     => 'select',
			'choices'=>array(
				'default'=>__('Default', 'honeypress'),
				'full_width_fluid'=>__('Full Width / Container Fluid', 'honeypress'),
				'full_width_streched'=>__('Full Width / Streatched', 'honeypress'),
				)
		));


class WP_Home_Container_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Homepage sections container width','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'business_temp_container_width',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Home_Container_Customize_Control( $wp_customize, 'business_temp_container_width', array(	
		'section' => 'container_width_section',
		'setting' => 'business_temp_container_width',
    ))
);

		//Container Width For Slider Section
	$wp_customize->add_setting( 'container_slider_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_slider_width',
			array(
				'label'    => __( 'Slider', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));
	//Container Width For Service Section
	$wp_customize->add_setting( 'container_service_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_service_width',
			array(
				'label'    => __( 'Service', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));	
	//Container Width For Fun&Fact Section
	$wp_customize->add_setting( 'container_fun_fact_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_fun_fact_width',
			array(
				'label'    => __( 'FunFact', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));	

	//Container Width For Portfolio Section
	$wp_customize->add_setting( 'container_portfolio_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_portfolio_width',
			array(
				'label'    => __( 'Portfolio (This will not work with slider variation) ', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));	

	//Container Width For Testimonial Section
	$wp_customize->add_setting( 'container_testimonial_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_testimonial_width',
			array(
				'label'    => __( 'Testimonial', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));


	//Container Width For Blog Section
	$wp_customize->add_setting( 'container_home_blog_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_home_blog_width',
			array(
				'label'    => __( 'Blog', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));	


		//Container Width For CTA Section
	$wp_customize->add_setting( 'container_cta_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_cta_width',
			array(
				'label'    => __( 'Cta', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));	


	//Container Width For TEAM Section
	$wp_customize->add_setting( 'container_team_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_team_width',
			array(
				'label'    => __( 'Team', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));	


	//Container Width For SHOP Section
	$wp_customize->add_setting( 'container_shop_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_shop_width',
			array(
				'label'    => __( 'Shop', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));	


	//Container Width For Client & Partners Section
	$wp_customize->add_setting( 'container_clients_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Honeypress_Slider_Custom_Control( $wp_customize, 'container_clients_width',
			array(
				'label'    => __( 'Client & Partners', 'honeypress' ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1900,
					'step' => 1,),)
		));



// Post Navigation effect
	$wp_customize->add_section(
        'post_navigation_section',
        array(
            'title' =>__('Post Navigation Style','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 102,
			
			)
    );
    $wp_customize->add_setting('post_nav_style_setting', 
	array(
		'default' 			=> 'pagination',
		'sanitize_callback' => 'honeypress_sanitize_select'
		)
	);

	$wp_customize->add_control('post_nav_style_setting', 
	array(		
		'label' 	=> esc_html__('Choose Position', 'honeypress'),		
		'section' 	=> 'post_navigation_section',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'pagination' 	=> esc_html__('Pagination', 'honeypress'),
			'load_more' 	=> esc_html__('Load More', 'honeypress'),
			'infinite' 	=> esc_html__('Infinite Scroll', 'honeypress'),
			)
		)
	);
	
	// add section to manage scroll_to_top icon settings
	$wp_customize->add_section(
        'scrolltotop_setting_section',
        array(
            'title' =>__('Scroll to Top settings','honeypress'),
			'panel'  => 'honeypress_general_settings',
			'priority'   => 102,
			
			)
    );
	
	// enable/disable scroll_to_top icon
    $wp_customize->add_setting('scrolltotop_setting_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'scrolltotop_setting_enable',
		array(
			'label'    => __( 'Enable / Disable Scroll to Top Setting', 'honeypress' ),
			'section'  => 'scrolltotop_setting_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));


	$wp_customize->add_setting('scroll_position_setting', 
	array(
		'default' 			=> 'right',
		'sanitize_callback' => 'honeypress_sanitize_select'
		)
	);

	$wp_customize->add_control('scroll_position_setting', 
	array(		
		'label' 	=> esc_html__('Choose Position', 'honeypress'),		
		'section' 	=> 'scrolltotop_setting_section',
		'type' 		=> 'radio',
		'active_callback' => 'scroll_top_callback',
		'choices' 	=>  array(
			'left' 	=> esc_html__('Left', 'honeypress'),
			'right' 	=> esc_html__('Right', 'honeypress'),
			)
		)
	);

	
	$wp_customize->add_setting( 'honeypress_scroll_icon_class',
	array(
		'default'           => esc_html__('fa fa-arrow-up','honeypress'),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',	
		)
	);
	$wp_customize->add_control( 'honeypress_scroll_icon_class',
	array(
		'label'    => esc_html__( 'Icon Class Name', 'honeypress' ),
		'section'  => 'scrolltotop_setting_section',
		'type'     => 'text',
		'active_callback' => 'scroll_top_callback',	
		)
	);

		$wp_customize->add_setting( 'honeypress_scroll_border_radius',
	array(
		'default'           => 50,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_number_range',
		)
	);
	$wp_customize->add_control( 'honeypress_scroll_border_radius',
	array(
		'label'       => esc_html__( 'Border Radius', 'honeypress' ),
		'active_callback' => 'scroll_top_callback',
		'section'     => 'scrolltotop_setting_section',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 0, 'max' => 50, 'step' => 1, 'style' => 'width: 100%;' ),
	)
	);

	// enable/disable Callout section from service page
	$wp_customize->add_setting(
		'apply_scrll_top_clr_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		));

	$wp_customize->add_control(
		'apply_scrll_top_clr_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable To Apply Color Setting','honeypress'),
			'section' => 'scrolltotop_setting_section',
			'active_callback' => 'scroll_top_callback',
		)
	);



	$wp_customize->add_setting(
	'honeypress_scroll_bg_color', array(
	'capability'     => 'edit_theme_options',
	'default' => '#2d6ef8'
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'honeypress_scroll_bg_color', 
	array(
		'label'      => __( 'Background color', 'honeypress' ),
		'section'    => 'scrolltotop_setting_section',
		'settings'   => 'honeypress_scroll_bg_color',
		'active_callback' => 'scroll_top_callback',
	) ) );


	$wp_customize->add_setting(
	'honeypress_scroll_icon_color', array(
	'capability'     => 'edit_theme_options',
	'default' => '#fff'
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'honeypress_scroll_icon_color', 
	array(
		'label'      => __( 'Icon color', 'honeypress' ),
		'section'    => 'scrolltotop_setting_section',
		'settings'   => 'honeypress_scroll_icon_color',
		'active_callback' => 'scroll_top_callback',
	) ) );


	$wp_customize->add_setting(
	'honeypress_scroll_bghover_color', array(
	'capability'     => 'edit_theme_options',
	'default' => '#fff'
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'honeypress_scroll_bghover_color', 
	array(
		'label'      => __( 'Background Hover color', 'honeypress' ),
		'section'    => 'scrolltotop_setting_section',
		'settings'   => 'honeypress_scroll_bghover_color',
		'active_callback' => 'scroll_top_callback',
	) ) );


	$wp_customize->add_setting(
	'honeypress_scroll_iconhover_color', array(
	'capability'     => 'edit_theme_options',
	'default' => '#2d6ef8'
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'honeypress_scroll_iconhover_color', 
	array(
		'label'      => __( 'Icon Hover color', 'honeypress' ),
		'section'    => 'scrolltotop_setting_section',
		'settings'   => 'honeypress_scroll_iconhover_color',
		'active_callback' => 'scroll_top_callback',
	) ) );

	}

	add_action( 'customize_register', 'honeypress_general_settings_customizer' );
	
?>