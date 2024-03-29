<?php
/**
 * Customizer functionality for the Blog settings panel.
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * A custom text control for Subscribe info.
 *
 * @since honeypress 1.0
 */
class honeypress_Subscribe_Info extends WP_Customize_Control {

	/**
	 * Control id
	 *
	 * @var string $id Control id.
	 */
	public $id = '';

	/**
	 * honeypress_Subscribe_Info constructor.
	 *
	 * @param WP_Customize_Manager $manager Customizer manager.
	 * @param string               $id Control id.
	 * @param array                $args Argument.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		$this->id = $id;
	}

	/**
	 * Enqueue function
	 */
	public function enqueue() {
		honeypress_Plugin_Install_Helper::instance()->enqueue_scripts();
	}

	/**
	 * Render content for the control.
	 *
	 * @since honeypress 1.0
	 */
	public function render_content() {
		$path    = '';
		$filenme = '';
		if ( $this->id === 'honeypress_subscribe_info' ) {
			$path =
				/* translators: %s is Path */
				sprintf(
					'<b>%s</b>',
					esc_html__( 'Customize > Widgets > Subscriber section widget area', 'honeypress' )
				);
			$filenme = 'subscribe-textarea-content.php';
		}
		

		printf(
			/* translators: %1$s is Path wrapped in <b>, %2$s is Plugin link */
			esc_html__( 'The main content of this section is customizable in: %1$s. Once there, you need to add the "SendinBlue Newsletter" widget. But first, you will need to install %2$s.', 'honeypress' ),
			$path,
			esc_html__( 'SendinBlue plugin', 'honeypress' )
		);

		echo $this->create_plugin_install_button( 'mailin' );

		echo '<hr/>';
		printf(
			/* translators: %s Path in plugin wrapped*/
			esc_html__( 'After installing the plugin, you need to navigate to %s and configure it.', 'honeypress' ),
			sprintf(
				/* translators: %s Path in plugin*/
				'<b>%s</b>',
				esc_html( 'Sendinblue > Home', 'honeypress' )
			)
		);
		echo '<br/><br/>';
		echo esc_html__( 'And then you need to navigate to its Settings, and use the following markup in the Subscription form:', 'honeypress' );
		echo '<br/><br/>';
		echo '<textarea style="width:100%;height:180px;font-size:12px;" readonly="">';
		$template_path = HONEYPRESS_PRO_TEMPLATE_DIR . '/functions/customizer/customizer-subscribe-info/templates/' . $filenme;
		if ( file_exists( $template_path ) ) {
			require $template_path;
		}
		echo '</textarea>';
	}


	/**
	 * Check plugin state.
	 *
	 * @param string $slug slug.
	 *
	 * @return bool
	 */
	public function create_plugin_install_button( $slug ) {
		return honeypress_Plugin_Install_Helper::instance()->honeypress_get_button_html( $slug );
	}
}