<?php
/**
 * Functions to provide support for the One Click Demo Import plugin (wordpress.org/plugins/one-click-demo-import)
 *
 * @package Honeypress Blocks Pro
 * @since 1.0
 */


/**
 * Set import files
 */
if ( !function_exists( 'honeypress_blocks_set_import_files' ) ) {
    function honeypress_blocks_set_import_files() {
        return array(
            //Default Honeypress blocks demo
            array(
                'import_file_name'              => __('Default', 'honeypress-blocks'),
               'local_import_file'             => WT_DIR . 'demo-content/honeypress-default-pro.xml',           
                'local_import_widget_file'      => WT_DIR . 'demo-content/honeypress-default-pro.wie',
                'local_import_customizer_file'  => WT_DIR . 'demo-content/honeypress-default-pro.dat',      
                'preview_url'                   => '',    
                'import_preview_image_url'      => WBP_URI . 'demo-content/previews/demo.jpg', 
            ),
            
                        
        );
    }
} 
add_filter( 'pt-ocdi/import_files', 'honeypress_blocks_set_import_files' );

/**
 * Define actions that happen after import
 */
if ( !function_exists( 'honeypress_blocks_set_after_import_mods' ) ) {
    function honeypress_blocks_set_after_import_mods() {

         //Assign the menu
        $main_menu = get_term_by( 'name', 'Menu 1', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'honeypress-primary' => $main_menu->term_id,
            )
        );

        //Asign the static front page and the blog page
        $front_page = get_page_by_title( 'Home' );
        $blog_page  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page -> ID );
        update_option( 'page_for_posts', $blog_page -> ID );

        $args = array(
        'post_type' => 'honeypress_portfolio',
        'numberposts' => -1
        );
        $honeypress_portfolio_posts = get_posts($args);
        foreach ($honeypress_portfolio_posts as $honeypress_portfolio_post){
            $honeypress_portfolio_post->post_title = $honeypress_portfolio_post->post_title.'';
            wp_update_post( $honeypress_portfolio_post );
        }

        //Assign the Front Page template
        //update_post_meta( $front_page -> ID, '_wp_page_template', 'header-footer.php' );

    }
}
add_action( 'pt-ocdi/after_import', 'honeypress_blocks_set_after_import_mods' );

/**
* Remove branding
*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );