<?php // Adding customizer layout manager settings

class WP_honeypress_layout_Customize_Control extends WP_Customize_Control {	

	public $type = 'new_menu';
	
	public function render_content() {
		
		$front_page = get_theme_mod('front_page_data','services,about,portfolio,funfact,wooproduct,testimonial,team,pricing,news,map,contact,subscriber,client,instagram');

		$front_page = get_theme_mod('front_page_data','services,fun,portfolio,testimonial,news,cta,team,wooproduct,client');


		$data_enable = explode(",",$front_page);	
		$defaultenableddata=array('services','fun','portfolio','testimonial','news','cta','team','wooproduct','client');
		$layout_disable=array_diff($defaultenableddata,$data_enable);  
		?>
		
		<h3><?php esc_attr_e('Enable','honeypress'); ?></h3>
		  <ul class="sortable customizer_layout" id="enable">
		  <?php if( !empty($data_enable[0]) )    { foreach( $data_enable as $value ){ ?>
		  <li class="ui-state" id="<?php echo $value; ?>"><?php echo $value; ?></li>
		  <?php } } ?>
		  </ul>
  
  
		 <h3><?php esc_attr_e('Disable','honeypress'); ?></h3> 
		 <ul class="sortable customizer_layout" id="disable">
		 <?php if(!empty($layout_disable)){ foreach($layout_disable as $val){ ?>
		  <li class="ui-state" id="<?php echo $val; ?>"><?php echo $val; ?></li>
		  <?php } } ?>
		 </ul>
		 <div class="section">
		 <p> <b><?php esc_attr_e('Slider has fixed position on homepage','honeypress'); ?></b></p>
		 <p> <b><?php esc_attr_e('Note','honeypress'); ?> </b> <?php esc_attr_e('By default, all sections are enabled on homepage. If you wish not to display a section, just drag it onto the "disabled" box.','honeypress'); ?><p>
		</div>
<script>
jQuery(document).ready(function($) {
    $( ".sortable" ).sortable({
		connectWith: '.sortable'
	});
  });
   
jQuery(document).ready(function($){	
	
	// Get items id you can chose
	function honeypressItems(spicethemes)
	{
		var columns = [];
		$(spicethemes + ' #enable').each(function(){
			columns.push($(this).sortable('toArray').join(','));
		});
		return columns.join('|');
	}
	
	function spicethemesItems_disable(spicethemes)
	{
		var columns = [];
		$(spicethemes + ' #disable').each(function(){
			columns.push($(this).sortable('toArray').join(','));
		});
		return columns.join('|');
	}
	
	//onclick check id
	$('#enable .ui-state,#disable .ui-state').mouseleave(function(){ 
		var enable = honeypressItems('#customize-control-layout_manager');
		$("#customize-control-front_page_data input[type = 'text']").val(enable);
		$("#customize-control-front_page_data input[type = 'text']").change();		
	});

  });
</script>
<?php } }
	/* layout manager section */
	$wp_customize->add_section( 'frontpage_layout' , array(
		'title'      => __('Theme Layout Manager', 'honeypress'),
		'priority'       => 1000,
   	) );
	
	$wp_customize->add_setting(
		'layout_manager',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			
		)	
	);
	$wp_customize->add_control( new WP_honeypress_layout_Customize_Control( $wp_customize, 'layout_manager', array(
			'section' => 'frontpage_layout',
			'setting' => 'layout_manager',
		))
	);
	
	$wp_customize->add_setting(
		'front_page_data',
		array(
			'default'           =>'services,fun,portfolio,testimonial,news,cta,team,wooproduct,client',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
		)	
	);
	$wp_customize->add_control('front_page_data', array(
			'label' => __('Enable','honeypress'),
			'section' => 'frontpage_layout',
			'type'    =>  'text'
	));	 // enable textbox