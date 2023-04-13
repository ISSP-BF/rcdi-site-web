<?php
/**
 * Getting started template
 */
$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="honeypress-tab-pane active">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="honeypress-info-title text-center"><?php echo esc_html__('About Honeypress Pro','honeypress'); ?><?php if( !empty($honeypress['Version']) ): ?> <sup id="honeypress-theme-version"><?php echo esc_html( $honeypress['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:30px; margin-bottom: 50px;">
				<img src="<?php echo HONEYPRESS_PRO_TEMPLATE_DIR_URI.'/admin/assets/mockup-pro.png';?>">
			</div>
			<div class="col-md-6">
				<div class="honeypress-page">
					<div class="honeypress-page-top"><?php esc_html_e( 'Links to Customizer Settings', 'honeypress' ); ?></div>
					<div class="honeypress-page-content">
						<ul class="honeypress-page-list-flex">
							<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>" target="_blank"><?php esc_html_e('Site Logo','honeypress'); ?> <?php esc_html_e('( Adjust Logo Width )','honeypress'); ?></a>
							</li>
							<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=honeypress_theme_panel' ) ); ?>" target="_blank"><?php esc_html_e('Blog options','honeypress'); ?></a>
							</li>
							 <li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=nav_menus' ) ); ?>" target="_blank"><?php esc_html_e('Menus','honeypress'); ?></a>
							</li>
							 <li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=theme_style' ) ); ?>" target="_blank"><?php esc_html_e('Layout & Color scheme','honeypress'); ?></a>
							</li>
							 <li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=widgets' ) ); ?>" target="_blank"><?php esc_html_e('Widgets','honeypress'); ?></a>
							</li>
							 <li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=honeypress_general_settings' ) ); ?>" target="_blank"><?php esc_html_e('General settings','honeypress'); ?></a><?php esc_html_e(" ( Header Preset, Sticky Header, Search Effect, Breadcrumb, Ribon, Container Setting, Post Navigation Style Setting, Mega Menu, Post Formats, Scroll to Top , Advance Footer Setting )"); ?>
							</li>
                                                        <li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=section_settings' ) ); ?>" target="_blank"><?php esc_html_e('Homepage sections','honeypress'); ?></a>
							</li>
                                                        <li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=honeypress_template_settings' ) ); ?>" target="_blank"><?php esc_html_e('Page template settings','honeypress'); ?></a>
							</li>
			
							<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=honeypress_typography_setting' ) ); ?>" target="_blank"><?php esc_html_e('Typography','honeypress'); ?></a>
							</li>
							<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'themes.php?page=honeypress_hooks_settings' ) ); ?>" target="_blank"><?php esc_html_e('Hooks','honeypress'); ?></a>
							</li>
							
							<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=frontpage_layout' ) ); ?>" target="_blank"><?php esc_html_e('Sections order manager','honeypress'); ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="hp-pro-page">

					<div class="hp-pro-page-top hp-pro-demo-import"><?php esc_html_e( 'One Click Demo Import', 'honeypress' ); ?></div>
					<p style="padding:10px 20px; font-size: 16px;"><?php _e( 'To import the demo data, you need to activate the <b>One Click Demo Import</b> and <b>Honeypress Blocks Pro</b> plugins. <a class="hp-pro-custom-class" href="#one_click_demo" target="_self">Click Here</a>', 'honeypress' ); ?></p>
				</div>

				<div class="honeypress-page">
					<div class="honeypress-page-top"><?php esc_html_e( 'Useful Links', 'honeypress' ); ?></div>
					<div class="honeypress-page-content">
						<ul class="honeypress-page-list-flex">
						<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo 'https://honeypress-pro.spicethemes.com/'; ?>" target="_blank"><?php echo esc_html__('Honeypress Pro Demo','honeypress'); ?></a>
						</li>
						<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo 'https://spicethemes.com/honeypress-pro/'; ?>" target="_blank"><?php echo esc_html__('Honeypress Pro Details','honeypress'); ?></a>
						</li>
						<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo 'https://support.spicethemes.com/index.php?p=/post/discussion/honeypress-pro'; ?>" target="_blank"><?php echo esc_html__('Honeypress Pro Support','honeypress'); ?></a>
						</li>
						<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo 'https://wordpress.org/support/theme/honeypress/reviews/?filter=5'; ?>" target="_blank"><?php echo esc_html__('Your feedback is valuable to us','honeypress'); ?></a>
						</li>
						<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo 'https://helpdoc.spicethemes.com/category/honeypress-pro'; ?>" target="_blank"><?php echo esc_html__('Honeypress Pro Documentation','honeypress'); ?></a>
						</li>
						<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo 'https://spicethemes.com/contact/'; ?>" target="_blank"><?php echo esc_html__('Pre-sales enquiry','honeypress'); ?></a>
						</li>
						<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo 'https://spicethemes.com/honeypress-free-vs-pro/'; ?>" target="_blank"><?php echo esc_html__('Free vs Pro','honeypress'); ?></a>
						</li>
						<li class="">
								<a class="honeypress-page-quick-setting-link" href="<?php echo 'https://spicethemes.com/honeypress-pro-changelog/'; ?>" target="_blank"><?php echo esc_html__('Changelog','honeypress'); ?></a>
						</li>	
						</ul>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>	