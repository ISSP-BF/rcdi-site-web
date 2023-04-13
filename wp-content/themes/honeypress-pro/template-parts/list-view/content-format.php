<article class="post media">
<?php if(has_post_thumbnail()):?>
	<figure class="post-thumbnail mb-4">
		<a href="<?php the_permalink();?>"><?php the_post_thumbnail('full',array('class'=>'img-fluid'));?></a>		
	</figure>
<?php endif;?>
	<div class="media-body">
	<?php if(get_theme_mod('honeypress_enable_blog_category',true)==true):
		if ( has_category() ) :
			echo '<div class="entry-meta">';
				echo '<span class="cat-links">';
			   		the_category( ' ' );
		   		echo '</span>';
			echo '</div>';
	endif; endif;?>										
		<header class="entry-header">
			<h2 class="entry-title template-blog-list-view"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		</header>	
		<div class="entry-meta mb-4">
		<?php
		$honeypress_blog_meta_sort=get_theme_mod('honeypress_blog_meta_sort',array('blog_author','blog_date','blog_commment',));
		if ( ! empty( $honeypress_blog_meta_sort ) && is_array( $honeypress_blog_meta_sort ) ) :
			foreach ( $honeypress_blog_meta_sort as $honeypress_blog_meta_sort_key => $honeypress_blog_meta_sort_val ) :
				if(get_theme_mod('honeypress_enable_blog_author',true)==true):
					if ( 'blog_author' === $honeypress_blog_meta_sort_val ) :?>
						<span class="author">
							<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php _e('By','honeypress');?> <?php echo get_the_author();?></a>
						</span>
				<?php endif; endif;
				if(get_theme_mod('honeypress_enable_blog_date',true)===true):
					if ( 'blog_date' === $honeypress_blog_meta_sort_val ) :?>
						<span class="posted-on">
							<a href="<?php echo esc_url( home_url() ); ?>/<?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><time><?php echo esc_html(get_the_date());?></time></a>
						</span>
				<?php endif; endif;
				if(get_theme_mod('honeypress_enable_blog_comments',true)===true):
					if ( 'blog_commment' === $honeypress_blog_meta_sort_val ) :?>
						<span class="comment-links">
							<a href="<?php the_permalink(); ?>#respond"><?php echo esc_html(get_comments_number());?></a>
						</span>
				<?php endif; endif;
			endforeach;
		endif;	?>
		</div>									
		<div class="entry-content">
		<?php honeypress_posted_content();
			if(get_theme_mod('honeypress_enable_blog_read_button',true)===true):
				if(get_theme_mod('honeypress_blog_content','excerpt')=='excerpt'){?>
					<p><?php honeypress_button_title();?></p>
		<?php } endif;?>
		</div>	
	</div>						
</article>