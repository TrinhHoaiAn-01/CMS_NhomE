<?php
/** Module 8: danh sách bình luận của bài viết. */
if ( post_password_required() ) {
    return;
}
?>
<section class="fit-comments-area" id="comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="fit-comments-title">Bình luận <span class="badge-count"><?php echo esc_html( get_comments_number() ); ?></span></h2>
        <div class="fit-comment-list">
            <?php foreach ( $comments as $comment ) : ?>
                <article class="fit-comment-item" id="comment-<?php echo esc_attr( $comment->comment_ID ); ?>">
                    <div class="fit-comment-inner">
                        <div class="fit-comment-header-row">
                            <div class="fit-comment-avatar"><?php echo get_avatar( $comment, 44, '', esc_attr( $comment->comment_author ) ); ?></div>
                            <div class="fit-comment-meta">
                                <h3 class="fit-comment-author"><?php echo esc_html( $comment->comment_author ); ?></h3>
                                <p class="fit-comment-time"><?php echo esc_html( get_comment_date( 'd/m/Y H:i', $comment ) ); ?></p>
                            </div>
                        </div>
                        <div class="fit-comment-content"><?php comment_text( $comment ); ?></div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if ( comments_open() ) : ?>
        <?php comment_form( array(
            'class_form'         => 'fit-comment-form',
            'title_reply'        => 'Make a Post',
            'title_reply_before' => '<div class="fit-comment-tabbar"><h3 id="reply-title" class="fit-comment-form-title">',
            'title_reply_after'  => '</h3></div>',
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'logged_in_as'       => '',
            'comment_field'      => '<p class="comment-form-comment"><label class="screen-reader-text" for="comment">Write a comment</label><textarea id="comment" name="comment" rows="4" placeholder="What are you thinking..." required></textarea></p>',
            'class_submit'       => 'fit-comment-btn-share',
            'label_submit'       => 'share',
            'submit_field'       => '<p class="fit-comment-actions">%1$s %2$s</p>',
        ) ); ?>
    <?php elseif ( have_comments() ) : ?>
        <p class="fit-comments-closed">Bình luận đã đóng cho bài viết này.</p>
    <?php endif; ?>
</section>
