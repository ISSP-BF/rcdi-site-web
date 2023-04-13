<?php 
/**
 * Helper functions.
 *
 * @package honeypress
 */
if ( ! function_exists( 'honeypress_custom_navigation' ) ) :
    function honeypress_custom_navigation() {
        if (!is_rtl()) {
            the_posts_pagination(array(
                'mid_size' => 5,
                'prev_text' => __('<i class="fa fa-angle-double-left"></i>', 'honeypress'),
                'next_text' => __('<i class="fa fa-angle-double-right"></i>', 'honeypress'),
            ));
        } else {
            the_posts_pagination(array(
                'mid_size' => 5,
                'prev_text' => __('<i class="fa fa-angle-double-right"></i>', 'honeypress'),
                'next_text' => __('<i class="fa fa-angle-double-left"></i>', 'honeypress'),
            ));
        }
    }
endif;
add_action( 'honeypress_post_navigation', 'honeypress_custom_navigation' );

//Container Setting For Page
function honeypress_container()
{
  if(get_theme_mod('page_container_setting','default')=='default')
{
 $container_width= " container_default";
}
elseif(get_theme_mod('page_container_setting','default')=='full_width_fluid')
{
 $container_width= "-fluid";
}
else
{
  $container_width= "-fluid streached";
}
return $container_width;
}

//Container Setting For Blog Post
function honeypress_blog_post_container()
{
  if(get_theme_mod('post_container_setting','default')=='default')
{
 $container_width= " container_default";
}
elseif(get_theme_mod('post_container_setting','default')=='full_width_fluid')
{
 $container_width= "-fluid";
}
else
{
  $container_width= "-fluid streached";
}
return $container_width;
}

//Conainer Setting For Single Post

function honeypress_single_post_container()
{
  if(get_theme_mod('single_post_container_setting','default')=='default')
{
 $container_width= " container_default";
}
elseif(get_theme_mod('single_post_container_setting','default')=='full_width_fluid')
{
 $container_width= "-fluid";
}
else
{
  $container_width= "-fluid streached";
}
return $container_width;
}

