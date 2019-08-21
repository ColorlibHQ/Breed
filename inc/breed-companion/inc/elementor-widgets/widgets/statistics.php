<?php
namespace breedelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * breed elementor counter section widget.
 *
 * @since 1.0
 */
class Breed_Statistics extends Widget_Base {

	public function get_name() {
		return 'breed-statistics';
	}

	public function get_title() {
		return __( 'Statistics', 'breed' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'breed-elements' ];
	}

	protected function _register_controls() {



        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'skill_content',
            [
                'label' => __( 'Statistics', 'breed' ),
            ]
        );
        $this->add_control(
            'statistics', [
                'label' => __( 'Create statistics item', 'breed' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'       => 'title',
                        'label'      => __( 'Title', 'breed' ),
                        'type'       => Controls_Manager::TEXT,
                        'label_block'=> true,
                        'default'    => esc_html__('Happy Customer', 'breed')
                    ],
                    [
                        'name'    => 'value',
                        'label'   => __( 'Value', 'breed' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => esc_html__('15k+', 'breed')
                    ]
                ],
            ]
        );

        $this->end_controls_section(); // End content

        //------------------------------ Style counter ------------------------------
        $this->start_controls_section(
            'style_counter', [
                'label' => __( 'Style Statistics', 'breed' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'content_alignment',
			[
				'label' => __( 'Alignment', 'breed' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => __( 'Left', 'breed' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'breed' ),
						'icon' => 'fa fa-align-center',
					],
					'end' => [
						'title' => __( 'Right', 'breed' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'start',
				'toggle' => true,
			]
		);

        $this->add_control(
            'color_countertitle', [
                'label' => __( 'Title Color', 'breed' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .statistics_item p' => 'color: {{VALUE}};',
                ],
            ]
        );


		$this->add_control(
			'bumber_color',
			[
				'label' => __( 'Number Color', 'breed' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'number_bg_color',
				'label' => __( 'Background', 'breed' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .statistics_item h3',
			]
		);

        $this->add_control(
            'bg-color', [
                'label'     => __( 'Background Color', 'breed' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f8faff',
                'selectors' => [
                    '{{WRAPPER}} .statistics_item' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
    $settings = $this->get_settings();
    $alignment = $settings['content_alignment'];


    ?>
        <section class="statistics_area">
            <div class="container">
                <div class="row justify-content-<?php echo $alignment; ?>">
                    <?php
                    if( is_array( $settings['statistics'] ) && count( $settings['statistics'] ) > 0 ):
                        foreach( $settings['statistics'] as $val ):
                            ?>

                            <div class="col-lg-2 col-md-3">
                                <div class="statistics_item">
                                    <?php
                                    if( !empty( $val['value'] ) ){
                                        echo '<h3><span class="counter">'. $val['value'] .'</span></h3>';
                                    }
                                    if( !empty( $val['title'] ) ){
                                        echo '<p>'.$val['title'].'</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </section>


    <?php
    }
}
