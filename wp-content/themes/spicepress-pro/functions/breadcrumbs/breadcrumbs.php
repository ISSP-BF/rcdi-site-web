<?php
// theme sub header breadcrumb functions
function curPageURL() {
	$pageURL = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

if( !function_exists('spicepress_breadcrumbs') ):
	function spicepress_breadcrumbs() { 
			
		global $post;
		$homeLink = home_url();
	?>
		<!-- Page Title Section -->
		<section class="page-title-section">		
			<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
                           <?php 
                           if(is_home() || is_front_page()) {
                                    echo '<div class="page-title wow bounceInLeft animated" ata-wow-delay="0.4s"><h1>'; echo single_post_title(); echo '</h1></div>';
                           } else{
                                    spicepress_archive_page_title();
                           } 
                           ?>
                        </div>
						<div class="col-md-6 col-sm-6">
							<?php
								echo '<ul class="page-breadcrumb wow bounceInRight animated" ata-wow-delay="0.4s">';
								
								 if (is_home() || is_front_page()) :
								    echo '<li><a href="'.$homeLink.'">'.__('Home','spicepress').'</a></li>';
									echo '<li class="active">'; echo single_post_title(); echo '</li>';
									//echo '<li class="active"><a href="'.$homeLink.'">'.get_bloginfo( 'name' ).'</a></li>';
								 else:
									echo '<li><a href="'.$homeLink.'">'.__('Home','spicepress').'</a></li>';
									// Blog Category
									if ( is_category() ) {
										echo '<li class="active"><a href="'. curPageURL() .'">' . __('Archive by category','spicepress').' "' . single_cat_title('', false) . '"</a></li>';

									// Blog Day
									} elseif ( is_day() ) {
										echo '<li class="active"><a href="'. get_year_link(get_the_time('Y')) . '">'. get_the_time('Y') .'</a>';
										echo '<li class="active"><a href="'. get_month_link(get_the_time('Y'),get_the_time('m')) .'">'. get_the_time('F') .'</a>';
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time('d') .'</a></li>';

									// Blog Month
									} elseif ( is_month() ) {
										echo '<li class="active"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>';
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time('F') .'</a></li>';

									// Blog Year
									} elseif ( is_year() ) {
										echo '<li class="active"><a href="'. curPageURL() .'">'. get_the_time('Y') .'</a></li>';

									// Single Post
									} elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
										
										// Custom post type
										if ( get_post_type() != 'post' ) {
											$cat = get_the_category(); 
											$cat = $cat[0];
											echo '<li>';
												echo get_category_parents($cat, TRUE, '');
											echo '</li>';
											echo '<li class="active"><a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a></li>';
										} }  
										elseif ( is_page() && $post->post_parent ) {
										$post_array = get_post_ancestors($post);
             						
								            //Sorts in descending order by key, since the array is from top category to bottom.
								            krsort($post_array);
								            
								            //Loop through every post id which we pass as an argument to the get_post() function.
								            //$post_ids contains a lot of info about the post, but we only need the title.
								            foreach($post_array as $key=>$postid){
								                //returns the object $post_ids
								                $post_ids = get_post($postid);
								                //returns the name of the currently created objects
								                $title = $post_ids->post_title;
								                //Create the permalink of $post_ids
								                echo '<li class="active"><a href="' . get_permalink($post_ids) . '">' . $title . '</a></li>';
								            }
								            echo '<li class="active"><a href="'.get_permalink().'" >'.get_the_title().'</a></li>';

									
									}
									elseif( is_search() )
									{
										echo '<li class="active"><a href="' . curPageURL() . '">'. get_search_query() .'</a></li>';
									}
									elseif( is_404() )
									{
										echo '<li class="active"><a href="' . curPageURL() . '">'.__('Error 404','spicepress').'</a></li>';
									}
									elseif (is_tax('portfolio_categories')) {
								       $term = get_term_by("slug", get_query_var("term"), get_query_var("taxonomy"));
								        $tax_term_breadcrumb_taxonomy_slug = $term->taxonomy;
								        echo "<li><a href=\"" . home_url() . "/project_category/" . $term->slug . "\">" . $term->name . "</a></li>";
								    }
									else { 
										// Default
										echo '<li class="active"><a href="' . curPageURL() . '">'. get_the_title() .'</a></li>';
									}
								endif;
								
								echo '</ul>'
							?>
						</div>
					</div>
				</div>	
		</section>
		<div class="page-seperate"></div>
		<!-- /Page Title Section -->

		<div class="clearfix"></div>
	<?php }
endif;
?>