<?php

add_action( 'widgets_init','wdl_featured_latest_news'); 
function wdl_featured_latest_news() 
{ 
	return   register_widget( 'wdl_featured_latest_news' );
}

class wdl_featured_latest_news extends WP_Widget {

	function __construct() {
		parent::__construct(
			'wdl_featured_latest_news', // Base ID
			__('ST: Latest News', 'spicepress'), // Name
			array( 'description' => __( 'Display your recent posts on your website', 'spicepress' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		
		$instance['title'] = (isset($instance['title'])?$instance['title']:'');
		$instance['number_of_posts'] = (isset($instance['number_of_posts'])?$instance['number_of_posts']:3);
		$instance['blog_cat'] = (isset($instance['blog_cat'])?$instance['blog_cat']:1);
		$instance['tumb_size'] = (isset($instance['tumb_size'])?$instance['tumb_size']:'');
		$instance['image_show']=(isset($instance['image_show'])?$instance['image_show']:true);
		
		echo $args['before_widget'];
		
		if($instance['blog_cat'] != null):
		
		if($instance['title'])
	
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		 
		$loop = new WP_Query(array( 'post_type' => 'post', 'cat'=>$instance['blog_cat'],'ignore_sticky_posts' => 1, 'showposts' => $instance['number_of_posts'] ));

			if( $loop->have_posts() ) : 
			while ( $loop->have_posts() ) : $loop->the_post();?>				
			    
					<article class="media post">
					<?php if($instance['image_show']==true): if(has_post_thumbnail()):
						if($instance['tumb_size'] == 'thumbnail') {?>
								<a href="<?php the_permalink(); ?>" class="post-thumbnail">
								<?php $defalt_arg =array('class' => "img-responsive" );
						     	the_post_thumbnail($instance['tumb_size'], $defalt_arg);
						}
						if($instance['tumb_size'] == 'medium') {?>
								<a href="<?php the_permalink(); ?>" class="post-thumbnail post-medium">
								<?php $defalt_arg =array('class' => "img-responsive" );
						     	the_post_thumbnail($instance['tumb_size'], $defalt_arg);
						}
						if($instance['tumb_size'] == 'large') {?>
								<a href="<?php the_permalink(); ?>" class="post-thumbnail post-large">
								<?php $defalt_arg =array('class' => "img-responsive" );
						     	the_post_thumbnail($instance['tumb_size'], $defalt_arg);
						}if($instance['tumb_size'] == 'full') {?>
								<a href="<?php the_permalink(); ?>" class="post-thumbnail post-full">
								<?php $defalt_arg =array('class' => "img-responsive" );
						     	the_post_thumbnail($instance['tumb_size'], $defalt_arg);
						}?>
						</a>
					<?php endif; endif; ?>
						<div class="media-body">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="entry-content">
							<?php echo spicepress_get_news_event_excerpt(); ?>
							</div>
						</div>
					</article>

					
				<?php 
				endwhile; 
			endif; 
		endif;
			
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {

		$instance['title'] = (isset($instance['title'])?$instance['title']:'');
		$instance['number_of_posts'] = (isset($instance['number_of_posts'])?$instance['number_of_posts']:'');
		$instance['blog_cat'] = (isset($instance['blog_cat'])?$instance['blog_cat']:1);
		
		$instance['tumb_size'] = (isset($instance['tumb_size'])?$instance['tumb_size']:'');
		$instance['image_show']=(isset($instance['image_show'])?$instance['image_show']:true);
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title','spicepress' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of posts to show','spicepress' ); ?></label> 
		<input size="3" maxlength="2"id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $instance['number_of_posts'] ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'blog_cat' ); ?>"><?php _e( 'Select blog category','spicepress' ); ?></label><br/>
			<select id="<?php echo $this->get_field_id( 'blog_cat' ); ?>" name="<?php echo $this->get_field_name( 'blog_cat' ); ?>">
				<option value>-- <?php _e('Select category','spicepress'); ?> --</option>
				<?php 
					$options = array();
					$cats = get_categories($options);

					foreach ( $cats as $cat )
					{
						printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($instance['blog_cat'], $cat->term_id, false), $cat->name);
					}
				?>
			</select>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'tumb_size' ); ?>"><?php _e( 'Featured post image size','spicepress' ); ?></label><br/> 
		<select id="<?php echo $this->get_field_id( 'tumb_size' ); ?>" name="<?php echo $this->get_field_name( 'tumb_size' ); ?>">
			<option value>-- <?php _e('Select post image size','spicepress'); ?> --</option>
			<option value="thumbnail" <?php echo ($instance['tumb_size']=='thumbnail'?'selected':''); ?>><?php _e('Thumbnail','spicepress'); ?></option>
			<option value="medium" <?php echo ($instance['tumb_size']=='medium'?'selected':''); ?>><?php _e('Medium','spicepress'); ?></option>
			<option value="large" <?php echo ($instance['tumb_size']=='large'?'selected':''); ?>><?php _e('Large','spicepress'); ?></option>
			<option value="full" <?php echo ($instance['tumb_size']=='full'?'selected':''); ?>><?php _e('Full','spicepress'); ?></option>
		</select>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'image_show' ); ?>"><?php _e( 'Enable feature image','spicepress' ); ?></label> 
		<input type="checkbox" class="widefat" id="<?php echo $this->get_field_id( 'image_show' ); ?>" name="<?php echo $this->get_field_name( 'image_show' ); ?>" <?php if($instance['image_show']==true) echo 'checked'; ?> >
	</p>
		
	<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		$instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? strip_tags( $new_instance['number_of_posts'] ) : '';
		
		$instance['tumb_size'] = ( ! empty( $new_instance['tumb_size'] ) ) ? strip_tags( $new_instance['tumb_size'] ) : '';
		$instance['blog_cat'] = ( ! empty( $new_instance['blog_cat'] ) ) ? strip_tags( $new_instance['blog_cat'] ) : '';
		$instance['image_show'] = ( ! empty( $new_instance['image_show'] ) ) ? $new_instance['image_show'] : '';
		
		return $instance;
	}

} // class
?>