<?php
/** Module 12: latest approved comments beside the post listing. */
$listing_comments = get_comments(
    array(
        'number'      => 3,
        'status'      => 'approve',
        'post_status' => 'publish',
        'orderby'     => 'comment_date_gmt',
        'order'       => 'DESC',
    )
);
?>
<aside class="fit-listing-comments" aria-labelledby="fit-listing-comments-title">
    <h2 id="fit-listing-comments-title" class="fit-listing-comments-title">Comments</h2>
    <?php if ( $listing_comments ) : ?>
        <ul class="fit-listing-comments-list">
            <?php foreach ( $listing_comments as $listing_comment ) : ?>
                <?php $comment_preview = wp_trim_words( wp_strip_all_tags( $listing_comment->comment_content ), 9, '…' ); ?>
                <li><a href="<?php echo esc_url( get_comment_link( $listing_comment ) ); ?>"><?php echo esc_html( $comment_preview ); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p class="fit-listing-comments-empty">Chưa có bình luận nào.</p>
    <?php endif; ?>
</aside>
