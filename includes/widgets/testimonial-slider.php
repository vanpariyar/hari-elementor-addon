<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Hari_Elementor_Addons_Slider Widget.
 *
 * Hari_Elementor_Addons_Slider widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Hari_Elementor_Addons_Testimonial_Slider extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve slider widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'testimonial_slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve slider widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonial Slider', 'hari-elementor-addon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-box';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the slider of categories the slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the slider of keywords the slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'slider', 'sliders' ];
	}

	/**
	 * Register slider widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Slider Content', 'hari-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'hari-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'client_quote',
			[
				'label' => esc_html__( 'Client Quote', 'hari-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Client Quote', 'hari-elementor-addon' ),
				'placeholder' => esc_html__( 'Client Quote Of Client', 'hari-elementor-addon' ),
			]
		);

		$repeater->add_control(
			'client_name',
			[
				'label' => esc_html__( 'Client Name', 'hari-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Edward Snowden', 'hari-elementor-addon' ),
				'default' => esc_html__( 'Edward Snowden', 'hari-elementor-addon' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'client_designation',
			[
				'label' => esc_html__( 'Client Designation', 'hari-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Product Manager', 'hari-elementor-addon' ),
				'default' => esc_html__( 'Product Manager', 'hari-elementor-addon' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		/* End repeater */

		$this->add_control(
			'slider_items',
			[
				'label' => esc_html__( 'Silder', 'hari-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),           /* Use our repeater */
				'default' => [
					[
						'text' => esc_html__( 'Slider Item #1', 'hari-elementor-addon' ),
						'link' => '',
					],
					[
						'text' => esc_html__( 'Slider Item #2', 'hari-elementor-addon' ),
						'link' => '',
					],
					[
						'text' => esc_html__( 'Slider Item #3', 'hari-elementor-addon' ),
						'link' => '',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render slider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();?>

		<div class="client-testimonial">
			<div class="slider client-testimonial-slider">
				<?php foreach ( $settings['slider_items'] as $index => $item ) {?>
					<div>
						<div class="client-slider-item">
							<div class="client-image">
								<img src="<?php echo $item['image']['url'];?>">
							</div>
							<div class="client-slider-details">
								<img class="quote-image" src="<?php echo plugin_dir_url( __DIR__ ) . 'assets/images/quote.svg';?>">
								<p class="client-quote"><?php echo $item['client_quote'];?></p>
								<h6 class="client-name"><?php echo $item['client_name'];?></h6>
								<span class="client-designation"><?php echo $item['client_designation'];?></span>
							</div>
						</div>
					</div>
				<?php } ?>	
			</div>
		</div>
		<?php
	}

	/**
	 * Render slider widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>
		<div class="client-testimonial">
			<div class="slider client-testimonial-slider">
			<# _.each( settings.slider_items, function( item, index ) {
				var repeater_setting_key = view.getRepeaterSettingKey( 'text', 'slider_items', index );
				view.addRenderAttribute( repeater_setting_key, 'class', 'elementor-slider-widget-text' );
				view.addInlineEditingAttributes( repeater_setting_key );
				#>
					<div>
						<div class="client-slider-item">
							<div class="client-image">
							<# if ( item.image.url ) {
								var image = {
									id: item.image.id,
									url: item.image.url,
									size: item.image_size,
									dimension: settings.image_custom_dimension,
									model: view.getEditModel()
								};

								var image_url = elementor.imagesManager.getImageUrl( image );

								if ( ! image_url ) {
									return;
								}
							}
							#>
							<img src="{{ image_url }}">

							</div>
							<div class="client-slider-details">
								<img class="quote-image" src="../includes/assets/images/quote.svg">
								<p class="client-quote">{{ item.client_quote }}</p>
								<h6 class="client-name">{{ item.client_name }}</h6>
								<span class="client-designation">{{ item.client_designation }}</span>
							</div>
						</div>
					</div>
					
				<# } ); #>
			</div>
		</div>
		<?php
	}

}