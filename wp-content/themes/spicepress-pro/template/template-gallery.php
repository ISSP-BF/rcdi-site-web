<?php 
$gallery_options = get_theme_mod('spicepress_gallery_content');
/**
 * Template Name: Gallery
 */
get_header();
if (get_post_meta( get_the_ID(), 'slider_chkbx', true )) {

get_template_part('index','slider');

}
spicepress_overlap_bredcrumb();
$gallery_tmp_title = get_theme_mod('gallery_tmp_title', __('Our work','spicepress'));
$gallery_tmp_desc = get_theme_mod('gallery_tmp_desc','Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.');
$gallery_layout =get_theme_mod('gallery_template_column_layout',4);
$gallery_layout = 12 / $gallery_layout;

?>

<!-- Gallery Section -->
<section class="gallery-section">
	<div class="container<?php echo spicepress_container();?>">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms"><?php echo esc_attr($gallery_tmp_title); ?></h1>
					<div class="widget-separator"><span></span></div>
					<p class="wow fadeInDown animated"><?php echo esc_attr($gallery_tmp_desc); ?></p>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
			
		<!-- Gallery -->
		<div class="row">
			<?php 
			$gallery_options = json_decode($gallery_options);
				if( $gallery_options!='' )
			{
			foreach($gallery_options as $gallery_iteam){ 
			$title = ! empty( $gallery_iteam->title ) ? apply_filters( 'spicepress_translate_single_string', $gallery_iteam->title, 'Gallery section' ) : ''; 
			    $test_link = $gallery_iteam->link;
				$open_new_tab = $gallery_iteam->open_new_tab;
			
			?>
			<?php  
				$gimage_url = $gallery_iteam->image_url;
				if(strstr($gimage_url, 'images/gallery'))
				{
					$gimage_title = $title;
					$gimage_alt = $title;
				}
				else
				{
					$exp = explode("-",$gimage_url);
					$last = end($exp);
					if(strstr($last,'x'))
					{
						$ext = explode(".",$last);
						$file_ext = $ext[1];
						$final_str = str_replace('-'.$last, '.'.$file_ext, $gimage_url);
						$gimage_id = attachment_url_to_postid($final_str);
					}
					else
					{
						$gimage_id = attachment_url_to_postid($gimage_url);
					}
					$gimage_alt = get_post_meta( $gimage_id, '_wp_attachment_image_alt', true );
					$gimage_title = get_the_title($gimage_id);
				}					
			?>
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated" data-wow-delay=".5s">
					<figure class="gallery-thumbnail">
						<?php if($gallery_iteam->image_url!=''){ ?>
							<img class="img-responsive" src="<?php echo $gallery_iteam->image_url; ?>" alt="<?php if(!empty($gimage_alt)){ echo $gimage_alt; } ?>" />
						<?php } ?>
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo $gallery_iteam->image_url; ?>" title="<?php if(!empty($title)){ echo $title; } ?>" data-lightbox="image" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								
								<?php if(!empty( $test_link )): ?>
								<a href="<?php echo $test_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?> class="hover_thumb">
								<?php endif; ?>
										
								<i class="fa fa-link"></i>
								<?php if(!empty( $test_link )): ?>	
								</a>
								<?php endif; ?>
								
							</div>
						</div>
					</figure>
				</article>
			</div>
			<?php } } else {?>
			
			
			    
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 1" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" >
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery1.jpg" data-lightbox="image" title="Gallery 1" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 2" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery2.jpg" >
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery2.jpg" data-lightbox="image" title="Gallery 2" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
				    <figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 3" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery3.jpg" >
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery3.jpg" data-lightbox="image" title="Gallery 3" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
	        	</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 4" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery4.jpg">
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery4.jpg" data-lightbox="image" title="Gallery 4" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 5" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery5.jpg">
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery5.jpg" data-lightbox="image" title="Gallery 5" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 6" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery6.jpg" >
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery6.jpg" data-lightbox="image" title="Gallery 6" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 7" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery7.jpg" >
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery7.jpg"  data-lightbox="image" title="Gallery 7" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 8" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery8.jpg" >
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery8.jpg"  data-lightbox="image" title="Gallery 8" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 9" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery9.jpg" >
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery9.jpg" data-lightbox="image" title="Gallery 9" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 10" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery10.jpg">
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery10.jpg" data-lightbox="image" title="Gallery 10" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 11" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery11.jpg">
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery11.jpg" data-lightbox="image" title="Gallery 11" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>
			
			<div class="col-md-<?php echo $gallery_layout; ?> col-sm-6 gallery-area">
				<article class="gallery-image wow flipInX animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: flipInX;">
					<figure class="gallery-thumbnail">
						<img class="img-responsive" alt="Gallery 12" src="<?php echo get_template_directory_uri();?>/images/gallery/gallery12.jpg">
						<div class="gallery-showcase-overlay">
							<div class="gallery-showcase-icons">
								<a href="<?php echo get_template_directory_uri();?>/images/gallery/gallery12.jpg" data-lightbox="image" title="Gallery 12" class="hover_thumb"><i class="fa fa-picture-o"></i></a>
								<a href="#" class="hover_thumb"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</figure>
				</article>
			</div>

			
			
			<?php } ?>
		</div>
		<!-- /Gallery -->

	</div>
</section>
<!-- /Gallery Section -->
<div class="clearfix"></div>
<?php get_footer(); ?>