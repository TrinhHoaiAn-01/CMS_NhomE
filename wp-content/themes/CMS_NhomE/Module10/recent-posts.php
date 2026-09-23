<?php
/** Module 10: bài viết mới bên cạnh trang chi tiết. */
$recent_posts = new WP_Query( array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 3,
    'post__not_in'        => array( get_queried_object_id() ),
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
) );
?>
<aside class="fit-recent-posts" aria-label="Bài viết mới">
    <div class="fit-recent-posts-list">
        <?php if ( $recent_posts->have_posts() ) : ?>
            <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                <article class="fit-recent-post">
                    <h2 class="fit-recent-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="fit-recent-empty">Chưa có bài viết mới.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</aside>
