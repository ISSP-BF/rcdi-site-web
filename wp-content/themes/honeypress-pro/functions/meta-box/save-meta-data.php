<?php
	add_action( 'save_post', 'honeypress_honeypress_post_options_save_postdata', 10, 2 );

	$honeypress_post_options = array (

		//Gallery Format
		array(
			'name' => 'Media Mode',
			'id' => 'honeypress_post_type_gallery_mode',
		),
		//Link Format
		array(
			'name' => 'Link URL',
			'id' => 'honeypress_post_link_url',
		),
		array(
			'name' => 'Open Link in a new window',
			'id' => 'honeypress_post_link_new_window',
		),
		//Audio Format
		array(
			'name' => 'Audio Mode',
			'id' => 'honeypress_post_type_audio_mode',
		),
		array(
			'name' => 'Audio mp3 format',
			'id' => 'honeypress_post_audio_mp3',
		),
		array(
			'name' => 'Audio ogg format',
			'id' => 'honeypress_post_audio_ogg',
		),
		array(
			'name' => 'Audio wav format',
			'id' => 'honeypress_post_audio_wav',
		),
		array(
			'name' => 'Audio embed',
			'id' => 'honeypress_post_audio_embed',
			'html' => true,
		),
		//Video Format
		array(
			'name' => 'Video Mode',
			'id' => 'honeypress_post_type_video_mode',
		),
		array(
			'name' => 'Video webm format',
			'id' => 'honeypress_post_video_webm',
		),
		array(
			'name' => 'Video mp4 format',
			'id' => 'honeypress_post_video_mp4',
		),
		array(
			'name' => 'Video ogv format',
			'id' => 'honeypress_post_video_ogv',
		),
		array(
			'name' => 'Video embed Vimeo/Youtube',
			'id' => 'honeypress_post_video_embed',
		),

	);

	


	function honeypress_honeypress_meta_box_post_format_gallery( $post ) {

		wp_nonce_field( 'honeypress_nonce_save', 'honeypress_post_format_gallery_save_nonce' );
		$gallery_mode = get_post_meta( $post->ID, 'honeypress_post_type_gallery_mode', true );
		$slider_items = get_post_meta( $post->ID, 'honeypress_post_slider_items', true );
		$media_slider_settings = get_post_meta( $post->ID, 'honeypress_post_slider_settings', true );
		$media_slider_speed = honeypress_array_value( $media_slider_settings, 'slideshow_speed', '3500' );
		$media_slider_dir_nav = honeypress_array_value( $media_slider_settings, 'direction_nav', '2' );
		$format = get_post_format( $post->ID );
		if ( !$format ) {
			$format = 'standard';
		}
	?>

			<table class="form-table honeypress-metabox">
				<tbody>
					<tr class="honeypress-border-bottom">
						<th>
							<label for="honeypress-post-gallery-mode">
								<strong>
									<?php esc_html_e( 'Select Gallery mode.', 'honeypress' ); ?>
								</strong>
							</label>
						</th>
						<td>
							<select id="honeypress-post-gallery-mode" name="honeypress_post_type_gallery_mode">
								<option value="" <?php selected( '', $gallery_mode ); ?>><?php esc_html_e( 'Gallery', 'honeypress' ); ?></option>
								<option value="slider" <?php selected( 'slider', $gallery_mode ); ?>><?php esc_html_e( 'Slider', 'honeypress' ); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label><?php esc_html_e( 'Images', 'honeypress' ); ?></label>
						</th>
						<td>
							<input type="button" class="honeypress-upload-slider-button button-primary" value="<?php esc_attr_e( 'Insert Images to Gallery/Slider', 'honeypress' ); ?>"/>
							<span id="honeypress-upload-slider-button-spinner" class="honeypress-action-spinner"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<div id="honeypress-slider-container" class="honeypress-slider-container-minimal" data-mode="minimal">
				<?php
					if( !empty( $slider_items ) ) {
						honeypress_print_admin_media_slider_items( $slider_items );
					}
				?>
			</div>
	<?php
	}


	function honeypress_honeypress_meta_box_post_format_link( $post ) {
		$link_url = get_post_meta( $post->ID, 'honeypress_post_link_url', true );
		$new_window = get_post_meta( $post->ID, 'honeypress_post_link_new_window', true );
	?>
		<table class="form-table honeypress-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Add your text in the content area. The text will be wrapped with a link.', 'honeypress' ); ?></p>
					</td>
				</tr>
				<tr class="honeypress-border-bottom">
					<th>
						<label for="honeypress-post-link-url">
							<strong><?php esc_html_e( 'Link URL', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter the full URL of your link.', 'honeypress' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="honeypress-post-link-url" class="honeypress-meta-text" name="honeypress_post_link_url" value="<?php echo esc_attr( $link_url ); ?>" />
					</td>
				</tr>
				<tr>
					<th>
						<label for="honeypress-post-link-new-window">
							<strong><?php esc_html_e( 'Open Link in new window', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'If selected, link will open in a new window.', 'honeypress' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="checkbox" id="honeypress-post-link-new-window" name="honeypress_post_link_new_window" <?php if ( $new_window ) { ?> checked="checked" <?php } ?>/>
					</td>
				</tr>
			</tbody>
		</table>


	<?php
	}

	function honeypress_honeypress_meta_box_post_format_quote( $post ) {
	?>
		<table class="form-table honeypress-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Simply add some text in the content area. This text will automatically displayed as quote.', 'honeypress' ); ?></p>
					</td>
				</tr>
			</tbody>
		</table>

	<?php
	}

	function honeypress_honeypress_meta_box_post_format_video( $post ) {

		$video_mode = get_post_meta( $post->ID, 'honeypress_post_type_video_mode', true );
		$honeypress_post_video_webm = get_post_meta( $post->ID, 'honeypress_post_video_webm', true );
		$honeypress_post_video_mp4 = get_post_meta( $post->ID, 'honeypress_post_video_mp4', true );
		$honeypress_post_video_ogv = get_post_meta( $post->ID, 'honeypress_post_video_ogv', true );
		$honeypress_post_video_embed = get_post_meta( $post->ID, 'honeypress_post_video_embed', true );

	?>
		<table class="form-table honeypress-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Select one of the choices below for the featured video.', 'honeypress' ); ?></p>
					</td>
				</tr>
				<tr class="honeypress-border-bottom">
					<th>
						<label for="honeypress-post-type-video-mode">
							<strong><?php esc_html_e( 'Video Mode', 'honeypress' ); ?></strong>
						</label>
					</th>
					<td>
						<select id="honeypress-post-type-video-mode" name="honeypress_post_type_video_mode">
							<option value="" <?php if ( "" == $video_mode ) { ?> selected="selected" <?php } ?>><?php esc_html_e( 'YouTube/Vimeo Video', 'honeypress' ); ?></option>
							
						</select>
					</td>
				</tr>
				<tr class="honeypress-post-video-html5"<?php if ( "" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="honeypress-post-video-webm">
							<strong><?php esc_html_e( 'WebM File URL', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .webm video file.', 'honeypress' ); ?>
								<br/>
								<strong><?php esc_html_e( 'This Format must be included for HTML5 Video.', 'honeypress' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="honeypress-post-video-webm" class="honeypress-upload-simple-media-field honeypress-meta-text" name="honeypress_post_video_webm" value="<?php echo esc_attr( $honeypress_post_video_webm ); ?>"/>
						<input type="button" data-media-type="video" class="honeypress-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'honeypress' ); ?>"/>
						<input type="button" class="honeypress-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'honeypress' ); ?>"/>
					</td>
				</tr>
				<tr class="honeypress-post-video-html5"<?php if ( "" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="honeypress-post-video-mp4">
							<strong><?php esc_html_e( 'MP4 File URL', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .mp4 video file.', 'honeypress' ); ?>
								<br/>
								<strong><?php esc_html_e( 'This Format must be included for HTML5 Video.', 'honeypress' ); ?></strong>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="honeypress-post-video-mp4" class="honeypress-upload-simple-media-field honeypress-meta-text" name="honeypress_post_video_mp4" value="<?php echo esc_attr( $honeypress_post_video_mp4 ); ?>"/>
						<input type="button" data-media-type="video" class="honeypress-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'honeypress' ); ?>"/>
						<input type="button" class="honeypress-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'honeypress' ); ?>"/>
					</td>
				</tr>
				<tr class="honeypress-post-video-html5"<?php if ( "" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="honeypress-post-video-ogv">
							<strong><?php esc_html_e( 'OGV File URL', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .ogv video file (optional).', 'honeypress' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="honeypress-post-video-ogv" class="honeypress-upload-simple-media-field honeypress-meta-text" name="honeypress_post_video_ogv" value="<?php echo esc_attr( $honeypress_post_video_ogv ); ?>"/>
						<input type="button" data-media-type="video" class="honeypress-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'honeypress' ); ?>"/>
						<input type="button" class="honeypress-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'honeypress' ); ?>"/>
					</td>
				</tr>
				<tr class="honeypress-post-video-embed"<?php if ( "html5" == $video_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="honeypress-post-video-embed">
							<strong><?php esc_html_e( 'Vimeo/YouTube URL', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Enter the full URL of your video from Vimeo or YouTube.', 'honeypress' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="honeypress-post-video-embed" class="honeypress-meta-text" name="honeypress_post_video_embed" value="<?php echo esc_attr( $honeypress_post_video_embed ); ?>"/>
					</td>
				</tr>
			</tbody>
		</table>

	<?php
	}

	function honeypress_honeypress_meta_box_post_format_audio( $post ) {

		$audio_mode = get_post_meta( $post->ID, 'honeypress_post_type_audio_mode', true );
		$honeypress_post_audio_mp3 = get_post_meta( $post->ID, 'honeypress_post_audio_mp3', true );
		$honeypress_post_audio_ogg = get_post_meta( $post->ID, 'honeypress_post_audio_ogg', true );
		$honeypress_post_audio_wav = get_post_meta( $post->ID, 'honeypress_post_audio_wav', true );
		$honeypress_post_audio_embed = get_post_meta( $post->ID, 'honeypress_post_audio_embed', true );

	?>
		<table class="form-table honeypress-metabox">
			<tbody>
				<tr>
					<td colspan="2">
						<p class="howto"><?php esc_html_e( 'Select one of the choices below for the featured audio.', 'honeypress' ); ?></p>
					</td>
				</tr>
				<tr class="honeypress-border-bottom">
					<th>
						<label for="honeypress-post-type-audio-mode">
							<strong><?php esc_html_e( 'Audio Mode', 'honeypress' ); ?></strong>
						</label>
					</th>
					<td>
						<select id="honeypress-post-type-audio-mode" name="honeypress_post_type_audio_mode">
							<option value="" <?php if ( "" == $audio_mode ) { ?> selected="selected" <?php } ?>><?php esc_html_e( 'Embed Audio', 'honeypress' ); ?></option>
						</select>
					</td>
				</tr>
				<tr class="honeypress-post-audio-html5"<?php if ( "" == $audio_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="honeypress-post-audio-mp3">
							<strong><?php esc_html_e( 'MP3 File URL', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .mp3 audio file.', 'honeypress' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="honeypress-post-audio-mp3" class="honeypress-upload-simple-media-field honeypress-meta-text" name="honeypress_post_audio_mp3" value="<?php echo esc_attr( $honeypress_post_audio_mp3 ); ?>"/>
						<input type="button" data-media-type="audio" class="honeypress-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'honeypress' ); ?>"/>
						<input type="button" class="honeypress-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'honeypress' ); ?>"/>
					</td>
				</tr>
				<tr class="honeypress-post-audio-html5"<?php if ( "" == $audio_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="honeypress-post-audio-ogg">
							<strong><?php esc_html_e( 'OGG File URL', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .ogg audio file.', 'honeypress' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="honeypress-post-audio-ogg" class="honeypress-upload-simple-media-field honeypress-meta-text" name="honeypress_post_audio_ogg" value="<?php echo esc_attr( $honeypress_post_audio_ogg ); ?>"/>
						<input type="button" data-media-type="audio" class="honeypress-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'honeypress' ); ?>"/>
						<input type="button" class="honeypress-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'honeypress' ); ?>"/>
					</td>
				</tr>
				<tr class="honeypress-post-audio-html5"<?php if ( "" == $audio_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="honeypress-post-audio-wav">
							<strong><?php esc_html_e( 'WAV File URL', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Upload the .wav audio file (optional).', 'honeypress' ); ?>
							</span>
						</label>
					</th>
					<td>
						<input type="text" id="honeypress-post-audio-wav" class="honeypress-upload-simple-media-field honeypress-meta-text" name="honeypress_post_audio_wav" value="<?php echo esc_attr( $honeypress_post_audio_wav ); ?>"/>
						<input type="button" data-media-type="audio" class="honeypress-upload-simple-media-button button" value="<?php esc_attr_e( 'Upload Media', 'honeypress' ); ?>"/>
						<input type="button" class="honeypress-remove-simple-media-button button" value="<?php esc_attr_e( 'Remove', 'honeypress' ); ?>"/>
					</td>
				</tr>
				<tr class="honeypress-post-audio-embed"<?php if ( "html5" == $audio_mode ) { ?> style="display:none;" <?php } ?>>
					<th>
						<label for="honeypress-post-audio-embed">
							<strong><?php esc_html_e( 'Audio embed code', 'honeypress' ); ?></strong>
							<span>
								<?php esc_html_e( 'Type your audio embed code.', 'honeypress' ); ?>
							</span>
						</label>
					</th>
					<td>
						<textarea id="honeypress-post-audio-embed" name="honeypress_post_audio_embed" cols="40" rows="5"><?php echo esc_textarea( $honeypress_post_audio_embed ); ?></textarea>
					</td>
				</tr>
			</tbody>
		</table>

	<?php
	}


	function honeypress_honeypress_post_options_save_postdata( $post_id , $post ) {
		global $honeypress_post_options;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		

		// Check permissions
		if(isset($_POST['post_type']))
		{
			if ( 'post' == $_POST['post_type'] )
			{
				if ( !current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
			}
		}

		foreach ( $honeypress_post_options as $value ) {
			$allow_html = ( isset( $value['html'] ) ? $value['html'] : false );
			if( $allow_html ) {
				$new_meta_value = ( isset( $_POST[$value['id']] ) ? wp_filter_post_kses( $_POST[$value['id']] ) : '' );
			} else {
				$new_meta_value = ( isset( $_POST[$value['id']] ) ? sanitize_text_field( $_POST[$value['id']] ) : '' );
			}
			$meta_key = $value['id'];


			$meta_value = get_post_meta( $post_id, $meta_key, true );

			if ( $new_meta_value && '' == $meta_value ) {
				add_post_meta( $post_id, $meta_key, $new_meta_value, true );
			} elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
				update_post_meta( $post_id, $meta_key, $new_meta_value );
			} elseif ( '' == $new_meta_value && $meta_value ) {
				delete_post_meta( $post_id, $meta_key, $meta_value );
			}
		}

		if ( isset( $_POST['honeypress_post_format_gallery_save_nonce'] ) && wp_verify_nonce( $_POST['honeypress_post_format_gallery_save_nonce'], 'honeypress_nonce_save' ) ) {


			//Feature Slider Items
			$slider_items = array();
			if ( isset( $_POST['honeypress_media_slider_item_id'] ) ) {

				$num_of_images = sizeof( $_POST['honeypress_media_slider_item_id'] );
				for ( $i=0; $i < $num_of_images; $i++ ) {

					$this_image = array (
						'id' => sanitize_text_field( $_POST['honeypress_media_slider_item_id'][ $i ] ),
					);
					array_push( $slider_items, $this_image );
				}

			}

			if( empty( $slider_items ) ) {
				delete_post_meta( $post->ID, 'honeypress_post_slider_items' );
				delete_post_meta( $post->ID, 'honeypress_post_slider_settings' );
			} else{
				update_post_meta( $post->ID, 'honeypress_post_slider_items', $slider_items );
				$media_slider_speed = 3500;
				$media_slider_direction_nav = '1';
				
				$media_slider_settings = array (
					'slideshow_speed' => $media_slider_speed,
					'direction_nav' => $media_slider_direction_nav,
				);
				update_post_meta( $post->ID, 'honeypress_post_slider_settings', $media_slider_settings );
			}

		}

	}

//Omit closing PHP tag to avoid accidental whitespace output errors.
