<?php
$index_news_link=get_theme_mod('home_blog_more_btn_link',__('#','honeypress')); 
$index_more_btn=get_theme_mod('home_blog_more_btn',__('View More Posts','honeypress'));
if(empty($index_news_link)) { $index_news_link='#'; }
$home_meta_section_settings = get_theme_mod('home_meta_section_settings', true);
?>
<section class="section-module blog switcher-home-blog">
		<div class="honeypress-newz container<?php //echo honeypress_container();?>">
			<?php do_action( 'honeypress_blog_home_title_subtitle' );?>
			<div class="row">
				<!--Blog Posts-->				
				<div class="col-lg-12 col-md-12 col-sm-12 list-view">
					<?php
				$no_of_post=get_theme_mod('honeypress_homeblog_counts',3);
				$args = array( 'post_type' => 'post','post__not_in'=>get_option("sticky_posts"),'posts_per_page' => $no_of_post) ; 	
				query_posts( $args );
				if(query_posts( $args ))
				{	
					$i=1;
					while(have_posts()):the_post();
					{
						if($i%2!=0)
						{?>
							<article class="post media">
								<?php if(has_post_thumbnail()){ ?>
								<figure class="post-thumbnail mb-4">
								<?php $defalt_arg =array('class' => "img-fluid");?>	
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$defalt_arg);?></a>
								</figure>
								<?php } ?>
								<div class="media-body">
									<?php if($home_meta_section_settings == true){?>
									<?php $cat_list = get_the_category_list();
										if(!empty($cat_list)) { ?>	
									<div class="entry-meta">
										<span class="cat-links"><?php the_category(' '); ?></span>
									</div>
									<?php } } ?>													
									<header class="entry-header">
										<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									</header>	
									<?php if($home_meta_section_settings == true){?>
									<div class="entry-meta mb-4">
										<span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo __('By','honeypress');?> <?php echo get_the_author();?></a></span>
										<span class="posted-on"><a href="<?php echo esc_url( home_url() ); ?>/<?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><time><?php echo get_the_date();?></time></a></span>
										<span class="comment-links"><a href="<?php the_permalink(); ?>#respond"><?php echo get_comments_number();?></a></span>
									</div>	
									<?php } ?>								
									<div class="entry-content">
										<?php the_excerpt();?>
										<p><a href="<?php the_permalink(); ?>" class="more-link"><?php echo get_theme_mod('home_news_button_title',__('READ MORE','honeypress'));?></a></p>
									</div>	
								</div>						
							</article>
						<?php
						}
						else
						{?>
							<article class="post media right">
								<div class="media-body">
									<?php if($home_meta_section_settings == true){?>
									<?php $cat_list = get_the_category_list();
										if(!empty($cat_list)) { ?>	
									<div class="entry-meta">
										<span class="cat-links"><?php the_category(' '); ?></span>
									</div>
									<?php } } ?>
									<header class="entry-header">
										<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									</header>	
									<?php if($home_meta_section_settings == true){?>
									<div class="entry-meta mb-4">
										<span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo __('By','honeypress');?> <?php echo get_the_author();?></a></span>
										<span class="posted-on"><a href="<?php echo esc_url( home_url() ); ?>/<?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><time><?php echo get_the_date();?></time></a></span>
										<span class="comment-links"><a href="<?php the_permalink(); ?>#respond"><?php echo get_comments_number();?></a></span>
									</div>	
									<?php } ?>									
									<div class="entry-content">
										<?php the_excerpt();?>
										<p><a href="<?php the_permalink(); ?>" class="more-link"><?php echo get_theme_mod('home_news_button_title',__('READ MORE','honeypress'));?></a></p>
									</div>	
								</div>	
								<?php if(has_post_thumbnail()){ ?>
								<figure class="post-thumbnail mt-4">
								<?php $defalt_arg =array('class' => "img-fluid");?>	
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$defalt_arg);?></a>
								</figure>
								<?php } ?>				
							</article>
					<?php
					}
					?>
				<?php 
				$i++;}  
			endwhile; 
			} ?>
				</div>	
				<!--/Blog Posts-->	
			</div>
		</div>
		<?php if(!empty($index_more_btn)):?>
		<div class="row index_extend_class">
				<div class="mx-auto mb-5 pb-3">
					<a href="<?php echo $index_news_link;?>" class="btn-small btn-default-dark business-view-more-post" <?php if(get_theme_mod('home_blog_more_btn_link_target',false)== true) { echo "target='_blank'"; } ;?>><?php echo get_theme_mod('home_blog_more_btn',__('View More Posts','honeypress'));?></a>
				</div>
			</div>
	<?php endif;?>
</section>