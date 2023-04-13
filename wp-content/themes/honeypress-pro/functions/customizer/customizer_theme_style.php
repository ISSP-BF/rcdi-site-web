<?php 
// Adding customizer home page setting
//$wp_customize->remove_control('header_textcolor');

//Image Background image
class WP_honeypress_pre_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>'.__('Predefined default background','honeypress').'</h3>';
		  $name = '_customize-image-radio-' . $this->id;
		  $i=1;
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo HONEYPRESS_PRO_TEMPLATE_DIR_URI; ?>/assets/images/bg-pattern/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
            <?php 
			if($i==4)
			{
			  echo '<p></p>';
			  $i=0;
			}
			$i++;
			
			} ?>
			<h3><?php esc_attr_e('Background Image','honeypress'); ?></h3>
			<p><?php esc_attr_e('Go to','honeypress'); ?> => <?php esc_attr_e('Appearance','honeypress'); ?> => <?php esc_attr_e('Customize','honeypress');?> => <?php esc_attr_e('Colors & Background','honeypress');?> => <?php esc_attr_e('Background Image','honeypress'); ?></p><br/>
			<h3><?php esc_attr_e('Background Color','honeypress'); ?></h3>
			<p> <?php esc_attr_e('Go to','honeypress'); ?> => <?php esc_attr_e('Appearance','honeypress'); ?> => <?php esc_attr_e('Customize','honeypress');?> => <?php esc_attr_e('Colors & Background','honeypress');?> => <?php esc_attr_e('Background Color','honeypress'); ?> </p>
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
class WP_honeypress_style_layout_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>',__('Theme Layout','honeypress').'</h3>';
		  $name = '_customize-layout-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo HONEYPRESS_PRO_TEMPLATE_DIR_URI; ?>/assets/images/bg-pattern/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  } ?>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-honeypress_layout_style label img").click(function(){
					$("#customize-control-honeypress_layout_style label img").removeClass("color_scheem_active");
					$(this).addClass("color_scheem_active");
				});
			});
		  </script>
		  <?php
       }

}

// Theme color
class WP_honeypress_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>'.__('Predefined Colors','honeypress').'</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked="checked"'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo HONEYPRESS_PRO_TEMPLATE_DIR_URI; ?>/assets/images/bg-pattern/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
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
		'title'      => __('Theme Style Settings', 'honeypress'),
		'priority'   => 105,
   	) );
	
	// Theme Color Scheme
	$wp_customize->add_setting(
	'theme_color', array(
	'default' => 'default.css',  
	'capability'     => 'edit_theme_options',
    ));
	$wp_customize->add_control( new WP_honeypress_color_Customize_Control($wp_customize,'theme_color',
	array(
        'label'   => __('Predefined colors', 'honeypress'),
        'section' => 'theme_style',
		'type' => 'radio',
		'choices' => array(
			'default.css' => 'blue.png',
            'green.css' => 'green.png',
            'red.css' => 'red.png',
			'purple.css' => 'purple.png',
			'orange.css' => 'orange.png',
			'yellow.css' => 'yellow.png',
			'tangerine.css' => 'tangerine.png',
			'pink.css' => 'pink.png',
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
			'label' => __('Enable custom color skin','honeypress'),
			'section' => 'theme_style',
		)
	);
	
	// link color settings
	$wp_customize->add_setting(
	'link_color', array(
	'capability'     => 'edit_theme_options',
	'default' => '#2d6ef8'
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'link_color', 
	array(
		'label'      => __( 'Skin color', 'honeypress' ),
		'section'    => 'theme_style',
		'settings'   => 'link_color',
	) ) );

	//Theme Layout
	$wp_customize->add_setting( 'hp_color_skin', array( 'default' => 'light') );
	$wp_customize->add_control(	'hp_color_skin', 
		array(
			'label'    => __( 'Theme Skin', 'honeypress' ),
			'section'  => 'theme_style',
			'type'     => 'select',
			'choices'=>array(
				'light'=>__('Light', 'honeypress'),
				'dark'=>__('Dark', 'honeypress'),
				)
	));
	
	//Theme Layout
	$wp_customize->add_setting(
	'honeypress_layout_style', array(
	'default' => 'wide.jpg',  
	'capability'     => 'edit_theme_options',
    ));
	$wp_customize->add_control(new WP_honeypress_style_layout_Customize_Control($wp_customize,'honeypress_layout_style',
	array(
        'label'   => __('Layout style', 'honeypress'),
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
	$wp_customize->add_control(new WP_honeypress_pre_Customize_Control($wp_customize,'predefined_back_image',
	array(
        'label'   => __('Predefined default background', 'honeypress'),
        'section' => 'theme_style',
		'type' => 'radio',
		'choices' => array(
			'bg-img0.png' => 'sm0.png',
            'bg-img1.png' => 'sm1.png',
            'bg-img2.png' => 'sm2.png',
			'bg-img3.png' => 'sm3.png',
			'bg-img4.png' => 'sm4.png',
			'bg-img5.png' => 'sm5.png',
			'bg-img8.jpg' => 'sm8.jpg',
			'bg-img9.jpg' => 'sm9.jpg',
			'bg-img10.jpg' => 'sm10.jpg',
    ))));