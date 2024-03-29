<?php 
function honeypress_typography_customizer( $wp_customize ) {
	
$wp_customize->add_panel( 'honeypress_typography_setting', array(
		'priority'       => 990,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography settings','honeypress'),
	) );
	
	
$font_size = array();
for($i=9; $i<=100; $i++)
{			
	$font_size[$i] = $i;
}

$line_height = array();
for($i=1; $i<=100; $i++)
{           
    $line_height[$i] = $i;
}

$font_family = honeypress_typo_fonts();

$font_style = array('normal'=>'Normal','italic'=>'Italic');

$text_transform = array('default'=>'Default','capitalize'=>'Capitalize','lowercase'=>'Lowercase','Uppercase'=>'Uppercase');

$font_weight = array('100'=>'100','200'=>'200','300'=>'300','400'=>'400','500'=>'500','600'=>'600','700'=>'700','800'=>'800','900'=>'900');

$lheight = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9');

// Load google font locally
$wp_customize->add_section('local_google_font',
	array(
		'title' => esc_html__('Performance(Google Font)', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority' => 1
	));
$wp_customize->add_setting('honeypress_enable_local_google_font',
	array(
		'default' => true,
		'sanitize_callback' => 'honeypress_sanitize_checkbox',
	)
);
$wp_customize->add_control(new Honeypress_Toggle_Control( $wp_customize, 'honeypress_enable_local_google_font',
	array(
		'label' => esc_html__('Load Google Fonts Locally?', 'honeypress'),
		'type' => 'toggle',
		'section' => 'local_google_font',
		'priority' => 4,
	)
));


// Top Header Widget typography section
$wp_customize->add_section( 'honeypress_top_widget_typography' , array(
		'title'      => __('Topbar Widgets','honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 1,
   	) );	
// Enable/Disable Top Header Widget typography section
$wp_customize->add_setting(
    'enable_top_widget_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
$wp_customize->add_control('enable_top_widget_typography', array(
		'label' => __('Enable Top Widget typography','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'enable_top_widget_typography',
		'type'    =>  'checkbox'
));
class WP_Topbar_Widget_title_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Topbar Widget Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'topbar_widget_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Topbar_Widget_title_Customize_Control( $wp_customize, 'topbar_widget_title', array(	
		'section' => 'honeypress_top_widget_typography',
		'setting' => 'topbar_widget_title',
    ))
);
$wp_customize->add_setting(
    'topbar_widget_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('topbar_widget_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'topbar_widget_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'topbar_widget_title_fontsize',
    array(
        'default'           =>  30,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('topbar_widget_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'topbar_widget_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'topbar_widget_title_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('topbar_widget_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'topbar_widget_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'topbar_widget_title_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('topbar_widget_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'topbar_widget_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'topbar_widget_title_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('topbar_widget_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'topbar_widget_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'topbar_widget_title_line_height',
    array(
        'default'           =>  45,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('topbar_widget_title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_top_widget_typography',
        'setting' => 'topbar_widget_title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));
class WP_Topbar_Widget_content_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Topbar Widget Content','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'topbar_widget_content',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Topbar_Widget_content_Customize_Control( $wp_customize, 'topbar_widget_content', array(	
		'section' => 'honeypress_top_widget_typography',
		'setting' => 'topbar_widget_content',
    ))
);
$wp_customize->add_setting(
    'top_widget_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('top_widget_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'top_widget_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));		
$wp_customize->add_setting(
    'top_widget_typography_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('top_widget_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'top_widget_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    )); 
$wp_customize->add_setting(
    'top_widget_typography_fontweight',
    array(
        'default'           =>  400,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('top_widget_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'top_widget_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
)); ?>
<?php
$wp_customize->add_setting(
    'top_widget_typography_fontstyle',
    array(
    	'default' => 'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('top_widget_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'top_widget_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'top_widget_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('top_widget_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_top_widget_typography',
		'setting' => 'top_widget_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'topbar_widget_content_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('topbar_widget_content_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_top_widget_typography',
        'setting' => 'topbar_widget_content_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// Header typography section
$wp_customize->add_section( 'honeypress_header_typography' , array(
		'title'      => __('Header', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 2,
   	) );
// Enable/Disable Header typography section
$wp_customize->add_setting(
    'enable_header_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_header_typography', array(
		'label' => __('Enable Header typography','honeypress'),
        'description' => __('When Max Mega Menu Plugin will be activated then menu typography setting will not work','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'enable_header_typography',
		'type'    =>  'checkbox'
));	
class WP_Sitetitle_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Site Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'site_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Sitetitle_Customize_Control( $wp_customize, 'site_title', array(	
		'section' => 'honeypress_header_typography',
		'setting' => 'site_title',
    ))
);
$wp_customize->add_setting(
    'site_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'site_title_fontsize',
    array(
        'default'           =>  36,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'site_title_fontweight',
    array(
        'default'           =>  600,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'site_title_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'site_title_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'site_title_line_height',
    array(
        'default'           =>  39,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('site_title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_header_typography',
        'setting' => 'site_title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

class WP_Sitetagline_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Site Tagline','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'site_tagline',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Sitetagline_Customize_Control( $wp_customize, 'site_tagline', array(	
		'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline',
    ))
);
$wp_customize->add_setting(
    'site_tagline_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_tagline_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'site_tagline_fontsize',
    array(
        'default'           =>  20,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_tagline_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'site_tagline_fontweight',
    array(
        'default'           =>  400,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_tagline_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'site_tagline_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_tagline_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'site_tagline_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('site_tagline_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'site_tagline_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'site_tagline_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('site_tagline_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_header_typography',
        'setting' => 'site_tagline_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

class WP_Menus_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Menus','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'menus_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Menus_Customize_Control( $wp_customize, 'menus_title', array(	
		'section' => 'honeypress_header_typography',
		'setting' => 'menus_title',
    ))
);
$wp_customize->add_setting(
    'menu_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('menu_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'menu_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'menu_title_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('menu_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'menu_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'menu_title_fontweight',
    array(
        'default'           =>  600,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('menu_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'menu_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'menu_title_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('menu_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'menu_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'menu_title_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('menu_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'menu_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'menu_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('menu_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_header_typography',
        'setting' => 'menu_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

class WP_SubMenus_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Submenus','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'submenus_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_SubMenus_Customize_Control( $wp_customize, 'submenus_title', array(	
		'section' => 'honeypress_header_typography',
		'setting' => 'submenus_title',
    ))
);
$wp_customize->add_setting(
    'submenu_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('submenu_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'submenu_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'submenu_title_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('submenu_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'submenu_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
));
$wp_customize->add_setting(
    'submenu_title_fontweight',
    array(
        'default'           =>  400,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('submenu_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'submenu_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'submenu_title_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('submenu_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'submenu_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'submenu_title_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('submenu_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_header_typography',
		'setting' => 'submenu_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'submenu_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('submenu_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_header_typography',
        'setting' => 'submenu_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// After Menu Button typography section
$wp_customize->add_section( 'honeypress_after_btn_typography' , array(
        'title'      => __('After Menu Button', 'honeypress'),
        'panel' => 'honeypress_typography_setting',
        'priority'       => 3,
    ) );
// Enable/Disable Banner typography section
$wp_customize->add_setting(
    'enable_after_btn_typography',
    array(
        'default'           =>  false,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    ) );
    
$wp_customize->add_control('enable_after_btn_typography', array(
        'label' => __('Enable After Menu Button typography','honeypress'),
        'section' => 'honeypress_after_btn_typography',
        'setting' => 'enable_after_btn_typography',
        'type'    =>  'checkbox'
)); 

$wp_customize->add_setting(
    'after_btn_fontfamily',
    array(
        'default'           =>  'Open Sans',
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
 ));
$wp_customize->add_control('after_btn_fontfamily', array(
        'label' => __('Font family','honeypress'),
        'section' => 'honeypress_after_btn_typography',
        'setting' => 'after_btn_fontfamily',
        'type'    =>  'select',
        'choices'=>$font_family,
)); 
$wp_customize->add_setting(
    'after_btn_fontsize',
    array(
        'default'           =>  15,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('after_btn_fontsize', array(
        'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_after_btn_typography',
        'setting' => 'after_btn_fontsize',
        'type'    =>  'select',
        'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'after_btn_fontweight',
    array(
        'default'           =>  600,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('after_btn_fontweight', array(
        'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_after_btn_typography',
        'setting' => 'after_btn_fontweight',
        'type'    =>  'select',
        'choices'=>$font_weight
));
$wp_customize->add_setting(
    'after_btn_fontstyle',
    array(
        'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('after_btn_fontstyle', array(
        'label' => __('Font style','honeypress'),
        'section' => 'honeypress_after_btn_typography',
        'setting' => 'after_btn_fontstyle',
        'type'    =>  'select',
        'choices'=>$font_style,
));
$wp_customize->add_setting(
    'after_btn_text_transform',
    array(
        'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('after_btn_text_transform', array(
        'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_after_btn_typography',
        'setting' => 'after_btn_text_transform',
        'type'    =>  'select',
        'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'after_btn_lheight',
    array(
        'default'           =>  1,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('after_btn_lheight', array(
        'label' => __('Line Height(px)','honeypress'),
        'section' => 'honeypress_after_btn_typography',
        'setting' => 'after_btn_lheight',
        'type'    =>  'select',
        'choices'=>$line_height,
));




// Banner typography section
$wp_customize->add_section( 'honeypress_banner_typography' , array(
		'title'      => __('Banner', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 3,
   	) );
// Enable/Disable Banner typography section
$wp_customize->add_setting(
    'enable_banner_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_banner_typography', array(
		'label' => __('Enable Banner typography','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'enable_banner_typography',
		'type'    =>  'checkbox'
));	
class WP_Banner_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Page Title','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'banner_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Banner_Customize_Control( $wp_customize, 'banner_title', array(	
		'section' => 'honeypress_banner_typography',
		'setting' => 'banner_title',
    ))
);
$wp_customize->add_setting(
    'banner_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
 ));
$wp_customize->add_control('banner_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'banner_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));	
$wp_customize->add_setting(
    'banner_title_fontsize',
    array(
        'default'           =>  42,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('banner_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'banner_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'banner_title_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('banner_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'banner_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'banner_title_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('banner_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'banner_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'banner_title_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('banner_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'banner_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'banner_titl_line_height',
    array(
        'default'           =>  41,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('banner_titl_line_height', array(
        'label' => __('Line Height(px)','honeypress'),
        'section' => 'honeypress_banner_typography',
        'setting' => 'banner_titl_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

class WP_Breadcrumb_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Breadcrumb Title','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'breadcrumb_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Breadcrumb_Customize_Control( $wp_customize, 'breadcrumb_title', array(	
		'section' => 'honeypress_banner_typography',
		'setting' => 'breadcrumb_title',
    ))
);

$wp_customize->add_setting(
    'breadcrumb_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('breadcrumb_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'breadcrumb_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'breadcrumb_title_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('breadcrumb_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'breadcrumb_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'breadcrumb_title_fontweight',
    array(
        'default'           =>  400,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('breadcrumb_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'breadcrumb_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'breadcrumb_title_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('breadcrumb_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'breadcrumb_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'breadcrumb_title_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('breadcrumb_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_banner_typography',
		'setting' => 'breadcrumb_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'breadcrumb_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('breadcrumb_line_height', array(
        'label' => __('Line Height(px)','honeypress'),
        'section' => 'honeypress_banner_typography',
        'setting' => 'breadcrumb_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// Slider title typography section
$wp_customize->add_section( 'honeypress_slider_typography' , array(
		'title'      => __('Slider', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 4,
   	) );
// Enable/Disable Slider title typography section
$wp_customize->add_setting(
    'enable_slider_title_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
$wp_customize->add_control('enable_slider_title_typography', array(
		'label' => __('Enable Slider typography','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'enable_slider_title_typography',
		'type'    =>  'checkbox'
));	
$wp_customize->add_setting(
    'slider_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('slider_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'slider_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'slider_title_fontsize',
    array(
        'default'           =>  65,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('slider_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'slider_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'slider_title_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('slider_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'slider_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'slider_title_fontstyle',
    array(
    	'default'           =>  'normal',
       'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('slider_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'slider_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'slider_title_text_transform',
    array(
    	'default'           => 'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('slider_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_slider_typography',
		'setting' => 'slider_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'slider_line_height',
    array(
        'default'           =>  85,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('slider_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_slider_typography',
        'setting' => 'slider_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// Section title typography section
$wp_customize->add_section( 'honeypress_section_typography' , array(
		'title'      => __('Homepage Section', 'honeypress'),
		'panel' 	 => 'honeypress_typography_setting',
		'priority'   => 5,
   	) );
// Enable/Disable Section title typography section
$wp_customize->add_setting(
    'enable_section_title_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_section_title_typography', array(
		'label' => __('Enable typography, this setting works only for Section Title and Description on page templates like homepage, about, service, contact, and portfolio(2 column, 3 column and 4 column)','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'enable_section_title_typography',
		'type'    =>  'checkbox'
));	

class WP_Section_Title_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Section Title','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'section_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Section_Title_Customize_Control( $wp_customize, 'section_title', array(	
		'section' => 'honeypress_section_typography',
		'setting' => 'section_title',
    ))
);

$wp_customize->add_setting(
    'section_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'section_title_fontsize',
    array(
        'default'           =>  36,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'section_title_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'section_title_fontstyle',
    array(
    	'default'           =>  'normal',
       'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'section_title_text_transform',
    array(
    	'default' => 'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'section_title_line_height',
    array(
        'default'           =>  54,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('section_title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_section_typography',
        'setting' => 'section_title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


class WP_Section_Description_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Section Description','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'section_description',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Section_Description_Customize_Control( $wp_customize, 'section_description', array(	
		'section' => 'honeypress_section_typography',
		'setting' => 'section_description',
    ))
);
$wp_customize->add_setting(
    'section_description_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_description_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_description_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'section_description_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_description_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_description_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'section_description_fontweight',
    array(
        'default'           =>  600,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_description_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_description_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'section_description_fontstyle',
    array(
    	'default'           =>  'normal',
       'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_description_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_description_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'section_description_text_transform',
    array(
    	'default' => 'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('section_description_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_section_typography',
		'setting' => 'section_description_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'section_description_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('section_description_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_section_typography',
        'setting' => 'section_description_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));


// Content typography section
$wp_customize->add_section( 'honeypress_content_typography' , array(
		'title'      => __('Content','honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 6,
   	) );
// Enable/Disable Content typography section
$wp_customize->add_setting(
    'enable_content_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_content_typography', array(
		'label' => __('Enable Content typography','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'enable_content_typography',
		'type'    =>  'checkbox'
));
// h1 typography settings
class WP_Content_H1_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 1 (H1)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h1',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Content_H1_Customize_Control( $wp_customize, 'content_h1', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h1',
    ))
);
$wp_customize->add_setting(
    'h1_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h1_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h1_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h1_typography_fontsize',
    array(
        'default'           =>  36,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h1_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h1_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h1_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h1_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h1_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));

$wp_customize->add_setting(
    'h1_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h1_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h1_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'h1_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h1_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h1_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'h1_line_height',
    array(
        'default'           =>  54,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('h1_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h1_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h2 typography settings
class WP_Content_H2_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 2 (H2)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h2',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Content_H2_Customize_Control( $wp_customize, 'content_h2', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h2',
    ))
);
$wp_customize->add_setting(
    'h2_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h2_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h2_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h2_typography_fontsize',
    array(
        'default'           =>  30,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h2_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h2_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h2_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h2_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h2_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));


$wp_customize->add_setting(
    'h2_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h2_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h2_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'h2_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h2_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h2_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'h2_line_height',
    array(
        'default'           =>  45,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('h2_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h2_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h3 typography settings
class WP_Content_H3_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 3 (H3)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h3',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Content_H3_Customize_Control( $wp_customize, 'content_h3', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h3',
    ))
);
$wp_customize->add_setting(
    'h3_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h3_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h3_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h3_typography_fontsize',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h3_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h3_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h3_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h3_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h3_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));

$wp_customize->add_setting(
    'h3_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h3_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h3_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'h3_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h3_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h3_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'h3_line_height',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('h3_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h3_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h4 typography settings
class WP_Content_H4_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 4 (H4)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h4',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Content_H4_Customize_Control( $wp_customize, 'content_h4', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h4',
    ))
);
$wp_customize->add_setting(
    'h4_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h4_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h4_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h4_typography_fontsize',
    array(
        'default'           =>  20,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h4_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h4_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h4_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h4_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h4_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));

$wp_customize->add_setting(
    'h4_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h4_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h4_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'h4_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h4_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h4_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'h4_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('h4_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h4_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h5 typography settings
class WP_Content_H5_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 5 (H5)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h5',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Content_H5_Customize_Control( $wp_customize, 'content_h5', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h5',
    ))
);
$wp_customize->add_setting(
    'h5_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h5_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h5_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'h5_typography_fontsize',
    array(
        'default'           =>  20,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h5_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h5_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h5_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h5_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h5_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));

$wp_customize->add_setting(
    'h5_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h5_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h5_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'h5_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h5_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h5_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'h5_line_height',
    array(
        'default'           =>  24,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('h5_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h5_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h6 typography settings
class WP_Content_H6_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 6 (H6)','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_h6',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Content_H6_Customize_Control( $wp_customize, 'content_h6', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_h6',
    ))
);
$wp_customize->add_setting(
    'h6_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h6_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h6_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));

$wp_customize->add_setting(
    'h6_typography_fontsize',
    array(
        'default'           =>  14,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h6_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h6_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'h6_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h6_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h6_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'h6_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h6_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h6_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'h6_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('h6_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'h6_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'h6_line_height',
    array(
        'default'           =>  21,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('h6_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'h6_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Paragraph typography settings
class WP_Content_p_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Paragraph','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_p',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Content_p_Customize_Control( $wp_customize, 'content_p', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_p',
    ))
);
$wp_customize->add_setting(
    'p_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('p_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'p_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'p_typography_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('p_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'p_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'p_typography_fontweight',
    array(
        'default'           =>  400,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('p_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'p_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));

$wp_customize->add_setting(
    'p_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('p_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'p_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'p_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('p_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'p_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'p_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('p_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'p_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Button text typography settings
class WP_Content_button_text_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Button Text','honeypress'); ?></h3>
    <?php
    }
}

$wp_customize->add_setting(
    'content_button_text',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Content_button_text_Customize_Control( $wp_customize, 'content_button_text', array(	
		'section' => 'honeypress_content_typography',
		'setting' => 'content_button_text',
    ))
);
$wp_customize->add_setting(
    'button_text_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('button_text_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'button_text_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));

$wp_customize->add_setting(
    'button_text_typography_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('button_text_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'button_text_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'button_text_typography_fontweight',
    array(
        'default'           =>  600,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('button_text_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'button_text_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'button_text_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('button_text_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'button_text_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'button_text_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('button_text_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_content_typography',
		'setting' => 'button_text_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'button_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('button_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_content_typography',
        'setting' => 'button_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Blog Page/Archive/Single Post typography 
$wp_customize->add_section( 'honeypress_post_typography' , array(
		'title'      => __('Blog / Archive / Single Post', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 7,
   	) );
// Enable/Disable Blog/Archive/Single Post typography
$wp_customize->add_setting(
    'enable_post_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_post_typography', array(
		'label' => __('Enable Blog / Archive / Single Post typography','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'enable_post_typography',
		'type'    =>  'checkbox'
));	
$wp_customize->add_setting(
    'post-title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('post-title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'post-title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'post-title_fontsize',
    array(
        'default'           =>  36,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('post-title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'post-title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'post-title_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('post-title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'post-title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'post-title_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('post-title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'post-title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'post-title_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('post-title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_post_typography',
		'setting' => 'post-title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'post-title_line_height',
    array(
        'default'           =>  54,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('post-title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_post_typography',
        'setting' => 'post-title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Post Meta typography section
$wp_customize->add_section( 'honeypress_meta_typography' , array(
		'title'      => __('Post Meta', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 8,
   	) );
// Enable/Disable Post Meta typography section
$wp_customize->add_setting(
    'enable_meta_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_meta_typography', array(
		'label' => __('Enable Post Meta typography','honeypress'),
        'section' => 'honeypress_meta_typography',
		'setting' => 'enable_meta_typography',
		'type'    =>  'checkbox'
));	
$wp_customize->add_setting(
    'meta_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('meta_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_meta_typography',
		'setting' => 'meta_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'meta_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('meta_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_meta_typography',
		'setting' => 'meta_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'meta_fontweight',
    array(
        'default'           =>  500,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('meta_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_meta_typography',
		'setting' => 'meta_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'meta_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('meta_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_meta_typography',
		'setting' => 'meta_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'meta_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('meta_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_meta_typography',
		'setting' => 'meta_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'meta_line_height',
    array(
        'default'           =>  28,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('meta_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_meta_typography',
        'setting' => 'meta_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Shop Page typography 
$wp_customize->add_section( 'honeypress_shop_page_typography' , array(
		'title'      => __('Shop Page','honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 9,
   	) );
// Enable/Disable Shop Page typography
$wp_customize->add_setting(
    'enable_shop_page_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_shop_page_typography', array(
		'label' => __('Enable shop page typography','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'enable_shop_page_typography',
		'type'    =>  'checkbox'
));
// h1 typography settings
class WP_Shop_Content_H1_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 1 (H1)','honeypress'); ?></h3>
	 <p><?php esc_attr_e('Only for product detail page','honeypress'); ?></p>
    <?php
    }
}

$wp_customize->add_setting(
    'shop_content_h1',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Shop_Content_H1_Customize_Control( $wp_customize, 'shop_content_h1', array(	
		'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_content_h1',
    ))
);
$wp_customize->add_setting(
    'shop_h1_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h1_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h1_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'shop_h1_typography_fontsize',
    array(
        'default'           =>  36,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h1_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h1_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'shop_h1_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h1_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h1_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));

$wp_customize->add_setting(
    'shop_h1_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h1_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h1_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'shop_h1_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h1_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h1_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'shop_h1_line_height',
    array(
        'default'           =>  54,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('shop_h1_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
        'setting' => 'shop_h1_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));
// h2 typography settings
class WP_Shop_Content_H2_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 2 (H2)','honeypress'); ?></h3>
	 <p><?php esc_attr_e('Only for product title in Shop Page','honeypress'); ?></p>
    <?php
    }
}

$wp_customize->add_setting(
    'shop_content_h2',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Shop_Content_H2_Customize_Control( $wp_customize, 'shop_content_h2', array(	
		'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_content_h2',
    ))
);
$wp_customize->add_setting(
    'shop_h2_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h2_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h2_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'shop_h2_typography_fontsize',
    array(
        'default'           =>  18,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h2_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h2_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'shop_h2_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h2_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h2_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));


$wp_customize->add_setting(
    'shop_h2_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h2_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h2_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'shop_h2_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h2_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h2_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'shop_h2_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('shop_h2_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
        'setting' => 'shop_h2_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// h3 typography settings
class WP_Shop_Content_H3_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Heading 3 (H3)','honeypress'); ?></h3>
	 <p><?php esc_attr_e('Only for Product checkout page','honeypress'); ?></p>
    <?php
    }
}

$wp_customize->add_setting(
    'shop_content_h3',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Shop_Content_H3_Customize_Control( $wp_customize, 'shop_content_h3', array(	
		'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_content_h3',
    ))
);
$wp_customize->add_setting(
    'shop_h3_typography_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h3_typography_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h3_typography_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family
));
$wp_customize->add_setting(
    'shop_h3_typography_fontsize',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h3_typography_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h3_typography_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
		
    ));
$wp_customize->add_setting(
    'shop_h3_typography_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h3_typography_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h3_typography_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));

$wp_customize->add_setting(
    'shop_h3_typography_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h3_typography_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h3_typography_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));

$wp_customize->add_setting(
    'shop_h3_typography_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('shop_h3_typography_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_shop_page_typography',
		'setting' => 'shop_h3_typography_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'shop_h3_line_height',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('shop_h3_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_shop_page_typography',
        'setting' => 'shop_h3_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Sidebar typography section
$wp_customize->add_section( 'honeypress_sidebar_typography' , array(
		'title'      => __('Sidebar Widgets', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 10,
   	) );	
// Enable/Disable Sidebar typography section
$wp_customize->add_setting(
    'enable_sidebar_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_sidebar_typography', array(
		'label' => __('Enable Sidebar Widgets typography','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'enable_sidebar_typography',
		'type'    =>  'checkbox'
));	
class WP_Sidebar_Widget_title_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Sidebar Widget Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'sidebar_widget_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Sidebar_Widget_title_Customize_Control( $wp_customize, 'sidebar_widget_title', array(	
		'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_title',
    ))
);
$wp_customize->add_setting(
    'sidebar_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'sidebar_fontsize',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'sidebar_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'sidebar_fontstyle',
    array(
    	'default'           =>  'normal',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'sidebar_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'sidebar_line_height',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('sidebar_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_sidebar_typography',
        'setting' => 'sidebar_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

class WP_Sidebar_Widget_content_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Sidebar Widget Content','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'sidebar_widget_content',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Sidebar_Widget_content_Customize_Control( $wp_customize, 'sidebar_widget_content', array(	
		'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content',
    ))
);
$wp_customize->add_setting(
    'sidebar_widget_content_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_widget_content_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'sidebar_widget_content_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_widget_content_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'sidebar_widget_content_fontweight',
    array(
        'default'           =>  600,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_widget_content_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'sidebar_widget_content_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_widget_content_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'sidebar_widget_content_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('sidebar_widget_content_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_sidebar_typography',
		'setting' => 'sidebar_widget_content_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'sidebar_widget_content_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('sidebar_widget_content_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_sidebar_typography',
        'setting' => 'sidebar_widget_content_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Footer Widgets typography section
$wp_customize->add_section( 'honeypress_widget_typography' , array(
		'title'      => __('Footer Widgets', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 11,
   	) );	
// Enable/Disable Footer Widgets typography section
$wp_customize->add_setting(
    'enable_footer_widget_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_footer_widget_typography', array(
		'label' => __('Enable Footer Widget typography','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'enable_footer_widget_typography',
		'type'    =>  'checkbox'
));
class WP_Ribbon_text_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Ribbon Text','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'ribbon_text',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Ribbon_text_Customize_Control( $wp_customize, 'ribbon_text', array(	
		'section' => 'honeypress_widget_typography',
		'setting' => 'ribbon_text',
    ))
);
$wp_customize->add_setting(
    'ribbon_text_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('ribbon_text_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'ribbon_text_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'ribbon_text_fontsize',
    array(
        'default'           =>  20,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('ribbon_text_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'ribbon_text_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'ribbon_text_fontweight',
    array(
        'default'           =>  600,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('ribbon_text_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'ribbon_text_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'ribbon_text_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('ribbon_text_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'ribbon_text_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'ribbon_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('ribbon_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'ribbon_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));

class WP_Footer_Widget_title_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Footer Widget Title','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'footer_widget_title',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Footer_Widget_title_Customize_Control( $wp_customize, 'footer_widget_title', array(	
		'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title',
    ))
);
$wp_customize->add_setting(
    'footer_widget_title_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_title_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'footer_widget_title_fontsize',
    array(
        'default'           =>  24,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_title_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'footer_widget_title_fontweight',
    array(
        'default'           =>  700,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_title_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'footer_widget_title_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_title_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'footer_widget_title_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_title_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_title_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'footer_widget_title_line_height',
    array(
        'default'           =>  36,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('footer_widget_title_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
        'setting' => 'footer_widget_title_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

class WP_Footer_Widget_content_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_attr_e('Footer Widget Content','honeypress'); ?></h3>
    <?php
    }
}
$wp_customize->add_setting(
    'footer_widget_content',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Footer_Widget_content_Customize_Control( $wp_customize, 'footer_widget_content', array(	
		'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content',
    ))
);
$wp_customize->add_setting(
    'footer_widget_content_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_content_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'footer_widget_content_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_content_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'footer_widget_content_fontweight',
    array(
        'default'           =>  600,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_content_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'footer_widget_content_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_content_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'footer_widget_content_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_widget_content_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_widget_typography',
		'setting' => 'footer_widget_content_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'footer_widget_content_line_height',
    array(
        'default'           =>  30,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('footer_widget_content_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_widget_typography',
        'setting' => 'footer_widget_content_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));

// Footer Bar typography section
$wp_customize->add_section( 'honeypress_footer_bar_typography' , array(
		'title'      => __('Footer Bar', 'honeypress'),
		'panel' => 'honeypress_typography_setting',
		'priority'       => 12,
   	) );	
// Enable/Disable Footer Bar typography section
$wp_customize->add_setting(
    'enable_footer_bar_typography',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    ) );
	
$wp_customize->add_control('enable_footer_bar_typography', array(
		'label' => __('Enable Footer Bar typography','honeypress'),
        'section' => 'honeypress_footer_bar_typography',
		'setting' => 'enable_footer_bar_typography',
		'type'    =>  'checkbox'
));
$wp_customize->add_setting(
    'footer_bar_fontfamily',
    array(
        'default'           =>  'Open Sans',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_bar_fontfamily', array(
		'label' => __('Font family','honeypress'),
        'section' => 'honeypress_footer_bar_typography',
		'setting' => 'footer_bar_fontfamily',
		'type'    =>  'select',
		'choices'=>$font_family,
));
$wp_customize->add_setting(
    'footer_bar_fontsize',
    array(
        'default'           =>  16,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_bar_fontsize', array(
		'label' => __('Font size (px)','honeypress'),
        'section' => 'honeypress_footer_bar_typography',
		'setting' => 'footer_bar_fontsize',
		'type'    =>  'select',
		'choices'=>$font_size,
    ));
$wp_customize->add_setting(
    'footer_bar_fontweight',
    array(
        'default'           =>  400,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_bar_fontweight', array(
		'label' => __('Font Weight','honeypress'),
        'section' => 'honeypress_footer_bar_typography',
		'setting' => 'footer_bar_fontweight',
		'type'    =>  'select',
		'choices'=>$font_weight
));
$wp_customize->add_setting(
    'footer_bar_fontstyle',
    array(
        'default'           =>  'normal',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_bar_fontstyle', array(
		'label' => __('Font style','honeypress'),
        'section' => 'honeypress_footer_bar_typography',
		'setting' => 'footer_bar_fontstyle',
		'type'    =>  'select',
		'choices'=>$font_style,
));
$wp_customize->add_setting(
    'footer_bar_text_transform',
    array(
    	'default'           =>  'default',
        'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'sanitize_text_field',
    )	
);
$wp_customize->add_control('footer_bar_text_transform', array(
		'label' => __('Text Transform','honeypress'),
        'section' => 'honeypress_footer_bar_typography',
		'setting' => 'footer_bar_text_transform',
		'type'    =>  'select',
		'choices'=>$text_transform,
));
$wp_customize->add_setting(
    'fbar_line_height',
    array(
        'default'           =>  28,
        'capability'        =>  'edit_theme_options',
        'sanitize_callback' =>  'sanitize_text_field',
    )   
);
$wp_customize->add_control('fbar_line_height', array(
        'label' => __('Line height (px)','honeypress'),
        'section' => 'honeypress_footer_bar_typography',
        'setting' => 'fbar_line_height',
        'type'    =>  'select',
        'choices'=>$line_height,
));
}
add_action( 'customize_register', 'honeypress_typography_customizer' );
?>