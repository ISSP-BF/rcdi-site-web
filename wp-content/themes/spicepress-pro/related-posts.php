<?php 

$isRTL = (is_rtl()) ? (bool) true : (bool) false;
wp_register_script('spicepress-related-posts', ST_TEMPLATE_DIR_URI . '/js/front-page/related-posts.js', array('jquery'));
wp_localize_script('spicepress-related-posts', 'related_posts_settings', array('rtl' => $isRTL));
wp_enqueue_script('spicepress-related-posts');

$spicepress_related_post = spicepress_related_posts(); 
$related_title=get_theme_mod('spicepress_related_post_title',__('Related Posts','spicepress'));
if($spicepress_related_post->have_posts() ): ?>
<article class="related-posts">
   <?php
   if(!empty($related_title)):?>
   <div class="comment-title">
      <h3><?php echo esc_html(get_theme_mod('spicepress_related_post_title',__('Related Posts','spicepress')));?></h3>
   </div>
<?php endif;?>
   <div class="row">
      <div id="related-posts-carousel" class="owl-carousel horizontal-nav owl-theme col-lg-12">
         <?php while ($spicepress_related_post->have_posts()) : $spicepress_related_post->the_post();?>
         <div class="item">
            <article class="post">
               <figure class="post-thumbnail">
                  <?php
                        if(has_post_thumbnail()):?>
                        <a href="<?php the_permalink();?>"><?php the_post_thumbnail('full',array('class'=>'img-fluid'));?></a>
                     <?php else:?>
                        <a href="<?php the_permalink();?>">
                           <!--<img class='img-fluid'src="<?php echo esc_url(ST_TEMPLATE_DIR_URI);?>/assets/images/featured/related.png"/>-->
                        </a>  
                     <?php endif;?>					
               </figure>
               <div class="post-content">
                  <?php
                  if(has_category()):?>
                  <div class="entry-meta">
                     <span class="cat-links"><?php the_category( ' ' );?></span>
                  </div>
               <?php endif;?>
                  <header class="entry-header">
                     <h4 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                  </header>
               </div>
            </article>
         </div>
         <?php endwhile;  wp_reset_postdata();?>
      </div>
   </div>
</article>
<?php endif;?>