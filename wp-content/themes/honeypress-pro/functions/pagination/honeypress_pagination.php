<?php 
class honeypress_pagination
{
	function honeypress_page()
	{
			global $post;
			global $wp_query, $wp_rewrite,$loop;
			if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
			elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
			else { $paged = 1; }
			if($wp_query->max_num_pages==0)
			{
				$wp_query = $loop;
			}
                        
                        $faPrevious = (!is_rtl()) ? "fa fa-angle-double-left" : "fa fa-angle-double-right";
                        $faNext = (!is_rtl()) ? "fa fa-angle-double-right" : "fa fa-angle-double-left";


	if($wp_query->max_num_pages!=1):

	?>
	<div class="pagination">
	<?php if( $paged != 1  ) : ?>
		<a href="<?php echo get_pagenum_link(($paged-1 > 0 ? $paged-1 : 1)); ?>"><i class="<?php echo $faPrevious; ?>"></i></a>	
	<?php endif; ?>
	<?php for($i=1;$i<=($wp_query->max_num_pages>1 ? $wp_query->max_num_pages : 0 );$i++){ ?> 
	<a class="<?php echo ($i == $paged ? 'active ' : ''); ?>" href="<?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a> 
	<?php } ?>
	<?php if($wp_query->max_num_pages!= $paged): ?>
		<a href="<?php echo get_pagenum_link(($paged+1 <= $wp_query->max_num_pages ? $paged+1 : $wp_query->max_num_pages )); ?>"><i class="<?php echo $faNext; ?>"></i></a>
	<?php endif; ?>
	</div>
<?php 	
endif;			
  } 
}

class Webriti_pagination
{
function Webriti_page($curpage, $post_type_data,$total,$posts_per_page)
{    
    $count=$total-$posts_per_page;
    if($count<=0){
return;
}else{
    ?>
    <div class="pagination">
            <?php if($curpage != 1  ) {
                    echo '<a href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'"><i class="fa fa-angle-double-left"></i></a>'; } ?>
            <?php for($i=1;$i<=$post_type_data->max_num_pages;$i++)
                {
                echo '<a class="'.($i == $curpage ? 'active ' : '').'" href="'.get_pagenum_link($i).'">'.$i.'</a>';
                }                
            if($i-1!= $curpage)     {
            echo '<a class="" href="'.get_pagenum_link(($curpage+1 <= $post_type_data->max_num_pages ? $curpage+1 : $post_type_data->max_num_pages)).'"><i class="fa fa-angle-double-right"></i></a>';
             } ?>
    </div>
<?php }
}
}

