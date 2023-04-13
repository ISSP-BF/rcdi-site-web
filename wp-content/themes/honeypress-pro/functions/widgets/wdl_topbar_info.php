<?php
	// Register and load the widget
	function honeypress_header_topbar_info_widget() {
	    register_widget( 'honeypress_header_topbar_info_widget' );
	}
	add_action( 'widgets_init', 'honeypress_header_topbar_info_widget' );

	// Creating the widget
	class honeypress_header_topbar_info_widget extends WP_Widget {
	 
	function __construct() {
		parent::__construct(
			'honeypress_header_topbar_info_widget', // Base ID
			__('Honeypress: Header info widget','honeypress'), // Widget Name
			array(
				'classname' => 'honeypress_header_topbar_info_widget',
				'description' => __('Topbar header info widget.','honeypress'),
			),
			array(
				'width' => 600,
			)
		);
		
	 }
	
	public function widget( $args, $instance ) {
	
	//echo $args['before_widget']; 
	
	if($args['id']=='sidebar_primary')
	{
		$instance['before_title']='<div class="sm-widget-title wow fadeInDown animated" data-wow-delay="0.4s"><h3>';
		$instance['before_title']='</h3></div><div class="sm-sidebar-widget wow fadeInDown animated" data-wow-delay="0.4s">';
	}
	echo $args['before_widget'];
	?>
		<ul class="head-contact-info">
			<li>
				<?php if(!empty($instance['fa_icon'])) { ?>
				<i class="fa <?php echo $instance['fa_icon']; ?>"></i>
				<?php } else { ?> 
				<i class="fa fa-phone"></i>
				<?php } ?>	
						<?php if(!empty($instance['description']))
						{
							echo $instance['description'];
						}
						else
				{
				echo $instance['description'];
				} 

				
						?></li>
							<li>
								<?php if(!empty($instance['honeypress_email'])) { ?>
				<i class="fa <?php echo $instance['honeypress_email']; ?>"></i>
				<?php } else { ?> 
				<i class="fa fa-envelope-o"></i>
				<?php } ?>	
							<a href="mailto:<?php echo$instance['honeypress_email_id'];?>"> <?php if(!empty($instance['honeypress_email_id']))
						{
							echo $instance['honeypress_email_id'];
						}
						?></a></li> 
						</ul>
	<?php
	echo $args['after_widget'];
	}
	         
	// Widget Backend
	public function form( $instance ) {
		
	if ( isset( $instance[ 'fa_icon' ])){
		$fa_icon = $instance[ 'fa_icon' ];
	}
	else {
	$fa_icon = 'fa fa-phone';
	}
	
	if ( isset( $instance[ 'description' ])){
	$description = $instance[ 'description' ];
	}
	else {
	$description = __( 'Phone: +15 718-999-3939', 'honeypress' );
	}
	
	if ( isset( $instance[ 'honeypress_email' ]))
	{
		$honeypress_email = $instance[ 'honeypress_email' ];
	}
	else 
	{
	$honeypress_email = 'fa fa-envelope-o';
	}
	
	if ( isset( $instance[ 'honeypress_email_id' ])){
	$honeypress_email_id = $instance[ 'honeypress_email_id' ];
	}
	else {
	$honeypress_email_id = __( 'Email: support@honeypress.com', 'honeypress' );
	}

	// Widget admin form
	?>
	
	<label for="<?php echo $this->get_field_id( 'fa_icon' ); ?>"><?php _e( 'Font Awesome icon','honeypress' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'fa_icon' ); ?>" name="<?php echo $this->get_field_name( 'fa_icon' ); ?>" type="text" value="<?php if($fa_icon) echo esc_attr( $fa_icon ); else echo 'fa fa-phone';?>" />
	<span><?php _e('Link to get Font Awesome icons','honeypress'); ?><a href="<?php echo 'http://fortawesome.github.io/Font-Awesome/icons/'; ?>" target="_blank" ><?php _e('fa-icon','honeypress'); ?></a></span>
	<br><br>
	
	<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Phone','honeypress' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php if($description) echo htmlspecialchars_decode($description); else _e( 'Phone: +15 718-999-3939', 'honeypress' );?>" /><br><br>
	
	<label for="<?php echo $this->get_field_id( 'honeypress_email' ); ?>"><?php _e( 'Font Awesome icon','honeypress' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'honeypress_email' ); ?>" name="<?php echo $this->get_field_name( 'honeypress_email' ); ?>" type="text" value="<?php if($honeypress_email) echo esc_attr( $honeypress_email ); else echo 'fa fa-phone';?>" />
	<span><?php _e('Link to get Font Awesome icons','honeypress'); ?><a href="<?php echo 'http://fortawesome.github.io/Font-Awesome/icons/'; ?>" target="_blank" ><?php _e('fa-icon','honeypress'); ?></a></span><br><br>
	
	<label for="<?php echo $this->get_field_id( 'honeypress_email_id' ); ?>"><?php _e( 'Email','honeypress' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'honeypress_email_id' ); ?>" name="<?php echo $this->get_field_name( 'honeypress_email_id' ); ?>" type="text" value="<?php if($honeypress_email_id) echo htmlspecialchars_decode($honeypress_email_id); else _e( 'Email: support@honeypress.com', 'honeypress' );?>" /><br><br>
	
	
	
	<?php
    }  
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
		$instance = array();
		$instance['fa_icon'] = ( ! empty( $new_instance['fa_icon'] ) ) ? strip_tags( $new_instance['fa_icon'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? htmlspecialchars_decode($new_instance['description']) : '';
		$instance['honeypress_email'] = ( ! empty( $new_instance['honeypress_email'] ) ) ? strip_tags( $new_instance['honeypress_email'] ) : '';
		$instance['honeypress_email_id'] = ( ! empty( $new_instance['honeypress_email_id'] ) ) ? htmlspecialchars_decode($new_instance['honeypress_email_id']) : '';
		
		return $instance;
	}
	}