function honeypress_comment($comment, $args, $depth) {
        $tag       = 'div';
        $add_below = 'comment';
   ?>
    <div class="media comment-box">
      <span class="pull-left-comment">
                <?php echo get_avatar( $comment,100, null,'comments user', array( 'class' => array( 'img-fluid comment-img') )); ?>
              </span>
        <div class="media-body">
                <div class="comment-detail">
                  <h5 class="comment-detail-title"><?php esc_html(comment_author()); ?><time class="comment-date"><?php printf( esc_html__('%1$s  %2$s','honeypress'), esc_html(get_comment_date()),  esc_html(get_comment_time()) ); ?></time></h5>
                  <?php comment_text(); ?>
                  
                  <div class="reply">
                  <?php comment_reply_link (array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
              </div>
              
                
              </div>      
        
    </div>
    <?php
}

if ( ! function_exists( 'honeypress_posted_content' ) ) :
    /**
     * Content
     *
     */
    function honeypress_posted_content() { 
      $blog_content  = get_theme_mod('honeypress_blog_content','excerpt');
      $excerpt_length  = get_theme_mod('honeypress_blog_content_length',30);

      if ( 'excerpt' == $blog_content ){
      $excerpt = honeypress_the_excerpt( absint( $excerpt_length ) );
      if ( !empty( $excerpt ) ) : ?>

        
          <?php                   
          echo wp_kses_post( wpautop( $excerpt ) );
          ?>
        

      <?php endif; 
      } else{ ?>
      
        <?php the_content(); ?>
      
      <?php }
  ?>
    <?php }
endif;



if ( ! function_exists( 'honeypress_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     */
    function honeypress_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( $post_obj->post_excerpt ) ) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }
endif;

if ( ! function_exists( 'honeypress_button_title' ) ) :
  /**
   * Display Button on Archive/Blog Page 
   */
  function honeypress_button_title() {  
    if(get_theme_mod('honeypress_enable_blog_read_button',true)==true):
    $blog_button = get_theme_mod('honeypress_blog_button_title','READ MORE');  

    if ( empty( $blog_button ) ){
      return;
    }
    echo '<a href = "'.esc_url(get_the_permalink()).'" class="more-link">'.esc_html( $blog_button ).'</a>';
       
    endif;  
  }
endif;


/*  Related posts
/* ------------------------------------ */
if ( ! function_exists( 'honeypress_related_posts' ) ) {
    function honeypress_related_posts() {
        wp_reset_postdata();
        global $post;

        // Define shared post arguments
        $args = array(
            'no_found_rows'             => true,
            'update_post_meta_cache'    => false,
            'update_post_term_cache'    => false,
            'ignore_sticky_posts'       => 1,
            'orderby'                   => 'rand',
            'post__not_in'              => array($post->ID),
            'posts_per_page'            => 10
        );
        // Related by categories
        if ( get_theme_mod('honeypress_related_post_option') == 'categories' ) {
            
            $cats = get_post_meta($post->ID, 'related-cat', true);
            
            if ( !$cats ) {
                $cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
                $args['category__in'] = $cats;
            } else {
                $args['cat'] = $cats;
            }
        }
        // Related by tags
        if ( get_theme_mod('honeypress_related_post_option') == 'tags' ) {
        
            $tags = get_post_meta($post->ID, 'related-tag', true);
            
            if ( !$tags ) {
                $tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
                $args['tag__in'] = $tags;
            } else {
                $args['tag_slug__in'] = explode(',', $tags);
            }
            if ( !$tags ) { $break = true; }
        }
        
        $query = !isset($break)?new WP_Query($args):new WP_Query;
        return $query;
    }
}

/**
* Displays the author name
*/

function hoeny_get_author_name( $post ){
  
  $user_id = $post->post_author;
  if( empty( $user_id ) ){
    return;
  }

  $user_info = get_userdata( $user_id );
  echo esc_html( $user_info->display_name );
}


/**
* Sticky Header
*/
add_action('honeypress_sticky_header_logo','honeypress_sticky_header_logo_fn');
function honeypress_sticky_header_logo_fn()
{
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  if(get_theme_mod('sticky_header_device_enable','desktop')=='desktop')
{
  $sticky_header_logo_desktop = get_theme_mod('sticky_header_logo_desktop','');
  if(!empty($sticky_header_logo_desktop)):
  ?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky-logo" style="display: none;">
    <img src="<?php echo esc_url($sticky_header_logo_desktop);?>" class="custom-logo"></a>
  <?php 
else:
  ?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky-logo" style="display: none;">
    <img src="<?php if(!empty($image[0])){echo esc_url($image[0]);}?>" class="custom-logo"></a>
  <?php
endif;
}

elseif( get_theme_mod('sticky_header_device_enable','desktop')=='mobile')
{
  $sticky_header_logo_mbl = get_theme_mod('sticky_header_logo_mbl','');
   if(!empty($sticky_header_logo_mbl)):
  ?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky-logo-mbl" style="display: none;">
    <img width="280" height="48" src="<?php echo esc_url($sticky_header_logo_mbl);?>" class="custom-logo"></a>
  <?php 
  else: ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky-logo-mbl" style="display: none;">
    <img width="280" height="48" src="<?php echo esc_url($image[0]);?>" class="custom-logo"></a>
<?php endif;
}
else
{
  $sticky_header_logo_desktop = get_theme_mod('sticky_header_logo_desktop','');
  if(!empty($sticky_header_logo_desktop)):
  ?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky-logo" style="display: none;">
    <img src="<?php echo esc_url($sticky_header_logo_desktop);?>" class="custom-logo"></a>
  <?php
  else: ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky-logo" style="display: none;">
    <img src="<?php echo esc_url($image[0]);?>" class="custom-logo"></a>
<?php endif;

  $sticky_header_logo_mbl = get_theme_mod('sticky_header_logo_mbl','');
   if(!empty($sticky_header_logo_mbl)):
  ?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky-logo-mbl" style="display: none;">
    <img width="280" height="48" src="<?php echo esc_url($sticky_header_logo_mbl);?>" class="custom-logo"></a>
  <?php
  else: ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand sticky-logo-mbl" style="display: none;">
    <img width="280" height="48" src="<?php echo esc_url($image[0]);?>" class="custom-logo"></a>
<?php endif;
}
}

/**
 * Get Footer widgets
 */
if ( ! function_exists( 'honeypress_footer_widget_area' ) ) {

  /**
   * Get Footer Default Sidebar
   *
   * @param  string $sidebar_id   Sidebar Id..
   * @return void
   */
  function honeypress_footer_widget_area( $sidebar_id ) {

    if ( is_active_sidebar( $sidebar_id ) ) {
      dynamic_sidebar( $sidebar_id );
    } elseif ( current_user_can( 'edit_theme_options' ) ) {

      global $wp_registered_sidebars;
      $sidebar_name = '';
      if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
        $sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
      }
      ?>
      <div class="widget ast-no-widget-row">
        <h2 class='widget-title'><?php echo esc_html( $sidebar_name ); ?></h2>

        <p class='no-widget-text'>
          <a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
            <?php esc_html_e( 'Click here to assign a widget for this area.', 'honeypress' ); ?>
          </a>
        </p>
      </div>
      <?php
    }
  }
}


