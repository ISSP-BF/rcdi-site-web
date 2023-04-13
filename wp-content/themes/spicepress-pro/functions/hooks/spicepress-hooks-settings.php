<?php
/**
 * Add a Hook panel in the main WordPress menu
 *
 * Based on WordPress Settings API https://codex.wordpress.org/Settings_API
 *
 */

/**
 * Class SpicePress_Hooks_Settings
 */
class Spicepress_Hooks_Settings {

	/**
	 * Settings base
	 *
	 * @access private
	 * @var string
	 */
	private $settings_base;

	/**
	 * Hooks Settings
	 *
	 * @access private
	 * @var string
	 */
	private $hooks_settings;

	/**
	 * Spicepress_Hooks_Settings constructor.
	 */
	public function __construct() {

		$this->settings_base = '';

		// Initialise settings
		add_action( 'admin_init', array( $this, 'init' ) );

		// Register plugin settings
		add_action( 'admin_init', array( $this, 'register_settings' ) );

		// Add settings page to menu
		add_action( 'admin_menu', array( $this, 'add_menu_item' ) );
	}

	/**
	 * Initialise settings
	 *
	 * @return void
	 */
	public function init() {
		$this->hooks_settings = $this->hooks_settings_fields();
	}

	/**
	 * Add settings page to admin menu
	 *
	 * @return void
	 */
	public function add_menu_item() {
		$page = add_theme_page( esc_html__( 'SpicePress PRO hooks', 'spicepress' ), esc_html__( 'SpicePress PRO hooks', 'spicepress' ), 'edit_theme_options', 'spicepress_hooks_settings', array( $this, 'build_hooks_settings_page' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'hooks_settings_assets' ) );
	}

	/**
	 * Enqueue scripts and styles needed
	 */
	public function hooks_settings_assets() {
		wp_enqueue_script( 'spicepress-hooks-seetings-js', get_template_directory_uri() . '/functions/hooks/js/functions.js', array( 'jquery' ) );
		wp_enqueue_style( 'spicepress-hooks-settings-css', get_template_directory_uri() . '/functions/hooks/css/hooks.css', array() );
	}

	/**
	 * Build hooks settings fields
	 *
	 * @return array Fields displayed on hooks settings page
	 */
	private function hooks_settings_fields() {

		$hooks_settings['standard'] = array(
			'title'  => '',
			'fields' => array(
			
			
			    // Top Header Section
			
				array(
					'name' => esc_html__( 'Before Top Header', 'spicepress' ),
					'id'   => 'spicepress_before_header_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Top Header', 'spicepress' ),
					'id'   => 'spicepress_after_header_section_hook',
					'type' => 'textarea',
				),
				
				
				// Slider Section
				
				array(
					'name' => esc_html__( 'Before Slider section', 'spicepress' ),
					'id'   => 'spicepress_before_slider_section_hook',
					'type' => 'textarea',
				),

				array(
					'name' => esc_html__( 'After Slider section', 'spicepress' ),
					'id'   => 'spicepress_after_slider_section_hook',
					'type' => 'textarea',
				),
				
				
				
				// Service Section
				
				array(
					'name' => esc_html__( 'Before Service section', 'spicepress' ),
					'id'   => 'spicepress_before_service_section_hook',
					'type' => 'textarea',
				),

				array(
					'name' => esc_html__( 'After Service section', 'spicepress' ),
					'id'   => 'spicepress_after_service_section_hook',
					'type' => 'textarea',
				),
				
				
				// Portfolio Section
				
				array(
					'name' => esc_html__( 'Before Portfolio section', 'spicepress' ),
					'id'   => 'spicepress_before_portfolio_section_hook',
					'type' => 'textarea',
				),

				array(
					'name' => esc_html__( 'After Portfolio section', 'spicepress' ),
					'id'   => 'spicepress_after_portfolio_section_hook',
					'type' => 'textarea',
				),
				
				

				// Testimonials Section
				
				
				array(
					'name' => esc_html__( 'Before Testimonials section', 'spicepress' ),
					'id'   => 'spicepress_before_testimonial_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Testimonials section', 'spicepress' ),
					'id'   => 'spicepress_after_testimonial_section_hook',
					'type' => 'textarea',
				),
				
				
				// Blog Section
				

				array(
					'name' => esc_html__( 'Before Blog section', 'spicepress' ),
					'id'   => 'spicepress_before_blog_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Blog section', 'spicepress' ),
					'id'   => 'spicepress_after_blog_section_hook',
					'type' => 'textarea',
				),
				

								
				// Gallery Section
				
