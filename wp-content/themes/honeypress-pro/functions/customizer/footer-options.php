<?php
function honeypress_footer_customizer ( $wp_customize )
{
// Only For Footer Widgets	
class Honeypress_Footer_Widgets_Customize_Control_Radio_Image extends WP_Customize_Control {
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
			#customize-control-footer_widgets_section label {
				display: inline-block;
				max-width: 20% !important;
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


			#customize-control-footer_widgets_section .ui-buttonset
			{
				text-align: left !important;
			}

			
		</style>
	<?php
	}
}	

//Only For Footer Bar
class Honeypress_Footer_Bar_Customize_Control_Radio_Image extends WP_Customize_Control {
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

				//This Script for Home
				if(jQuery('#_customize-input-home_portfolio_design_layout').val()==1)
				{
					jQuery('#customize-control-portfolio_nav_style').show();
				}
				else
				{
					jQuery('#customize-control-portfolio_nav_style').hide();
				}
				wp.customize('home_portfolio_design_layout', function( value ) {
				value.bind(
				function( newval ) {
				if(newval==1)
				{
				jQuery('#customize-control-portfolio_nav_style').show();
				}
				else
				{
				jQuery('#customize-control-portfolio_nav_style').hide();	
				}
				}
				);
				}
				);

				//Home page news section
				if(jQuery('#_customize-input-home_news_design_layout').val()==2 || jQuery('#_customize-input-home_news_design_layout').val()==4)
				{
					jQuery('#customize-control-honeypress_homeblog_layout').hide();
				}
				else
				{
					jQuery('#customize-control-honeypress_homeblog_layout').show();
				}
				wp.customize('home_news_design_layout', function( value ) {
				value.bind(
				function( newval ) {
				if((newval==2) || (newval==4))
				{
				jQuery('#customize-control-honeypress_homeblog_layout').hide();
				}
				else
				{
				jQuery('#customize-control-honeypress_homeblog_layout').show();	
				}
				}
				);
				}
				);


				if((jQuery('#_customize-input-footer_bar_sec1').val()=="custom_text"))
				{
				jQuery('#customize-control-footer_copyright').show();	
				}
				else
				{
				jQuery('#customize-control-footer_copyright').hide();	
				}
				if((jQuery('#_customize-input-footer_bar_sec2').val()=="custom_text"))
				{
				jQuery('#customize-control-footer_copyright_2').show();	
				}
				else
				{
				jQuery('#customize-control-footer_copyright_2').hide();	
				}


				wp.customize('footer_bar_sec1', function( value ) {
				value.bind(
				function( newval ) {
				if(newval=="custom_text")
				{
				jQuery('#customize-control-footer_copyright').show();
				}
				else
				{
				jQuery('#customize-control-footer_copyright').hide();	
				}
				}
			);
		}
	);
				wp.customize('footer_bar_sec2', function( value ) {
				value.bind(
				function( newval ) {
				if(newval=="custom_text")
				{
				jQuery('#customize-control-footer_copyright_2').show();
				}
				else
				{
				jQuery('#customize-control-footer_copyright_2').hide();	
				}
				}
			);
		}
	);
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
			#customize-control-footer_widgets_section label {
				display: inline-block;
				max-width: 20% !important;
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


