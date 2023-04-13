<?php
add_action( 'widgets_init','spicepress_contact_info_widget'); 
function spicepress_contact_info_widget() 
{ 
	return   register_widget( 'spicepress_contact_info_widget' );
}

class spicepress_contact_info_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'spicepress_contact_info_widget', // Base ID
			__('ST: Contact Info widget', 'spicepress'), // Name
			array( 'description' => __( 'Contact information template widget', 'spicepress' ), ) // Args
		);
	}

	public function widget( $args , $instance ) {
		echo $args['before_widget'];
		
		$instance['title'] = (isset($instance['title'])?$instance['title']:'');
		$instance['contact_phone'] = (isset($instance['contact_phone'])?$instance['contact_phone']:'');
		$instance['contact_email'] = (isset($instance['contact_email'])?$instance['contact_email']:'');
		$instance['contact_address'] = (isset($instance['contact_address'])?$instance['contact_address']:'');
		$instance['contact_website'] = (isset($instance['contact_website'])?$instance['contact_website']:'');
		
//		$instance['other_info'] = ( $instance['other_info']!=null? $instance['other_info'] :'');
                
                if(isset($instance['other_info']) && $instance['other_info'] !=''){
                    $instance['other_info'] = $instance['other_info'];
                }else{
                    $instance['other_info'] = '';
                }
                
                
//		$instance['contact_social'] = ( $instance['contact_social']!=null ? $instance['contact_social'] :'');
                
                if(isset($instance['contact_social']) && $instance['contact_social'] !=''){
                    $instance['contact_social'] = $instance['contact_social'];
                }else{
                    $instance['contact_social'] = '';
                }
		
		if($instance['title'])
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		
		echo '<div class="sm-cont-widget">';
		
			echo '<div class="cont-info">';
			if($instance['contact_phone'])
			echo '<address><i class="fa fa-phone"></i> '.$instance['contact_phone'].' </address>';
			if($instance['contact_email'])
			echo '<address><i class="fa fa-envelope"></i> <a href="mailto:'.$instance['contact_email'].'">'.$instance['contact_email'].'</a></address>';
			if($instance['contact_address'])
			echo '<address><i class="fa fa-map-marker"></i> '.$instance['contact_address'].'</address>';
			if($instance['contact_website'])
			echo '<address><i class="fa fa-globe"></i> '.$instance['contact_website'].'</address>';
			echo '</div>';
			
			if($instance['other_info'])
			echo '<div class="cont-info">'.$instance['other_info'].'</div>';
			
			if($instance['contact_social'])
			echo '<ul class="custom-social-icons">'.$instance['contact_social'].'</ul>';
		
		echo '</div>';
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		
		$instance['title'] = (isset($instance['title'])?$instance['title']:'');
		$instance['contact_phone'] = (isset($instance['contact_phone'])?$instance['contact_phone']:'');
		$instance['contact_email'] = (isset($instance['contact_email'])?$instance['contact_email']:'');
		$instance['contact_address'] = (isset($instance['contact_address'])?$instance['contact_address']:'');
		$instance['contact_website'] = (isset($instance['contact_website'])?$instance['contact_website']:'');
		
		$instance['other_info'] = ( isset($instance['other_info']) ? $instance['other_info'] : '<h4 class="cont-title">'.__('Business hours','spicepress').'</h4><address><b>'.__('Monday - Saturday:','spicepress').'</b>'.__(' 10am to 6pm','spicepress').'</address><address><b>'.__('Sunday:','spicepress').'</b>'.__(' Closed','spicepress').'</address>');
		$instance['contact_social'] = ( isset($instance['contact_social']) ? $instance['contact_social'] : '<h4 class="cont-title">'.__('Follow us','spicepress').'</h4>
		<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
		<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
		<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
		<li><a class="skype" href="#"><i class="fa fa-skype"></i></a></li>');
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title','spicepress' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'contact_phone' ); ?>"><?php _e( 'Phone','spicepress' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'contact_phone' ); ?>" name="<?php echo $this->get_field_name( 'contact_phone' ); ?>" type="text" value="<?php echo esc_attr( $instance['contact_phone'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'contact_email' ); ?>"><?php _e( 'Email','spicepress' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'contact_email' ); ?>" name="<?php echo $this->get_field_name( 'contact_email' ); ?>" type="text" value="<?php echo esc_attr( $instance['contact_email'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'contact_address' ); ?>"><?php _e( 'Address','spicepress' ); ?></label> 
		<textarea rows="3" class="widefat" id="<?php echo $this->get_field_id( 'contact_address' ); ?>" name="<?php echo $this->get_field_name( 'contact_address' ); ?>"><?php echo esc_attr( $instance['contact_address'] ); ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'contact_website' ); ?>"><?php _e( 'Website','spicepress' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'contact_website' ); ?>" name="<?php echo $this->get_field_name( 'contact_website' ); ?>" type="text" value="<?php echo esc_attr( $instance['contact_website'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'other_info' ); ?>"><?php _e( 'Other information','spicepress' ); ?></label> 
		<textarea rows="6" class="widefat" id="<?php echo $this->get_field_id( 'other_info' ); ?>" name="<?php echo $this->get_field_name( 'other_info' ); ?>"><?php echo esc_attr( $instance['other_info'] ); ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'contact_social' ); ?>"><?php _e( 'Social icons','spicepress' ); ?></label> 
		<textarea rows="6" class="widefat" id="<?php echo $this->get_field_id( 'contact_social' ); ?>" name="<?php echo $this->get_field_name( 'contact_social' ); ?>"><?php echo esc_attr( $instance['contact_social'] ); ?></textarea>
		</p>
		
		
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['contact_phone'] = ( ! empty( $new_instance['contact_phone'] ) ) ? $new_instance['contact_phone'] : '';
		$instance['contact_email'] = ( ! empty( $new_instance['contact_email'] ) ) ? $new_instance['contact_email'] : '';
		$instance['contact_address'] = ( ! empty( $new_instance['contact_address'] ) ) ? $new_instance['contact_address'] : '';
		$instance['contact_website'] = ( ! empty( $new_instance['contact_website'] ) ) ? $new_instance['contact_website'] : '';
		
		$instance['other_info'] = ( ! empty( $new_instance['other_info'] ) ) ? $new_instance['other_info'] : '';
		$instance['contact_social'] = ( ! empty( $new_instance['contact_social'] ) ) ? $new_instance['contact_social'] : '';
		
		return $instance;
	}

} // class
?>