				array(
					'name' => esc_html__( 'Before Gallery section', 'spicepress' ),
					'id'   => 'spicepress_before_gallery_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Gallery section', 'spicepress' ),
					'id'   => 'spicepress_after_gallery_section_hook',
					'type' => 'textarea',
				),
				
				
				
				
				// Team Section
				
				array(
					'name' => esc_html__( 'Before Team section', 'spicepress' ),
					'id'   => 'spicepress_before_team_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Team section', 'spicepress' ),
					'id'   => 'spicepress_after_team_section_hook',
					'type' => 'textarea',
				),
				
				
                // Shop Section
				
				
				array(
					'name' => esc_html__( 'Before Shop section', 'spicepress' ),
					'id'   => 'spicepress_before_shop_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Shop section', 'spicepress' ),
					'id'   => 'spicepress_after_shop_section_hook',
					'type' => 'textarea',
				),
	
	
	            // Client Section
	
				array(
					'name' => esc_html__( 'Before Client section', 'spicepress' ),
					'id'   => 'spicepress_before_client_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Client section', 'spicepress' ),
					'id'   => 'spicepress_after_client_section_hook',
					'type' => 'textarea',
				),
				
				
				// Footer Callout section
				
				
				array(
					'name' => esc_html__( 'Before Callout section', 'spicepress' ),
					'id'   => 'spicepress_before_callout_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Callout section', 'spicepress' ),
					'id'   => 'spicepress_after_callout_section_hook',
					'type' => 'textarea',
				),
				
				
			    // Footer Section
				
				
				array(
					'name' => esc_html__( 'Before Footer', 'spicepress' ),
					'id'   => 'spicepress_before_footer_section_hook',
					'type' => 'textarea',
				),
				array(
					'name' => esc_html__( 'After Footer', 'spicepress' ),
					'id'   => 'spicepress_after_footer_section_hook',
					'type' => 'textarea',
				),
				


			),
		);

		$hooks_settings = apply_filters( 'spicepress_hooks_settings_fields', $hooks_settings );

		return $hooks_settings;
	}

	/**
	 * Register settings
	 */
	public function register_settings() {

		if ( ! empty( $this->hooks_settings ) ) {

			if ( is_array( $this->hooks_settings ) ) {

				foreach ( $this->hooks_settings as $section => $data ) {

					/* Add a new section on the Hooks Settings page for each Hook */
					add_settings_section(
						$section, $data['title'], array(
							$this,
							'hooks_settings_section_callback',
						), 'spicepress_hooks_settings'
					);

					foreach ( $data['fields'] as $field ) {

						// Register field
						register_setting( 'spicepress_hooks_settings', 'spicepress_hooks', '' );

						// Add field to page
						add_settings_field(
							'spicepress_hooks[' . $field['id'] . ']', $field['name'], array(
								$this,
								'display_field',
							), 'spicepress_hooks_settings', $section, array(
								'field' => $field,
							)
						);
					}
				}
			}
		}
	}

	/**
	 * Callback for add_settings_section
	 */
	public function hooks_settings_section_callback() {
		$html = '';
		echo $html;
	}

	/**
	 * Generate HTML for displaying fields
	 *
	 * @param  array $args Field data.
	 * @return void
	 */
	public function display_field( $args ) {

		$field = $args['field'];

		$html = '';

		$option_name = $this->settings_base . $field['id'];
		$option      = get_option( 'spicepress_hooks' );

		$data = '';
		if ( isset( $option[ $option_name ] ) ) {
			$data = $option[ $option_name ];
		} elseif ( isset( $field['default'] ) ) {
			$data = $field['default'];
		}

		switch ( $field['type'] ) {

			case 'textarea':
				$checked = '';
				if ( isset( $option[ $field['id'] . '_php' ] ) && 'true' == $option[ $field['id'] . '_php' ] ) {
					$checked = 'checked="checked"';
				}
				$html .= '<textarea class="spicepress_hook_field_textarea" id="spicepress_hooks[' . esc_attr( $field['id'] ) . ']" name="spicepress_hooks[' . esc_attr( $field['id'] ) . ']" placeholder="' . ( ( ! empty( $field['description'] ) ) ? esc_attr( $field['description'] ) : '' ) . '" >' . esc_textarea( $data ) . '</textarea>';
				$html .= '<div class="execute"><input type="checkbox" name="spicepress_hooks[' . esc_attr( $field['id'] ) . '_php]" id="spicepress_hooks[' . esc_attr( $field['id'] ) . '_php]" value="true" ' . $checked . ' /> <label for="spicepress_hooks[' . esc_attr( $field['id'] ) . '_php]">' . esc_html__( 'Execute PHP', 'spicepress' ) . '</label></div>';
				break;

			case 'checkbox':
				break;

		}

		echo $html;
	}

	/**
	 * Build hooks settings page
	 */
	public function build_hooks_settings_page() {

		$html = '';

		$html .= '<div class="wrap" id="spicepress_hooks_settings">';

		$html .= '<h1 class="wp-heading-inline">' . esc_html__( 'SpicePress PRO hooks', 'spicepress' ) . '</h1>';

		$html .= '<input type="text" id="spicepress_search_hooks" onkeyup="spicepress_filter_hooks()" placeholder="Search hooks...">';

		$html .= '<div id="poststuff">';
		$html .= '<div id="post-body" class="metabox-holder columns-2">';
		$html .= '<form method="post" action="options.php" enctype="multipart/form-data">';

		/* Main page content */
		$html .= '<div id="post-body-content">';
		ob_start();
		settings_fields( 'spicepress_hooks_settings' );
		do_settings_sections( 'spicepress_hooks_settings' );
		$html .= ob_get_clean();
		$html .= '</div><!-- #post-body-content -->';

		/* Side box */
		$html .= '<div id="postbox-container-1">';
		$html .= '<div class="postbox">';
		$html .= '<h3 class="hndle">' . esc_html__( 'SpicePress PRO hooks', 'spicepress' ) . '</h3>';
		$html .= '<div class="inside">';
		$html .= '<div class="submitbox" id="submitpost">';
		$html .= '<div id="minor-publishing">';
		$html .= '<p>' . esc_html__( 'Shortcodes are allowed. If you check the Execute PHP checkbox, you can also use PHP.', 'spicepress' ) . '</p>';
		$html .= '</div><!-- #minor-publishing -->';
		$html .= '<div id="major-publishing-actions">';
		$html .= '<div id="publishing-action">';
		$html .= '<input name="Submit" type="submit" class="button button-primary button-large" value="' . esc_attr( __( 'Save hooks', 'spicepress' ) ) . '" />';
		$html .= '</div><!-- .publishing-action -->';
		$html .= '<div class="clear"></div>';
		$html .= '</div><!-- #major-publishing-actions -->';
		$html .= '</div><!-- #submitpost -->';
		$html .= '</div><!-- .inside -->';
		$html .= '</div><!-- .postbox -->';
		$html .= '</div><!-- #postbox-container-1 -->';

		$html .= '</form>';
		$html .= '</div><!-- #post-body -->';
		$html .= '</div><!-- #poststuff -->';
		$html .= '</div><!-- #Spicepress_Hooks_Settings -->';

		echo $html;
	}
}

$spicepress_hooks_settings = new Spicepress_Hooks_Settings();