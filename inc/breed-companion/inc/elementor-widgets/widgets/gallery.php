<?php
namespace breedelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * elementor food-menu-tab section widget.
 *
 * @since 1.0
 */
class Breed_Gallery extends Widget_Base {

	public function get_name() {
		return 'breed-food-menu-tab';
	}

	public function get_title() {
		return __( 'Gallery', 'breed' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'breed-elements' ];
	}

	protected function _register_controls() {


		// Start Section Title=====================================
		$this->start_controls_section(
			'schedule_heading', [
				'label' => esc_html__( 'Schedule Section Heading', 'breed' ),
			]
		);
		$this->add_control(
			'sect_title', [
				'label' => __( 'Title', 'breed' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true

			]
		);
		$this->add_control(
			'sect_subtitle', [
				'label' => __( 'Sub Title', 'breed' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true

			]
		);


		$this->end_controls_section(); // End Section Title


		// ----------------------------------------  Food Menu Content ------------------------------

		$this->start_controls_section(
			'menu_tab_sec',
			[
				'label' => __( 'Event Schedule', 'breed' ),
			]
		);
		$this->add_control(
			'postnumber', [
				'label' => esc_html__( 'Post Number', 'breed' ),
				'type'  => Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 12,
				'step'    => 1,
				'default' => 10

			]
		);


		$this->end_controls_section(); // End food-menu-tab content

		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Section Heading', 'breed' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_secttitle', [
				'label'     => __( 'Section Title Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#05364d',
				'selectors' => [
					'{{WRAPPER}} .main_title h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#797979',
				'selectors' => [
					'{{WRAPPER}} .main_title p.top_text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subtitle_border', [
				'label'     => __( 'Sub Title Border Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(237, 35, 159, 0.6)',
				'selectors' => [
					'{{WRAPPER}} .main_title p.top_text span' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();



		//------------------------------ Style Tab Nav  ------------------------------
		$this->start_controls_section(
			'style_portfolio', [
				'label' => __( 'Style Protfolio Item', 'breed' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'portfolio_tab_menu_color', [
				'label'     => __( 'Portfolio Tab Menu Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .portfolio_area .filters ul li'  => 'color: {{VALUE}};',
				],
                'default'   => '#05364d'
			]
		);
		$this->add_control(
			'tabmenu_hoveractive_color', [
				'label'     => __( 'Menu Hover & Active Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .portfolio_area .filters ul li:hover'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .portfolio_area .filters ul li.active' => 'color: {{VALUE}};',
				],
                'default'   => '#1345e6'
			]
		);
		$this->add_control(
			'portfolio_title_color', [
				'label'     => __( 'Portfolio Title Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_portfolio .short_info h4 a'  => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'portfolio_meta_color', [
				'label'     => __( 'Portfolio Category Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_portfolio .short_info p'  => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_hover_overlay', [
				'label'     => __( 'Item Hover Overlay Color', 'breed' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single_portfolio:hover .overlay'  => 'background: {{VALUE}};',
				],
                'default'   => 'rgba(19, 69, 230, 0.9)'
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
        $this->load_widget_script();
		$settings = $this->get_settings();
		$postnumber = $settings['postnumber'];

		?>

        <section class="portfolio_area" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main_title">
	                        <?php
	                        if( !empty( $settings['sect_subtitle'] ) ){
		                        echo '<p class="top_text">'. esc_html( $settings['sect_subtitle'] ) .' <span></span></p>';
	                        }

	                        if( !empty( $settings['sect_title'] ) ){
		                        echo '<h2>'.wp_kses_post( $settings['sect_title'] ).'</h2>';
	                        }
	                        ?>
                        </div>
                    </div>
                </div>

                <?php breed_portfolio_section( $postnumber ); ?>
            </div>
        </section>
		<?php

	}

	public function load_widget_script(){
		if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
			?>
            <script>
                ( function( $ ){

                    var portfolioFilter = $('.portfolio-filter ul li');

                    $(window).on('load', function () {
                        portfolioFilter.on('click', function () {
                            portfolioFilter.removeClass('active');
                            $(this).addClass('active');

                            var data = $(this).attr('data-filter');
                            $workGrid.isotope({
                                filter: data
                            });
                        });

                        if (document.getElementById('portfolio')) {
                            var $workGrid = $('.portfolio-grid').isotope({
                                itemSelector: '.all',
                                percentPosition: true,
                                masonry: {
                                    columnWidth: '.grid-sizer'
                                }
                            });
                        }
                    });

                })(jQuery);
            </script>
			<?php
		}
	}

}