/**
 * Function to get Footer Menu
 */
if ( ! function_exists( 'honeypress_footer_bar_menu' ) ) {

  /**
   * Function to get Footer Menu
   *
   */
  function honeypress_footer_bar_menu() {

    ob_start();

    if ( has_nav_menu( 'footer_menu' ) ) {
      wp_nav_menu(
        array(
          'theme_location'  => 'footer_menu',
          'menu_class'      => 'nav-menu',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 1,
        )
      );
    } else {
      if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {
        ?>
          <a href="<?php echo esc_url( admin_url( '/nav-menus.php?action=locations' ) ); ?>"><?php esc_html_e( 'Assign Footer Menu', 'honeypress' ); ?></a>
        <?php
      }
    }

    return ob_get_clean();
  }
}


/**
 * Functions for services
 */
function honeypress_advance_service_fn()
{
 $service_data = get_theme_mod('honeypress_service_content');
if(empty($service_data))
{
  $service_data = json_encode( array(
      array(
        'icon_value' => 'fa-headphones',
        'title'      => esc_html__( 'Unlimited Support', 'honeypress' ),
        'text'       => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'honeypress' ),
        'choice'    => 'customizer_repeater_icon',
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b56',
      ),
      array(
        'icon_value' => 'fa-mobile',
        'title'      => esc_html__( 'Pixel Perfect Design', 'honeypress' ),
        'text'       => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'honeypress' ),
        'choice'    => 'customizer_repeater_icon',
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b66',
      ),
      array(
        'icon_value' => 'fa fa-cogs',
        'title'      => esc_html__( 'Powerful Options', 'honeypress' ),
        'text'       => esc_html__('Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'honeypress' ),
        'choice'    => 'customizer_repeater_icon',
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b86',
      ),
      array(
        'icon_value' => 'fa-android',
        'title'      => esc_html__( 'App Development', 'honeypress' ),
        'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'honeypress' ),
        'choice'    => 'customizer_repeater_icon',
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b88',
      ),
      array(
        'icon_value' => 'fa-code',
        'title'      => esc_html__( 'Unique and Clean', 'honeypress' ),
        'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'honeypress' ),
        'choice'    => 'customizer_repeater_icon',
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b89',
      ),
      array(
        'icon_value' => 'fa-users',
        'title'      => esc_html__( 'Satisfied Clients', 'honeypress' ),
        'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.', 'honeypress' ),
        'choice'    => 'customizer_repeater_icon',
        'link'       => '#',
        'open_new_tab' => 'yes',
        'id'         => 'customizer_repeater_56d7ea7f40b91',
      ),
  ) );
} 
$honeypress_service_section_title = get_theme_mod('home_service_section_title',__('Our Services','honeypress'));
$honeypress_service_section_discription = get_theme_mod('home_service_section_discription',__('Why Choose Us','honeypress'));

if(get_page_template_slug()=='template/template-service.php')
{
$honeypress_service_layout=1;
}
elseif(get_page_template_slug()=='template/template-service-2.php')
{
$honeypress_service_layout=2;
}
elseif(get_page_template_slug()=='template/template-service-3.php')
{
$honeypress_service_layout=3;
}
elseif(get_page_template_slug()=='template/template-service-4.php')
{
$honeypress_service_layout=4;
}
elseif(get_page_template_slug()=='template/template-service-5.php')
{
$honeypress_service_layout=5;
}
elseif(get_page_template_slug()=='template/template-service-6.php')
{
$honeypress_service_layout=6;
}
elseif(get_page_template_slug()=='template/template-service-7.php')
{
$honeypress_service_layout=7;
}
else
{
  $honeypress_service_layout=get_theme_mod('home_serive_design_layout',1);
}

