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
class BdevsResume extends \Elementor\Widget_Base {

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
        return 'bdevs-resume';
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
        return __( 'Resume', 'bdevs-elementor' );
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
        return 'eicon-user-circle-o';
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
        return [ 'resume' ];
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
                'label' => esc_html__( 'Resume', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
                'default'     => __( 'Resume', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'I Worked for Some Big Companies', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'column_1_title',
            [
                'label'       => __( 'Column 1 Title:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
                'default'     => __( 'Experience ', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'    => 'image_icon',
                        'label'   => esc_html__( 'Image Icon:', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                        'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'title',
                        'label'       => esc_html__( 'Title:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'UI/UX Designer' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'time',
                        'label'       => esc_html__( 'Time:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '(2018 - Present)' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'role',
                        'label'       => esc_html__( 'Role:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Easy Computers' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'text',
                        'label'       => esc_html__( 'Text:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is text' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                ],
            ]
        );
        $this->add_control(
            'column_2_title',
            [
                'label'       => __( 'Column 2 Title:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
                'default'     => __( 'Education ', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        ); 
        $this->add_control(
            'tabs2',
            [
                'label' => esc_html__( 'Items', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'    => 'image_icon',
                        'label'   => esc_html__( 'Image Icon:', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                        'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'title',
                        'label'       => esc_html__( 'Title:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Masters of Science' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'time',
                        'label'       => esc_html__( 'Time:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( '(2010 - 2012)' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'role',
                        'label'       => esc_html__( 'Role:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Dhaka University' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'text',
                        'label'       => esc_html__( 'Text:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXTAREA,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'This is text' , 'bdevs-elementor' ),
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
        <div class="foliox_tm_resume">
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
                <div class="wrapper">
                    <div class="left">
                        <?php if(isset($settings['column_1_title']) && $settings['column_1_title'] != ''){?>
                        <div class="title">
                            <h3><?php print wp_kses_post($settings['column_1_title']); ?></h3>
                        </div>
                        <?php } ?>
                        <div class="resume_list">
                            <ul>
                                <?php foreach ( $settings['tabs'] as $item ) : ?>
                                <li class="wow fadeInUp" data-wow-duration="1s">
                                    <div class="list_inner">
                                        <?php if(isset($item['image_icon']['url']) && $item['image_icon']['url'] != ''){?>
                                        <span class="icon">
                                            <img class="svg" src="<?php echo wp_kses_post($item['image_icon']['url']); ?>" alt="" />
                                        </span>
                                        <?php } ?>
                                        <div class="resume_title">
                                            <?php if(isset($item['title']) && $item['title'] != ''){?>
                                            <h3><?php print wp_kses_post($item['title']); ?><span><?php print wp_kses_post($item['time']); ?></span></h3>
                                            <?php } ?>
                                            <?php if(isset($item['role']) && $item['role'] != ''){?>
                                            <span class="company"><?php print wp_kses_post($item['role']); ?></span>
                                            <?php } ?>
                                        </div>
                                        <?php if(isset($item['text']) && $item['text'] != ''){?>
                                        <p class="text"><?php print wp_kses_post($item['text']); ?></p>
                                        <?php } ?>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="right">
                        <?php if(isset($settings['column_2_title']) && $settings['column_2_title'] != ''){?>
                        <div class="title">
                            <h3><?php print wp_kses_post($settings['column_2_title']); ?></h3>
                        </div>
                        <?php } ?>
                        <div class="resume_list">
                            <ul>
                                <?php foreach ( $settings['tabs2'] as $item2 ) : ?>
                                <li class="wow fadeInUp" data-wow-duration="1s">
                                    <div class="list_inner">
                                        <?php if(isset($item2['image_icon']['url']) && $item2['image_icon']['url'] != ''){?>
                                        <span class="icon">
                                            <img class="svg" src="<?php echo wp_kses_post($item2['image_icon']['url']); ?>" alt="" />
                                        </span>
                                        <?php } ?>
                                        <div class="resume_title">
                                            <?php if(isset($item2['title']) && $item2['title'] != ''){?>
                                            <h3><?php print wp_kses_post($item2['title']); ?><span><?php print wp_kses_post($item2['time']); ?></span></h3>
                                            <?php } ?>
                                            <?php if(isset($item2['role']) && $item2['role'] != ''){?>
                                            <span class="company"><?php print wp_kses_post($item2['role']); ?></span>
                                            <?php } ?>
                                        </div>
                                        <?php if(isset($item2['text']) && $item2['text'] != ''){?>
                                        <p class="text"><?php print wp_kses_post($item2['text']); ?></p>
                                        <?php } ?>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}


