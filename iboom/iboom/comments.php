<div class="comments-wrapper">



					<div class="comments" id="comments">


						<div class="comments-header">

							<h2 class="comment-reply-title">
								<?php 
                                    if( ! have_comments() )
                                    {
                                        "Leave a Comment";
                                    }
                                    else{
                                        get_comments_number(). "comments";
                                    }
                                ?>
                            </h2><!-- .comments-title -->

						</div><!-- .comments-header -->

						<div class="comments-inner">

                                <?php
                                    wp_list_comments(
                                        array(
                                            'avatar_size' => 120,
                                            'size' => 'div',

                                        )
                                    );
                                
                                ?>
                        </div>  
                    </div>              
					<hr class="" aria-hidden="true">
                                    <?php
                                        if( comments_open() ){
                                            comment_form(
                                                array(
                                                    'class_form' => '',
                                                    'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                                                    'title_reply_after' => '</h2>'
                                                )
                                            );
                                        }
                                        ?>


					<div id="respond" class="comment-respond">
						<h2 id="reply-title" class="comment-reply-title"> Thank You.. <small><a rel="nofollow"
									id="cancel-comment-reply-link" href="/?p=1#respond" style="display:none;">Cancel
									reply</a></small></h2>
					</div><!-- #respond -->

				</div>