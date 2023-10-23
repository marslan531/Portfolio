<?php
/*
 * Template Name: Blog Template
 * Description: A Page Template with a Page Builder design.
 */
$foliox_redux_demo = get_option('redux_demo');
get_header(); ?>
<div class="foliox_tm_section page-banner">
    <div class="foliox_tm_news">
        <?php if(isset($foliox_redux_demo['background_blog']['url']) && $foliox_redux_demo['background_blog']['url'] != ''){ ?>  
        <div class="news_inner" style="background-image:url(<?php echo esc_url($foliox_redux_demo['background_blog']['url']); ?>);">
        <?php } else { ?>
        <div class="news_inner" style="background-image:url(<?php echo get_template_directory_uri();?>/img/news/page-header.jpg);">
        <?php } ?>
            <div class="container">
                <div class="foliox_tm_main_title">
                    <div class="title">
                        <h1><?php if(isset($foliox_redux_demo['blog_title'])){?>
                        <?php echo htmlspecialchars_decode(esc_attr($foliox_redux_demo['blog_title']));?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Blog', 'foliox' ); } ?></h1>
                    </div>
                </div>
                <div class="content">
                    <div class="breadcrumbs">
                        <p><span><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($foliox_redux_demo['blog_home_text'])){?>
                        <?php echo htmlspecialchars_decode(esc_attr($foliox_redux_demo['blog_home_text']));?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Home', 'foliox' );
                        }
                        ?></a></span> / <span class="active"><?php if(isset($foliox_redux_demo['blog_title'])){?>
                        <?php echo htmlspecialchars_decode(esc_attr($foliox_redux_demo['blog_title']));?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Blog', 'foliox' ); } ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="foliox_tm_section">
    <div class="foliox_tm_news">   
        <div class="news_inner blog-news blog-list" >
            <div class="container">
                <div class="foliox_tm_flexbox">
                    <div class="leftbox">
                        <?php  $args = array(    
                        'paged' => $paged,
                        'post_type' => 'post',
                        );
                        $wp_query = new WP_Query($args);
                        while (have_posts()): the_post(); ?>
                        <div class="news_list">
                            <div class="list_inner blog_single_details">
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="image thumb">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="" /></a>
                                </div>
                                <?php } ?>
                                <div class="post-info">
                                    <span class="date"><?php the_time(get_option( 'date_format' ));?></span>
                                    <span class="comment"><?php comments_number( esc_html__('0 Comments', 'foliox'), esc_html__('1 Comment', 'foliox'), esc_html__('% Comments', 'foliox') ); ?></span>
                                </div>
                                <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p><?php if(isset($foliox_redux_demo['blog_excerpt'])){?>
                                    <?php echo esc_attr(foliox_excerpt($foliox_redux_demo['blog_excerpt'])); ?>
                                    <?php }else{?>
                                    <?php echo esc_attr(foliox_excerpt(40)); 
                                    }
                                    ?></p>
                                <div class="sx-post-readmore">
                                    <a href="<?php the_permalink(); ?>" title="READ MORE" rel="bookmark" class="site-button icon"><i class="fa  fa-long-arrow-right"></i>
                                        <?php if(isset($foliox_redux_demo['read_more'])){?>
                                        <?php echo wp_specialchars_decode(esc_attr($foliox_redux_demo['read_more']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'Read More ', 'foliox' );
                                        }
                                        ?></a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <div class="aon-paging-control">
                            <?php foliox_pagination(); ?>
                        </div>
                    </div>
                    <div class="rightbox rightSidebar">
                        <?php get_sidebar();?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>