			#customize-control-footer_widgets_section .ui-buttonset
			{
				text-align: left !important;
			}

			
		</style>
	<?php
	}
}	


	// Footer Widgets Section
	$wp_customize->add_section(
        'honeypress_fwidgets_setting_section',
        array(
            'title' =>__('Footer Widgets','honeypress'),
			'panel' => 'honeypress_general_settings',
			'priority'   => 200,
			
			)
    );

    //Enable/Disable Footer Widgets
    $wp_customize->add_setting('ftr_widgets_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'ftr_widgets_enable',
		array(
			'label'    => __( 'Enable / Disable Footer Widgets', 'honeypress' ),
			'section'  => 'honeypress_fwidgets_setting_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));

    if ( class_exists( 'Honeypress_Footer_Widgets_Customize_Control_Radio_Image' ) ) {
			$wp_customize->add_setting(
				'footer_widgets_section', array(
					'default'           => '3',
				)
			);

			$wp_customize->add_control(
				new Honeypress_Footer_Widgets_Customize_Control_Radio_Image(
					$wp_customize, 'footer_widgets_section', array(
						'label'    => esc_html__('Footer widget layout', 'honeypress' ),
						'priority' => 199,
						'section' => 'honeypress_fwidgets_setting_section',
						'active_callback' => 'ftr_widgets_hide_show_callback',
						'choices' => array(
							'1' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/1.png',
							),
							'2' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/2.png',

							),
							'3' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/3.png',
								
							),
							'4' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/4.png',
								
							),
							'5' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/3-3-6.png',
								
							),
							'6' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/3-6-3.png',
								
							),
							'7' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/6-3-3.png',
								
							),
							'8' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/8-4.png',
								
							),
							'9' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-widgets/4-8.png',
								
							),
						),
					)
				)
			);
		}

		//Footer Background Image
			$wp_customize->add_setting( 'ftr_wgt_background_img', array(
			  'sanitize_callback' => 'esc_url_raw',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ftr_wgt_background_img', array(
			  'label'    => __( 'Footer Widgets Background Image', 'honeypress' ),
			  'priority' => 200,
			  'section'  => 'honeypress_fwidgets_setting_section',
			  'settings' => 'ftr_wgt_background_img',
			  'active_callback' => 'ftr_widgets_hide_show_callback',
			) ) );

		//Footer Widget Repeat
		$wp_customize->add_setting( 'footer_widget_reapeat', array( 'default' => 'no-repeat') );
		$wp_customize->add_control(	'footer_widget_reapeat', 
		array(
			'label'    => __( 'Background Image Repeat', 'honeypress' ),
			'priority' => 201,
			'active_callback' => 'ftr_widgets_hide_show_callback',
			'section'  => 'honeypress_fwidgets_setting_section',
			'type'     => 'select',
			'choices'=>array(
				'no-repeat'=>__('No Repeat', 'honeypress'),
				'repeat'=>__('Repeat All', 'honeypress'),
				'repeat-x'=>__('Repeat Horizontally', 'honeypress'),
				'repeat-y'=>__('Repeat Vertically', 'honeypress'),
				)
		));

		//Footer Widget position
		$wp_customize->add_setting( 'footer_widget_position', array( 'default' => 'left top') );
		$wp_customize->add_control(	'footer_widget_position', 
		array(
			'label'    => __( 'Background Image Position', 'honeypress' ),
			'priority' => 201,
			'active_callback' => 'ftr_widgets_hide_show_callback',
			'section'  => 'honeypress_fwidgets_setting_section',
			'type'     => 'select',
			'choices'=>array(
				'left top'=>__('Left Top', 'honeypress'),
				'left center'=>__('Left Center', 'honeypress'),
				'left bottom'=>__('left bottom', 'honeypress'),
				'right top'=>__('Right Top', 'honeypress'),
				'right center'=>__('Right Center', 'honeypress'),
				'right bottom'=>__('Right Bottom', 'honeypress'),
				'center top'=>__('Center Top', 'honeypress'),
				'center center'=>__('Center Center', 'honeypress'),
				'center bottom'=>__('Center Bottom', 'honeypress'),
				)
		));

		//Footer Widget Size
		$wp_customize->add_setting( 'footer_widget_bg_size', array( 'default' => 'cover') );
		$wp_customize->add_control(	'footer_widget_bg_size', 
		array(
			'label'    => __( 'Background Size', 'honeypress' ),
			'priority' => 201,
			'active_callback' => 'ftr_widgets_hide_show_callback',
			'section'  => 'honeypress_fwidgets_setting_section',
			'type'     => 'select',
			'choices'=>array(
				'cover'=>__('Cover', 'honeypress'),
				'contain'=>__('Contain', 'honeypress'),
				'auto'=>__('Auto', 'honeypress'),
				)
		));

		//Footer Widget Background Attachment
		$wp_customize->add_setting( 'footer_widget_bg_attachment', array( 'default' => 'scroll') );
		$wp_customize->add_control(	'footer_widget_bg_attachment', 
		array(
			'label'    => __( 'Background Attachment', 'honeypress' ),
			'description' => __('Note: Background Image Repeat and Background Image Position will not work with Background Attachment Fixed property','honeypress'),
			'priority' => 201,
			'active_callback' => 'ftr_widgets_hide_show_callback',
			'section'  => 'honeypress_fwidgets_setting_section',
			'type'     => 'select',
			'choices'=>array(
				'scroll'=>__('Scroll', 'honeypress'),
				'fixed'=>__('Fixed', 'honeypress'),
				)
		));
			
		// Image overlay
		$wp_customize->add_setting( 'honeypress_fwidgets_image_overlay', array(
			'default' => true,
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control('honeypress_fwidgets_image_overlay', array(
			'label'    => __('Enable Footer Widgets image overlay', 'honeypress' ),
			'priority' => 201,
			'active_callback' => 'ftr_widgets_hide_show_callback',
			'section'  => 'honeypress_fwidgets_setting_section',
			'type' => 'checkbox',
		) );
		
		
		//Testimonial Background Overlay Color
		$wp_customize->add_setting( 'honeypress_fwidgets_overlay_section_color', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'rgba(0, 0, 0, 0.7)',
            ) );	
            
            $wp_customize->add_control(new honeypress_Customize_Alpha_Color_Control( $wp_customize,'honeypress_fwidgets_overlay_section_color', array(
               'label'      => __('Footer Widgets image overlay color','honeypress' ),
               'priority' => 202,
               'active_callback' => 'ftr_widgets_hide_show_callback',
                'palette' => true,
                'section' => 'honeypress_fwidgets_setting_section')
            ) );


	$wp_customize->add_section('footer_section',
		array(
			'title' => esc_html__('Footer Bar','honeypress'),
			'priority' => 200,
			'panel' => 'honeypress_general_settings',
		)
	);

/************************* Eanble Footer *********************************/


    //Enable/Disable Foot bar
    $wp_customize->add_setting('ftr_bar_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'ftr_bar_enable',
		array(
			'label'    => __( 'Enable / Disable Footer Bar', 'honeypress' ),
			'section'  => 'footer_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));

	if ( class_exists( 'Honeypress_Footer_Bar_Customize_Control_Radio_Image' ) ) {
			$wp_customize->add_setting(
				'advance_footer_bar_section', array(
					'default'           => '1',
				)
			);

			$wp_customize->add_control(
				new Honeypress_Footer_Bar_Customize_Control_Radio_Image(
					$wp_customize, 'advance_footer_bar_section', array(
						'label'    => esc_html__('Footer Bar layout', 'honeypress' ),
						'priority' => 2,
						'active_callback'=> 'honeypress_footer_callback',
						'section' => 'footer_section',
						//'active_callback' => 'ftr_widgets_hide_show_callback',
						'choices' => array(
							'1' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-bar/footer-layout-1-76x48.png',
							),
							'2' => array(
								'url' => trailingslashit( HONEYPRESS_PRO_TEMPLATE_DIR_URI ) . 'assets/images/footer-bar/footer-layout-2-76x48.png',

							),
						),
					)
				)
			);
		}

		//Footer bar section 1
		$wp_customize->add_setting( 'footer_bar_sec1', array( 'default' => 'custom_text') );
		$wp_customize->add_control(	'footer_bar_sec1', 
		array(
			'label'    => __( 'Section 1', 'honeypress' ),
			'priority' => 3,
			'active_callback'=> 'honeypress_footer_callback',
			'section'  => 'footer_section',
			'type'     => 'select',
			'choices'=>array(
				'none'=>__('None', 'honeypress'),
				'footer_menu'=>__('Footer Menu', 'honeypress'),
				'custom_text'=>__('Custom Text', 'honeypress'),
				'widget'=>__('Widget', 'honeypress')
				)
		));


/************************* Copyright Section 1*********************************/
	$wp_customize->add_setting('footer_copyright', 
		array(
		'default'=>	'<p>'.__( 'Copyright 2019 <a href="#"> SpiceThemes</a> All right reserved', 'honeypress' ).' </p>',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback'=> 'honeypress_copyright_sanitize_text',
		)
	);

	$wp_customize->add_control('footer_copyright', 
		array(
			'label'=> __('Copyright Section 1','honeypress'),
			'section'=> 'footer_section',
			'type'=> 'textarea',
			'priority'=> 4,
			'active_callback'=> 'honeypress_footer_callback'
		)
	);

	//Footer bar section 2
		$wp_customize->add_setting( 'footer_bar_sec2', array( 'default' => 'none') );
		$wp_customize->add_control(	'footer_bar_sec2', 
		array(
			'label'    => __( 'Section 2', 'honeypress' ),
			'priority' => 5,
			'active_callback'=> 'honeypress_footer_callback',
			'section'  => 'footer_section',
			'type'     => 'select',
			'choices'=>array(
				'none'=>__('None', 'honeypress'),
				'footer_menu'=>__('Footer Menu', 'honeypress'),
				'custom_text'=>__('Custom Text', 'honeypress'),
				'widget'=>__('Widget', 'honeypress')
				)
		));

/************************* Copyright Section 2*********************************/
	$wp_customize->add_setting('footer_copyright_2', 
		array(
		'default'=>	'<p>'.__( 'Copyright 2019 <a href="#"> SpiceThemes</a> All right reserved', 'honeypress' ).' </p>',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback'=> 'honeypress_copyright_sanitize_text',
		)
	);

	$wp_customize->add_control('footer_copyright_2', 
		array(
			'label'=> __('Copyright Section 2','honeypress'),
			'section'=> 'footer_section',
			'type'=> 'textarea',
			'priority'=> 6,
			'active_callback'=> 'honeypress_footer_callback'
		)
	);	

	//Footer Bar Border
	$wp_customize->add_setting('footer_bar_border',
		array(
			'default' => 0,
			'capability'     => 'edit_theme_options',
			)
	);

	$wp_customize->add_control(new honeypress_Slider_Control( $wp_customize, 'footer_bar_border',
		array(
			'label'    => __( 'Footer Bar Border', 'honeypress' ),
			'active_callback'=> 'honeypress_footer_callback',
			'section'  => 'footer_section',
			'type'     => 'slider',
			'min' 	=> 0,
			'max'	=> 100,
		)
	));	

	//Footer Bar Border Color
	$wp_customize->add_setting(
	'honeypress_footer_border_clr', array(
	'capability'     => 'edit_theme_options',
	'default' => '#fff'
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'honeypress_footer_border_clr', 
	array(
		'label'      => __( 'Border Color', 'honeypress' ),
		'section'    => 'footer_section',
		'settings'   => 'honeypress_footer_border_clr',
		'active_callback'=> 'honeypress_footer_callback',
	) ) );

	//Footer Bar border Style
		$wp_customize->add_setting( 'footer_border_style', array( 'default' => 'solid') );
		$wp_customize->add_control(	'footer_border_style', 
		array(
			'label'    => __( 'Border Style', 'honeypress' ),
			'active_callback'=> 'honeypress_footer_callback',
			'section'  => 'footer_section',
			'type'     => 'select',
			'choices'=>array(
				'solid'=>__('Solid', 'honeypress'),
				'dotted'=>__('Dotted', 'honeypress'),
				'dashed'=>__('Dashed', 'honeypress'),
				'double'=>__('Double', 'honeypress'),
				'groove'=>__('Groove', 'honeypress'),
				'ridge'=>__('Ridge', 'honeypress'),
				'inset'=>__('Inset', 'honeypress'),
				'outset'=>__('Outset', 'honeypress')
				)
		));

}
add_action('customize_register','honeypress_footer_customizer');