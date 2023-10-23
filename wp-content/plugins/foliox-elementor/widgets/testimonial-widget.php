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
class BdevsTestimonial extends \Elementor\Widget_Base {

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
        return 'bdevs-testimonial';
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
        return __( 'Testimonial', 'bdevs-elementor' );
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
        return 'eicon-blockquote';
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
        return [ 'testimonial' ];
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
                'label' => esc_html__( 'Testimonial', 'bdevs-elementor' ),
            ]   
        );
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
                'default'     => __( 'Testimonials', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading:', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'What Clients Say', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        ); 
        $this->add_control(
            'quote_image',
            [
                'label'   => esc_html__( 'Quote Image', 'bdevs-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [ 'active' => true ],
                'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Items', 'bdevs-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'    => 't_image',
                        'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
                        'type'    => Controls_Manager::MEDIA,
                        'default'     => esc_html__( '' , 'bdevs-elementor' ),
                        'dynamic' => [ 'active' => true ],
                    ],
                    [
                        'name'        => 'name',
                        'label'       => esc_html__( 'Name:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'James Cameron' , 'bdevs-elementor' ),
                        'label_block' => true,
                    ],
                    [
                        'name'        => 'job',
                        'label'       => esc_html__( 'Job:', 'bdevs-elementor' ),
                        'type'        => Controls_Manager::TEXT,
                        'dynamic'     => [ 'active' => true ],
                        'default'     => esc_html__( 'Aroa Founder' , 'bdevs-elementor' ),
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
    extract($settings); 
    ?>
    <div class="foliox_tm_section">
        <div class="foliox_tm_testimonials">
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
                <div class="list_wrapper">
                    <div class="total">
                        <div class="in wow fadeInUp" data-wow-duration="1s">
                            <ul class="owl-carousel owl-theme">
                                <?php foreach ( $settings['tabs'] as $item ) : ?>
                                <li>
                                    <?php if(isset($settings['quote_image']['url']) && $settings['quote_image']['url'] != ''){?>
                                    <div class="icon">
                                        <img class="svg" src="<?php echo wp_kses_post($settings['quote_image']['url']);?>" alt="" />
                                    </div>
                                    <?php } ?>
                                    <?php if(isset($item['text']) && $item['text'] != ''){?>
                                    <div class="text">
                                        <p><?php print wp_kses_post($item['text']); ?></p>
                                    </div>
                                    <?php } ?>
                                    <div class="short">
                                        <div class="image">
                                            <?php if (is_admin()) { ?>
                                            <div class="main" data-img-url="<?php echo wp_kses_post($item['t_image']['url']); ?>" style="background-image:url(<?php echo wp_kses_post($item['t_image']['url']); ?>);"></div>
                                            <?php } else { ?>
                                            <div class="main" data-img-url="<?php echo wp_kses_post($item['t_image']['url']); ?>"></div>
                                            <?php } ?>

                                        </div>
                                        <div class="detail">
                                            <?php if(isset($item['name']) && $item['name'] != ''){?>
                                            <h3><?php print wp_kses_post($item['name']); ?></h3>
                                            <?php } ?>
                                            <?php if(isset($item['job']) && $item['job'] != ''){?>
                                            <span><?php print wp_kses_post($item['job']); ?></span>
                                            <?php } ?>
                                        </div>
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
    <?php if (is_admin()) { ?>
    <script type="text/javascript">
        var carousel            = jQuery('.foliox_tm_testimonials .owl-carousel');
        var rtlMode = false;
        if(jQuery('body').hasClass('rtl')){
            rtlMode = 'true';
        }
        carousel.owlCarousel({
            loop: true,
            items: 1,
            lazyLoad: false,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 7000,
            rtl: rtlMode,
            dots: true,
            nav: false,
            navSpeed: false
        });
        foliox_tm_imgtosvg();        
        var carousel2           = jQuery('.foliox_tm_partners .owl-carousel');

        carousel2.owlCarousel({
            loop: true,
            items: 5,
            lazyLoad: false,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 7000,
            dots: true,
            nav: false,
            navSpeed: true,
            responsive:{
                0:{items:2},
                480:{items:3},
                768:{items:3},
                1300:{items:5},
            }
        });
    </script>
    <?php } ?>
    <?php
    }

}


