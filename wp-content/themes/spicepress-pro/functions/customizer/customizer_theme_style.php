<?php 
// Adding customizer home page setting
function spicepress_theme_style_customizer( $wp_customize ){
$wp_customize->remove_control('header_textcolor');

//Image Background image
class WP_spicepress_pre_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>'.__('Predefined default background','spicepress').'</h3>';
		  $name = '_customize-image-radio-' . $this->id;
		  $i=1;
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-pattern/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
            <?php 
			if($i==4)
			{
			  echo '<p></p>';
			  $i=0;
			}
			$i++;
			
			} ?>
			<h3><?php esc_attr_e('Background Image','spicepress'); ?></h3>
			<p><?php esc_attr_e('Go to','spicepress'); ?> => <?php esc_attr_e('Appearance','spicepress'); ?> => <?php esc_attr_e('Customize','spicepress');?> => <?php esc_attr_e('Background Image','spicepress'); ?></p><br/>
			<h3><?php esc_attr_e('Background Color','spicepress'); ?></h3>
			<p> <?php esc_attr_e('Go to','spicepress'); ?> => <?php esc_attr_e('Appearance','spicepress'); ?> => <?php esc_attr_e('Customize','spicepress');?> => <?php esc_attr_e('Colors','spicepress'); ?> </p>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-predefined_back_image label img").click(function(){
					$("#customize-control-predefined_back_image label img").removeClass("color_scheem_active");
					$(this).addClass("color_scheem_active");
				});
			});
		  </script>
		<?php
       }

}

//Layout Style
class WP_spicepress_style_layout_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>',__('Theme Layout','spicepress').'</h3>';
		  $name = '_customize-layout-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-pattern/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  } ?>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-spicepress_layout_style label img").click(function(){
					$("#customize-control-spicepress_layout_style label img").removeClass("color_scheem_active");
					$(this).addClass("color_scheem_active");
				});
			});
		  </script>
		  <?php
       }

}

// Theme color
class WP_spicepress_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>'.__('Predefined Colors','spicepress').'</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked="checked"'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-pattern/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  }
		  ?>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-theme_color label img").click(function(){
					$("#customize-control-theme_color label img").removeClass("color_scheem_active");
					$(this).addClass("color_scheem_active");
				});
			});
		  </script>
		  <?php
       }

}

	/* Theme Style settings */
	$wp_customize->add_section( 'theme_style' , array(
		'title'      => __('Theme style settings', 'spicepress'),
		'priority'   => 105,
   	) );
	
	// Theme Color Scheme
	$wp_customize->add_setting(
	'theme_color', array(
	'default' => 'default.css',  
	'capability'     => 'edit_theme_options',
    ));
	$wp_customize->add_control( new WP_spicepress_color_Customize_Control($wp_customize,'theme_color',
	array(
        'label'   => __('Predefined colors', 'spicepress'),
        'section' => 'theme_style',
		'type' => 'radio',
		'choices' => array(
			'default.css' => 'red.png',
            'green.css' => 'green.png',
            'blue-dark.css' => 'bluedark.png',
			'orange.css' => 'orange.png',
			'regal-blue.css' => 'regalblue.png',
			'wordpress.css' => 'wordpress.png',
			'pink.css' => 'pink.png',
			'jelly-bean.css' => 'jelly-bean.png',
			
    ))));
	
	// enable / disable custom color settings 
	$wp_customize->add_setting(
		'custom_color_enable',
		array('capability'  => 'edit_theme_options',
		'default' => false,
		
		));
	$wp_customize->add_control(
		'custom_color_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable custom color skin','spicepress'),
			'section' => 'theme_style',
		)
	);
	
	// link color settings
	$wp_customize->add_setting(
	'link_color', array(
	'capability'     => 'edit_theme_options',
	'default' => '#e32235'
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'link_color', 
	array(
		'label'      => __( 'Skin color', 'spicepress' ),
		'section'    => 'theme_style',
		'settings'   => 'link_color',
	) ) );
	
	//Theme Layout
	$wp_customize->add_setting( 'spicepress_color_skin', array( 'default' => 'light') );
	$wp_customize->add_control(	'spicepress_color_skin', 
		array(
			'label'    => __( 'Theme Skin', 'spicepress' ),
			'section'  => 'theme_style',
			'type'     => 'select',
			'choices'=>array(
				'light'=>__('Light', 'spicepress'),
				'dark'=>__('Dark', 'spicepress'),
				)
	));

	//Theme Layout
	$wp_customize->add_setting(
	'spicepress_layout_style', array(
	'default' => 'wide.jpg',  
	'capability'     => 'edit_theme_options',
    ));
	$wp_customize->add_control(new WP_spicepress_style_layout_Customize_Control($wp_customize,'spicepress_layout_style',
	array(
        'label'   => __('Layout style', 'spicepress'),
        'section' => 'theme_style',
		'type' => 'radio',
		'choices' => array(
            'wide' => 'wide.png',
            'boxed' => 'boxed.png',
    )
	
	)));
	
	
	//Predefined Background image
	$wp_customize->add_setting(
	'predefined_back_image', array(
	'default' => 'bg-img1.png',  
	'capability'     => 'edit_theme_options',
    ));
	$wp_customize->add_control(new WP_spicepress_pre_Customize_Control($wp_customize,'predefined_back_image',
	array(
        'label'   => __('Predefined default background', 'spicepress'),
        'section' => 'theme_style',
		'type' => 'radio',
		'choices' => array(
			'bg-img0.png' => 'sm0.png',
            'bg-img1.png' => 'sm1.png',
            'bg-img2.png' => 'sm2.png',
			'bg-img3.png' => 'sm3.png',
			'bg-img4.png' => 'sm4.png',
			'bg-img5.png' => 'sm5.png',
			'bg-img6.jpg' => 'sm6.jpg',
            'bg-img7.jpg' => 'sm7.jpg',
			'bg-img8.jpg' => 'sm8.jpg',
			'bg-img9.jpg' => 'sm9.jpg',
			'bg-img10.jpg' => 'sm10.jpg',
    ))));
}
add_action( 'customize_register', 'spicepress_theme_style_customizer' );