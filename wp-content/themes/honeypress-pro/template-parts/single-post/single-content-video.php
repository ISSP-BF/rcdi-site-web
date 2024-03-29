<?php
/**
 * The Video Post Type Template
 */
$honeypress_disable_media = honeypress_post_meta( 'honeypress_disable_media' );
	$slider_items = honeypress_post_meta( 'honeypress_post_slider_items' );
	$gallery_mode = honeypress_post_meta( 'honeypress_post_type_gallery_mode', 'gallery' ); ?>
<article class="post">
<?php 
if(get_theme_mod('honeypress_enable_single_post_category',true)==true):
	if(has_category()):
		echo '<div class="entry-meta">';
			echo '<span class="cat-links">';
				the_category( ' ');
			echo '</span>';
		echo '</div>';
endif; endif;?>
	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
		</h2>
	</header>	
	<div class="entry-meta mb-4">
		<?php
		if(get_theme_mod('honeypress_enable_single_post_admin',true)===true):?>
			<span class="author">
				<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php _e('By','honeypress');?> <?php echo get_the_author();?></a>
			</span>
		<?php
		endif;
		if(get_theme_mod('honeypress_enable_single_post_date',true)===true):?>
			<span class="posted-on">
				<a href="<?php echo esc_url( home_url() ); ?>/<?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><time><?php echo get_the_date();?></time></a>
			</span>
		<?php endif;
		if(get_theme_mod('honeypress_enable_single_post_comments',true)===true):?>
			<span class="comment-links">
				<a href="<?php the_permalink(); ?>#respond"><?php echo get_comments_number();?></a>
			</span>
		<?php endif;?>
	</div>
	<?php honeypress_print_post_video( 'single-post' ); ?>
	<div class="entry-content">
		<?php the_content(); wp_link_pages( ); ?>
	</div>	
	<?php
	if(get_theme_mod('honeypress_enable_single_post_tag',true)===true):
		if(has_tag()):?>
			<div class="entry-meta pt-4">
				<span class="tag-links"><?php the_tags('',' ');?></span>
			</div>
	<?php endif; endif;?>
</article>