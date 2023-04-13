<?php 
    $post_type = 'honeypress_portfolio';
	$tax = 'portfolio_categories'; 
	$term_args=array( 'hide_empty' => true,'orderby' => 'id');
	$posts_per_page = get_theme_mod('portfolio_numbers_options',4);
	$tax_terms = get_terms($tax, $term_args);
	$defualt_tex_id = get_option('honeypress_default_term_id');
	$j=1;$tab='';
	if(isset($_GET['tab']))
	{
	$tab=$_GET['tab'];
	}
	if(isset($_GET['div']))
	{
		$tab=$_GET['div'];
	}
$porfolio_page_title = get_theme_mod('porfolio_page_title',__('Our Portfolio','honeypress'));
$porfolio_page_subtitle = get_theme_mod('porfolio_page_subtitle',__('Our Recent Works','honeypress'));
?>
<section class="section-module portfolio tem">
	<div class="container<?php echo honeypress_container();?>">
		<?php  if(is_page_template('template/template-portfolio-2-col-left-sidebar.php') || is_page_template('template/template-portfolio-3-col-left-sidebar.php') || is_page_template('template/template-portfolio-4-col-left-sidebar.php') ) { ?>	
		<div class="row">
			<!--Sidebar-->
			<div class="col-lg-4 col-md-5 col-sm-12">
				<div class="sidebar s-r-space">
					<?php dynamic_sidebar('sidebar-1');?>
				</div>
			</div>
			<!--/Sidebar-->
			<div class="col-lg-8 col-md-7 col-sm-12">
		<?php }?>
		<?php  if(is_page_template('template/template-portfolio-2-col-right-sidebar.php') || is_page_template('template/template-portfolio-3-col-right-sidebar.php') || is_page_template('template/template-portfolio-4-col-right-sidebar.php') ) { ?>	
		<div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12">
		<?php } ?>
				<?php if(!empty($porfolio_page_title) || !empty($porfolio_page_subtitle)):?>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<div class="section-header text-center">
							<div class="section-separator border-center"></div>
							<?php if(!empty($porfolio_page_title)):?><p class="section-subtitle"><?php echo $porfolio_page_title; ?></p><?php endif;?>
							<?php if(!empty($porfolio_page_subtitle)):?><h2 class="section-title"><?php echo $porfolio_page_subtitle;?></h2><?php endif;?>
						</div>
					</div>
				</div>
			<?php endif;?>
				<div class="row">
					<div class="col-md-12">
						<ul id="tabs" class="nav filter-tabs justify-content-center" role="tablist">
						<?php foreach ($tax_terms  as $tax_term) { ?>
							<li rel="tab" class="nav-item" ><span class="tab">
								<a id="tab-<?php echo rawurldecode($tax_term->slug); ?>" href="#<?php echo rawurldecode($tax_term->slug); ?>"  class="nav-link <?php if($tab==''){if($j==1){echo 'active';$j=2;}}else if($tab==rawurldecode($tax_term->slug)){echo 'active';}?>"><?php echo $tax_term->name; ?></a></span>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
				<div align="center" id="myDiv" style="display:none;">
					<img id="loading-image" src="<?php echo HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/assets/images/loading.gif';  ?>"  />
				</div>
				<div id="content" class="tab-content" role="tablist">
				    <?php 
					global $paged;
					$curpage = $paged ? $paged : 1;
					$norecord=0;
					$is_active=true;
					if ($tax_terms) 
					{ 
						foreach ($tax_terms  as $tax_term)
						{
							$args = array (
							'post_type' => $post_type,
							'post_status' => 'publish',					
							'portfolio_categories' => $tax_term->slug,
							'posts_per_page' => $posts_per_page,
							'paged' => $curpage,
							'orderby' => 'menu_order',
							);
							$portfolio_query = null;		
							$portfolio_query = new WP_Query($args);
							if( $portfolio_query->have_posts() ):?>
							<div id="<?php echo rawurldecode($tax_term->slug); ?>" class="tab-pane fade show <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==rawurldecode($tax_term->slug)){echo 'active';} ?>" role="tabpanel" aria-labelledby="tab-<?php echo rawurldecode($tax_term->slug); ?>">
								<div class="row">
									<?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
											$portfolio_target = sanitize_text_field( get_post_meta( get_the_ID(), 'portfolio_target', true )); 
											if(get_post_meta( get_the_ID(),'portfolio_link', true )) 
											{ 
												$portfolio_link = get_post_meta( get_the_ID(),'portfolio_link', true );
											} 
											else 
											{
												$portfolio_link = '';
											} 
											$class = '';
											if(is_page_template('template/template-portfolio-2-col.php')) {
												$class = 'col-md-6 col-sm-6 col-xs-12';
											}
											if(is_page_template('template/template-portfolio-3-col.php')) {
												$class = 'col-md-4 col-sm-4 col-xs-12';
											}
											if(is_page_template('template/template-portfolio-4-col.php')) {
												$class = 'col-md-3 col-sm-3 col-xs-12';
											}
											if(is_page_template('template/template-portfolio-2-col-left-sidebar.php')) {
												$class = 'col-md-6 col-sm-6 col-xs-12';
											}
											if(is_page_template('template/template-portfolio-3-col-left-sidebar.php')) {
												$class = 'col-md-4 col-sm-4 col-xs-12';
											}
											if(is_page_template('template/template-portfolio-4-col-left-sidebar.php')) {
												$class = 'col-md-3 col-sm-3 col-xs-12';
											}
											if(is_page_template('template/template-portfolio-2-col-right-sidebar.php')) {
												$class = 'col-md-6 col-sm-6 col-xs-12';
											}
											if(is_page_template('template/template-portfolio-3-col-right-sidebar.php')) {
												$class = 'col-md-4 col-sm-4 col-xs-12';
											}
											if(is_page_template('template/template-portfolio-4-col-right-sidebar.php')) {
												$class = 'col-md-3 col-sm-3 col-xs-12';
											}
											
											echo '<div class="'.$class.'">';?>
												<article class="post">
													<figure class="portfolio-thumbnail">
														<?php the_post_thumbnail('full',array('class'=>'img-fluid'));
														if(has_post_thumbnail())
														{ 
															$post_thumbnail_id = get_post_thumbnail_id();
															$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
														} 
														?>
														<div class="click-view">
															<?php if(isset($post_thumbnail_url)){ ?>
																<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" ><i>+</i></a>
															<?php } ?>
															<?php if(!empty($portfolio_link)) {?>
																<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> ></a>
															<?php } ?>
														</div>
													</figure>	
													<figcaption>
													   <header class="entry-header"><h4 class="entry-title">
														<?php if(!empty($portfolio_link)) {?>
															<a href="<?php echo $portfolio_link;?>" <?php if(!empty($portfolio_target)){ echo 'target="_blank"'; } ?> ><?php the_title(); ?></a>
														<?php } else the_title();  ?>
														</h4>
														</header>
													</figcaption>
												</article>
											<?php echo '</div>'; ?>
										<?php $norecord=1;?>
									<?php endwhile; ?>
								</div>
									<?php
									$total = $portfolio_query->found_posts;
									$Webriti_pagination = new Webriti_pagination();
									$Webriti_pagination->Webriti_page($curpage, $portfolio_query,$total,$posts_per_page);	?>
							</div>
							<?php
							wp_reset_query();
							else:?>
							<div id="<?php echo rawurldecode($tax_term->slug); ?>" class="tab-pane fade in <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==rawurldecode($tax_term->slug)){echo 'active';} ?>"></div>
							<?php
							endif;
						}
					}
				    ?>	
				</div>
				<?php  if(is_page_template('template/template-portfolio-2-col-left-sidebar.php') || is_page_template('template/template-portfolio-3-col-left-sidebar.php') || is_page_template('template/template-portfolio-4-col-left-sidebar.php') ) { ?>
			</div>
		</div>
			<?php  } ?>
			<?php  if(is_page_template('template/template-portfolio-2-col-right-sidebar.php') || is_page_template('template/template-portfolio-3-col-right-sidebar.php') || is_page_template('template/template-portfolio-4-col-right-sidebar.php') ) { ?>
			</div>
				<!--Sidebar Widgets-->
				<div class="col-lg-4 col-md-5 col-sm-12">
					<div class="sidebar s-r-space">
						<?php dynamic_sidebar('sidebar-1');?>
					</div>
				</div>
				<!--/Sidebar Widgets-->
		</div>
			<?php } ?>
	</div>		
</section>
<script type="text/javascript">
  jQuery('.lightbox').hide();jQuery('#lightbox').hide();
  jQuery(".tab .nav-link ").click(function(e){
   	  jQuery("#lightbox").remove();
        var h=decodeURI(jQuery(this).attr('href').replace(/#/, ""));
         var tjk="<?php the_title();?>";
           var str1 = tjk.replace(/\s+/g, '-').toLowerCase();
           var pageurl="<?php $structure = get_option( 'permalink_structure' ); if($structure=='') {echo get_permalink()."&tab=";}else{echo get_permalink()."?tab=";}?>"+h;
        jQuery.ajax({url:pageurl,beforeSend: function() {
            jQuery(".tab-content").hide();
            jQuery("#myDiv").show();
          },success: function(data){
              jQuery(".tab-content").show();
            jQuery('.lightbox').remove();
            jQuery('#lightbox').remove();
        jQuery('#wrapper').html(data);
    },complete:function(data){
        jQuery("#myDiv").hide();
    }
});
    if(pageurl!=window.location){
        window.history.pushState({path:pageurl},'',pageurl);
           }
    return false;
    });
</script>