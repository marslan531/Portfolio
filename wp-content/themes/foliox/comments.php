<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) : ?>
    <div class="clear" id="comment-list">
        <div class="comments-area2" id="comments">
            <h3 class="comment-title"><?php comments_number( esc_html__('0 Comments', 'foliox'), esc_html__('1 Comment', 'foliox'), esc_html__('% Comments', 'foliox') ); ?></h3>
            <div>
                <!-- COMMENT LIST START -->
                <ol class="comment-list">
                    <?php wp_list_comments('callback=foliox_theme_comment'); ?>
                </ol>
                <!-- COMMENT LIST END -->

            </div>
        </div>
    </div> 
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <div class="pagination_area">
            <nav>
                <ul class="pagination">
                    <li> <?php paginate_comments_links( 
                          array(
                          'prev_text' => wp_specialchars_decode( '<i class="fa fa-angle-left"></i>',ENT_QUOTES),
                          'next_text' => wp_specialchars_decode( '<i class="fa fa-angle-right"></i>',ENT_QUOTES),
                          ));  ?>
                    </li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
    <!-- END PAGINATION -->
<?php endif; ?>           
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
            'id_form' => ' commentform ',        
            'class_form' => ' comment-form ',                         
            'title_reply'=> esc_html__( 'Leave A Comment', 'foliox' ),
            'title_reply_before' => '<h3 class="comment-title">',
            'title_reply_after'  => '</h3>',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' => '<p class="comment-form-author">
                                <input class="form-control" name="author" type="text" id="author" placeholder="'.esc_attr__('Full Name', 'foliox').'" required="'.esc_attr__('required', 'foliox').'" data-error="'.esc_attr__('Name is required.', 'foliox').'">
                            </p>',
                'email' => '<p class="comment-form-email">
                                <input class="form-control" type="text" value="" name="email" placeholder="'.esc_attr__('Email Address', 'foliox').'" required="'.esc_attr__('required', 'foliox').'" data-error="'.esc_attr__('Valid email is required.', 'foliox').'">
                            </p>',        
            ) ),   
            'comment_field' => '<p class="comment-form-comment">
                                    <textarea class="form-control" rows="8" name="comment" id="comment" placeholder="'.esc_attr__('Write a comment...', 'foliox').'" id="comment-message" required="'.esc_attr__('required', 'foliox').'" data-error="'.esc_attr__('Please,leave us a message.', 'foliox').'"></textarea>
                                </p>',
            'label_submit' => esc_html__( 'Post A Comment', 'foliox' ),
            'submit_button' =>  '<button class="site-button" type="submit">'.esc_attr__('%4$s', 'foliox').'</button>',
            'submit_field' =>'<p class="form-submit">
                                    '.esc_attr__('%1$s', 'foliox').' '.esc_attr__('%2$s', 'foliox').'
                                </p>',
            'comment_notes_before' => '',
            'comment_notes_after' => '',             
        )
    ?>
    <?php if ( comments_open() ) : ?>
    <div class="clear" id="comment-list">
        <div class="comments-area2" id="comments">
            <div>
                <div class="comment-respond cm-respond" id="respond">
                <?php comment_form($comment_args); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>    


                        
                        
                        
                       
    
    
    
    

