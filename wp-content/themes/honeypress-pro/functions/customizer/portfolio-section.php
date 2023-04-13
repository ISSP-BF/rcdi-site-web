<?php
$wp_customize->add_section( 'portfolio_section' , array(
	'title'      => __('Portfolio settings', 'honeypress'),
	'panel'  => 'section_settings',
	'priority'   => 13,
) );
		
// Enable portfolio more btn
$wp_customize->add_setting('portfolio_section_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox'
			));
$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'portfolio_section_enable',
		array(
			'label'    => __( 'Enable / Disable Home Portfolio section', 'honeypress' ),
			'section'  => 'portfolio_section',
			'type'     => 'toggle',
			'priority' 				=> 1,
		)
	));
		
//section title
$wp_customize->add_setting( 'home_portfolio_section_title',array(
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
	'default' => __('Our Portfolio','honeypress'),
));

$wp_customize->add_control( 'home_portfolio_section_title',array(
	'label'   => __('Sub title','honeypress'),
	'section' => 'portfolio_section',
	'active_callback' => 'honeypress_portfolio_callback',
	'type' => 'text',
));	
		
$wp_customize->add_setting( 'home_portfolio_section_subtitle',array(
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'honeypressp_home_page_sanitize_text',
	'default' => __('View Our Recent Works','honeypress'),
));	

$wp_customize->add_control( 'home_portfolio_section_subtitle',array(
	'label'   => __('Title','honeypress'),
	'section' => 'portfolio_section',
	'active_callback' => 'honeypress_portfolio_callback',
	'type' => 'textarea',
));

//link
class WP_client_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';
	/**
	* Render the control's content.
	*/
	public function render_content() {
	?>
		<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=honeypress_portfolio" class="button"  target="_blank"><?php _e( 'Click here to add project', 'honeypress' ); ?></a>
		<?php
		}
	}

$wp_customize->add_setting(
		'pro_project',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
);

$wp_customize->add_control( new WP_client_Customize_Control( $wp_customize, 'pro_project', array(	
	'section' => 'portfolio_section',
	'active_callback' => 'honeypress_portfolio_callback',
	))
);
		
	//Style Design
		$wp_customize->add_setting( 'home_portfolio_design_layout', array( 'default' => 1) );
		$wp_customize->add_control(	'home_portfolio_design_layout', 
		array(
			'label'    => __( 'Design Style', 'honeypress' ),
			'active_callback'=> 'honeypress_portfolio_callback',
			'section'  => 'portfolio_section',
			'type'     => 'select',
			'choices'=>array(
				1=>__('Design 1', 'honeypress'),
				2=>__('Design 2', 'honeypress'),
				3=>__('Design 3', 'honeypress'),
				4=>__('Design 4', 'honeypress')
				)
		));
		
	//Navigation Type
		$wp_customize->add_setting( 'portfolio_nav_style' , array( 'default' => 'navigation') );
			$wp_customize->add_control(	'portfolio_nav_style' , array(
					'label'    => __( 'Navigation Style', 'honeypress' ),
					'section'  => 'portfolio_section',
					'active_callback' => 'honeypress_portfolio_callback',
					'type'     => 'radio',
					'priority' => 17,
					'choices' => array(
						'bullets'=>__('Bullets', 'honeypress'),
						'navigation'=>__('Navigation', 'honeypress'),
						'both'=>__('Both', 'honeypress'),
					)
			));

	/**
	 * Add Partial.
	 */
	//For Sub Title
	$wp_customize->selective_refresh->add_partial( 'home_portfolio_section_title', array(
		'selector'            => '.home .portfolio .home_project_title',
		'settings'            => 'home_portfolio_section_title',
	) );

	//For Title
	$wp_customize->selective_refresh->add_partial( 'home_portfolio_section_subtitle', array(
		'selector'            => '.home .portfolio .home_project_subtitle',
		'settings'            => 'home_portfolio_section_subtitle',
	) );