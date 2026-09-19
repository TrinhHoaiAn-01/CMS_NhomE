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
</section>
