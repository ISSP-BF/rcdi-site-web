<?php
/**
 * function that prints a slider or gallery
 */
function honeypress_print_gallery_slider( $gallery_mode, $slider_items , $image_size_slider = '', $extra_class = "") {
	if ( empty( $slider_items ) ) {
		return;
	}
	$image_size_gallery_thumb = 'honeypress-image-small-square';
	if( 'gallery-vertical' == $gallery_mode ) {
		$image_size_gallery_thumb = $image_size_slider;
	}

	$start_block = $end_block = $item_class = '';

	if ( 'gallery' == $gallery_mode || '' == $gallery_mode || 'gallery-vertical' == $gallery_mode ) {
		$gallery_index = 0;
		global $template;
		if(basename($template)=="template-blog-grid-view.php")
		{
			$col_class_honeypress='col-lg-6 col-md-6 col-sm-12';
		}
		elseif(basename($template)=="template-blog-list-view.php" || $_POST['ajaxPage_template']=="template-blog-list-view.php" || basename($template)=="template-blog-list-view-sidebar.php" || $_POST['ajaxPage_template']=="template-blog-list-view-sidebar.php")
		{
			$col_class_honeypress='col-lg-6 col-md-6 col-sm-12 list-temp-class';
		}
		else
		{
			$col_class_honeypress='col-lg-4 col-md-6 col-sm-12';
		}

		foreach ( $slider_items as $slider_item ) {
			$media_id = $slider_item['id'];
			$full_src = wp_get_attachment_image_src( $media_id, 'honeypress-image-fullscreen' );
			$image_full_url = $full_src[0];
			$caption = get_post_field( 'post_excerpt', $media_id );
			$figcaption = '';

			if	( !empty( $caption ) ) {
				$figcaption = wptexturize( $caption );
			}
			echo '<div class="'.$col_class_honeypress.'">';?>
				<article id="post-<?php the_ID(); ?>" <?php post_class($gallery_mode); ?>>	
				<?php echo '<figure class="post-thumbnail">';
						echo wp_get_attachment_image( $media_id, $image_size_gallery_thumb );
						echo '</figure>';
				echo '</article>';
			echo '</div>';
		}

	}
	else {
		$slider_settings = array();
		if ( is_singular( 'post' ) || is_singular( 'portfolio' ) ) {
			if ( is_singular( 'post' ) ) {
				$slider_settings = honeypress_post_meta( 'honeypress_post_slider_settings' );
			} else {
				$slider_settings = honeypress_post_meta( 'honeypress_portfolio_slider_settings' );
			}
		}
		$slider_speed = honeypress_array_value( $slider_settings, 'slideshow_speed', '2500' );
		$slider_dir_nav = honeypress_array_value( $slider_settings, 'direction_nav', '2' );

		global $template;
		if(basename($template)=="template-blog-grid-view.php")
			{
				$grid='grid-view';
			}
		else
			{
				$grid='';
			} ?>
		<section class="<?php echo $grid;?> owl-carousel owl-theme gallery-content post-format post-gallery-format post_format_slider" id="post_format_slider">
		<?php
			foreach ( $slider_items as $slider_item ) {
				$media_id = $slider_item['id'];
				echo '<div class="item">';
					echo wp_get_attachment_image( $media_id, $image_size_slider );
				echo '</div>';
				} ?>
		</section>
	<?php
	}
}

/**
 * Generic function that prints video settings ( HTML5 )
 */

if ( !function_exists( 'honeypress_print_media_video_settings' ) ) {
	function honeypress_print_media_video_settings( $video_settings ) {
		$video_attr = '';

		if ( !empty( $video_settings ) ) {

			$video_poster = honeypress_array_value( $video_settings, 'poster' );
			$video_preload = honeypress_array_value( $video_settings, 'preload', 'metadata' );

			if( 'yes' == honeypress_array_value( $video_settings, 'controls' ) ) {
				$video_attr .= ' controls';
			}
			if( 'yes' == honeypress_array_value( $video_settings, 'loop' ) ) {
				$video_attr .= ' loop="loop"';
			}
			if( 'yes' ==  honeypress_array_value( $video_settings, 'muted' ) ) {
				$video_attr .= ' muted="muted"';
			}
			if( 'yes' == honeypress_array_value( $video_settings, 'autoplay' ) ) {
				$video_attr .= ' autoplay="autoplay"';
			}
			if( 'yes' == honeypress_array_value( $video_settings, 'playsinline' ) ) {
				$video_attr .= ' playsinline';
			}
			if( !empty( $video_poster ) ) {
				$video_attr .= ' poster="' . esc_url( $video_poster ) . '"';
			}
			$video_attr .= ' preload="' . $video_preload . '"';

		}
		return $video_attr;
	}
}

/**
 * Generic function that prints a video ( Embed or HTML5 )
 */
if ( !function_exists('honeypress_print_media_video') ) {

	function honeypress_print_media_video( $video_mode, $video_webm, $video_mp4, $video_ogv, $video_embed, $type = 'post' ) {
		global $wp_embed;
		$video_output = '';

		if( empty( $video_mode ) && !empty( $video_embed ) ) {
			echo '<div class="honeypress-media">' . $wp_embed->run_shortcode( '[embed]' . $video_embed . '[/embed]' ) . '</div>';
		} else {

			if ( !empty( $video_webm ) || !empty( $video_mp4 ) || !empty( $video_ogv ) ) {

				$video_settings = array(
					'controls' => 'yes',
				);
				$video_settings = apply_filters( 'honeypress_media_video_settings', $video_settings, $type );
				$video_attr = honeypress_print_media_video_settings( $video_settings );

				echo '<div class="honeypress-media">';
				echo ' <video ' . $video_attr . '>';

				if ( !empty( $video_webm ) ) {
					echo '<source src="' . $video_webm . '" type="video/webm">';
				}
				if ( !empty( $video_mp4 ) ) {
					echo '<source src="' . $video_mp4 . '" type="video/mp4">';
				}
				if ( !empty( $video_ogv ) ) {
					echo '<source src="' . $video_ogv . '" type="video/ogg">';
				}
				echo ' </video>';
				echo '</div>';

			}
		}
	}
}

/**
 * Generic function to add attributes to image
 */
if ( !function_exists( 'honeypress_img_attributes' ) ) {
	function honeypress_img_attributes( $attr ) {
		$attr['itemprop'] = 'image';
		return $attr;
	}
}

/**
 * Prints video of the video post format
 */
function honeypress_print_post_video( $type = 'post') {

	$video_mode = honeypress_post_meta( 'honeypress_post_type_video_mode' );
	$video_webm = honeypress_post_meta( 'honeypress_post_video_webm' );
	$video_mp4 = honeypress_post_meta( 'honeypress_post_video_mp4' );
	$video_ogv = honeypress_post_meta( 'honeypress_post_video_ogv' );
	$video_embed = honeypress_post_meta( 'honeypress_post_video_embed' );

	honeypress_print_media_video( $video_mode, $video_webm, $video_mp4, $video_ogv, $video_embed, $type );
}