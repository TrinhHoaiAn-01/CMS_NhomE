<?php /** Module 6: trang chi tiết bài viết. */ ?>
<div class="fit-detail-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
        <article class="fit-detail-card" id="post-<?php the_ID(); ?>">
            <header class="fit-detail-header">
                <h1 class="fit-detail-title"><?php the_title(); ?></h1>
                <time class="fit-detail-date-badge" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                    <span class="date-fraction">
                        <span class="date-day"><?php echo esc_html( get_the_date( 'd' ) ); ?></span>
                        <span class="date-sep"></span>
                        <span class="date-month"><?php echo esc_html( get_the_date( 'm' ) ); ?></span>
                    </span>
                    <span class="date-year"><?php echo esc_html( get_the_date( 'y' ) ); ?></span>
                </time>
            </header>
            <div class="fit-detail-divider"></div>
            <div class="fit-detail-content">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="fit-detail-thumb"><?php the_post_thumbnail( 'large' ); ?></div>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>
