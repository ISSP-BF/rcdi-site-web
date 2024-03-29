<?php
/**
 * The default template for displaying content
 */
?>
<article class="post" id="post-<?php the_ID(); ?>" <?php post_class( 'post-content-area wow fadeInDown animated' ); ?> data-wow-delay="0.4s">
			
		<?php 
		if(has_post_thumbnail()){
		if ( is_single() ) {
			the_post_thumbnail( '', array( 'class'=>'img-responsive','alt' => get_the_title() ) );
		}else{
			echo '<figure class="post-thumbnail" href="'.esc_url(get_the_permalink()).'">';
			the_post_thumbnail( '', array( 'class'=>'img-responsive','alt' => get_the_title() ) );
			echo '</figure>';
		}}?>
		
		
		
		<div class="post-content">
			
			
			<?php
			if ( class_exists( 'WooCommerce' ) ) {
					
					if( is_account_page() || is_cart() || is_checkout() ) {
			}}else
			{
			//graphite_blog_meta_content();
			}			
			?>
			
			<div class="entry-content">
			<?php the_content( __('Read More','spicepress') ); 
				wp_link_pages();
				?>
			</div>							
		</div>
</article>