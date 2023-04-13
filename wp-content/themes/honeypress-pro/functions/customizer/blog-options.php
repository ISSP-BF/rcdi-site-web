<?php
/**
 * Blog Options Customizer
 *
 * @package honeypress
 */

function honeypress_blog_customizer ( $wp_customize )
{

$wp_customize->add_section('honeypress_blog_section', 
	array(
	'title' => __('Blog Section' , 'honeypress'),
	'panel' => 'honeypress_theme_panel',
	'priority' => 4,
));



/******************** Blog Content *******************************/
$wp_customize->add_setting('honeypress_blog_content', 
	array(
		'default' 			=> __('excerpt','honeypress'),
		'sanitize_callback' => 'honeypress_sanitize_select'
		)
	);

$wp_customize->add_control('honeypress_blog_content', 
	array(		
		'label' 	=> __('Choose Options', 'honeypress'),		
		'section' 	=> 'honeypress_blog_section',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'excerpt' 	=> __('Excerpt', 'honeypress'),
			'content' 	=> __('Full Content', 'honeypress'),
			)
		)
	);

/******************** Blog Length *******************************/
$wp_customize->add_setting( 'honeypress_blog_content_length',
	array(
		'default'           => 30,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_number_range',
		)
);
$wp_customize->add_control( 'honeypress_blog_content_length',
	array(
		'label'       => __( 'Excerpt Length', 'honeypress' ),
		'section'     => 'honeypress_blog_section',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 10, 'max' => 200, 'step' => 1, 'style' => 'width: 200px;' ),
	)
);

/************************* Blog Button Title*********************************/
$wp_customize->add_setting( 'honeypress_blog_button_title',
	array(
		'default'           => __('READ MORE','honeypress'),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',	
		)
	);
$wp_customize->add_control( 'honeypress_blog_button_title',
	array(
		'label'    => __( 'Excerpt Read More Button Title', 'honeypress' ),
		'section'  => 'honeypress_blog_section',
		'type'     => 'text',	
		)
	);

/************************* Enable Author*********************************/
$wp_customize->add_setting( 'honeypress_enable_blog_author',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize,  'honeypress_enable_blog_author',
	array(
		'label'    => __( 'Hide / Show Author', 'honeypress' ),
		'section'  => 'honeypress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Enable Date*********************************/
$wp_customize->add_setting( 'honeypress_enable_blog_date',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize,  'honeypress_enable_blog_date',
	array(
		'label'    => __( 'Hide / Show Date', 'honeypress' ),
		'section'  => 'honeypress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Enable Comment*********************************/
$wp_customize->add_setting( 'honeypress_enable_blog_comments',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize,  'honeypress_enable_blog_comments',
	array(
		'label'    => __( 'Hide / Show Comments', 'honeypress' ),
		'section'  => 'honeypress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Enable Category*********************************/
$wp_customize->add_setting( 'honeypress_enable_blog_category',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize,   'honeypress_enable_blog_category',
	array(
		'label'    => __( 'Hide / Show Category', 'honeypress' ),
		'section'  => 'honeypress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Enable Continue Reading Button*********************************/
$wp_customize->add_setting( 'honeypress_enable_blog_read_button',
	array(
		'default'           => true,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'honeypress_sanitize_checkbox',	
		)
	);
$wp_customize->add_control(new honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_blog_read_button',
	array(
		'label'    => __( 'Hide / Show Read More Button', 'honeypress' ),
		'section'  => 'honeypress_blog_section',
		'type'     => 'toggle',	
		)
	));

/************************* Blog Meta Rearrange*********************************/
$default = array( 'blog_author', 'blog_date', 'blog_commment');

$choices = array(
		'blog_author' => __( 'Author', 'honeypress' ),
		'blog_date' => __( 'Date', 'honeypress' ),
		'blog_commment' => __( 'Comment', 'honeypress' ),
	);
	
$wp_customize->add_setting( 'honeypress_blog_meta_sort', 
	array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'	=> 'honeypress_sanitize_array',
        'default'     => $default
    ) );

$wp_customize->add_control( new honeypress_Control_Sortable( $wp_customize, 'honeypress_blog_meta_sort', 
    array(
        'label' => __( 'Drag And Drop To Rearrange.', 'honeypress' ),
        'section' => 'honeypress_blog_section',
        'settings' => 'honeypress_blog_meta_sort',
        'type'=> 'sortable',
        'choices'     => $choices
    ) ) );
}
add_action( 'customize_register', 'honeypress_blog_customizer' );