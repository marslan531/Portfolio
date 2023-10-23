<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsSkills extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Elementor widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'bdevs-skills';
    }

    /**
     * Get widget title.
     *
     * Retrieve Bdevs Elementor widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Skills', 'bdevs-elementor' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Bdevs About widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-skill-bar';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Bdevs About widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'bdevs-elementor' ];
    }

    public function get_keywords() {
        return [ 'Skills' ];
    }

    public function get_script_depends() {
        return [ 'bdevs-elementor'];
    }

    // BDT Position
    protected function element_pack_position() {
        $position_options = [
            ''              => esc_html__('Default', 'bdevs-elementor'),
            'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
            'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
            'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
            'center'        => esc_html__('Center', 'bdevs-elementor') ,
            'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
            'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
            'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
            'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
            'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
        ];

        return $position_options;
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content_heading',
            [
                'label' => esc_html__( 'Skills', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
                'default'     => __( 'Skills', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'I Work Hard to Improve My Skills Regularly', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Skills:', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'skill',
                        'label'       => esc_html__( 'Skill:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is skill' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'percent',
                        'label'       => esc_html__( 'Percent:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is percent' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        
        /** 
        *   Layout section 
        **/
        $this->start_controls_section(
            'section_content_layout',
            [
                'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'description'  => 'Use align to match position',
                'default'      => 'left',
            ]
        );  
        $this->add_control(
            'show_heading',
            [
                'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );  
        $this->end_controls_section();
    }

    public function render() {
        $settings  = $this->get_settings_for_display();
        extract($settings); ?>
        <div class="foliox_tm_section">
            <div class="foliox_tm_skills">
                <div class="container">
                    <?php if ( $settings['show_heading'] ) : ?>
                    <div class="foliox_tm_main_title">
                        <?php if(isset($settings['subheading']) && $settings['subheading'] != ''){?>
                        <span><?php print wp_kses_post($settings['subheading']); ?></span>
                        <?php } ?>
                        <?php if(isset($settings['heading']) && $settings['heading'] != ''){?>
                        <h3><?php print wp_kses_post($settings['heading']); ?></h3>
                        <?php } ?>
                    </div>
                    <?php endif; ?>
                    <div class="list">
                        <div class="left">
                            <div class="dodo_progress wow fadeInUp" data-wow-duration="1s">
                                <?php 
                                $i=0;
                                foreach ( $settings['tabs'] as $item ) : 
                                $i++;
                                ?>
                                <?php if($i%2==1){ ?>
                                <div class="progress_inner" data-value="<?php print wp_kses_post($item['percent']); ?>">
                                    <span>
                                        <?php if(isset($item['skill']) && $item['skill'] != ''){?>
                                        <span class="label"><?php print wp_kses_post($item['skill']); ?></span>
                                        <?php } ?>
                                        <?php if(isset($item['percent']) && $item['percent'] != ''){?>
                                        <span class="number"><?php print wp_kses_post($item['percent']); ?>%</span>
                                        <?php } ?>
                                    </span>
                                    <div class="background">
                                        <?php if (is_admin()) { ?>
                                        <div class="bar" style="width:100%;">
                                            <div class="bar_in" style="width: <?php print wp_kses_post($item['percent']); ?>%;"></div>
                                        </div>
                                        <?php } else { ?>
                                        <div class="bar">
                                            <div class="bar_in"></div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="right">
                            <div class="dodo_progress wow fadeInUp" data-wow-duration="1s">
                                <?php 
                                $j=0;
                                foreach ( $settings['tabs'] as $item ) : 
                                $j++;
                                ?>
                                <?php if($j%2==0){ ?>
                                <div class="progress_inner" data-value="<?php print wp_kses_post($item['percent']); ?>">
                                    <span>
                                        <?php if(isset($item['skill']) && $item['skill'] != ''){?>
                                        <span class="label"><?php print wp_kses_post($item['skill']); ?></span>
                                        <?php } ?>
                                        <?php if(isset($item['percent']) && $item['percent'] != ''){?>
                                        <span class="number"><?php print wp_kses_post($item['percent']); ?>%</span>
                                        <?php } ?>
                                    </span>
                                    <div class="background">
                                        <?php if (is_admin()) { ?>
                                        <div class="bar" style="width:100%;">
                                            <div class="bar_in" style="width: <?php print wp_kses_post($item['percent']); ?>%;"></div>
                                        </div>
                                        <?php } else { ?>
                                        <div class="bar">
                                            <div class="bar_in"></div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

}


