<?php 
function honeypress_layout_settings_customizer( $wp_customize ){

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

/* Header Layout Settings Panel */
	$wp_customize->add_panel( 'layout_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Layout','honeypress'),
	) );
	
	/* Header image media section */
	$wp_customize->add_section( 'header_media_image_settings', array(
		'title' => esc_html__('Header', 'honeypress'),
		'panel' => 'layout_settings',
   	) );
	
	/* Header image media setting */
	$wp_customize->add_setting( 'header_image_setting', array(
			  'sanitize_callback' => 'esc_url_raw',
			  
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image_setting', array(
			  'label'    => esc_html__( 'Banner Image', 'honeypress' ),
			  'section'  => 'header_media_image_settings',
			  'description' => esc_html__('This is the default banner image used in pages / posts / blog / archive.','honeypress'),
			  'settings' => 'header_image_setting',
	) ) );
	
	
    /* footer copyright section */
	$wp_customize->add_section( 'honeypress_footer_copyright' , array(
		'title'      => esc_html__('Footer','honeypress'),
		'panel'  => 'layout_settings',
   	) );
	
	
	$wp_customize->add_setting(
		'footer_copyright_text',
		array(
			'sanitize_callback' =>  'honeypress_copyright_sanitize_text',
			'default'           =>  '<p>'.__('<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://spicethemes.com" rel="designer">honeypress</a> by SpiceThemes','honeypress').'</p>',
			'capability'        =>  'edit_theme_options',
			'transport'         => $selective_refresh,
		)	
	);
	$wp_customize->add_control('footer_copyright_text', array(
			'label' => esc_html__('Copyright text','honeypress'),
			'section' => 'honeypress_footer_copyright',
			'type'    =>  'textarea'
	));	 // footer copyright
	
	
	//Plus Footer
		class WP_footer_plus_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		 <div class="pro-vesrion">
		 <P><?php esc_html_e('More options available for Layout section in honeypress Plus','honeypress');?></P>
		 </div>
		  <div class="pro-box">
		 <a href="<?php echo esc_url('https://helpdoc.spicethemes.com/honeypress/customizing-honeypress/#layout_honeypress_plus');?>" class="read-more-button" id="review_plus" target="_blank"><?php esc_html_e( 'Read More','honeypress' ); ?></a>
		 <div>
		<?php
		}
	    }

		$wp_customize->add_setting(
			'add_plus_footer',
			array(
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)	
		);
		$wp_customize->add_control( new WP_footer_plus_Customize_Control( $wp_customize, 'add_plus_footer', array(	
				'section' => 'honeypress_footer_copyright',
				'setting' => 'add_plus_footer',
		
		)));
	
	
	
	// Add section to manage Blog
	$wp_customize->add_section(
        'blog_page_setting',
        array(
            'title' => esc_html__('Blog / Archive','honeypress'),
            'panel'  => 'layout_settings',
			'priority'   => 300,
			
			)
    );
	
		// enable / disable meta section 
		$wp_customize->add_setting(
			'blog_meta_section_enable',
			array('capability'  => 'edit_theme_options',
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox',
			
			));
		$wp_customize->add_control(
			'blog_meta_section_enable',
			array(
				'type' => 'checkbox',
				'label' => esc_html__('Enable post meta values, like author name, date, comments, etc.','honeypress'),
				'section' => 'blog_page_setting',
			)
		);
	
	//  Archive pages title section
	
	$wp_customize->add_section(
        'breadcrumbs_setting',
        array(
            'title' => esc_html__('Archive pages title','honeypress'),
            'description' =>'',
			'panel'  => 'layout_settings',
			'priority' => 800,
			)
    );

		$wp_customize->add_setting(
		'archive_prefix',
		array(
			'default' => esc_html__('Archive','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'honeypress_template_page_sanitize_text',
			)
		);	
		$wp_customize->add_control( 'archive_prefix',array(
		'label'   => esc_html__('Archive','honeypress'),
		'section' => 'breadcrumbs_setting',
		 'type' => 'text'
		));	
		
		$wp_customize->add_setting(
		'category_prefix',
		array(
			'default' => esc_html__('Category','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'honeypress_template_page_sanitize_text',
			)
		);	
		$wp_customize->add_control( 'category_prefix',array(
		'label'   => esc_html__('Category','honeypress'),
		'section' => 'breadcrumbs_setting',
		 'type' => 'text'
		));

		$wp_customize->add_setting(
		'author_prefix',
		array(
			'default' => esc_html__('All posts by','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'honeypress_template_page_sanitize_text',
			)
		);	
		$wp_customize->add_control( 'author_prefix',array(
		'label'   => esc_html__('Author','honeypress'),
		'section' => 'breadcrumbs_setting',
		 'type' => 'text'
		));
		
		$wp_customize->add_setting(
		'tag_prefix',
		array(
			'default' => esc_html__('Tag','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'honeypress_template_page_sanitize_text',
			)
		);	
		$wp_customize->add_control( 'tag_prefix',array(
		'label'   => esc_html__('Tag','honeypress'),
		'section' => 'breadcrumbs_setting',
		 'type' => 'text'
		));
		
		
		$wp_customize->add_setting(
		'search_prefix',
		array(
			'default' => esc_html__('Search results for','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'honeypress_template_page_sanitize_text',
			)
		);	
		$wp_customize->add_control( 'search_prefix',array(
		'label'   => esc_html__('Search','honeypress'),
		'section' => 'breadcrumbs_setting',
		 'type' => 'text'
		));
		
		$wp_customize->add_setting(
		'404_prefix',
		array(
			'default' => esc_html__('404','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'honeypress_template_page_sanitize_text',
			)
		);	
		$wp_customize->add_control( '404_prefix',array(
		'label'   => esc_html__('404','honeypress'),
		'section' => 'breadcrumbs_setting',
		 'type' => 'text'
		));
		
		$wp_customize->add_setting(
		'shop_prefix',
		array(
			'default' => esc_html__('Shop','honeypress'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'honeypress_template_page_sanitize_text',
			)
		);	
		$wp_customize->add_control( 'shop_prefix',array(
		'label'   => esc_html__('Shop','honeypress'),
		'section' => 'breadcrumbs_setting',
		 'type' => 'text'
		));
	
}
add_action( 'customize_register', 'honeypress_layout_settings_customizer' );


function honeypress_footer_copyright_text_render_callback() {
	return get_theme_mod( 'footer_copyright_text' );
}

function honeypress_template_page_sanitize_text( $input ) {

	return wp_kses_post( force_balance_tags( $input ) );

}

function honeypress_theme_slug_sanitize_html( $html ) {
	
	return wp_filter_post_kses( $html );
	
}

function honeypress_copyright_sanitize_text( $input ) 
{
	return wp_kses_post( force_balance_tags( $input ) );
}