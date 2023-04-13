<?php
/* * *********************** Theme Customizer with Sanitize function ******************************** */
function spicepress_theme_option($wp_customize) {
    $selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';
    /**
     * Register Custom Slider Controls
     */
    require_once ST_TEMPLATE_DIR . '/inc/customizer/slider/class-slider-control.php';
    require_once ST_TEMPLATE_DIR . '/inc/customizer/slider/class-opacity-control.php';
    require_once ST_TEMPLATE_DIR . '/inc/customizer/toggle/class-toggle-control.php';
    $wp_customize->register_control_type('spicepress_Slider_Control');
    $wp_customize->register_control_type('spicepress_Toggle_Control');
    $wp_customize->register_control_type('spicepress_Opacity_Control');

    $wp_customize->add_panel('spicepress_theme_panel',
            array(
                'priority' => 1,
                'capability' => 'edit_theme_options',
                'title' => esc_html__('Spicepress Theme Blog Option', 'spicepress')
            )
    );
}
add_action('customize_register', 'spicepress_theme_option');
function spicepress_blog_customizer ( $wp_customize )
{
$wp_customize->add_section('spicepress_blog_section', 
	array(
	'title' => __('Blog Section' , 'spicepress'),
	'panel' => 'spicepress_theme_panel',
	'priority' => 4,
));
/******************** Blog Content *******************************/
$wp_customize->add_setting('spicepress_blog_content', 
	array(
		'default' 			=> __('excerpt','spicepress'),
		'sanitize_callback' => 'spicepress_sanitize_select'
		)
	);

$wp_customize->add_control('spicepress_blog_content', 
	array(		
		'label' 	=> __('Choose Options', 'spicepress'),		
		'section' 	=> 'spicepress_blog_section',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'excerpt' 	=> __('Excerpt', 'spicepress'),
			'content' 	=> __('Full Content', 'spicepress'),
			)
		)
	);

/******************** Blog Length *******************************/
$wp_customize->add_setting( 'spicepress_blog_content_length',
	array(
		'default'           => 30,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spicepress_sanitize_number_range',
		)
);
$wp_customize->add_control( 'spicepress_blog_content_length',
	array(
		'label'       => __( 'Excerpt Length', 'spicepress' ),
		'section'     => 'spicepress_blog_section',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 10, 'max' => 200, 'step' => 1, 'style' => 'width: 200px;' ),
	)
);

/************************* Blog Button Title*********************************/
$wp_customize->add_setting( 'spicepress_blog_button_title',
	array(
		'default'           => __('Read More','spicepress'),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',	
		)
	);
$wp_customize->add_control( 'spicepress_blog_button_title',
	array(
		'label'    => __( 'Excerpt Read More Button Title', 'spicepress' ),
		'section'  => 'spicepress_blog_section',
		'type'     => 'text',	
		)
	);

