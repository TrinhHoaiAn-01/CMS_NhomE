<?php /** Module 5: kết quả tìm kiếm bài viết. */ ?>
<div class="fit-search-container">
    <?php while ( have_posts() ) : the_post(); ?>
        <article class="fit-search-item">
            <a class="fit-search-thumb" href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'medium' ); ?>
                <?php else : ?>
                    <span class="fit-search-placeholder">FIT-TDC</span>
                <?php endif; ?>
            </a>
            <div class="fit-search-date">
                <span class="date-number"><?php echo esc_html( get_the_date( 'd' ) ); ?></span>
                <span class="date-text">THÁNG <?php echo esc_html( get_the_date( 'm' ) ); ?></span>
            </div>
            <div class="fit-search-content">
                <h2 class="fit-search-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
                <div class="fit-search-excerpt"><?php the_excerpt(); ?></div>
            </div>
        </article>
    <?php endwhile; ?>
    <nav class="fit-search-pagination" aria-label="Phân trang kết quả tìm kiếm">
        <?php the_posts_pagination( array( 'prev_text' => '« Trước', 'next_text' => 'Sau »' ) ); ?>
    </nav>
</div>
