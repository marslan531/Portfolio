<?php
/**
 * The Template for displaying all single posts
 */
$foliox_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php while (have_posts()): the_post(); ?>
<div class="foliox_tm_section page-banner">
    <div class="foliox_tm_news">
        <?php if(isset($foliox_redux_demo['background_blog_details']['url']) && $foliox_redux_demo['background_blog_details']['url'] != ''){ ?>  
        <div class="news_inner" style="background-image:url(<?php echo esc_url($foliox_redux_demo['background_blog_details']['url']); ?>);">
        <?php } else { ?>
        <div class="news_inner" style="background-image:url(<?php echo get_template_directory_uri();?>/img/blog/page-banner.jpg);">
        <?php } ?>
            <div class="container">
                <div class="foliox_tm_main_title">
                    <div class="title">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="foliox_tm_section">
    <div class="foliox_tm_news">   
        <div class="news_inner blog-news" >
            <div class="container">
                <div class="foliox_tm_flexbox">
                    <div class="leftbox">
                        <div class="news_list">
                            <div class="list_inner blog_single_details">
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="image thumb">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="" />
                                </div>
                                <?php } ?>
                                <div class="post-info">
                                    <span class="date"><?php the_time(get_option( 'date_format' ));?></span>
                                    <span class="comment"><?php comments_number( esc_html__('0 Comments', 'foliox'), esc_html__('1 Comment', 'foliox'), esc_html__('% Comments', 'foliox') ); ?></span>
                                </div>
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="post-area-tags">
                            <div class="aon-tags">
                                <h6 class="aon-bd-title"><?php if(isset($foliox_redux_demo['before_tags'])){?>
                                <?php echo htmlspecialchars_decode(esc_attr($foliox_redux_demo['before_tags']));?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Tags: ', 'foliox' ); } ?> </h6>
                                <ul class="tagcloud">
                                    <?php
                                    if ( get_the_tags() ) :
                                    foreach ( get_the_tags() as $tag ) :  ?>
                                    <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div> 
                            <div class="post-social-icons">
                                <ul class="post-social-icons">
                                    <span class='st_facebook_hcount'></span>
                                    <span class='st_twitter_hcount'></span>
                                    <span class='st_linkedin_hcount'></span>  
                                    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                    <script type="text/javascript">stLight.options({publisher: "ur-6a7e320d-37d8-511-633d-4264e3ae8c", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                                </ul>
                            </div>
                        </div>
                        <?php comments_template();?> 
                    </div>
                    <div class="rightbox rightSidebar">
                        <?php get_sidebar();?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php
get_footer();
?>