switch ($honeypress_service_layout)
{
  case 1:
  echo '<section class="section-module services">';
  break;

  case 2:
  echo '<section class="section-module services2 service_wrapper">';
  break;

  case 3:
  echo '<section class="section-module services3 service_wrapper">';
  break; 

  case 4:
  echo '<section class="section-module services4 service_wrapper">';
  break; 

  case 5:
  echo '<section class="section-module services5 service_wrapper">';
  break;  

  case 6:
  echo '<section class="section-module services4 services6 service_wrapper">';
  break; 

  case 7:
  echo '<section class="section-module services7 service_wrapper">';
  break; 
}


?>
  <div class="honeypress-service-container container<?php //echo honeypress_container();?>">
    <?php if($honeypress_service_section_discription!='' || $honeypress_service_section_title!='') { ?>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="section-header text-center ">
              <div class="section-separator border-center"></div>
              <p class="section-subtitle"><?php echo get_theme_mod('home_service_section_title',__('Our Services','honeypress'));?></p>
              <h2 class="section-title"><?php echo get_theme_mod('home_service_section_discription',__('Why Choose Us','honeypress'));?></h2>
            </div>
          </div>
        </div>
    <?php }?>
        <div class="row">
        <?php $service_data = json_decode($service_data);
        if (!empty($service_data))
        { 
          foreach($service_data as $service_team)
          { 
            $service_icon = ! empty( $service_team->icon_value ) ? apply_filters( 'honeypress_translate_single_string', $service_team->icon_value, 'Service section' ) : '';
            $service_image = ! empty( $service_team->image_url ) ? apply_filters( 'honeypress_translate_single_string', $service_team->image_url, 'Service section' ) : '';
            $service_title = ! empty( $service_team->title ) ? apply_filters( 'honeypress_translate_single_string', $service_team->title, 'Service section' ) : '';
            $service_desc = ! empty( $service_team->text ) ? apply_filters( 'honeypress_translate_single_string', $service_team->text, 'Service section' ) : '';
            $service_link = ! empty( $service_team->link ) ? apply_filters( 'honeypress_translate_single_string', $service_team->link, 'Service section' ) : '';?>
            <div class="col-lg-4 col-md-6 col-sm-12">       
              <article class="post<?php if($honeypress_service_layout==1) {?> text-center business <?php }?><?php if($honeypress_service_layout==3) {?> text-center<?php }?><?php if($honeypress_service_layout==7) {?> text-center<?php }?>">
              <?php 
                if($service_team->choice == 'customizer_repeater_icon')
                {
                  if($service_icon!='')
                  {?>
                    <figure class="post-thumbnail">
                      <?php if($service_link!=''){?>
                        <a <?php if($service_team->open_new_tab== 'yes'){echo "target='_blank'";} ?> href="<?php echo $service_link; ?>">
                        <i class="fa <?php echo $service_icon; ?>"></i>
                        </a>
                      <?php }else{ ?>
                        <a><i class="fa <?php echo $service_icon; ?>"></i></a>
                        <?php } ?>
                    </figure>
                  <?php } 
                } 
                else if($service_team->choice =='customizer_repeater_image')
                {
                  if($service_image!=''){ ?>
                    <figure class="post-thumbnail"> 
                      <?php if($service_link!=''){?>
                        <a <?php if($service_team->open_new_tab== 'yes'){echo "target='_blank'";} ?> href="<?php echo $service_link; ?>">
                      <?php }?>
                      <img src="<?php echo $service_image; ?>">
                      <?php if($service_link!=''){ ?>
                        </a>
                      <?php }?>
                    </figure>
                  <?php } 
                }
                if ($service_title !="")
                {?>
                  <div class="entry-header">
                    <h4 class="entry-title">
                      <?php if($service_link!=''){ ?>
                        <a href="<?php echo $service_link; ?>" <?php if($service_team->open_new_tab== 'yes'){echo "target='_blank'";} ?>><?php } echo $service_title; if($service_link!=''){?></a>
                      <?php }?>
                    </h4>
                  </div>
                <?php 
                } 
                if($service_desc !=""):?>
                  <div class="entry-content">
                    <p><?php echo $service_desc ; ?></p>
                  </div>
                <?php endif; ?>
              </article>
            </div>
          <?php 
          }
        } 
        ?>
        </div>
  </div>
</section>
<?php
}
add_action('honeypress_advance_service','honeypress_advance_service_fn');

