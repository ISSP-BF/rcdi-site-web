<?php
$paged = 1;
$args = array( 'post_type' => 'post','paged'=>$paged);
$loop = new WP_Query( $args );
if($loop->have_posts()): 
	while($loop->have_posts()): $loop->the_post();
		get_template_part('template-parts/ajax-masonary-four-col-content');
	endwhile;
endif;