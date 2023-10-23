<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $foliox_redux_demo = get_option('redux_demo'); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
    <link rel="shortcut icon" href="<?php if(isset($foliox_redux_demo['favicon']['url'])){?><?php echo esc_url($foliox_redux_demo['favicon']['url']); ?><?php } ?>">
    <?php } ?>
    <?php wp_head(); ?>
</head>
    <?php if(isset($foliox_redux_demo['background_body']['url']) && $foliox_redux_demo['background_body']['url'] != ''){ ?>  
    <body <?php body_class(); ?> style="background-image:url(<?php echo esc_url($foliox_redux_demo['background_body']['url']); ?>) cover no-repeat;"> 
    <?php } else { ?>
    <body <?php body_class(); ?> style="background-image:url(<?php echo get_template_directory_uri();?>/img/hero/1.jpg);"> 
    <?php } ?>   
    <!-- PRELOADER -->
    <div id="preloader">
        <div class="loader_line"></div>
    </div>
    <!-- /PRELOADER -->
    
    <!-- WRAPPER ALL -->
    <div class="foliox_tm_all_wrap" data-magic-cursor="show">
    
        <!-- MOBILE MENU -->
        <div class="foliox_tm_mobile_menu">
            <div class="mobile_menu_inner">
                <div class="mobile_in">
                    <div class="logo">
                        <?php if(isset($foliox_redux_demo['logo']['url']) && $foliox_redux_demo['logo']['url'] != ''){ ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($foliox_redux_demo['logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                        <?php } else { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
                        <?php } ?>
                    </div>
                    <div class="trigger">
                        <div class="hamburger hamburger--slider">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <div class="dropdown_inner">
                    <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary_onepage',
                            'container' => '',
                            'menu_class' => '', 
                            'menu_id' => '',
                            'menu'            => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'echo'            => true,
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new foliox_wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id=" %1$s" class=" anchor_nav %2$s">%3$s</ul>',
                            'depth'           => 0,        
                        )
                    ); ?>
                </div>
            </div>
        </div>
        <!-- /MOBILE MENU -->
        
        <!-- HEADER -->
        <div class="foliox_tm_header">
            <div class="container">
                <div class="inner header-top-fixed">
                    <div class="logo">
                        <?php if(isset($foliox_redux_demo['logo']['url']) && $foliox_redux_demo['logo']['url'] != ''){ ?>
                        <a class="anchor" href="#home"><img src="<?php echo esc_url($foliox_redux_demo['logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                        <?php } else { ?>
                        <a class="anchor" href="#home"><img src="<?php echo get_template_directory_uri();?>/img/logo/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
                        <?php } ?>
                    </div>
                    <div class="details">
                        <div class="menu">
                            <?php 
                            wp_nav_menu( 
                                array( 
                                    'theme_location' => 'primary_onepage',
                                    'container' => '',
                                    'menu_class' => '', 
                                    'menu_id' => '',
                                    'menu'            => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'echo'            => true,
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new foliox_wp_bootstrap_navwalker(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul id=" %1$s" class=" anchor_nav %2$s">%3$s</ul>',
                                    'depth'           => 0,        
                                )
                            ); ?>
                        </div>
                        <div class="social">
                            <ul>
                                <?php if(isset($foliox_redux_demo['link_social_1']) && ($foliox_redux_demo['link_social_1'] != '')){?>
                                <li><a href="<?php echo esc_url($foliox_redux_demo['link_social_1']); ?>"><i class="<?php echo wp_kses_post($foliox_redux_demo['social_1']); ?>"></i></a></li>
                                <?php } ?>
                                <?php if(isset($foliox_redux_demo['link_social_2']) && ($foliox_redux_demo['link_social_2'] != '')){?>
                                <li><a href="<?php echo esc_url($foliox_redux_demo['link_social_2']); ?>"><i class="<?php echo wp_kses_post($foliox_redux_demo['social_2']); ?>"></i></a></li>
                                <?php } ?>
                                <?php if(isset($foliox_redux_demo['link_social_3']) && ($foliox_redux_demo['link_social_3'] != '')){?>
                                <li><a href="<?php echo esc_url($foliox_redux_demo['link_social_3']); ?>"><i class="<?php echo wp_kses_post($foliox_redux_demo['social_3']); ?>"></i></a></li>
                                <?php } ?>
                                <?php if(isset($foliox_redux_demo['link_social_4']) && ($foliox_redux_demo['link_social_4'] != '')){?>
                                <li><a href="<?php echo esc_url($foliox_redux_demo['link_social_4']); ?>"><i class="<?php echo wp_kses_post($foliox_redux_demo['social_4']); ?>"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /HEADER -->