//Team section tile and subtitle
function honeypress_team_section_title_fn()
{
  $home_team_section_title = get_theme_mod('home_team_section_title',__('The Team','honeypress'));
  $home_team_section_discription = get_theme_mod('home_team_section_discription',__('Meet Our Experts','honeypress'));
  if(($home_team_section_title) || ($home_team_section_discription)!='' ): ?>
    <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="section-header text-center">
              <div class="section-separator border-center"></div>
              <?php
              if(!empty($home_team_section_title)):?>
              <p class="section-subtitle"><?php echo $home_team_section_title; ?></p>
            <?php endif; if(!empty($home_team_section_discription)): ?>
              <h2 class="section-title"><?php echo $home_team_section_discription; ?></h2>
            <?php endif;?>
            </div>
          </div>            
        </div>
  <?php endif; 
}
add_action('honeypress_team_section_title','honeypress_team_section_title_fn');

//Homepage Testimonial Script
function honeypress_homepage_testimonail_script_fn()
{
 $testimonial_options = get_theme_mod('honeypress_testimonial_content'); 
if(empty($testimonial_options))
{
    if( get_theme_mod('home_testimonial_title') != '' || get_theme_mod('home_testimonial_designation') != '' || get_theme_mod('home_testimonial_thumb') != '' || get_theme_mod('home_testimonial_desc') != '')
    {
    $home_testimonial_title = get_theme_mod('home_testimonial_title');
    $home_testimonial_desc = get_theme_mod('home_testimonial_desc');
    $designation = get_theme_mod('designation');
    $home_testimonial_thumb = get_theme_mod('home_testimonial_thumb');
    $testimonial_options = json_encode( array(
          array(
      'title'      => !empty($home_testimonial_title)? $home_testimonial_title:'Alice Culan',
      'text'       => !empty($home_testimonial_desc)? $home_testimonial_desc :'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.',
      'designation'      => !empty($designation)? $designation : 'UI Developer',
      'link'       => '#',
      'image_url'  => !empty($home_testimonial_thumb)? $home_testimonial_thumb :  get_template_directory_uri().'/assets/images/user1.jpg',
      'open_new_tab' => 'no',
      'id'         => 'customizer_repeater_56d7ea7f40b51',
      ),
    ) );

    } 
}
$slide_item = get_theme_mod('home_testimonial_slide_item',1);
$testimonial_animation_speed = get_theme_mod('testimonial_animation_speed', 3000);    
  $testimonial_smooth_speed = get_theme_mod('testimonial_smooth_speed', 1000);  
  $testimonial_nav_style = get_theme_mod('testimonial_nav_style', 'bullets'); 
        $isRTL = (is_rtl()) ? (bool) true : (bool) false;
  $testimonialsettings=array('slideItem'=>$slide_item,'animationSpeed'=>$testimonial_animation_speed,'testimonial_smooth_speed'=>$testimonial_smooth_speed,'testimonial_nav_style'=>$testimonial_nav_style,'rtl'=>$isRTL);
  if((get_page_template_slug()=='template/template-service.php') || (get_theme_mod('about_testimonial_design_layout',1)==1 && get_page_template_slug()=='template/template-aboutus.php')|| ( get_page_template_slug()=='template/template-testimonial-content-1.php'))
  {
    wp_register_script('honeypress-testimonial',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/service-template/testi-service.js',array('jquery'));
  }
  elseif((get_page_template_slug()=='template/template-service-2.php') || (get_theme_mod('about_testimonial_design_layout',1)==2 && get_page_template_slug()=='template/template-aboutus.php') || ( get_page_template_slug()=='template/template-testimonial-content-2.php'))
  {
    wp_register_script('honeypress-testimonial',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/service-template/testi-service2.js',array('jquery'));
  }
  elseif((get_page_template_slug()=='template/template-service-3.php') || (get_theme_mod('about_testimonial_design_layout',1)==3 && get_page_template_slug()=='template/template-aboutus.php') || ( get_page_template_slug()=='template/template-testimonial-content-3.php'))
  {
    wp_register_script('honeypress-testimonial',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/service-template/testi-service3.js',array('jquery'));
  }
  elseif((get_page_template_slug()=='template/template-service-4.php') || (get_theme_mod('about_testimonial_design_layout',1)==4 && get_page_template_slug()=='template/template-aboutus.php') || ( get_page_template_slug()=='template/template-testimonial-content-4.php'))
  {
    wp_register_script('honeypress-testimonial',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/service-template/testi-service4.js',array('jquery'));
  }
  elseif((get_page_template_slug()=='template/template-service-5.php') || (get_theme_mod('about_testimonial_design_layout',1)==5 && get_page_template_slug()=='template/template-aboutus.php') || ( get_page_template_slug()=='template/template-testimonial-content-9.php'))
  {
    wp_register_script('honeypress-testimonial',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/service-template/testi-service5.js',array('jquery'));
  }
  elseif((get_page_template_slug()=='template/template-service-6.php') || (get_theme_mod('about_testimonial_design_layout',1)==6 && get_page_template_slug()=='template/template-aboutus.php') || ( get_page_template_slug()=='template/template-testimonial-content-4.php'))
  {
    wp_register_script('honeypress-testimonial',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/service-template/testi-service4.js',array('jquery'));
  }
elseif((get_page_template_slug()=='template/template-service-7.php') || (get_theme_mod('about_testimonial_design_layout',1)==6 && get_page_template_slug()=='template/template-aboutus.php') || ( get_page_template_slug()=='template/template-testimonial-content-11.php')) 
  {
    wp_register_script('honeypress-testimonial',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/service-template/testi-service6.js',array('jquery'));
  }
  else
  {
  wp_register_script('honeypress-testimonial',HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/js/front-page/testi.js',array('jquery'));  
  }
  wp_localize_script('honeypress-testimonial','testimonial_settings',$testimonialsettings);
  wp_enqueue_script('honeypress-testimonial');
}
add_action('honeypress_homepage_testimonail_script','honeypress_homepage_testimonail_script_fn');


//Homepage Testimonail Title
function honeypress_homepage_testimonial_title_fn()
{
   $home_testimonial_section_title = get_theme_mod('home_testimonial_section_title',__('Testimonials','honeypress'));
  $home_testimonial_section_discription = get_theme_mod('home_testimonial_section_discription',__('What Clients Are Say','honeypress'));
  if( $home_testimonial_section_title != '' || $home_testimonial_section_discription != '') {?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="section-header text-center">
            <div class="section-separator white border-center"></div>
            <p class="section-subtitle text-white"><?php echo esc_attr($home_testimonial_section_title); ?></p>
            <h2 class="section-title text-white"><?php echo esc_attr($home_testimonial_section_discription); ?></h2>
          </div>
        </div>
      </div>
  <?php }
}
add_action('honeypress_homepage_testimonial_title','honeypress_homepage_testimonial_title_fn');


//Homepage Portfolio Dummy Content
function honeypress_portfolio_home_dummy_content_fn()
{
 if(get_theme_mod('home_portfolio_design_layout',2)==2) 
 {
    $class = 'col-lg-6 col-md-6 col-sm-12';
 }
 if(get_theme_mod('home_portfolio_design_layout',3)==3) 
 {
   $class = 'col-lg-4 col-md-6 col-sm-12';
 }
 if(get_theme_mod('home_portfolio_design_layout',4)==4) 
 {
    $class = 'col-lg-3 col-md-6 col-sm-12';
 } 
?>
<section class="section-module portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="section-header text-center">
            <div class="section-separator border-center"></div>
            <p class="section-subtitle"><?php echo get_theme_mod('home_portfolio_section_title',__('Our Portfolio','honeypress'));?></p>
            <h2 class="section-title"><?php echo get_theme_mod('home_portfolio_section_subtitle',__('View Our Recent Works','honeypress'));?></h2>
          </div>
        </div>
      </div>
    
      <!-- Portfolio Filter -->
      <div class="row">
        <div class="col-md-12">
          <ul id="tabs" class="nav filter-tabs justify-content-center" role="tablist">
            <li class="nav-item"><a id="tab-A" href="#all" class="nav-link active" data-toggle="tab" role="tab"><?php echo esc_html__('All','honeypress');?></a></li>
            <li class="nav-item"><a id="tab-B" href="#wordpress" class="nav-link" data-toggle="tab" role="tab"><?php echo esc_html__('WordPress','honeypress');?></a></li>
            <li class="nav-item"><a id="tab-C" href="#web-design" class="nav-link" data-toggle="tab" role="tab"><?php echo esc_html__('Web Design','honeypress');?></a></li>
            <li class="nav-item"><a id="tab-C" href="#graphics" class="nav-link" data-toggle="tab" role="tab"><?php echo esc_html__('Graphics','honeypress');?></a></li>
            <li class="nav-item"><a id="tab-C" href="#illustration" class="nav-link" data-toggle="tab" role="tab"><?php echo esc_html__('Illustration','honeypress');?></a></li>
            <li class="nav-item"><a id="tab-C" href="#others" class="nav-link" data-toggle="tab" role="tab"><?php echo esc_html__('Others','honeypress');?></a></li>
          </ul>
        </div>
      </div>
      <!-- /Portfolio Filter -->

      <div id="content" class="tab-content" role="tablist">
        <div id="all" class="tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
          <div class="row">
            <?php
            $portfolio_name=array(__('Business Consultant','honeypress'),__('Shopify App Development','honeypress'),__('Graphics Design','honeypress'),__('Marketing Strategy','honeypress'),__('Business Consultant','honeypress'),__('Consultant Advise','honeypress'),__('Business Consultant','honeypress'));
            for($pane1=0; $pane1<=3; $pane1++)
            {
              $portfolio_img_id=$pane1+1;
              $port_img='item0'.$portfolio_img_id.'.jpg';
             ?>
             <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/<?php echo $port_img;?>" class="img-fluid" alt="<?php echo $portfolio_name[$pane1];?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/<?php echo $port_img;?>" data-lightbox="image" title="<?php echo $portfolio_name[$pane1];?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo $portfolio_name[$pane1];?></a></h4></header>
                </figcaption>
              </article>
            </div>
             <?php 
            }
            ?>
          </div>
        </div>
        <div id="wordpress" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
          <div class="row">
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item03.jpg" class="img-fluid" alt="<?php echo esc_html__('Shopify App Development','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item03.jpg" data-lightbox="image" title="<?php echo esc_html__('Shopify App Development','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Shopify App Development','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item01.jpg" class="img-fluid" alt="<?php echo esc_html__('Business Consultant','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item01.jpg" data-lightbox="image" title="<?php echo esc_html__('Business Consultant','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Business Consultant','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item02.jpg" class="img-fluid" alt="<?php echo esc_html__('Digital Marketing','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item02.jpg" data-lightbox="image" title="<?php echo esc_html__('Digital Marketing','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Digital Marketing','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
          </div>
        </div>
        <div id="web-design" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
          <div class="row">
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item01.jpg" class="img-fluid" alt="<?php echo esc_html__('Business Consultant','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item01.jpg" data-lightbox="image" title="<?php echo esc_html__('Business Consultant','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Business Consultant','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item02.jpg" class="img-fluid" alt="<?php echo esc_html__('Digital Marketing','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item02.jpg" data-lightbox="image" title="<?php echo esc_html__('Digital Marketing','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Digital Marketing','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
          </div>
        </div>
        <div id="graphics" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
          <div class="row">
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item03.jpg" class="img-fluid" alt="<?php echo esc_html__('Shopify App Development','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item03.jpg" data-lightbox="image" title="<?php echo esc_html__('Shopify App Development','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Shopify App Development','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item04.jpg" class="img-fluid" alt="<?php echo esc_html__('Marketing Strategy','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item04.jpg" data-lightbox="image" title="<?php echo esc_html__('Marketing Strategy','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Marketing Strategy','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
          </div>
        </div>
        <div id="illustration" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
          <div class="row">
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item02.jpg" class="img-fluid" alt="<?php echo esc_html__('Digital Marketing','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item02.jpg" data-lightbox="image" title="<?php echo esc_html__('Digital Marketing','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Digital Marketing','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item01.jpg" class="img-fluid" alt="<?php echo esc_html__('Digital Marketing','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item01.jpg" data-lightbox="image" title="<?php echo esc_html__('Digital Marketing','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Digital Marketing','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
          </div>
        </div>
        <div id="others" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
          <div class="row">
              <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item06.jpg" class="img-fluid" alt="<?php echo esc_html__('SEO Marketing','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item06.jpg" data-lightbox="image" title="<?php echo esc_html__('SEO Marketing','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('SEO Marketing','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item05.jpg" class="img-fluid" alt="<?php echo esc_html__('Business Consultant','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item05.jpg" data-lightbox="image" title="<?php echo esc_html__('Business Consultant','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Business Consultant','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
            <div class="<?php echo $class;?>"> 
              <article class="post">
                <figure class="portfolio-thumbnail">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/item04.jpg" class="img-fluid" alt="<?php echo esc_html__('Digital Marketing','honeypress');?>">
                  <div class="click-view"><a href="<?php echo get_template_directory_uri();?>/assets/images/item04.jpg" data-lightbox="image" title="<?php echo esc_html__('Digital Marketing','honeypress');?>"><i>+</i></a></div>
                </figure> 
                <figcaption>
                  <header class="entry-header"><h4 class="entry-title"><a href="#"><?php echo esc_html__('Digital Marketing','honeypress');?></a></h4></header>
                </figcaption>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php  
}
add_action('honeypress_portfolio_home_dummy_content','honeypress_portfolio_home_dummy_content_fn');

/** Honeypress portfolio home title and subtitle **/
function honeypress_portfolio_home_title_subtitle_fun()
{
$porfolio_page_title = get_theme_mod('home_portfolio_section_title',__('Our Portfolio','honeypress'));
$porfolio_page_subtitle = get_theme_mod('home_portfolio_section_subtitle',__('View Our Recent Works','honeypress'));
if(!empty($porfolio_page_title) || !empty($porfolio_page_subtitle)): ?>
<div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="section-header text-center">
          <div class="section-separator border-center"></div>
          <?php if(!empty($porfolio_page_title)):?><p class="section-subtitle"><?php echo $porfolio_page_title; ?></p><?php endif;?>
          <?php if(!empty($porfolio_page_subtitle)):?><h2 class="section-title"><?php echo $porfolio_page_subtitle;?></h2><?php endif;?>
        </div>
      </div>
    </div>  
<?php endif;  
}
add_action('honeypress_portfolio_home_title_subtitle','honeypress_portfolio_home_title_subtitle_fun');

/** Honeypress Blog/News home title and subtitle **/
function honeypress_blog_home_title_subtitle_fn()
{
$home_news_section_title = get_theme_mod('home_news_section_title',__('Latest News','honeypress'));
$home_news_section_discription = get_theme_mod('home_news_section_discription',__('From our blog','honeypress'));
if(($home_news_section_title) || ($home_news_section_discription)!='' ): ?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="section-header text-center">
      <div class="section-separator border-center"></div>
      <?php if($home_news_section_title) {?><p class="section-subtitle"><?php echo $home_news_section_title; ?></p><?php } ?>
      <?php if($home_news_section_discription) {?><h2 class="section-title"><?php echo $home_news_section_discription; ?></h2><?php } ?>
    </div>
  </div>            
</div>  
<?php endif;  
}
add_action('honeypress_blog_home_title_subtitle','honeypress_blog_home_title_subtitle_fn');

/** Honeypress Contact template function **/
function content_contact_data()
{
 global $post;
 if ( $post->post_content!=="" ) { ?>
 <!-- Contact Section -->
  <section class="section-module contact">
    <div class="container<?php echo honeypress_container();?>">
      <div class="row">
        <div class="col-md-12 col-sm-12">
        <?php 
        the_post();
        the_content(); ?>     
        </div>  
      </div>
    </div>
  </section>
  <!-- /End of Contact Section -->
<?php } 
global $contact_page_title; global $contact_page_subtitle; global $map_heading; global $form_heading; global $contact_data;  
$contact_page_title = get_theme_mod('contact_page_title',__('Contact Info','honeypress'));
$contact_page_subtitle = get_theme_mod('contact_page_subtitle',__('Get In Touch With Us','honeypress'));
$map_heading = get_theme_mod('contact_page_map_heading',__('Find Us On The Map','honeypress'));
$form_heading = get_theme_mod('contact_page_form_heading',__('Drop Us A Line','honeypress'));

$contact_data = get_theme_mod('honeypress_contact_content');
if(empty($contact_data))
  {
    $contact_data = json_encode( array(
    array(
      'icon_value' => 'fa fa-map-marker',
      'link'       => '#',
      'title'      => 'Address',
      'text'       => __('514 S. Magnolia St. Orlando, <br/>FL 32806','honeypress'),
      'id'         => 'customizer_repeater_56d7ea7f40b60',
    ),
    array(
      'icon_value' => 'fa fa-phone',
      'link'       => '#',
      'title'      => 'Phone',
      'text'       => __('+(15) 718-999-3939, <br/>+(15) 781-254-8437','honeypress'),
      'id'         => 'customizer_repeater_56d7ea7f40b61',
    ),
    array(
      'icon_value' => 'fa fa-envelope-o',
      'link'       => '#',
      'title'      => 'Email',
      'text'       => __('info@honeypress.com <br/>support@honeypress.com','honeypress'),
      'id'         => 'customizer_repeater_56d7ea7f40b62',
    ),
    ) );
  }
}
add_action('content_contact','content_contact_data');