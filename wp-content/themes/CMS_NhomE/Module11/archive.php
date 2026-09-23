<?php
/** Module 11: newest posts in the archive sidebar. */
$archive_posts = get_posts(
    array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => 8,
        'ignore_sticky_posts' => true,
        'orderby'            => 'date',
        'order'              => 'DESC',
    )
);
?>
<aside class="fit-archive" aria-labelledby="fit-archive-title">
    <h2 id="fit-archive-title" class="fit-archive-title">Xem nhiều</h2>
    <?php if ( $archive_posts ) : ?>
        <ol class="fit-archive-list">
            <?php foreach ( $archive_posts as $archive_post ) : ?>
                <li><a href="<?php echo esc_url( get_permalink( $archive_post ) ); ?>"><?php echo esc_html( get_the_title( $archive_post ) ); ?></a></li>
            <?php endforeach; ?>
        </ol>
    <?php else : ?>
        <p class="fit-archive-empty">Chưa có bài viết nào.</p>
    <?php endif; ?>
</aside>
