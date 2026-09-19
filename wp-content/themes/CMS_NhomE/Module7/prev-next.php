<?php
/** Module 7: điều hướng bài viết trước và kế tiếp. */
$next_post = get_next_post();
$prev_post = get_previous_post();
if ( ! $next_post && ! $prev_post ) {
    return;
}
?>
<nav class="fit-prev-next-wrapper" aria-label="Điều hướng bài viết">
    <div class="fit-prev-next-list">
        <?php if ( $next_post ) : ?>
            <div class="fit-prev-next-item">
                <time class="fit-pn-date" datetime="<?php echo esc_attr( get_the_date( 'c', $next_post->ID ) ); ?>">
                    <span class="fit-pn-fraction">
                        <span class="fit-pn-day"><?php echo esc_html( get_the_date( 'd', $next_post->ID ) ); ?></span>
                        <span class="fit-pn-sep"></span>
                        <span class="fit-pn-month"><?php echo esc_html( get_the_date( 'm', $next_post->ID ) ); ?></span>
                    </span>
                    <span class="fit-pn-year"><?php echo esc_html( get_the_date( 'y', $next_post->ID ) ); ?></span>
                </time>
                <div class="fit-pn-title">
                    <a rel="next" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                        <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( $prev_post ) : ?>
            <div class="fit-prev-next-item">
                <time class="fit-pn-date" datetime="<?php echo esc_attr( get_the_date( 'c', $prev_post->ID ) ); ?>">
                    <span class="fit-pn-fraction">
                        <span class="fit-pn-day"><?php echo esc_html( get_the_date( 'd', $prev_post->ID ) ); ?></span>
                        <span class="fit-pn-sep"></span>
                        <span class="fit-pn-month"><?php echo esc_html( get_the_date( 'm', $prev_post->ID ) ); ?></span>
                    </span>
                    <span class="fit-pn-year"><?php echo esc_html( get_the_date( 'y', $prev_post->ID ) ); ?></span>
                </time>
                <div class="fit-pn-title">
                    <a rel="prev" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
                        <?php echo esc_html( get_the_title( $prev_post->ID ) ); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</nav>
