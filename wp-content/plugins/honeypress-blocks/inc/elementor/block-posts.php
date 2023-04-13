<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor icon list widget.
 *
 * Elementor widget that displays a bullet list with any chosen icons and texts.
 *
 * @since 1.0.0
 */
class Honeypress_Posts extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve icon list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'honeypress-posts';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve icon list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Honeypress: Posts', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve icon list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the icon list widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'honeypress-elements' ];
	}

	/**
	 * Register icon list widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_blog',
			[
				'label' => __( 'Blog', 'elementor' ),
			]
		);

		

		$this->add_control(
			'number',
			[
				'label' => __( 'Number of posts', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 4,
			]
		);

		$this->add_control(
			'category',
			[
				'label' 	=> __( 'Categories', 'elementor' ),
				'type' 		=> Controls_Manager::SELECT,
                'options' 	=> $this->get_cats(),
                'multiple' 	=> true,				
				'default' 	=> '',
			]
		);

		$this->add_control(
			'see_all_text',
			[
				'label' => __( 'See all button text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'See all our news', 'elementor' ),
			]
		);


		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();


		//Post titles styles
		$this->start_controls_section(
			'section_post_title_style',
			[
				'label' => __( 'Post title', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' 	=> __( 'Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-sm-area.element h3 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .latest-news-wrapper.carousel.style2 .blog-post:hover h4 a' => 'color: #fff;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'post_title_typography',
				'selector' 	=> '{{WRAPPER}} .blog-sm-area.element h3',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End post titles styles	








		//Post meta styles
		$this->start_controls_section(
			'section_post_meta_style',
			[
				'label' => __( 'Post meta', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'post_meta_color',
			[
				'label' 	=> __( 'Meta text', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-sm-area.element .media-body .blog-post-sm' => 'color: {{VALUE}};',
					'{{WRAPPER}} .blog-sm-area.element .blog-post:hover .meta-post' => 'color: #fff;',
				],
			]
		);

		$this->add_control(
			'post_meta_links_color',
			[
				'label' 	=> __( 'Meta links', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-sm-area.element .media-body .blog-post-sm a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .blog-sm-area.element .blog-post:hover .meta-post a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .blog-sm-area.element .media-body .blog-post-sm a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'post_meta_typography',
				'selector' 	=> '{{WRAPPER}} .blog-sm-area.element .media-body .blog-post-sm a',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End post meta styles	

		//Content styles
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Post content', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' 	=> __( 'Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-sm-area.element .media-body p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .latest-news-wrapper.carousel.style2 .blog-post:hover .entry-summary' => 'color: #fff;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'content_typography',
				'selector' 	=> '{{WRAPPER}} .blog-sm-area.element .media-body p',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End content styles	

	

		//Button styles
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} a.roll-button, {{WRAPPER}} .roll-button',
			]
		);
	
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' 	=> __( 'Text Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '#fff',
				'selectors' => [
					'{{WRAPPER}} a.roll-button, {{WRAPPER}} .roll-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' 	=> __( 'Background Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '#ee591f',
				'selectors' => [
					'{{WRAPPER}} a.roll-button, {{WRAPPER}} .roll-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' 	=> __( 'Text Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '#47425d',
				'selectors' => [
					'{{WRAPPER}} a.roll-button:hover, {{WRAPPER}} .roll-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default'	=> 'transparent',
				'selectors' => [
					'{{WRAPPER}} a.roll-button:hover, {{WRAPPER}} .roll-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} a.roll-button:hover, {{WRAPPER}} .roll-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .roll-button',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [	'top' => 3,
						'right' => 3,
						'bottom' => 3,
						'left' => 3,
						'unit' => 'px',
						'isLinked' => false,
					],				
				'selectors' => [
					'{{WRAPPER}} a.roll-button, {{WRAPPER}} .roll-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .roll-button',
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [	'top' => 16,
						'right' => 35,
						'bottom' => 16,
						'left' => 35,
						'unit' => 'px',
						'isLinked' => false,
					],
				'selectors' => [
					'{{WRAPPER}} a.roll-button, {{WRAPPER}} .roll-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
		//End button styles


	}

	protected function get_cats() {
		$items = [ '' => '' ];
		$terms = get_terms('category');
		foreach ( $terms as $term ) {
			$items[ $term->term_id ] = $term->name;
		}
		return $items;
	}	

	/**
	 * Render icon list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();


		$style = 'style1';
		$r = new \WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'cat'		  		  => $settings['category'],
			'posts_per_page'	  => $settings['number']		
		) );

		if ( $r->have_posts() ) :
		?>


			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<div class="col-md-12">
		<div class="blog-sm-area element">
			<div class="media">
				<div class="blog-sm-box">
					<?php $defalt_arg =array('class' => "img-responsive");
						  if(has_post_thumbnail()):
						  	the_post_thumbnail('', $defalt_arg); 
						  endif; ?>
				</div>
				<div class="media-body">
					<div class="blog-post-sm">
						<?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
						<a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>"><?php echo get_the_date('M j, Y'); ?></a>
						<?php 	$tag_list = get_the_tag_list();
						if(!empty($tag_list)) ?>
							<div class="blog-tags-sm"><?php the_tags('', ', ', ''); ?></div>
					</div>
			
					<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
					<p><?php echo get_home_blog_excerpt(); ?></p>
				</div>
			</div>
		</div>
	</div>
			<?php endwhile; ?>
			

		<?php $cat = get_term_by('id', $settings['category'], 'category') ?>
		<?php if ( $settings['category'] ) : //Link to the category page instead of blog page if a category is selected ?>
			<a href="<?php echo esc_url(get_category_link(get_cat_ID($cat -> name))); ?>" class="roll-button more-button"><?php echo esc_html( $settings['see_all_text'] ); ?></a>
		<?php elseif ( get_option( 'page_for_posts' ) ) : ?>
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="roll-button more-button"><?php echo esc_html( $settings['see_all_text'] ); ?></a>
		<?php endif; ?>		
		<?php 
		wp_reset_postdata();
		endif; //end have_posts() check
		?>

		<?php
	}

	/**
	 * Render icon list widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Honeypress_Posts() );