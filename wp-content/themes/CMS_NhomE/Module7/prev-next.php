<?php
/** Module 7: điều hướng sang bài viết kế tiếp. */
$next_post = get_next_post();
if ( ! $next_post ) {
    return;
}
?>
<nav class="fit-prev-next-wrapper" aria-label="Điều hướng bài viết">
    <div class="fit-prev-next-list">
        <div class="fit-prev-next-item">
            <div class="fit-pn-title">
                <a rel="next" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                    <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                </a>
            </div>
        </div>
    </div>
</nav>
