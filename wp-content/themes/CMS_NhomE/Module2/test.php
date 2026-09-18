<?php /** Module 2: danh sách bài viết. */ ?>
<div class="module-2-content-container">
    <div class="fit-posts-list">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="fit-post-card">
                    <div class="fit-date-box">
                        <span class="fit-date-day"><?php echo esc_html( get_the_date( 'd' ) ); ?></span>
                        <span class="fit-date-month">THÁNG <?php echo esc_html( get_the_date( 'm' ) ); ?></span>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a class="fit-post-thumb" href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                            <?php the_post_thumbnail( 'medium', array( 'class' => 'fit-post-img' ) ); ?>
                        </a>
                    <?php endif; ?>
                    <div class="fit-post-content">
                        <h2 class="fit-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="fit-post-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt() ?: get_the_content(), 35, '…' ) ); ?></div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