/************************* Enable Author*********************************/
$wp_customize->add_setting( 'spicepress_enable_blog_author',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spicepress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new spicepress_Toggle_Control( $wp_customize,  'spicepress_enable_blog_author',
	array(
		'label'    => __( 'Hide / Show Author', 'spicepress' ),
		'section'  => 'spicepress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Enable Date*********************************/
$wp_customize->add_setting( 'spicepress_enable_blog_date',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spicepress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new spicepress_Toggle_Control( $wp_customize,  'spicepress_enable_blog_date',
	array(
		'label'    => __( 'Hide / Show Date', 'spicepress' ),
		'section'  => 'spicepress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Enable Category*********************************/
$wp_customize->add_setting( 'spicepress_enable_blog_category',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spicepress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new spicepress_Toggle_Control( $wp_customize,   'spicepress_enable_blog_category',
	array(
		'label'    => __( 'Hide / Show Category', 'spicepress' ),
		'section'  => 'spicepress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Enable Blog Tags*********************************/
$wp_customize->add_setting('spicepress_enable_blog_post_tag',
            array(
                'default' => true,
                'sanitize_callback' => 'spicepress_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'spicepress_enable_blog_post_tag',
                    array(
                'label' => __('Hide/Show Tag', 'spicepress'),
                'type' => 'toggle',
                'section' => 'spicepress_blog_section',
                )
    ));
    
/************************* Enable Continue Reading Button*********************************/
$wp_customize->add_setting( 'spicepress_enable_blog_read_button',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spicepress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new spicepress_Toggle_Control( $wp_customize, 'spicepress_enable_blog_read_button',
	array(
		'label'    => __( 'Hide / Show Read More Button', 'spicepress' ),
		'section'  => 'spicepress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Blog Meta Rearrange*********************************/
$default = array( 'blog_author', 'blog_date', 'blog_commment');

$choices = array(
		'blog_author' => __( 'Author', 'spicepress' ),
		'blog_date' => __( 'Date', 'spicepress' ),
		'blog_commment' => __( 'Comment', 'spicepress' ),
	);
}
add_action( 'customize_register', 'spicepress_blog_customizer' );

/**
 * Single Blog Options Customizer
 *
 * @package SpicePress
 */

function spicepress_rt_post_callback($control) {
    if (true == $control->manager->get_setting('spicepress_enable_related_post')->value()) {
        return true;
    } else {
        return false;
    }
}
function spicepress_single_blog_customizer($wp_customize) {
    $wp_customize->add_section('spicepress_single_blog_section',
            array(
                'title' => __('Single Post', 'spicepress'),
                'panel' => 'spicepress_theme_panel',
                'priority' => 5
    ));

    /*     * *********************** Related Post  ******************************** */

    $wp_customize->add_setting('spicepress_enable_related_post',
            array(
                'default' => true,
                'sanitize_callback' => 'spicepress_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'spicepress_enable_related_post',
                    array(
                'label' => __('Enable Related Post', 'spicepress'),
                'type' => 'toggle',
                'section' => 'spicepress_single_blog_section',
                'priority' => 1,
                    )
    ));

    /*     * *********************** Related Post Title  ******************************** */

    $wp_customize->add_setting('spicepress_related_post_title',
            array(
                'default' => __('Related Posts', 'spicepress'),
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('spicepress_related_post_title',
            array(
                'label' => __('Related Post Title', 'spicepress'),
                'type' => 'text',
                'section' => 'spicepress_single_blog_section',
                'priority' => 2,
                'active_callback' => 'spicepress_rt_post_callback',
            )
    );

    /*     * *********************** Related Post Option ******************************** */

    $wp_customize->add_setting('spicepress_related_post_option',
            array(
                'default' => __('categories', 'spicepress'),
                'sanitize_callback' => 'spicepress_sanitize_select'
            )
    );

    $wp_customize->add_control('spicepress_related_post_option',
            array(
                'label' => __('Related Post Option', 'spicepress'),
                'section' => 'spicepress_single_blog_section',
                'settings' => 'spicepress_related_post_option',
                'active_callback' => 'spicepress_rt_post_callback',
                'priority' => 3,
                'type' => 'select',
                'choices' => array(
                    'categories' => __('All', 'spicepress'),
                    'tags' => __('Related by tags', 'spicepress'),
                )
            )
    );

    /*     * *********************** Meta Hide Show ******************************** */

    $wp_customize->add_setting('spicepress_enable_single_post_category',
            array(
                'default' => true,
                'sanitize_callback' => 'spicepress_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'spicepress_enable_single_post_category',
                    array(
                'label' => __('Hide/Show Categroy', 'spicepress'),
                'type' => 'toggle',
                'section' => 'spicepress_single_blog_section',
                'priority' => 4,
                    )
    ));

    $wp_customize->add_setting('spicepress_enable_single_post_date',
            array(
                'default' => true,
                'sanitize_callback' => 'spicepress_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'spicepress_enable_single_post_date',
                    array(
                'label' => __('Hide/Show Date', 'spicepress'),
                'type' => 'toggle',
                'section' => 'spicepress_single_blog_section',
                'priority' => 6,
                    )
    ));

    $wp_customize->add_setting('spicepress_enable_single_post_admin',
            array(
                'default' => true,
                'sanitize_callback' => 'spicepress_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'spicepress_enable_single_post_admin',
                    array(
                'label' => __('Hide/Show Author Name', 'spicepress'),
                'type' => 'toggle',
                'section' => 'spicepress_single_blog_section',
                'priority' => 5,
                    )
    ));

    $wp_customize->add_setting('spicepress_enable_single_post_tag',
            array(
                'default' => true,
                'sanitize_callback' => 'spicepress_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'spicepress_enable_single_post_tag',
                    array(
                'label' => __('Hide/Show Tag', 'spicepress'),
                'type' => 'toggle',
                'section' => 'spicepress_single_blog_section',
                'priority' => 8,
                    )
    ));
    $wp_customize->add_setting('spicepress_enable_single_post_admin_details',
            array(
                'default' => true,
                'sanitize_callback' => 'spicepress_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new spicepress_Toggle_Control($wp_customize, 'spicepress_enable_single_post_admin_details',
                    array(
                'label' => __('Hide/Show Author Details', 'spicepress'),
                'type' => 'toggle',
                'section' => 'spicepress_single_blog_section',
                'priority' => 9,
                    )
    ));
}

add_action('customize_register', 'spicepress_single_blog_customizer');