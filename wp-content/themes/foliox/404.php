<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
$foliox_redux_demo = get_option('redux_demo');
get_header(); ?> 
<div class="foliox_tm_section page-banner error-page">
    <div class="foliox_tm_news">
        <div class="news_inner">
            <div class="container">
                <div class="foliox_tm_main_title">
                    <div class="title">
                        <h1><?php if(isset($foliox_redux_demo['404_title'])){?>
                        <?php echo htmlspecialchars_decode(esc_attr($foliox_redux_demo['404_title']));?>
                        <?php }else{?>
                        <?php echo esc_html__( '404', 'foliox' ); } ?></h1>
                    </div>
                </div>
                <div class="full-detail-content error-desc">
                    <h5><?php if(isset($foliox_redux_demo['404_desc'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($foliox_redux_demo['404_desc']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'OOPPS! THE PAGE YOU WERE LOOKING FOR, COULD NOT BE FOUND.', 'foliox' ); } ?></h5>
                </div>
                <div class="content">
                    <div class="breadcrumbs">
                        <a class="site-button" href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($redux_demo['404_button'])){?>
                        <?php echo htmlspecialchars_decode($redux_demo['404_button']);?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Back To Home', 'foliox' ); } ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>